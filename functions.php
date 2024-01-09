<?php

    define("TAILBERG_URI", get_stylesheet_directory_uri());
    define("TAILBERG_PATH", get_stylesheet_directory());

    include_once(TAILBERG_PATH . '/resources/php/gutenberg.php');

    add_action('after_setup_theme', function() {
        register_nav_menus(
            array(
                'main' => 'Main Menu',
                'footer' => 'Footer Menu'
            )
        );
    });
    
    add_action('wp_enqueue_scripts', function() {
        //wp_enqueue_script('twple-script', get_stylesheet_directory_uri() . '/js/frontend.js', ['jquery'], filemtime(get_stylesheet_directory() . '/js/frontend.js'), true);
        wp_enqueue_style('twple-style', get_stylesheet_directory_uri() . '/css/frontend.css', [], filemtime(get_stylesheet_directory() . '/css/frontend.css'));
    });

    add_filter('should_load_separate_core_block_assets', '__return_true');


