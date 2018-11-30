<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package KNOWN
 */

get_header();
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('pge-sctn', get_the_ID()); ?>>

        <?php  

        if (is_front_page() && is_home()):      // Default homepage

            the_title('<h1 class="pg-ttl text-center">', '</h1>');

            get_template_part( 'template-parts/content'); 

        elseif(is_front_page() && !is_home()):  // Static homepage (not recent posts)

            //get_template_part( 'template-parts/content', 'home' );

        elseif(is_home() && !is_front_page()):  // Posts page (when static home page)

            ?>

            <h1 class="pg-ttl text-center"><?php echo get_the_title(get_option( 'page_for_posts' )); ?></h1> 

            <?php 

            get_template_part( 'template-parts/content', 'blog' );

        else:                                   // Everything else

            // get_template_part( 'template-parts/content');

        endif;

        ?>
</div>

<?php get_footer(); ?>
