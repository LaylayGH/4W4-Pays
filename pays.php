<?php
/**
 * Package Pays
 * Version 1.0.0
 */
/*
Plugin name: Pays
Plugin uri: https://github.com/LaylayGH
Version: 1.0.0
Description: Permet d'afficher les pays
*/
function pays_enqueue()
{
// filemtime // retourne en milliseconde le temps de la dernière modification
// plugin_dir_path // retourne le chemin du répertoire du plugin
// __FILE__ // le fichier en train de s'exécuter
// wp_enqueue_style() // Intègre le link:css dans la page
// wp_enqueue_script() // intègre le script dans la page
// wp_enqueue_scripts // le hook

$version_css = filemtime(plugin_dir_path( __FILE__ ) . "style.css");
$version_js = filemtime(plugin_dir_path(__FILE__) . "js/pays.js");
wp_enqueue_style(   'em_plugin_pays_css',
                     plugin_dir_url(__FILE__) . "style.css",
                     array(),
                     $version_css);

wp_enqueue_script(  'em_plugin_pays_js',
                    plugin_dir_url(__FILE__) ."js/pays.js",
                    array(),
                    $version_js,
                    true);
}
add_action('wp_enqueue_scripts', 'pays_enqueue');

/* Création de la liste des pays en HTML */
function creation_pays(){

    $contenu = '
    <div class="contenu__restapipays">
    </div>';
    return $contenu;
}

function creation_menu_pays() {
    // The list of pays
    $pays = ["France", "États-Unis", "Canada", "Argentine", "Chili", "Belgique", "Maroc", "Mexique", "Japon", "Italie", "Islande", "Chine", "Grèce", "Suisse"];

    // Start the menu
    $menu = '<div id="pays-destinations">';

    // Add a dropdown menu for the pays
    $menu .= '<select id="pays-select">';
    foreach ($pays as $unPays) {
        $menu .= '<option value="' . $pays . '">' . $pays . '</option>';
    }
    $menu .= '</select>';

    // Add a container for the destinations
    $menu .= '<div id="destinations"></div>';

    // End the menu
    $menu .= '</div>';

    return $menu;
}
add_shortcode('menu_pays', 'creation_menu_pays');

// Ajout du shortcode pour les pays
add_shortcode('em_pays', 'creation_pays'); ?>