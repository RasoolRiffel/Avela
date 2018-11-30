<?php
/**
 * Front Page Template File
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ *
 * @package KNOWN
 */

get_header();
?>

    <div id="post-<?php the_ID(); ?>" <?php post_class('pge-sctn'); ?>>
        <?php 
        while (have_posts()): 

            the_post();

            the_content(); 
          		     
        endwhile;
        ?> 
    </div>

<?php get_footer(); ?>