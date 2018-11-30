<?php
/**
 * KNOWN Custom Taxonomies
 *
 * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
 * @package KNOWN
 */

/**
 * Property Types
 */
if ( ! function_exists( 'known_property_types' ) ) {
	function known_property_types() {
		$known_property_type_labels = array(
			'name'                       => _x( 'Property Types', 'Taxonomy General Name', 'known' ),
			'singular_name'              => _x( 'Property Type', 'Taxonomy Singular Name', 'known' ),
			'menu_name'                  => __( 'Property Types', 'known' ),
			'all_items'                  => __( 'All Property Types', 'known' ),
			'parent_item'                => __( 'Parent Property Type', 'known' ),
			'parent_item_colon'          => __( 'Parent Property Type:', 'known' ),
			'new_item_name'              => __( 'New Property Type', 'known' ),
			'add_new_item'               => __( 'Add New Property Type', 'known' ),
			'edit_item'                  => __( 'Edit Property Type', 'known' ),
			'update_item'                => __( 'Update Property Type', 'known' ),
			'view_item'                  => __( 'View Property Type', 'known' ),
			'separate_items_with_commas' => __( 'Separate property types with commas', 'known' ),
			'add_or_remove_items'        => __( 'Add or remove property types', 'known' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'known' ),
			'popular_items'              => __( 'Popular Property Types', 'known' ),
			'search_items'               => __( 'Search Property Types', 'known' ),
			'not_found'                  => __( 'Not Found', 'known' ),
			'no_terms'                   => __( 'No property types', 'known' ),
			'items_list'                 => __( 'Property types list', 'known' ),
			'items_list_navigation'      => __( 'Property types list navigation', 'known' ),
		);
		$known_property_type_rewrite = array(
			'slug'                       => 'property-types',
			'with_front'                 => true,
			'hierarchical'               => false,
		);
		$known_property_type_args = array(
			'labels'                     => $known_property_type_labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $known_property_type_rewrite,
		);
		register_taxonomy( 'known_property_type', array( 'known_property' ), $known_property_type_args );
	}
	add_action( 'init', 'known_property_types', 0 );

}

?>