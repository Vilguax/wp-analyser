<?php
    /*
    Plugin Name: WP Analyser
    Plugin URI: http://www.wp-analyser.com
    Description: This plugin will analyse your wordpress installation and provide you with a report on how to improve your wordpress installation.
    Version: 1.0
    */

    // si quelqu'un essaie d'accéder directement au plugin
    if (!defined('ABSPATH')) {exit;}

    add_action('admin_menu', 'wp_analyser_menu');

function wp_analyser_menu() {
    add_menu_page(
        'WP Analyser', // Le titre de la page
        'WP Analyser', // Le titre du menu
        'manage_options', // La capacité requise pour voir le menu
        'wp-analyser', // Le slug du menu
        'wp_analyser_dashboard', // La fonction qui affiche le contenu de la page
        'dashicons-chart-bar', // L'icône du menu
        100 // La position du menu
    );
}

function wp_analyser_dashboard() {
    // Le contenu de la page ira ici
    echo '<h1>Welcome to WP Analyser Dashboard</h1>';
}
