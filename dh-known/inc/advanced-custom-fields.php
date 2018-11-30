<?php
/**
 * Advance Custom Fields Customisation & Additions
 *
 * @link https://www.advancedcustomfields.com/resources/
 */

/*
 * ACF - Options/Settings Pages
 */
if( function_exists('acf_add_options_page') ) {
    $known_settings = acf_add_options_page(array(
        'page_title'    => 'Known Settings',
        'menu_slug'     => 'known-settings',
        'capability'    => 'edit_posts',
        'redirect'      => true,
        'icon_url' => false
    )); 

    /*Subpages (Header and Footer)*/
    acf_add_options_sub_page(array(
        'page_title'    => 'Header and Footer',
        'parent_slug'   => $known_settings['menu_slug']
    ));

    /*Subpages (General)*/
    // acf_add_options_sub_page(array(
    //  'page_title'    => 'General',
    //  'parent_slug'   => $known_settings['menu_slug']
    // ));
}

?>