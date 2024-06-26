<?php

class Movies_Custom_Post_Type
{
    public function __construct()
    {
        add_action('init', array($this, 'register_post_type'));
    }

    public function register_post_type()
    {
        $labels = array(
            'name'                  => _x('Movies', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Movie', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Movies', 'text_domain'),
            'name_admin_bar'        => __('Movie', 'text_domain'),
            'archives'              => __('Movie Archives', 'text_domain'),
            'attributes'            => __('Movie Attributes', 'text_domain'),
            'parent_item_colon'     => __('Parent Movie:', 'text_domain'),
            'all_items'             => __('All Movies', 'text_domain'),
            'add_new_item'          => __('Add New Movie', 'text_domain'),
            'add_new'               => __('Add New', 'text_domain'),
            'new_item'              => __('New Movie', 'text_domain'),
            'edit_item'             => __('Edit Movie', 'text_domain'),
            'update_item'           => __('Update Movie', 'text_domain'),
            'view_item'             => __('View Movie', 'text_domain'),
            'view_items'            => __('View Movies', 'text_domain'),
            'search_items'          => __('Search Movie', 'text_domain'),
            'not_found'             => __('Not found', 'text_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
            'featured_image'        => __('Featured Image', 'text_domain'),
            'set_featured_image'    => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image'    => __('Use as featured image', 'text_domain'),
            'insert_into_item'      => __('Insert into movie', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this movie', 'text_domain'),
            'items_list'            => __('Movies list', 'text_domain'),
            'items_list_navigation' => __('Movies list navigation', 'text_domain'),
            'filter_items_list'     => __('Filter movies list', 'text_domain'),
        );

        $args = array(
            'label'                 => __('Movie', 'text_domain'),
            'description'           => __('Post Type Description', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'taxonomies'            => array('category', 'post_tag'),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-video-alt3',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
        );

        register_post_type('movies', $args);
    }
}

(new Movies_Custom_Post_Type());
