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

    // wordpress customiser is pretty useless, so let's disable it
    add_action('init', function() {
        add_filter('map_meta_cap', function($caps = [], $cap = '', $user_id = 0, $args = []) {
            if ($cap == 'customize') { return ['nope']; } return $caps;
        }, 10, 4);
    }, 999);

    add_action('admin_init', function() {
        remove_action('plugins_loaded', '_wp_customize_include', 10);
        remove_action('admin_enqueue_scripts', '_wp_customize_loader_settings', 11);

        add_action('load-customize.php', function() { wp_die('The Customizer is disabled. You shouldn\'t use it anyway! <a href="'.get_dashboard_url().'">Back to Dashboard</a>'); });
    }, 999);



