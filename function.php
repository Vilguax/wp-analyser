<?php
// Fonction pour récupérer les thèmes
function get_themes_info() {
    // Récupérer tous les thèmes
    $themes = wp_get_themes();

    // Créer un tableau pour stocker les informations sur les thèmes
    $themes_info = array();

    // Parcourir chaque thème
    foreach($themes as $theme) {
        // Ajouter les informations du thème au tableau
        $themes_info[] = array(
            'name' => $theme->get('Name'),
            'version' => $theme->get('Version'),
            'author' => $theme->get('Author'),
            'description' => $theme->get('Description'),
        );
    }

    // Retourner les informations sur les thèmes
    return $themes_info;
}

// Fonction pour récupérer les plugins
function get_plugins_info() {
    // Vérifier si la fonction pour récupérer les plugins est disponible
    if (!function_exists('get_plugins')) {
        // Inclure le fichier nécessaire pour utiliser la fonction get_plugins
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }

    // Récupérer tous les plugins
    $plugins = get_plugins();

    // Créer un tableau pour stocker les informations sur les plugins
    $plugins_info = array();

    // Parcourir chaque plugin
    foreach($plugins as $plugin_file => $plugin_data) {
        // Ajouter les informations du plugin au tableau
        $plugins_info[] = array(
            'name' => $plugin_data['Name'],
            'version' => $plugin_data['Version'],
            'author' => $plugin_data['AuthorName'],
            'description' => $plugin_data['Description'],
        );
    }

    // Retourner les informations sur les plugins
    return $plugins_info;
}

function wp_analyser_dashboard() {
    // Récupérer les informations sur les thèmes et les plugins
    $themes_info = get_themes_info();
    $plugins_info = get_plugins_info();

    // Générer le tableau des thèmes
    echo '<h2>Themes</h2>';
    echo '<table class="wp-analyser-table">';
    echo '<tr><th>Name</th><th>Version</th><th>Author</th><th>Description</th></tr>';
    foreach($themes_info as $theme) {
        echo '<tr>';
        echo '<td>' . $theme['name'] . '</td>';
        echo '<td>' . $theme['version'] . '</td>';
        echo '<td>' . $theme['author'] . '</td>';
        echo '<td>' . $theme['description'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';

    // Générer le tableau des plugins
    echo '<h2>Plugins</h2>';
    echo '<table class="wp-analyser-table">';
    echo '<tr><th>Name</th><th>Version</th><th>Author</th><th>Description</th></tr>';
    foreach($plugins_info as $plugin) {
        echo '<tr>';
        echo '<td>' . $plugin['name'] . '</td>';
        echo '<td>' . $plugin['version'] . '</td>';
        echo '<td>' . $plugin['author'] . '</td>';
        echo '<td>' . $plugin['description'] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
