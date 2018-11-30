<?php

/*
 *      Template Name: Contact
 */

get_header(); 

?>

    <div id="post-<?php the_ID(); ?>" <?php post_class('pge-sctn cntcts-sctn'); ?>>
        <?php 
        the_title('<h1 class="pst-ttl text-center">', '</h1>'); 

        while (have_posts()): 

            the_post();

            the_content(); 
          		     
        endwhile;
        ?>
    </div>


    <?php
    $page_contact_details = get_field('page_contact_details', get_the_ID());
    if($page_contact_details['page_contact_details_title'] || $page_contact_details['page_contact_details_description'] || $page_contact_details['contact_email'] || $page_contact_details['contact_phone']){
        if(have_rows('page_contact_details', get_the_ID())){
            while(have_rows('page_contact_details', get_the_ID())): 
                the_row();
                $page_contact_phone = get_sub_field('contact_phone');
                $page_contact_email = get_sub_field('contact_email');
                ?>
                <div class="pge-sctn cntct-dtls">
                    <div class="sctn-innr sctn-innr-sld">

                        <?php if(($page_contact_email && $page_contact_email['title']) || ($page_contact_phone && $page_contact_phone['title'])){ ?>
                            <div class="row">
                                <?php if($page_contact_email && $page_contact_email['title']){ ?>
                                    <div class="blck col-sm">
                                        <div class="blck-innr">
                                            <p class="pb-3 pb-sm-0"><a href="<?php echo $page_contact_email['url'] ?>" target="<?php echo $page_contact_email['target'] ?>"><i class="icn fas fa-envelope" aria-hidden="true"></i><?php echo $page_contact_email['title'] ?></a></p>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if($page_contact_phone && $page_contact_phone['title']){ ?>
                                    <div class="blck col-sm">
                                        <div class="blck-innr">
                                            <p class="pb-0"><a href="<?php echo $page_contact_phone['url'] ?>" target="<?php echo $page_contact_phone['target'] ?>"><i class="icn fas fa-phone" aria-hidden="true"></i><?php echo $page_contact_phone['title'] ?></a></p>
                                        </div>
                                    </div>
                                <?php } ?>
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
    $page_contact_form = get_field('page_contact_form', get_the_ID());
    if($page_contact_form['page_contact_form_title'] || $page_contact_form['page_contact_form_description'] || $page_contact_form['contact_form_form']){
        if(have_rows('page_contact_form', get_the_ID())){
            while(have_rows('page_contact_form', get_the_ID())): 
                the_row();
                ?>
                <div class="pge-sctn cntct-frm">
                    <?php if(get_sub_field('contact_form_form')){ ?>
                        <div class="sctn-innr">
                            <?php echo do_shortcode(get_sub_field('contact_form_form')); ?>
                        </div>
                    <?php } ?>
                </div>
            <?php 
            endwhile; 
        }
        wp_reset_query();
    }
    ?>
    
<?php get_footer(); ?>
