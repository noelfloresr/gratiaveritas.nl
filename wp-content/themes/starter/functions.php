<?php

require 'include/framework.php';
require 'include/custom-functions.php';

$framework = new \Veribo\Framework();

/**
 * Scripts
 * 
 */
// $framework->enqueue_script(array(
//     'handle' => 'site-script',
//     'src' => 'assets/js/site.js',
//     // 'dependencies' => array('jquery'),
// ), 'php', array(
//     'ajax_url' => admin_url('admin-ajax.php'),
//     'site_url' => get_bloginfo('url'),
// ));


/**
 * Styles
 * 
 */
$framework->enqueue_style(array(
    'handle' => 'site-style',
    'src' => 'style.css',
));

/**
 * Post Types
 * 
 */
$framework->register_post_type(array(
    'slug' => 'workshops',
    'name' => array(
        'singular' => 'Workshop',
        'plural' => 'Workshops',
    ),
    'supports' => array('title', 'thumbnail', 'editor')
));

/**
 * Taxonomies
 * 
 */
$framework->register_taxonomy(array(
    'slug' => 'book_category',
    'post_types' => array('book'),
    'name' => array(
        'singular' => 'Category',
        'plural' => 'Categories',
    ),
));

/**
 * Image Sizes
 * 
 */
$framework->add_image_size('square', 200, 200);

/**
 * Login Screen
 * 
 */
$framework->login_screen(array(
    'logo' => 'assets/img/logo.png',
    'logo_width' => '100px',
    'color' => '#000',
    'color_hover' => '#666',
));

// Let's get the party started!
$framework->go();

// TODO: DELETE LATER
function template_files()
{
    wp_enqueue_style('jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js');
    wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js');
    wp_enqueue_style('owlcarousel', get_theme_file_uri('/assets/css/owl.carousel.css'));
    wp_enqueue_style('owlthemedefault', get_theme_file_uri('/assets/css/owl.theme.default.css'));
    wp_enqueue_script('owl-carousel', get_theme_file_uri('/assets/js/owl.carousel.min.js'), NULL, '1.0', true);
    wp_enqueue_style('font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css");
    wp_enqueue_script('smooth', get_theme_file_uri('/assets/js/smooth.js'), NULL, '1.0', true);
    wp_enqueue_script('main', get_theme_file_uri('/assets/js/index.js'), NULL, '1.0', true);
    wp_enqueue_style('index', get_theme_file_uri('/assets/css/style.css'));
}

add_action('wp_enqueue_scripts', 'template_files');
