<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package KNOWN
 */

get_header();
?>

    <div class="pge-sctn 404-nt-fwnd">
    
        <p class="text-center"><?php esc_html_e( 'The content you are looking for was not found at this location, it may have been moved to another page or deleted. Please use our quick links below:', 'known' ); ?></p>
        <div class="row justify-content-md-center">
            <div class="blck col-sm-10 col-md-8">

            <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

            <div class="widget widget_categories">
                <h3 class="widget-title"><?php esc_html_e( 'Post Types', 'known' ); ?></h2>
                <ul>
                <?php
                    wp_list_categories( 
                        array(
                            'orderby'    => 'count',
                            'order'      => 'DESC',
                            'show_count' => 1,
                            'title_li'   => '',
                            'number'     => 10,
                        ) 
                    );
                ?>
                </ul>
            </div>

            <?php the_widget( 'WP_Widget_Archives', 'dropdown=0&title=Blog Monthly Archives&count=1'); ?>
        </div>
    </div>

<?php get_footer(); ?>
