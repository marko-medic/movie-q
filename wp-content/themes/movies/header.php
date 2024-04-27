<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?>Movie list</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <!-- Your header content goes here -->
    <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
    <nav>
        <?php 
            $auth_manager = new Auth_Manager();
            $user_can_access_movies = $auth_manager->can_access_movies(); 
        ?>
        <ul>
            <li style="display: block;">
                <a href="<?php echo esc_url(home_url()) ?>">Home</a>
            </li>
            <li style="display: <?php echo $user_can_access_movies ? 'none' : 'block' ?>;">
                <a href="<?php echo esc_url(home_url() . '/login') ?>">Login</a>
            </li>
            <li style="display: <?php echo !$user_can_access_movies ? 'none' : 'block' ?>;">
                <a href="<?php echo esc_url(home_url() . '/movies') ?>">Movies</a>
            </li>
            <li style="display: block;">
                <a href="<?php echo esc_url(home_url() . '/about') ?>">About</a>
            </li>
            <li style="display: <?php echo !$user_can_access_movies ? 'none' : 'block' ?>;">
                <a href="<?php echo esc_url(home_url() . '/logout') ?>">Logout</a>
            </li>
        </ul>
    </nav>
</header>
