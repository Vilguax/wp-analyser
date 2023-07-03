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
