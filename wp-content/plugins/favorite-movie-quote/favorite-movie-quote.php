<?php

/**
 * Plugin Name:       Favorite Movie Quote
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       favorite-movie-quote
 *
 * @package CreateBlock
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

require_once plugin_dir_path(__FILE__) . '/inc/filters.php';
require_once plugin_dir_path(__FILE__) . '/inc/block-render.php';


/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

function create_block_favorite_movie_quote_block_init()
{
	register_block_type(__DIR__ . '/build', [
		"render_callback" => "movies_dynamic_render"
	]);
}
add_action('init', 'create_block_favorite_movie_quote_block_init');
