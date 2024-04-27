<?php

class Load_Scripts {
    public function load_style($handle_name, $path, $options = []) {
        add_action('wp_enqueue_scripts', function() use ($handle_name, $path, $options) {
            $option_deps = isset($options['deps']) ? $options['deps'] : [];
            $option_version = isset($options['version']) ? $options['version'] : '1.0';
            $in_footer = isset($options['media']) ? $options['media'] : 'all';
            $style_path = get_template_directory_uri() . '/build/' . $path;
            wp_enqueue_style($handle_name, $style_path, $option_deps, $option_version, $in_footer);
        });

        return $this;
    }

    public function load_script($handle_name, $path, $options = []) {
        add_action('wp_enqueue_scripts', function() use ($handle_name, $path, $options){
            $deps = isset($options['deps']) ? $options['deps'] : [];
            $version = isset($options['version']) ? $options['version'] : '1.0';
            $in_footer = isset($options['in_footer']) ? $options['in_footer'] : true;
            $localize_script = isset($options['localize']) ? $options['localize'] : null;
            $script_path = get_template_directory_uri() . '/build/' . $path;
            wp_enqueue_script($handle_name, $script_path, $deps, $version, $in_footer);
            if ($localize_script) {
                wp_localize_script($handle_name, $localize_script['name'], $localize_script['args']);
            }
        });
        return $this;
    }
}

(new Load_Scripts())
    ->load_style('theme-style', 'index.css')
    ->load_script('theme-script', 'index.js', [
    "deps" => ['jquery'],
    "version" => "1.0",
    "localize" => [
        "name" => "wp_global",
        "args" => [
            "ajax_url" => admin_url('admin-ajax.php'),
            "base_url" => esc_url(home_url())
        ]
    ],
]);
