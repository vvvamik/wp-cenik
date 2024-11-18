<?php
/*
Plugin Name: Ceník
Description: Vytváření a správa ceníku s kategoriemi na stránce.
Version: 1.0
Author: vvvamik
Text Domain: price-plugin
*/

// 1. Registrace vlastního typu příspěvku a taxonomie
function create_services_post_type() {
    register_post_type('service', [
        'labels' => [
            'name' => __('Ceník', 'price-plugin'),
            'singular_name' => __('Položka ceníku', 'price-plugin'),
        ],
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'supports' => ['title'],
        'menu_icon' => 'dashicons-list-view',
    ]);

    // Registrace taxonomie
    register_taxonomy('service_group', 'service', [
        'labels' => [
            'name' => __('Kategorie ceníků', 'price-plugin'),
            'singular_name' => __('Kategorie ceníků', 'price-plugin'),
        ],
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
    ]);
}
add_action('init', 'create_services_post_type');

// 2. Přidání metaboxů (Detaily)
function add_service_meta_boxes() {
    add_meta_box('service_details', __('Detaily položky', 'price-plugin'), 'service_meta_box_callback', 'service', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_service_meta_boxes');

function service_meta_box_callback($post) {
    wp_nonce_field('service_meta_box', 'service_meta_box_nonce');

    $price = get_post_meta($post->ID, '_service_price', true);
    $description = get_post_meta($post->ID, '_service_description', true);
    ?>
    <p>
        <label for="service_price"><?php _e('Cena (Kč):', 'price-plugin'); ?></label><br>
        <input type="number" id="service_price" name="service_price" value="<?php echo esc_attr($price); ?>" style="width:100%;">
    </p>
    <p>
        <label for="service_description"><?php _e('Popis:', 'price-plugin'); ?></label><br>
        <input type="text" id="service_description" name="service_description" value="<?php echo esc_attr($description); ?>" style="width:100%;">
    </p>
    <?php
}

// 3. Uložení metadat
function save_service_meta_data($post_id) {
    if (!isset($_POST['service_meta_box_nonce']) || !wp_verify_nonce($_POST['service_meta_box_nonce'], 'service_meta_box')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['service_price'])) {
        update_post_meta($post_id, '_service_price', floatval($_POST['service_price']));
    }
    if (isset($_POST['service_description'])) {
        update_post_meta($post_id, '_service_description', sanitize_text_field($_POST['service_description']));
    }
}
add_action('save_post', 'save_service_meta_data');

// 4. Zobrazení služeb pomocí shortcode
function responsive_table_shortcode_dynamic($atts) {
    $atts = shortcode_atts([
        'group' => '', // Defaultně bez filtru
    ], $atts, 'responsive_table');

    $args = [
        'post_type' => 'service',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'DESC',
    ];

    if (!empty($atts['group'])) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'service_group',
                'field' => 'slug',
                'terms' => $atts['group'],
            ],
        ];
    }

    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        return '<p>' . __('Žádné položky nebyly nalezeny.', 'price-plugin') . '</p>';
    }

    ob_start();
    ?>
    <div class="responsive-table">
        <?php
        $count = 0;
        while ($query->have_posts()) : $query->the_post();
            if ($count % 2 == 0) {
                echo '<div class="table-row">';
            }
        ?>
            <div class="table-cell">
                <div class="service-header">
                    <strong class="service-title"><?php echo esc_html(get_the_title()); ?></strong>
                    <span class="price"><?php echo esc_html(get_post_meta(get_the_ID(), '_service_price', true)); ?> Kč</span>
                </div>
                <div class="service-details">
                    <?php echo esc_html(get_post_meta(get_the_ID(), '_service_description', true)); ?>
                </div>
            </div>
        <?php
            $count++;
            if ($count % 2 == 0) {
                echo '</div>';
            }
        endwhile;
        if ($count % 2 != 0) {
            echo '</div>';
        }
        ?>
    </div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('responsive_table', 'responsive_table_shortcode_dynamic');

// 5. Přidání stylů
function responsive_table_enqueue_styles() {
    wp_enqueue_style('responsive-table-style', plugin_dir_url(__FILE__) . '/css/style.css');
}
add_action('wp_enqueue_scripts', 'responsive_table_enqueue_styles');

// 6. Načtení jazykového souboru
function price_plugin_load_textdomain() {
    load_plugin_textdomain('price-plugin', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'price_plugin_load_textdomain');
