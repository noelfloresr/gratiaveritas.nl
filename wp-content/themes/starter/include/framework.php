<?php

namespace Veribo;

class Framework
{

    /**
     * The scripts to be enqueued
     *
     * @access protected
     * @var array
     *
     */
    protected $scripts = array();

    /**
     * The styles to be enqueued
     *
     * @access protected
     * @var array
     *
     */
    protected $styles = array();

    /**
     * The custom post types to be created
     *
     * @access protected
     * @var array
     *
     */
    protected $post_types = array();

    /**
     * The custom taxonomies to be created
     *
     * @access protected
     * @var array
     *
     */
    protected $taxonomies = array();

    protected $login_screen = array();

    /**
     * Class Constructor
     *
     */
    public function __construct()
    {
        // Init
        add_action('init', array($this, 'init'));

        // Remove the unnecessary stuff WordPress adds
        $this->remove_bloat();

        // Remove annoying Gravity Forms scroll when submitting
        add_filter('gform_confirmation_anchor', '__return_false');

        // Remove some Admin Menu items
        add_action('admin_menu', array($this, 'admin_menu'));

        // Theme Setup
        add_action('after_setup_theme', array($this, 'after_setup_theme'));

        // Add ACF options page
        if (function_exists('acf_add_options_page')) {
            acf_add_options_page();
        }

    }

    /**
     * Public function to add scripts to the enqueue list
     *
     * @param array $args
     * @param
     *
     */
    public function enqueue_script($args, $localized_object = false, $localized_data = array())
    {
        if ($localized_object !== false) {
            $args['localize']['object_name'] = $localized_object;
            $args['localize']['data'] = $localized_data;
        }
        $this->scripts[] = $args;
    }

    /**
     * Public function to add styles to the enqueue list
     *
     * @param array $args
     *
     */
    public function enqueue_style($args)
    {
        $this->styles[] = $args;
    }

    /**
     * Public function to create custom post types
     *
     * @param array $args
     *
     */
    public function register_post_type($args)
    {
        $this->post_types[] = $args;
    }

    /**
     * Public function to create custom taxonomies
     *
     * @param array $args
     *
     */
    public function register_taxonomy($args)
    {
        $this->taxonomies[] = $args;
    }

    /**
     * Public function to add_image_sizes
     *
     * @param array $args
     *
     */
    // public function add_image_size(string $handle = NULL, int $width, int $height, bool $crop = true, bool $retina = true)
    // {
    //     add_image_size($handle, $width, $height, $crop);

    //     if ($retina === true) {
    //         add_image_size($handle . '@x2', $width * 2, $height * 2, $crop);
    //     }
    // }

    public function login_screen($args)
    {
        $defaults = array(
            'logo' => '',
            'logo_width' => '100px',
            'color' => '#000',
            'color_hover' => '#666',
        );

        $this->login_screen = array_merge($defaults, $args);
    }

    /**
     * Start the party
     *
     */
    public function go()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
        add_action('init', array($this, 'register_post_types'));
        add_action('init', array($this, 'register_taxonomies'));

        add_action('login_enqueue_scripts', array($this, 'login_enqueue_scripts'));
        add_action('login_headertext', array($this, 'login_headertext'));
        add_action('login_headerurl', array($this, 'login_headerurl'));
        add_action('login_header', array($this, 'login_header'));
    }

    /**
     * Enqueue the scripts
     *
     */
    public function enqueue_scripts()
    {

        $defaults = array(
            'dependencies' => array(),
            'localize' => false,
            'in_footer' => false,
        );

        foreach ($this->scripts as $script) {

            $script = array_merge($defaults, $script);

            $src = (filter_var($script['src'], FILTER_VALIDATE_URL)) ? $script['src'] : get_bloginfo('template_url') . '/' . $script['src'];
            $ver = (filter_var($script['src'], FILTER_VALIDATE_URL)) ? get_bloginfo('version') : filemtime(get_template_directory() . '/' . $script['src']);

            wp_register_script($script['handle'], $src, $script['dependencies'], $ver, $script['in_footer']);

            if ($script['localize']) {
                wp_localize_script($script['handle'], $script['localize']['object_name'], $script['localize']['data']);
            }

            wp_enqueue_script($script['handle']);

        }
    }

    /**
     * Enqueue the styles
     *
     */
    public function enqueue_styles()
    {

        $defaults = array(
            'dependencies' => array(),
            'media' => 'all',
        );

        foreach ($this->styles as $style) {

            $style = array_merge($defaults, $style);

            $src = (filter_var($style['src'], FILTER_VALIDATE_URL)) ? $style['src'] : get_bloginfo('template_url') . '/' . $style['src'];
            $ver = (filter_var($style['src'], FILTER_VALIDATE_URL)) ? get_bloginfo('version') : filemtime(get_template_directory() . '/' . $style['src']);

            wp_register_style($style['handle'], $src, $style['dependencies'], $ver, $style['media']);
            wp_enqueue_style($style['handle']);

        }
    }

    /**
     * Register the post types
     *
     */
    public function register_post_types()
    {

        $defaults = array(
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title'),
        );

        foreach ($this->post_types as $post_type) {

            $post_type = array_merge($defaults, $post_type);

            register_post_type($post_type['slug'],
                array(
                    'labels' => array(
                        'name' => $post_type['name']['plural'],
                        'singular_name' => $post_type['name']['singular'],
                        'add_new' => 'Add New',
                        'add_new_item' => 'Add New ' . $post_type['name']['singular'],
                        'edit_item' => 'Edit ' . $post_type['name']['singular'],
                        'new_item' => 'New ' . $post_type['name']['singular'],
                        'all_items' => 'All ' . $post_type['name']['plural'],
                        'view_item' => 'View ' . $post_type['name']['singular'],
                        'search_items' => 'Search ' . $post_type['name']['plural'],
                        'not_found' => 'No ' . $post_type['name']['plural'] . ' found',
                        'not_found_in_trash' => 'No ' . $post_type['name']['plural'] . ' found in Trash',
                        'parent_item_colon' => '',
                        'menu_name' => $post_type['name']['plural'],
                    ),
                    'public' => $post_type['public'],
                    'publicly_queryable' => $post_type['publicly_queryable'],
                    'show_ui' => $post_type['show_ui'],
                    'show_in_menu' => $post_type['show_in_menu'],
                    'query_var' => $post_type['query_var'],
                    'rewrite' => $post_type['rewrite'],
                    'capability_type' => $post_type['capability_type'],
                    'has_archive' => $post_type['has_archive'],
                    'hierarchical' => $post_type['hierarchical'],
                    'menu_position' => $post_type['menu_position'],
                    'supports' => $post_type['supports'],
                )
            );

        }
    }

    /**
     * Register the taxonomies
     *
     */
    public function register_taxonomies()
    {

        $defaults = array(
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
        );

        foreach ($this->taxonomies as $taxonomy) {

            $taxonomy = array_merge($defaults, $taxonomy);

            register_taxonomy(
                $taxonomy['slug'],
                $taxonomy['post_types'],
                array(
                    'labels' => array(
                        'name' => $taxonomy['name']['plural'],
                        'singular_name' => $taxonomy['name']['singular'],
                        'search_items' => 'Search ' . $taxonomy['name']['plural'],
                        'all_items' => 'All ' . $taxonomy['name']['plural'],
                        'parent_item' => 'Parent ' . $taxonomy['name']['singular'],
                        'parent_item_colon' => 'Parent ' . $taxonomy['name']['singular'] . ':',
                        'edit_item' => 'Edit ' . $taxonomy['name']['singular'],
                        'update_item' => 'Update ' . $taxonomy['name']['singular'],
                        'add_new_item' => 'Add New ' . $taxonomy['name']['singular'],
                        'new_item_name' => 'New ' . $taxonomy['name']['singular'] . ' Name',
                        'menu_name' => $taxonomy['name']['singular'],
                    ),
                    'hierarchical' => $taxonomy['hierarchical'],
                    'show_ui' => $taxonomy['show_ui'],
                    'show_admin_column' => $taxonomy['show_admin_column'],
                    'query_var' => $taxonomy['query_var'],
                )
            );

        }
    }

    /**
     * Init Hook
     *
     */
    public function init()
    {
        remove_post_type_support('page', 'editor');
    }

    /**
     * Remove admin menu items
     *
     */
    public function admin_menu()
    {
        remove_menu_page('edit-comments.php');
    }

    /**
     * Theme Setup
     *
     */
    public function after_setup_theme()
    {
        add_theme_support('menus');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('woocommerce');
        add_editor_style(array('include/editor-style.css'));
    }

    /**
     * Remove unnecessary bloat
     *
     */
    protected function remove_bloat()
    {

        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('admin_print_styles', 'print_emoji_styles');

        add_filter('wp_calculate_image_srcset_meta', '__return_null');
        add_filter('wp_calculate_image_srcset', '__return_false');

        add_action('wp_footer', function () {
            wp_deregister_script('wp-embed');
        });

        remove_action('wp_head', 'wp_generator');

        add_action('wp_enqueue_scripts', function () {
            wp_dequeue_style('wp-block-library');
        });

        remove_action('wp_head', 'wp_resource_hints', 2);
        remove_action('wp_head', 'rsd_link');

        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
        remove_action('template_redirect', 'rest_output_link_header', 11, 0);
    }

    /**
     * Add Scripts to wp-login.php page
     *
     */
    public function login_enqueue_scripts()
    {
        wp_enqueue_style('veribo-login-css', get_template_directory_uri() . '/include/login-style.css', false, '1.0');

        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelector("#user_login").placeholder = "Username";
                document.querySelector("#user_pass").placeholder = "Password";
            });
        </script>';
        echo '<style>
            .wp-core-ui .button-primary {background-color: ' . $this->login_screen['color'] . ' !important;border-color: ' . $this->login_screen['color'] . ' !important;}
            .wp-core-ui .button-primary:hover, .wp-core-ui .button-primary:focus {background-color: ' . $this->login_screen['color_hover'] . ' !important;border-color: ' . $this->login_screen['color_hover'] . ' !important;}
            .login .button.wp-hide-pw .dashicons {color: ' . $this->login_screen['color'] . ';}
            #login h1 a {width: ' . $this->login_screen['logo_width'] . ';}
        </style>';
    }

    /**
     * Add an empty div wp-login.php page
     *
     */
    public function login_header()
    {
        echo '<div class="login-overlay"></div>';
    }

    /**
     * Change the logo on the wp-login.php page
     *
     */
    public function login_headertext()
    {
        if ($this->login_screen['logo']) {
            return '<img src="' . get_bloginfo('template_url') . '/' . $this->login_screen['logo'] . '" />';
        }
        return '';
    }

    /**
     * Replace the logo link in wp-login.php
     * 
     */
    public function login_headerurl(){
        return get_bloginfo('url');
    }

}
