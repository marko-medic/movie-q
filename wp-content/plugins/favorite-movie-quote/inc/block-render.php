<?php

// Render callback function for the Gutenberg block
function movies_dynamic_render($attributes)
{
	$movie_quote_text = isset($attributes['quoteText']) ? $attributes['quoteText'] : '';
	$movie_year = get_post_meta(get_the_ID(), 'movie_year', true) ?: 'not set';

	ob_start();
?>
	<div>
		<p> --> ! <---< /p>
				<h2><?php echo esc_html($movie_quote_text); ?></h2>
				<h5>Movie year: <?php echo $movie_year; ?></h5>
				<p> --> ! <---< /p>
	</div>
<?php
	return ob_get_clean();
}
