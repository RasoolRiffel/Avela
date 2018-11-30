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

    <div id="post-<?php the_ID(); ?>" <?php post_class('pge-sctn'); ?>>

        <?php

        the_title('<h1 class="pg-ttl text-center">', '</h1>');

        while (have_posts()): 

            the_post();

            the_content(); 
                     
        endwhile;

        ?>
    </div>


    <?php
    $page_featured_gallery = get_field('page_featured_gallery', get_the_ID());
    if($page_featured_gallery['page_featured_gallery_title'] || $page_featured_gallery['page_featured_gallery_description'] || $page_featured_gallery['page_featured_gallery_items']){
        if(have_rows('page_featured_gallery', get_the_ID())){
            while(have_rows('page_featured_gallery', get_the_ID())): 
                the_row();
                ?>
                <div class="pge-sctn ftrd-gllry">
                    <?php
                    if (get_sub_field('page_featured_gallery_title')) echo '<h2 class="pt-0 text-center">'.get_sub_field('page_featured_gallery_title').'</h2>';
                    if (get_sub_field('page_featured_gallery_description')) echo '<p class="text-center">'.get_sub_field('page_featured_gallery_description').'</p>';
                    ?>
                    <?php
                    $page_featured_gallery_items = get_sub_field('page_featured_gallery_items', get_the_ID());
                        if($page_featured_gallery_items){
                        ?>
                        <div class="row">
                            <?php
                            $page_gallery_thumbs_c = 0;
                            foreach ($page_featured_gallery_items as $page_featured_gallery_thumb) {
                                if ($page_gallery_thumbs_c <= 8) {
                                    ?>
                                    <div class="blck glry-thmbnl col-6 col-md-4">
                                        <a href="#prprty-gllry" data-toggle="modal" data-slide-to="<?php echo $page_gallery_thumbs_c; ?>" class="blck-img">
                                            <?php echo '<img src="'. $page_featured_gallery_thumb['url'] .'" alt="'. $page_featured_gallery_thumb['alt'] .'" title="'. $page_featured_gallery_thumb['title'] .'">'; ?>                                        
                                        </a>
                                    </div>
                                <?php
                                }
                                $page_gallery_thumbs_c ++;
                            }
                            ?>
                        </div>

                        <div class="modal fade btstrp-gllry carousel slide" id="prprty-gllry" role="dialog" aria-labelledby="prprty-gllry" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ol class="carousel-indicators">
                                            <?php 
                                            $page_gallery_items_c = 0;
                                            foreach( $page_featured_gallery_items as $page_featured_gallery_item_nav ):
                                                    ?>
                                                    <li data-target="#prprty-gllry" data-slide-to="<?php echo $page_gallery_items_c; ?>" class="thumb">
                                                        <?php echo '<img src="' . $page_featured_gallery_item_nav['sizes']['thumbnail'] . '" alt="' . $page_featured_gallery_item_nav['alt'] .'" title="' . $page_featured_gallery_item_nav['title'] .'"/>'; ?>
                                                    </li>
                                                <?php 
                                                $page_gallery_items_c ++;
                                            endforeach; 
                                            ?>
                                        </ol>
                                        <div class="carousel-inner">
                                            <?php 
                                            $page_gallery_items_n = 0;
                                            foreach( $page_featured_gallery_items as $page_galleries_galleries_image ):
                                                ?>
                                                <div class="carousel-item<?php if($page_gallery_items_n < 1) echo ' active'; ?>">
                                                    <img src="<?php echo $page_galleries_galleries_image['url']; ?>" alt="<?php echo $page_galleries_galleries_image['alt']; ?>" class="d-block w-100"/>
                                                </div>
                                                <?php
                                                $page_gallery_items_n ++;
                                            endforeach; 
                                            ?>
                                        </div>
                                        <a class="carousel-control carousel-control-prev" href="#prprty-gllry" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control carousel-control-next" href="#prprty-gllry" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            <?php 
            endwhile; 
        }
        wp_reset_query();
    }
    ?>


    <div class='pge-sctn wth-sdbr prprty-dtls'>
        <?php if (get_field('property_subheading', get_the_ID())) echo '<h2 class="pt-0 text-center">'.get_field('property_subheading', get_the_ID()).'</h2>'; ?>
        <div class="row justify-content-center">    
            <?php get_sidebar(); ?>    

            <?php if (get_field('page_secondary_content', get_the_ID())): ?>
                <div class="clmn-main col-md-8 pt-4 pt-sm-5 pt-md-0">
                    <?php the_field('page_secondary_content', get_the_ID()); ?>
                </div>
            <?php endif; ?>      
        </div>


            <div class="pst-mta mt-3 pt-3">
                <div class="row no-gutters pb-3 my-md-2">
                    <div class="col-8">
                        <p class="pst-dte pb-0">Posted on <?php the_time('F j, Y') ?></p>
                    </div>
                    <div class="shrng-bttns shrng-bttns-sngl text-right col">

                        <div id="scl-shrng-bttns" class="scl-shrng-bttns">
                            <p class="bttn-wrp pb-0">
                                <span class="lbl">share:</span>
                                <a href="#" class="facebook" data-social='{"type":"facebook", "image":"<?php echo get_the_post_thumbnail_url(); ?>", "url":"<?php the_permalink(); ?>", "text": "Title - <?php the_title(); ?>"}' title="Share on Facebook">
                                    <i class="icn scl-icn fab fa-facebook-square" aria-hidden="true"></i>
                                </a>

                                <a href="#" class="twitter" data-social='{"type":"twitter", "url":"<?php the_permalink(); ?>", "text": "Title - <?php the_title(); ?>"}' title="Share on Twiiter">
                                    <i class="icn scl-icn fab fa-twitter-square" aria-hidden="true"></i>
                                </a>

                                <a href="#" class="plusone" data-social='{"type":"plusone", "url":"<?php the_permalink(); ?>", "text": "Title - <?php the_title(); ?>"}' title="Share on Google Plus">
                                    <i class="icn scl-icn fab fa-google-plus-square" aria-hidden="true"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php echo '<p class="pb-0"><a href="'.get_post_type_archive_link( 'known_property' ).'" class="bttn">BACK</a></p>'; ?>       
            </div>
    </div>


    <?php
    $page_cta = get_field('page_cta', get_the_ID());
    if($page_cta['page_cta_title'] || $page_cta['page_cta_description']){
        if(have_rows('page_cta', get_the_ID())){
            while(have_rows('page_cta', get_the_ID())): 
                the_row();
                ?>
                <div class="pge-sctn pge-cta text-center">
                    <div class="sctn-innr sctn-innr-sld">
                        <?php
                        if (get_sub_field('page_cta_title')) echo '<h2 class="pt-0 text-center">'.get_sub_field('page_cta_title').'</h2>';
                        if (get_sub_field('page_cta_description')) echo '<p class="text-center">'.get_sub_field('page_cta_description').'</p>';

                        $paget_cta_link = get_sub_field('paget_cta_link');                    
                        if($paget_cta_link && $paget_cta_link['title']) echo '<p class="pb-0"><a href="'. $paget_cta_link['url'] .'" target="' . $paget_cta_link['target'] . '" class="mre-lnk">' . $paget_cta_link['title'] . '</a></p>';
                        ?>
                    </div>
                </div>
            <?php 
            endwhile; 
        }
        wp_reset_query();
    }
    ?>
    

<?php get_footer(); ?>