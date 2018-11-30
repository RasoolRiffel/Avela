<?php
/**
 * KNOWN functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package KNOWN
 */

if ( ! function_exists( 'known_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function known_setup() {
        /**
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on KNOWN, use a find and replace
         * to change 'known' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'known', get_template_directory() . '/languages' );


        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /**
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
         */
        add_theme_support( 'title-tag' );

        /**
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support( 'post-thumbnails' );
        function known_featured_image_body_class( $classes ) {    
            global $post;
            if ( is_singular()) {
                $classes[] = 'snglr-pst';
                if ( is_singular() && get_the_post_thumbnail($post->ID)) {
                    $classes[] = 'has-bnnr-img';
                }
            } elseif(!is_singular()) {
                $classes[] = 'nt-snglr-pst';
            }
            return $classes;
        }
        add_filter( 'body_class', 'known_featured_image_body_class' );

        /*
         * Add theme support for selective refresh for widgets.
         */
        add_theme_support( 'customize-selective-refresh-widgets' );


        /**
         * Add support for core custom logo.
         */
        add_theme_support( 'custom-logo');

        /**
         * Switch default core markup for search form, comment form, and comments to output valid HTML5.
         */
        add_theme_support( 
            'html5', 
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ) 
        );

        /**
         * Post formats
         */
        add_theme_support(
            'post-formats', 
            array(
                'aside',
                'gallery',
                'link',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat',
            )
        );

        /**
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus( 
            array(
                'main-nav-menu' => 'Main Nav Menu'
            ) 
        );

        /**
         * Make sure to create medium and large image sizes
         */
        add_image_size('medium', get_option( 'medium_size_w' ), get_option( 'medium_size_h' ), true );
        add_image_size('large', get_option( 'large_size_w' ), get_option( 'large_size_h' ), true );
    
        /**
         * Remove default image link
         */
        function remove_default_image_link() {
            $image_set = get_option( 'image_default_link_type' );
            if ($image_set !== 'none') {
                update_option('image_default_link_type', 'none');
            }
        }

        /**
         * Remove image sizes
         */ 
        remove_image_size('large'); 
        remove_image_size('medium_large');  
        
        /*
         * Post excerpt length 
         */
        function known_excerpt_length($length) {
            return 15;
        }
        add_filter( 'excerpt_length', 'known_excerpt_length', 999 );
        
        /*
         * Post excerpt 'read more' 
         */
        function known_excerpt_more( $more ) {
            return '';
        }
        add_filter( 'excerpt_more', 'known_excerpt_more' );
    }
endif;
add_action( 'after_setup_theme', 'known_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function known_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'known_content_width', 640 );
}
add_action( 'after_setup_theme', 'known_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function known_scripts() {
    /*
     *  Styles
     */  
    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Karla:400,700|Montserrat:300,400,700', array(), null, all );
    
    // Font-awesome 
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css', array(), '5.0.13', all);

    // Bootstrap
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), null, all);

    // Known
    wp_enqueue_style( 'known-style', get_template_directory_uri() . '/assets/css/known.min.css', array(), '1.0.0' ,all);


    /*
     *  Scripts
     */
    // Known Navigation
    wp_register_script( 'known-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array(), null, true);
    wp_enqueue_script('known-navigation');

    // Bootstrap 
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', 'jquery', '3.3.7', true);
    wp_enqueue_script('bootstrap');

    // Match-height 
    wp_register_script( 'match-height', get_template_directory_uri() . '/assets/js/jquery.matchHeight.min.js', 'jquery', null, true);
    wp_enqueue_script('match-height');

    // JQ Social Sharer 
    wp_register_script( 'jq-social-sharer', get_template_directory_uri() . '/assets/js/jqSocialSharer.min.js', 'jquery', null, true);
    wp_enqueue_script('jq-social-sharer');
    
    // Known 
    wp_register_script( 'known-main', get_template_directory_uri() . '/assets/js/known.min.js', array('jquery', 'match-height', 'bootstrap', 'jq-social-sharer'), null, true);
    wp_enqueue_script('known-main');

    // Core Comments JS
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
if (!is_admin()) add_action("wp_enqueue_scripts", "known_scripts", 11);


/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';


/**
 * Bootstrap
 */
require get_template_directory() . '/inc/bootstrap.php';

/**
 * Advanced Custom Fields (ACF) 
 */
require get_template_directory() . '/inc/advanced-custom-fields.php';

/**
 * WooCommerceompatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}


/*
 *
 *  Post Types
 */
require get_template_directory() . '/inc/post-types.php';


/*
 *
 *  Taxonomies
 */
require get_template_directory() . '/inc/taxonomies.php';

?>