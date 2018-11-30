<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package known
 */

get_header(); 

?>

    <div id="post-archv-hntry" <?php post_class('pge-sctn archv-hntry wth-sdbr'); ?>>
        <?php if (is_category()){ ?>

            <h1 class="pge-ttl text-center"><?php single_cat_title(); ?></h1>

        <?php }else{ ?>

            <?php the_archive_title( '<h1 class="pg-ttl text-center">', '</h1>' ); ?>

        <?php } ?>
            
        <?php the_archive_description('<div class="archv-dscrptn text-center">', '</div>'); ?>   

        <div class="blg-pge-cntcnt row">
            <div class="clmn-main col-md-8">
                <div class="row">
                    <?php
                    while(have_posts()): 
                        the_post();
                        ?>
                        <div <?php post_class('blck col-6'); ?>>
                            <div class="blck-cntnt">
                                <a href="<?php the_permalink(); ?>" class="blck-img">
                                    <?php the_post_thumbnail('full',get_the_ID()); ?>
                                </a>

                                <?php the_title('<h3 class="pst-ttl"> <a href="'.get_the_permalink().'">', '</a></h3>'); ?>

                                <p class="pst-dte">Posted on <?php the_time('F j, Y') ?></p>

                                <?php the_excerpt(); ?>
                            </div>
                            <p class="pb-0"><a href="<?php the_permalink(); ?>" class="bttn">Read more</a></p>
                        </div>
                    <?php endwhile; ?>
                    <div class="col-12 archv-mta">
                        <?php 
                        the_posts_pagination( 
                            array(
                                'screen_reader_text' => 'Posts navigation',
                                'next_text'          => __('>'),
                                'prev_text'          => __('<'),
                                'mid_size'           => 1
                            )  
                        ); 
                        ?>
                    </div> 
                </div>
            </div>

            <?php get_sidebar(); ?>

        </div>  
</div>


<?php get_footer(); ?>
