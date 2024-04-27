<?php

function movies_allowed_block_types($allowed_blocks, $post)
{
	$allowed_blocks = array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list'
	);

	if ($post->post_type === 'movies') :
		$allowed_blocks[] = 'create-block/favorite-movie-quote';
	endif;

	return $allowed_blocks;
}

add_filter('allowed_block_types', 'movies_allowed_block_types', 10, 2);
