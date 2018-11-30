<?php
/**
 * Front Page Template File
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ 
 *
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

        <?php
        $page_intro_read_more = get_field('page_intro_read_more', get_the_ID());
        if($page_intro_read_more && $page_intro_read_more['title']) echo '<p class="pb-0 text-center"><a href="'. $page_intro_read_more['url'] .'" target="' . $page_intro_read_more['target'] . '" class="mre-lnk">' . $page_intro_read_more['title'] . '</a></p>';
        ?>
    </div>


    <?php
    $page_latest_properties = get_field('page_latest_properties', get_the_ID());
    if($page_latest_properties['page_latest_properties_title'] || $page_latest_properties['page_latest_properties_description']){
        if(have_rows('page_latest_properties', get_the_ID())){
            while(have_rows('page_latest_properties', get_the_ID())): 
                the_row();
                ?>
                <div class="pge-sctn ltst-prprts">
                    <?php
                    if (get_sub_field('page_latest_properties_title')) echo '<h2 class="pt-0 text-center">'.get_sub_field('page_latest_properties_title').'</h2>';
                    if (get_sub_field('page_featured_testimonials')) echo '<p class="text-center">'.get_sub_field('page_featured_testimonials').'</p>';

                    get_template_part( 'template-parts/content', 'property' );
                    ?>

                </div>
            <?php 
            endwhile; 
        }
        wp_reset_query();
    }
    ?>


    <?php
    $page_featured_services = get_field('page_featured_services', get_the_ID());
    if($page_featured_services['page_featured_services_title'] || $page_featured_services['page_featured_services_description'] || $page_featured_services['page_featured_services_items']){
        if(have_rows('page_featured_services', get_the_ID())){
            while(have_rows('page_featured_services', get_the_ID())): 
                the_row();
                ?>
                <div class="pge-sctn ftrd-srvcs">
                	<div class="sctn-innr sctn-innr-sld">
                        <?php
                        if (get_sub_field('page_featured_services_title')) echo '<h2 class="pt-0 text-center">'.get_sub_field('page_featured_services_title').'</h2>';
                        if (get_sub_field('page_featured_services_description')) echo '<p class="text-center pb">'.get_sub_field('page_featured_services_description').'</p>';
                        ?>

                        <?php if(have_rows('page_featured_services_items', get_the_ID())){ ?>
                            <div class="row">
                                <?php
                                while(have_rows('page_featured_services_items', get_the_ID())): 
                                    the_row();
                                    $service_icon = get_sub_field('item_image');
                                    ?>
                                    <div class="srvc col-md-4 text-center">
                                        <?php if($service_icon){ ?>
                                            <div class="blck-img py-2">
                                                <?php echo '<img src="' . $service_icon['url'] . '" alt="' . $service_icon['alt'] . '" title="' . $service_icon['title'] . '"/>'; ?>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        if (get_sub_field('item_title')) echo '<h3>'.get_sub_field('item_title').'</h3>';
                                        if (get_sub_field('item_description')) echo '<p class="pb-0">'.get_sub_field('item_description').'</p>';
                                        ?>
                                    </div>
                                <?php   endwhile;  ?>
                            </div>
                        <?php } ?>
                	</div>
                </div>
            <?php 
            endwhile; 
        }
        wp_reset_query();
    }
    ?>


    <?php
    $page_featured_testimonials = get_field('page_featured_testimonials', get_the_ID());
    if($page_featured_testimonials['page_featured_testimonials_title']){
        if(have_rows('page_featured_testimonials', get_the_ID())){
            while(have_rows('page_featured_testimonials', get_the_ID())): 
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
                        <div id="client-testimonials-slider" class="txt-crsl carousel slide ride" data-ride="carousel">
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


    <?php
    $page_latest_news = get_field('page_latest_news', get_the_ID());
    if($page_latest_news['page_latest_news_title'] || $page_latest_news['page_latest_news_description']){
        if(have_rows('page_latest_news', get_the_ID())){
            while(have_rows('page_latest_news', get_the_ID())): 
                the_row();
                ?>
                <div class="pge-sctn ltst-nws">
                    <?php
                    if (get_sub_field('page_latest_news_title')) echo '<h2 class="pt-0 text-center">'.get_sub_field('page_latest_news_title').'</h2>';
                    if (get_sub_field('page_latest_news_description')) echo '<p class="text-center">'.get_sub_field('page_latest_news_description').'</p>';

                    get_template_part( 'template-parts/content', 'blog' );
                    ?>

                </div>
            <?php 
            endwhile; 
        }
        wp_reset_query();
    }
    ?>


<?php get_footer(); ?>
