<?php
/**
 * The template for displaying projects overview
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KNOWN
 */

get_header();
?>     
    <?php
    $properties_archive = 15;
    $properties_archive_page = get_post($properties_archive, ARRAY_A);
    ?>  

    <div class="pge-sctn ltst-prprts psts-archv prprts-archv">
        <?php 
        echo '<h1 class="pge-ttl text-center">'.$properties_archive_page['post_title'].'</h1>';
        $properties_archive_content = apply_filters('the_content', get_post_field('post_content', $properties_archive));
        echo $properties_archive_content;
        ?>

        <div class="prprts-fltr pb-2 pb-sm-3 mb-lg-1">
            <?php echo get_search_form(); ?>
        </div>

        <?php get_template_part( 'template-parts/content', 'property' ); ?>
    </div>


    <?php
    $page_featured_testimonials = get_field('page_featured_testimonials', 15);
    if($page_featured_testimonials['page_featured_testimonials_title']){
        if(have_rows('page_featured_testimonials', 15)){
            while(have_rows('page_featured_testimonials', 15)): 
                the_row();
                ?>
                <div class="pge-sctn clnt-tstmnls">
                    <?php
                    if (get_sub_field('page_featured_testimonials_title')) echo '<h2 class="pt-0 text-center">'.get_sub_field('page_featured_testimonials_title').'</h2>';

                    $featured_testimonials_args = array(
                        'post_type' => 'known_testimonial',
                        'posts_per_page' => 5,
                        'post__in' => $page_featured_testimonials['page_featured_testimonials_items'],     
                    );

                    $featured_testimonials = new WP_Query( $featured_testimonials_args );
                    if ($featured_testimonials->have_posts()){
                        ?>
                        <div id="client-testimonials-slider" class="txt-crsl carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $featured_testimonials_n = 0;
                                while($featured_testimonials->have_posts()): 
                                    $featured_testimonials->the_post();
                                    ?>
                                    <div class="carousel-item<?php if ($featured_testimonials_n < 1) echo ' active '; ?>">
                                        <div class="carousel-caption pt-0 pb-4">
                                            <?php the_content(); ?>
                                            <?php
                                            if (get_field('testimonial_author') || get_field('testimonial_author_organisation',get_the_ID())){
                                                echo '<p class="pb-0 text-center">';
                                                    if(get_field('testimonial_author', get_the_ID())) the_field('testimonial_author', get_the_ID());
                                                    if(get_field('testimonial_author_organisation', get_the_ID())) echo '<em> - ' . get_field('testimonial_author_organisation', get_the_ID()) . '</em>';
                                                echo '</p>'; 
                                            } 
                                            ?>
                                        </div>
                                    </div>

                                    <?php 
                                    $featured_testimonials_n ++;
                                endwhile; 
                                ?>
                            </div>

                            <ol class="carousel-indicators">
                                <?php
                                $featured_testimonials_indicators_n = 0;
                                while($featured_testimonials->have_posts()): 
                                    $featured_testimonials->the_post();
                                    ?>
                                    <li data-target="#client-testimonials-slider" data-slide-to="<?php echo $featured_testimonials_indicators_n; ?>" class="sldr-itm-nav<?php if ($featured_testimonials_indicators_n < 1) echo ' active '; ?>"></li>
                                    <?php 
                                    $featured_testimonials_indicators_n ++;
                                endwhile;
                                ?>
                            </ol>
                        </div>
                    <?php
                    } 
                    wp_reset_postdata();
                    ?>
                </div>
            <?php 
            endwhile; 
        }
        wp_reset_query();
    }
    ?>


    <?php
    $page_cta = get_field('page_cta', 15);
    if($page_cta['page_cta_title'] || $page_cta['page_cta_description']){
        if(have_rows('page_cta', 15)){
            while(have_rows('page_cta', 15)): 
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
