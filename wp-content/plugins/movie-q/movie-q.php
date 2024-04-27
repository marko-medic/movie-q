<?php
/*
Plugin Name: Movie Q
Plugin URI: https://yourwebsite.com/movie-q
Description: A plugin for managing movies.
Version: 1.0
Author: Your Name
Author URI: https://yourwebsite.com
License: GPLv2 or later
Text Domain: movie-q
*/


if (!defined('ABSPATH')) {
    die;
}

require_once plugin_dir_path(__FILE__) . '/inc/movie-cpt.php';
require_once plugin_dir_path(__FILE__) . '/inc/movie-meta.php';
