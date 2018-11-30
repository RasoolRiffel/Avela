<?php
/**
 * KNOWN Widgets
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package KNOWN
 */

function known_widgets() {
    /*
     * Generic Sidebar
     */
    register_sidebar( array(
        'name'          => 'Sidebar',
        'id'            => 'main-sidebar',
        'description'   => 'Generic sidebar',
        'before_widget' => '<div id="%1$s" class="sdbr-itm widget %2$s"> <div class="widget-inner">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h3 class="side-title">',
        'after_title'   => '</h3>',
    ) );

    /*
     * News Sidebar
     */
    register_sidebar( array(
        'name'          => 'News Sidebar',
        'id'            => 'news-sidebar',
        'description'   => 'Found in news pages (blog, single, archive)',
        'before_widget' => '<div id="%1$s" class="sdbr-itm blg-sdbr-itm widget %2$s"> <div class="widget-inner">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h3 class="side-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'known_widgets' );

?>