<?php

class Movie_Meta {
    public function __construct() {
        add_action('add_meta_boxes', array($this, 'add_movie_meta_box'));
        add_action('save_post', array($this, 'save_movie_meta'));
        add_action('rest_api_init', array($this, 'register_movie_meta_rest_field'));
    }

    public function add_movie_meta_box() {
        add_meta_box(
            'movie-meta-box',
            'Movie Meta',
            array($this, 'render_movie_meta_box'),
            'movies',
            'normal',
            'default'
        );
    }

    public function render_movie_meta_box($post) {
        $movie_year = get_post_meta($post->ID, 'movie_year', true);
        ?>
            <label for="movie_year">Year:</label>
            <input type="number" id="movie_year" name="movie_year" value="<?php echo esc_attr($movie_year); ?>">
        <?php
    }
    

    public function save_movie_meta($post_id) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

        if (!current_user_can('edit_post', $post_id)) return;

        if (isset($_POST['movie_year'])) {
            update_post_meta($post_id, 'movie_year', sanitize_text_field($_POST['movie_year']));
        }
    }

    public function register_movie_meta_rest_field() {
        register_rest_field(
            'movies',
            'movie_year',
            array(
                'get_callback'    => array($this, 'get_movie_year_rest_field'),
                'update_callback' => array($this, 'update_movie_year_rest_field'),
                'schema'          => array(
                    'type' => 'integer',
                    'description' => 'Year of the movie.',
                    'context'     => array('view', 'edit')
                )
            )
        );
    }

    public function get_movie_year_rest_field($object, $field_name, $request) {
        return get_post_meta($object['id'], $field_name, true);
    }

    public function update_movie_year_rest_field($value, $object, $field_name) {
        if (!empty($value)) {
            update_post_meta($object->ID, $field_name, sanitize_text_field($value));
        }
    }
}

// Instantiate the class
$movie_meta = new Movie_Meta();
