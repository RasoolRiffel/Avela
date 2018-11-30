<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package known
 */

?>

	<?php
	$featured_testimonials_args = array(
		'post_type' => 'known_testimonial',
		'posts_per_page' => 5,	
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
