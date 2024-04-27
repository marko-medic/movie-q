<?php


class Plugin_Loader {
    public function activate($plugin_name) {
        require_once ABSPATH . '/wp-admin/includes/plugin.php';
        add_action('wp_loaded', function() use ($plugin_name) {
            $plugin_path = ABSPATH . '/wp-content/plugins/' . $plugin_name;
            if (!is_plugin_active($plugin_path)) {
                activate_plugin($plugin_path);
            }
        });
        return $this;
    }
}

(new Plugin_Loader())
    ->activate('movie-q/movie-q.php')
    ->activate('favorite-movie-quote/favorite-movie-quote.php');
