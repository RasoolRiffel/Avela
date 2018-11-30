<?php
/**
 * The template for displaying single packages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package KNOWN
 */

get_header();
?>

    <div id="post-<?php the_ID(); ?>" <?php post_class('pge-sctn wth-sdbr'); ?>>
        <?php

        the_title('<h1 class="pg-ttl text-center">', '</h1>');

        get_template_part( 'template-parts/content', 'blog' ); 

        ?>
    </div>

<?php get_footer(); ?>