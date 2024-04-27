<?php

class Load_Scripts {
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'load_styles_and_scripts'));
    }

    public function load_styles_and_scripts() {
        // Enqueue styles
        wp_enqueue_style('theme-style', get_stylesheet_uri());
        // Enqueue scripts
        wp_enqueue_script('theme-script', get_template_directory_uri() . '/build/index.js', array('jquery'), '1.0', true);
        // Localize script
        wp_localize_script('theme-script', 'wp_global', array('ajax_url' => admin_url('admin-ajax.php'), 'base_url' => esc_url(home_url('/'))));
    }
}

$load_scripts = new Load_Scripts();
