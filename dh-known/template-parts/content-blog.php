<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package known
 */

?>

<?php if (is_single()): ?>

	<div class="blg-pge-cntcnt row">

		<div class="clmn-main col-md-8">

            <?php
            while (have_posts()): 

                the_post();

                the_content(); 
                         
            endwhile;
            ?>

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
            	<?php echo '<p class="pb-0"><a href="'.get_post_type_archive_link( 'project' ).'" class="bttn">BACK</a></p>'; ?>  	
            </div>

		</div>

		<?php get_sidebar(); ?>

	</div>

<?php else: ?>

	<?php
	if(is_front_page()){
		$latest_posts_per_page = 2;
	}else{
		$latest_posts_per_page = 15;
	}

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	$posts_args = array(
		'paged'=>   $paged,
		'post_type' => 'post',
		'posts_per_page' => $latest_posts_per_page,	
	);
	$letest_posts = new WP_Query( $posts_args );

	if ($letest_posts->have_posts()){
		?>

		<?php if(!is_home()){ ?>
			
			<div class="row">
				<?php
				while($letest_posts->have_posts()): 
					$letest_posts->the_post();
					?>
					<div <?php post_class('blck col-6 text-left text-lg-center'); ?>>
						<div class="hvr-ovrly-bx">
							<div class="blck-cntnt">
								<a href="<?php the_permalink(); ?>" class="blck-img">
		                        	<?php the_post_thumbnail('full',get_the_ID()); ?>
		                    	</a>
		                    	<div class="hvr-ovrly">
		                    		<div class="hvr-ovrly-cntnt">
				                    	<?php 
				                    	the_title('<h3 class="pst-ttl"> <a href="'.get_the_permalink().'">', '</a></h3>'); 
				                    	the_excerpt();
				                    	?>
				                    	<p class="pb-0 d-none d-lg-block"><a href="<?php the_permalink(); ?>" class="mre-lnk">Read more</a></p>
			                    	</div>   		
		                    	</div>
							</div>

							<p class="pb-0 d-block d-lg-none"><a href="<?php the_permalink(); ?>" class="mre-lnk">Read more</a></p>
						</div>
					</div>
				<?php endwhile; ?>
			</div>

		<?php } elseif (is_home()){ ?>

		    <?php if (get_field('page_secondary_content', get_option( 'page_for_posts' ))): ?>
		    	<div class="blg-dscrptn">
		    		<?php the_field('page_secondary_content', get_option( 'page_for_posts' )); ?>
		    	</div>
			<?php endif; ?>

			<div class="blg-pge-cntcnt row">
				<div class="clmn-main col-md-8">
					<div class="row">
						<?php
						while($letest_posts->have_posts()): 
							$letest_posts->the_post();
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
			                        'next_text'    		 => __('>'),
			                        'prev_text'    		 => __('<'),
			                        'mid_size'     		 => 1
			                    )  
			                ); 
			                ?>
			            </div> 
					</div>

				</div>

				<?php get_sidebar(); ?>

			</div>  

		<?php } ?>

	<?php }else{ ?>



	<?php
	} 
	wp_reset_postdata();
	?>

<?php endif; ?>
