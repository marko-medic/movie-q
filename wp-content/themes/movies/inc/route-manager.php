<?php

class Route_Manager {
    public function handleProtectedRoute($route_option) {
        add_action('template_redirect', function() use ($route_option) {
                if ($route_option['redirect_callback']($route_option['page_name'])) {
                    wp_safe_redirect(esc_url(home_url()));
                    die;
                }
        });
    }
}

$route_manager = new Route_Manager();
$route_manager->handleProtectedRoute([
        "page_name" => 'movies',
        "redirect_callback" => function($page_name) {
            $auth_manager = new Auth_Manager();
            return !$auth_manager->can_access_movies() && is_post_type_archive($page_name);
        }
]);

$route_manager->handleProtectedRoute([
        "page_name" => 'login',
        "redirect_callback" => function($page_name) {
            $auth_manager = new Auth_Manager();
            return $auth_manager->can_access_movies() && is_page($page_name);
        }
]);