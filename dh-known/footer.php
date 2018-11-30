<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package KNOWN
 */

?>

        </section><!-- /#mstr-cntnt -->

        <footer id="mstr-ftr" class="mstr-ftr">
            <div class="ste-ftr pge-sctn py-3">
            	<div class="row">
					<div class="ftr-lgo d-none d-md-block col-md col-xl-4">
						<?php 
						$footer_logo = get_field('footer_logo', 'option');
						if ($footer_logo) echo '<a href="'.get_option('home').'" class="custom-logo-link" rel="home" itemprop="url"><img src="'.$footer_logo['url'].'"class="custom-logo"  itemprop="logo" alt="Denise Huxham Properties Logo"></a>';
						?>
					</div>

					<?php if(get_field('footer_widget_1_title','option') || get_field('footer_widget_1','option')){ ?>
						<div class="ftr-itm text-center text-md-left col-sm-6 col-md">
							<?php if(get_field('footer_widget_1_title','option')) echo'<h4>'.get_field('footer_widget_1_title','option').'</h4>'; ?>
							<?php if(have_rows('footer_widget_1','option')): ?>
								<ul class="ftr-mnu">
									<?php
									while(have_rows('footer_widget_1','option')): 
										the_row();
										$footer_widget_1_link = get_sub_field('footer_widget_1_link');
										?>
										<?php if($footer_widget_1_link && $footer_widget_1_link['title']){ ?>
											<li><a href="<?php echo $footer_widget_1_link['url']; ?>" target="<?php echo $footer_widget_1_link['target']; ?>"><?php echo $footer_widget_1_link['title']; ?></a></li>
											<p class="pb-0"></p>
										<?php } ?>
									<?php endwhile; ?>
								</ul>
							<?php 
							endif;
							wp_reset_query();
							?>
						</div>
					<?php } ?>

					<?php if(get_field('footer_widget_2_title','option') || get_field('footer_widget_2','option')){ ?>
						<div class="ftr-itm text-center text-md-left col-sm-6 col-md">
							<?php if(get_field('footer_widget_2_title','option')) echo'<h4>'.get_field('footer_widget_2_title','option').'</h4>'; ?>
							<?php if(have_rows('footer_widget_2','option')): ?>
								<ul class="ftr-mnu">
									<?php
									while(have_rows('footer_widget_2','option')): 
										the_row();
										$footer_widget_2_link = get_sub_field('footer_widget_2_link');
										?>
										<?php if($footer_widget_2_link && $footer_widget_2_link['title']){ ?>
											<li><a href="<?php echo $footer_widget_2_link['url']; ?>" target="<?php echo $footer_widget_2_link['target']; ?>"><?php echo $footer_widget_2_link['title']; ?></a></li>
											<p class="pb-0"></p>
										<?php } ?>
									<?php endwhile; ?>
								</ul>
							<?php 
							endif;
							wp_reset_query();
							?>
						</div>
					<?php } ?>

					<?php if(get_field('footer_widget_3_title','option') || get_field('footer_widget_3','option')){ ?>
						<div class="ftr-itm text-center text-md-left col-sm-6 col-md">
							<?php if(get_field('footer_widget_3_title','option')) echo'<h4>'.get_field('footer_widget_3_title','option').'</h4>'; ?>
							<?php if(have_rows('footer_widget_3','option')): ?>
								<ul class="ftr-mnu">
									<?php
									while(have_rows('footer_widget_3','option')): 
										the_row();
										$footer_widget_3_link = get_sub_field('footer_widget_3_link');
										?>
										<?php if($footer_widget_3_link && $footer_widget_3_link['title']){ ?>
											<li><a href="<?php echo $footer_widget_3_link['url']; ?>" target="<?php echo $footer_widget_3_link['target']; ?>"><?php echo $footer_widget_3_link['title']; ?></a></li>
											<p class="pb-0"></p>
										<?php } ?>
									<?php endwhile; ?>
								</ul>
							<?php 
							endif;
							wp_reset_query();
							?>
						</div>
					<?php } ?>

					<?php if(get_field('footer_widget_3_title','option') || get_field('footer_widget_3','option')){ ?>
						<div class="ftr-itm text-center text-md-left col-sm-6 col-md">
							<?php if(get_field('footer_widget_4_title','option')) echo'<h4>'.get_field('footer_widget_4_title','option').'</h4>'; ?>
							<?php if(have_rows('footer_widget_4','option')): ?>
								<ul class="ftr-mnu">
									<?php
									while(have_rows('footer_widget_4','option')): 
										the_row();
										$footer_contact_phone = get_sub_field('footer_contact_phone');
										$footer_contact_email = get_sub_field('footer_contact_email');
										
										if($footer_contact_phone && $footer_contact_phone['title']){ 
											?>
											<li><a href="<?php echo $footer_contact_phone['url']; ?>" target="<?php echo $footer_contact_phone['target']; ?>"><i class="icn fas fa-phone" aria-hidden="true"></i><?php echo $footer_contact_phone['title']; ?></a></li>
										<?php } ?>
										<?php if($footer_contact_email && $footer_contact_email['title']){ ?>
											<li><a href="<?php echo $footer_contact_email['url']; ?>" target="<?php echo $footer_contact_email['target']; ?>"><i class="icn fas fa-envelope" aria-hidden="true"></i><?php echo $footer_contact_email['title']; ?></a></li>
										<?php } ?>

										<?php if(get_sub_field('footer_social_instagram') || get_sub_field('footer_social_twitter') || get_sub_field('footer_social_facebook')){ ?>
											<li>
												<?php if(get_sub_field('footer_social_facebook')) echo '<a href="'.get_sub_field('footer_social_facebook').'" target="_blank" class="ftr-scl-lnk"><i class="icn scl-icn fab fa-facebook-f" aria-hidden="true"> </i></a>'; ?>
												<?php if(get_sub_field('footer_social_linkedin')) echo '<a href="'.get_sub_field('footer_social_linkedin').'" target="_blank" class="ftr-scl-lnk"><i class="icn scl-icn fab fa-linkedin" aria-hidden="true"></i>'; ?>
												<?php if(get_sub_field('footer_social_instagram')) echo '<a href="'.get_sub_field('footer_social_instagram').'" target="_blank" class="ftr-scl-lnk"><i class="icn scl-icn fab fa-instagram" aria-hidden="true"></i></a>'; ?>
											</li>
										<?php } ?>
									<?php endwhile; ?>
								</ul>
							<?php 
							endif;
							wp_reset_query();
							?>
						</div>
					<?php } ?>
            	</div>
            </div>
            <div class="ftr-wrp">
	            <div class="pge-sctn py-2">
	            	<div class="row">
						<p class="lgl-nfrmtn col text-center text-lg-left pb-0">&copy <?php bloginfo('name'); echo date(' Y'); ?>. All Rights Reserved.<?php if(have_rows('footer_legal_pages', 'option') ): while( have_rows('footer_legal_pages', 'option') ): the_row();?> | <a href="<?php echo get_sub_field('link')['url']; ?>"><?php if(!empty(get_sub_field('link'))) echo get_sub_field('link')['title']; ?></a><?php endwhile; endif; wp_reset_query(); ?></p>
						<p class="crdts col-12 col-lg-3 text-center text-lg-right pb-0"><a href="http://knowndesign.co" target="_blank">Website design by</a> <strong>KNOWN</strong></p>
					</div>
	            </div>
            </div>
        </footer>
    <?php wp_footer(); ?>
</body>
</html>
