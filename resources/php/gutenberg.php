<?php

add_filter('allowed_block_types_all', function($allowed_blocks, $editor_context) {
    return array(
        'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/list-item'
    );
}, 25, 2 );

add_action('init', function() {
    remove_theme_support('core-block-patterns');
});