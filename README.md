=== WP Ceník ===  
Contributors: vvvamik  
Tags: ceník, kategorie, shortcode, responzivní tabulka  
Requires at least: 5.0  
Tested up to: 6.3  
Requires PHP: 7.4  
Stable tag: 1.0  
License: GPLv2 nebo novější  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

Plugin pro správu a zobrazení responzivního ceníku s podporou kategorií. Umožňuje přidávání, kategorizaci a dynamické zobrazení položek pomocí shortcode.

== Popis ==

**WP Ceník** je jednoduchý plugin pro WordPress, který umožňuje snadno spravovat a zobrazovat ceníky na vašem webu.  

### Hlavní funkce:
- Vlastní typ příspěvku pro správu položek ceníku.  
- Podpora kategorií (taxonomií) pro lepší organizaci.  
- Krátké kódy (shortcode) pro snadné zobrazení na stránce.  
- Responzivní zobrazení na různých zařízeních.  

### Ukázka shortcodu:
- Zobrazení všech položek:  
  `[responsive_table]`  
- Zobrazení položek z konkrétní skupiny (např. „kategorie-1“):  
  `[responsive_table group="kategorie-1"]`  

### Podpora více jazyků:
- Plugin je připraven na překlady pomocí `.po` a `.mo` souborů.  
- Součástí je šablona pro překlady `.pot`.  

== Instalace ==

1. Stáhněte plugin a nahrajte jej do složky `/wp-content/plugins/`.  
2. Aktivujte plugin v menu **Pluginy** ve WordPressu.  
3. Přejděte do menu **Ceník** v administraci WordPressu a přidejte nové položky.  
4. Použijte shortcode `[responsive_table]` na jakékoli stránce nebo příspěvku pro zobrazení ceníku.  

== Často kladené dotazy ==

= Jak vytvořím novou kategorii? =  
V administraci WordPressu přejděte na **Ceník > Skupiny ceníků**. Přidejte novou skupinu a přiřaďte ji k vašim položkám.

= Mohu zobrazit pouze konkrétní kategorie? =  
Ano, použijte atribut `group` v shortcodu pro filtrování dle kategorie. Například:  
`[responsive_table group="vase-kategorie-slug"]`

= Jak přidám překlady? =  
Použijte šablonu pro překlady (`.pot`) umístěnou ve složce `languages` a vytvořte překlady pro požadovaný jazyk. Přeložené `.po` soubory zkompilujte do `.mo` a nahrajte je zpět do složky `languages`.

== Screenshoty ==

1. **Administrace - Přidání nové položky**  
   ![Přidání položky]([Imgur](https://imgur.com/Y1aFEb4))

2. **Responzivní tabulka - Zobrazení na webu**  
   ![Zobrazení ceníku]([Imgur](https://imgur.com/cHcw9wj))
   ![Správa kategorií][Imgur](https://imgur.com/uzpwFoZ)

== Změny ==

= 1.0 =  
- První verze pluginu se základní funkcionalitou ceníku.  

== Licence ==

Tento plugin je licencován pod GPLv2 nebo novější. Podrobnosti najdete na [GPL License](https://www.gnu.org/licenses/gpl-2.0.html).
