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

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js? id=UA-129079075-1"></script>
    <script>
    window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date());
    gtag('config', 'UA-129079075-1'); </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'known' ); ?></a>

    <header id="mstr-hdr" class="mstr-hdr py-3 py-md-4 pb-lg-3">
        <div class="ste-hdr pge-sctn pb-0">
            <?php
            $header_email = get_field('header_email', 'option');
            $header_phone = get_field('header_phone', 'option');

            if(($header_email && $header_email['title']) || ($header_phone && $header_phone['title'])){
                echo '<p class="hdr-mble-cntcts row no-gutters pb-2 d-lg-none">';
                
                    if($header_email && $header_email['title']) echo '<span class="col"><a href="' . $header_email['url'] . '" target="' . $header_email['target'] . '"><i class="icn fas fa-envelope-square" aria-hidden="true"></i> ' . $header_email['title'] . '</a></span>';

                    if($header_phone && $header_phone['title']) echo '<span class="col"><a href="' . $header_phone['url'] . '" target="' . $header_phone['target'] . '"><i class="icn fas fa-phone-square" aria-hidden="true"></i> ' . $header_phone['title'] . '</a></span>';

                echo '</p>';
            } 
            ?>
            <div class="row">
                <div class="hdr-lgo col-12 col-lg">

                    <?php the_custom_logo(); ?>

                    <?php
                    $header_facebook = get_field('header_facebook', 'option');
                    $header_linkedin = get_field('header_linkedin', 'option');
                    $header_instagram = get_field('header_instagram', 'option');

                    if($header_facebook || $header_linkedin || $header_instagram){
                        echo '<p class="hdr-mble-scl text-left d-lg-none">';
                            if($header_facebook) echo '<a href="' . $header_facebook. '" target="_blank"><i class="icn fab fa-facebook" aria-hidden="true"></i></a>';
                            if($header_linkedin) echo '<a href="' . $header_linkedin. '" target="_blank"><i class="icn fab fa-linkedin" aria-hidden="true"></i></a>';
                            if($header_instagram) echo '<a href="' . $header_instagram. '" target="_blank"><i class="icn fab fa-instagram" aria-hidden="true"></i></a>';
                        echo '</p>';
                    } 
                    ?>

                    <span class="tggl-bttn tggl-bttn-closed nav-mnu-tggl d-lg-none">
                        <span class="tggl-bttn-innr">
                            <span class="bttn-txt">MENU</span>
                            <i class="icn fa fa-bars" aria-hidden="true"></i>
                            <i class="icn fa fa-times-thin" aria-hidden="true"></i>
                        </span>
                    </span>            
                </div>
                <div class="ste-hdr-nvgtn col-12 col-lg">
                    <?php 
                    wp_nav_menu( 
                        array(
                            'theme_location'    => 'main-nav-menu',
                            'menu_id'       => 'main-nav-menu',
                            'menu_class'        => 'menu-nav-menu main-nav-menu nav-menu-closed',
                            'container'         => 'div',
                            'container_class'   => 'main-nav-menu-wrap nav-menu-wrap',
                            'depth'     => 1
                        )
                    );
                    ?>
                </div>
                <div class="dsktp-hdr-scl d-none d-lg-block col-lg text-right">

                    <?php
                    if($header_facebook || $header_linkedin || $header_instagram):
                        echo '<p class="hdr-scl">';
                            if($header_facebook) echo '<a href="' . $header_facebook. '" target="_blank"><i class="icn fab fa-facebook" aria-hidden="true"></i></a>';
                            if($header_linkedin) echo '<a href="' . $header_linkedin. '" target="_blank"><i class="icn fab fa-linkedin" aria-hidden="true"></i></a>';
                            if($header_instagram) echo '<a href="' . $header_instagram. '" target="_blank"><i class="icn fab fa-instagram" aria-hidden="true"></i></a>';
                        echo '</p>';
                    endif;

                    if(($header_email && $header_email['title']) || ($header_phone && $header_phone['title'])):
                        if($header_email && $header_email['title']) echo '<p class="hdr-cntct"><a href="' . $header_email['url'] . '" target="' . $header_email['target'] . '"><i class="icn fas fa-envelope-square" aria-hidden="true"></i> ' . $header_email['title'] . '</a></p>';

                        if($header_phone && $header_phone['title']) echo '<p class="hdr-cntct pb-0"><a href="' . $header_phone['url'] . '" target="' . $header_phone['target'] . '"><i class="icn fas fa-phone-square" aria-hidden="true"></i> ' . $header_phone['title'] . '</a></p>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </header><!-- /#mstr-hdr -->

    <section id="mstr-cntnt" class="mstr-cntnt">
        <div class="pge-bnnr-sctn">
            <?php
            if (is_singular()) {

                if (is_singular(array('page', 'post', 'known_property'))) {

                    $page_header_slider = get_field('page_header_slider', get_the_ID());

                    if ($page_header_slider['page_header_slider_items']){
                        echo '<div class="pge-bnnr sldr-pge-bnnr">';
                            ?>

                            <?php
                            if(have_rows('page_header_slider', get_the_ID())):
                                while(have_rows('page_header_slider', get_the_ID())):
                                    the_row();
                                    ?>
                                    <div id="pge-bnnr-sldr" class="pge-bnnr-sldr carousel slide" data-ride="carousel" ride="true">
                                        <div class="carousel-inner">
                                            <?php
                                            if(have_rows('page_header_slider_items')){
                                                while(have_rows('page_header_slider_items')){
                                                    the_row();
                                                    $page_header_slider_image = get_sub_field('item_image');
                                                    $page_header_slider_link = get_sub_field('item_link');
                                                    ?>
                                                    <div class="carousel-item<?php if(get_row_index() == 1) echo ' active'; ?>">
                                                        <?php 
                                                        if ($page_header_slider_image) {
                                                            echo '<img src="'.$page_header_slider_image['url'].'" alt="'.$page_header_slider_image['alt'].'" title="'.$page_header_slider_image['title'].'" />'; 
                                                        }
                                                        ?>

                                                        <?php
                                                        if (($page_header_slider_link && $page_header_slider_link['title']) || get_sub_field('item_title') || get_sub_field('item_description')) {
                                                            echo '<div class="carousel-caption">';
                                                                if(get_sub_field('item_title'))echo'<h3 class="h2 pt-0">'.get_sub_field('item_title').'</h3>';
                                                                if(get_sub_field('item_description'))echo'<p class="d-none d-md-block">'.get_sub_field('item_description').'</p>';
                                                                if (($page_header_slider_link && $page_header_slider_link['title'])){
                                                                    echo '<p class="bttn-wrp pb-0"><a href="' . $page_header_slider_link['url'] .'" target="' . $page_header_slider_link['target'] .'" class="mre-lnk">' . $page_header_slider_link['title'] .'</a></p>';
                                                                }
                                                            echo '</div>';
                                                        }

                                                        ?>
                                                    </div>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </div>

                                        <a class="sldr-icn carousel-control-prev" href="#pge-bnnr-sldr" role="button" data-slide="prev">
                                            <span class="sr-only">Previous Slide</span>
                                        </a>
                                        <a class="sldr-icn carousel-control-next" href="#pge-bnnr-sldr" role="button" data-slide="next">
                                            <span class="sr-only">Next Slide</span>
                                        </a>
                                    </div>
                                <?php
                                endwhile;
                            endif;
                            wp_reset_query();
                            ?>
                    <?php
                    }else{
                        echo '<div class="pge-bnnr img-pge-bnnr">';

                            if (!is_singular('post')) the_post_thumbnail('full');
                    }
                }

            }elseif (is_home() || is_archive() || is_search() || is_404() || is_post_type_archive('known_property')) {

                echo '<div class="pge-bnnr img-pge-bnnr">';
                    if (is_home() || (is_archive() && !is_post_type_archive()) || is_search()) {
                        $archive_banner_id = 16;
                    }elseif (is_404()) {
                        $archive_banner_id = get_option('page_on_front');
                    }elseif (is_post_type_archive('known_property')) {
                        $archive_banner_id = 15;
                    }
                    echo get_the_post_thumbnail($archive_banner_id, 'full' , '' );
            }

            echo '</div> <!-- /.pge-bnnr -->';
            ?>          
        </div>
