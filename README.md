=== WP Ceník ===  
Contributors: vvvamik  
Tags: ceník, kategorie, shortcode, responzivní tabulka  
Requires at least: 5.0  
Tested up to: 6.3  
Requires PHP: 7.4 a vyšší
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
V administraci WordPressu přejděte na **Ceník > Kategorie ceníků**. Přidejte novou skupinu a přiřaďte ji k vašim položkám.

= Mohu zobrazit pouze konkrétní kategorie? =  
Ano, použijte atribut `group` v shortcodu pro filtrování dle kategorie. Například:  
`[responsive_table group="vase-kategorie-slug"]`

= Jak přidám překlady? =  
Použijte šablonu pro překlady (`.pot`) umístěnou ve složce `languages` a vytvořte překlady pro požadovaný jazyk. Přeložené `.po` soubory zkompilujte do `.mo` a nahrajte je zpět do složky `languages`.

== Screenshoty ==

1. **Administrace - Přidání nové položky**  
   ![wp-cenik1](https://github.com/user-attachments/assets/6d5edb9d-a15f-4805-80ed-196576d5c753)

2. **Responzivní tabulka - Zobrazení na webu a mobilu**
   ![wp-cenik2](https://github.com/user-attachments/assets/ea509eab-f530-4725-8fd5-71d397578706)
   ![wp-cenik3](https://github.com/user-attachments/assets/0778f0fd-1b64-4dbd-8758-8e9eb47d5935)
  
3. **Vložení shortkódů na stránku**
   ![wp-cenik4](https://github.com/user-attachments/assets/36f6439e-2bce-43e9-9a69-22611f1914b4)


== Změny ==

= 1.0 =  
- První verze pluginu se základní funkcionalitou ceníku.  

== Licence ==

Tento plugin je licencován pod GPLv2 nebo novější. Podrobnosti najdete na [GPL License](https://www.gnu.org/licenses/gpl-2.0.html).
