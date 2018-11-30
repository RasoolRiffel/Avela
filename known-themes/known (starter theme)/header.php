<?php
/**
 * KNOWN Theme Header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package KNOWN
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'known' ); ?></a>

    <header id="mstr-hdr" class="mstr-hdr">
        <div class="ste-hdr">
            <div class="row">
                <div class="col hdr-lgo">
                    <?php the_custom_logo(); ?>                    
                </div>
                <div class="col ste-hdr-nvgtn">
                    <span class="main-nav-toggle closed d-md-0">MENU <i class="fa fa-bars" aria-hidden="true"></i><i class="fa fa-times-thin" aria-hidden="true"></i></span>
                    <?php 
                    wp_nav_menu( 
                        array(
                            'theme_location'    => 'main-nav-menu',
                            'menu_id'       => 'main-nav-menu',
                            'menu_class'        => 'menu-nav-menu main-nav-menu',
                            'container'         => 'div',
                            'container_class'   => 'main-nav-menu-wrap nav-menu-wrap',
                            'depth'     => 1
                        )
                    );
                    ?>
                </div>
            </div>
    </header><!-- /#mstr-hdr -->

    <section id="mstr-cntnt" class="mstr-cntnt">
