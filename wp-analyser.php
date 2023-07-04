<?php
/*
Plugin Name: WP Analyser
Plugin URI: http://www.wp-analyser.com
Author: Axel Pelassa
Description: This plugin will analyse your wordpress installation and provide you with a report on how to improve your wordpress installation.
Version: 1.0
*/

// si quelqu'un essaie d'accéder directement au plugin
if (!defined('ABSPATH')) {exit;}

// Inclure le fichier function.php
require_once plugin_dir_path(__FILE__) . 'function.php';

// Enregistrer et mettre en file d'attente le fichier CSS
add_action('admin_enqueue_scripts', 'wp_analyser_styles');

function wp_analyser_styles() {
    wp_register_style('wp-analyser-style', plugins_url('style.css', __FILE__));
    wp_enqueue_style('wp-analyser-style');
}

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
