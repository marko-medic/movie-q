<?php

// Render callback function for the Gutenberg block
function movies_dynamic_render($attributes) {
    $movie_quote_text = isset($attributes['quoteText']) ? $attributes['quoteText'] : '';

    ob_start();
    ?>
    <div>
		<p> --> ! <---</p>
        <h2><?php echo esc_html($movie_quote_text); ?></h2>
		<p> --> ! <---</p>
    </div>
    <?php
    return ob_get_clean();
}
