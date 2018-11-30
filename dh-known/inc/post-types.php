<?php
/**
 * KNOWN Custom Post Types
 *
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 * @package KNOWN
 */

/**
 * Properties
 */
if ( ! function_exists('known_properties') ) {
    function known_properties() {

        $known_properties_labels = array(
            'name'                  => _x( 'Properties', 'Post Type General Name', 'known' ),
            'singular_name'         => _x( 'Property', 'Post Type Singular Name', 'known' ),
            'menu_name'             => __( 'Properties', 'known' ),
            'name_admin_bar'        => __( 'Property', 'known' ),
            'archives'              => __( 'Property Archives', 'known' ),
            'attributes'            => __( 'Property Attributes', 'known' ),
            'parent_item_colon'     => __( 'Parent Property:', 'known' ),
            'all_items'             => __( 'All Properties', 'known' ),
            'add_new_item'          => __( 'Add New Property', 'known' ),
            'add_new'               => __( 'Add New', 'known' ),
            'new_item'              => __( 'New Property', 'known' ),
            'edit_item'             => __( 'Edit Property', 'known' ),
            'update_item'           => __( 'Update Property', 'known' ),
            'view_item'             => __( 'View Property', 'known' ),
            'view_items'            => __( 'View Properties', 'known' ),
            'search_items'          => __( 'Search Property', 'known' ),
            'not_found'             => __( 'Not found', 'known' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'known' ),
            'featured_image'        => __( 'Property Banner Image', 'known' ),
            'set_featured_image'    => __( 'Set property image', 'known' ),
            'remove_featured_image' => __( 'Remove property image', 'known' ),
            'use_featured_image'    => __( 'Use as property image', 'known' ),
            'insert_into_item'      => __( 'Insert into property', 'known' ),
            'uploaded_to_this_item' => __( 'Uploaded to this property', 'known' ),
            'items_list'            => __( 'Properties list', 'known' ),
            'items_list_navigation' => __( 'Properties list navigation', 'known' ),
            'filter_items_list'     => __( 'Filter properties list', 'known' ),
        );

        $known_properties_rewrite = array(
            'slug'                  => 'properties',
            'with_front'            => false ,
            'hierarchical'          => true 
        );

        $known_properties_args = array(
            'label'                 => __( 'Property', 'known' ),
            'description'           => __( 'Produscts post type', 'known' ),
            'labels'                => $known_properties_labels,
            'rewrite'                => $known_properties_rewrite,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes' ),
            'taxonomies'            => array( 'known_property_type' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 7,
            'menu_icon'             => 'dashicons-building',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'properties',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
        );
        register_post_type( 'known_property', $known_properties_args );

    }
    add_action( 'init', 'known_properties', 0 );
}


/**
 * Testimonials
 */
if ( ! function_exists('known_testimonials') ) {
    function known_testimonials() {

        $known_testimonials_labels = array(
            'name'                  => _x( 'Testimonials', 'Post Type General Name', 'known' ),
            'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'known' ),
            'menu_name'             => __( 'Testimonials', 'known' ),
            'name_admin_bar'        => __( 'Testimonial', 'known' ),
            'archives'              => __( 'Testimonial Archives', 'known' ),
            'attributes'            => __( 'Testimonial Attributes', 'known' ),
            'parent_item_colon'     => __( 'Parent Testimonial:', 'known' ),
            'all_items'             => __( 'All Testimonials', 'known' ),
            'add_new_item'          => __( 'Add New Testimonial', 'known' ),
            'add_new'               => __( 'Add New', 'known' ),
            'new_item'              => __( 'New Testimonial', 'known' ),
            'edit_item'             => __( 'Edit Testimonial', 'known' ),
            'update_item'           => __( 'Update Testimonial', 'known' ),
            'view_item'             => __( 'View Testimonial', 'known' ),
            'view_items'            => __( 'View Testimonials', 'known' ),
            'search_items'          => __( 'Search Testimonial', 'known' ),
            'not_found'             => __( 'Not found', 'known' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'known' ),
            'featured_image'        => __( 'Testimonial Banner Image', 'known' ),
            'set_featured_image'    => __( 'Set testimonial image', 'known' ),
            'remove_featured_image' => __( 'Remove testimonial image', 'known' ),
            'use_featured_image'    => __( 'Use as testimonial image', 'known' ),
            'insert_into_item'      => __( 'Insert into testimonial', 'known' ),
            'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'known' ),
            'items_list'            => __( 'Testimonials list', 'known' ),
            'items_list_navigation' => __( 'Testimonials list navigation', 'known' ),
            'filter_items_list'     => __( 'Filter testimonials list', 'known' ),
        );

        $known_testimonials_rewrite = array(
            'slug'                  => 'testimonials',
            'with_front'            => false ,
            'hierarchical'          => true 
        );

        $known_testimonials_args = array(
            'label'                 => __( 'Testimonial', 'known' ),
            'description'           => __( 'Produscts post type', 'known' ),
            'labels'                => $known_testimonials_labels,
            'rewrite'                => $known_testimonials_rewrite,
            'supports'              => array( 'title', 'editor', 'custom-fields'),
            'taxonomies'            => array( 'testimonial_category' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 7,
            'menu_icon'             => 'dashicons-format-quote',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => false,
            'capability_type'       => 'post',
            'show_in_rest'          => true,
        );
        register_post_type( 'known_testimonial', $known_testimonials_args );

    }
    add_action( 'init', 'known_testimonials', 0 );

}

/**
 * Locations
 */
if ( ! function_exists('known_locations') ) {
    function known_locations() {
        $known_locations_labels = array(
            'name'                  => _x( 'Locations', 'Post Type General Name', 'known' ),
            'singular_name'         => _x( 'Location', 'Post Type Singular Name', 'known' ),
            'menu_name'             => __( 'Locations', 'known' ),
            'name_admin_bar'        => __( 'Location', 'known' ),
            'archives'              => __( 'Location Archives', 'known' ),
            'attributes'            => __( 'Location Attributes', 'known' ),
            'parent_item_colon'     => __( 'Parent Location:', 'known' ),
            'all_items'             => __( 'All Locations', 'known' ),
            'add_new_item'          => __( 'Add New Location', 'known' ),
            'add_new'               => __( 'Add New', 'known' ),
            'new_item'              => __( 'New Location', 'known' ),
            'edit_item'             => __( 'Edit Location', 'known' ),
            'update_item'           => __( 'Update Location', 'known' ),
            'view_item'             => __( 'View Location', 'known' ),
            'view_items'            => __( 'View Locations', 'known' ),
            'search_items'          => __( 'Search Location', 'known' ),
            'not_found'             => __( 'Not found', 'known' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'known' ),
            'featured_image'        => __( 'Location Image', 'known' ),
            'set_featured_image'    => __( 'Set location image', 'known' ),
            'remove_featured_image' => __( 'Remove location image', 'known' ),
            'use_featured_image'    => __( 'Use as location image', 'known' ),
            'insert_into_item'      => __( 'Insert into location', 'known' ),
            'uploaded_to_this_item' => __( 'Uploaded to this location', 'known' ),
            'items_list'            => __( 'Locations list', 'known' ),
            'items_list_navigation' => __( 'Locations list navigation', 'known' ),
            'filter_items_list'     => __( 'Filter locations list', 'known' ),
        );
        $known_locations_rewrite = array(
            'slug'                  => 'locations',
            'with_front'            => false,
        );
        $known_locations_capabilities = array(
            'edit_post'             => 'edit_post',
            'read_post'             => 'read_post',
            'delete_post'           => 'delete_post',
            'edit_posts'            => 'edit_posts',
            'edit_others_posts'     => 'edit_others_posts',
            'publish_posts'         => 'publish_posts',
            'read_private_posts'    => 'read_private_posts',
        );
        $known_locations_args = array(
            'label'                 => __( 'Locations', 'known' ),
            'description'           => __( 'Post Type Description', 'known' ),
            'labels'                => $known_locations_labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes'),
            'taxonomies'            => array( 'known_location_types' ),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-palmtree',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'rewrite'               => $known_locations_rewrite,
            'capability_type'       => 'page',
        );
        register_post_type( 'known_location', $known_locations_args );
    }
    add_action( 'init', 'known_locations', 0 );

}

?>