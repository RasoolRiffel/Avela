<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package known
 */
?>

<?php
if(is_post_type_archive('known_property') || is_search()){
	$letest_properties_args_c = 12;
}else{
	$letest_properties_args_c = 8;
}

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$letest_properties_args = array(
	'paged'=>   $paged,
	'post_type' => 'known_property',
	'posts_per_page' => $letest_properties_args_c,	
);

$letest_properties = new WP_Query( $letest_properties_args );
if ($letest_properties->have_posts()){
	?>

	<?php if(is_post_type_archive('known_property') || is_search()): ?>
		<div class="row">        
            <div class="col-12 archv-mta">
            	<div class="rslts-cnt">
            		<p class="pb-0">Showing <?php echo $letest_properties->post_count; ?> of <?php echo $letest_properties->found_posts; ?></p>
            	</div>
                <?php 
                the_posts_pagination( 
                    array(
                        'screen_reader_text' => 'Results navigation',
                        'next_text'    		 => __('>'),
                        'prev_text'    		 => __('<'),
                        'mid_size'     		 => 1
                    )  
                ); 
                ?>
            </div> 
			<?php
			while($letest_properties->have_posts()): 
				$letest_properties->the_post();
				$property_price = get_field('property_price', get_the_ID());
				?>
				<?php if (is_search()) : ?>
					<div <?php post_class('blck blck-square-col col-6 text-center'); ?>>
				<?php else: ?>
					<div <?php post_class('blck blck-square-col col-6 col-md-4 text-center'); ?>>
				<?php endif; ?>
					<div class="blck-square">
						<div class="hvr-ovrly-bx">
							<div class="blck-cntnt">
								<a href="<?php the_permalink(); ?>" class="blck-img blck-square-col ">
		                        	<div class="blck-square">
		                        		<?php
		                        		$overview_image = get_field('post_overview_image', get_the_ID());
		                        		if ($overview_image){
		                        			echo '<img src="' . $overview_image['url'] . '" title="' . $overview_image['title'] . '" alt="' . $overview_image['alt'] . '" class="pst-img">';
		                        		} elseif (get_the_post_thumbnail()) {
		                        			the_post_thumbnail('full',get_the_ID());
		                        		}
		                        		?>
		                        	</div>
		                        	<?php if ($property_price) echo '<span class="prprty-prce d-block"><span class="lbl">For Sale</span> | <span class="vle">R'. number_format($property_price) .'<span><span>'; ?>
		                    	</a>
		                    	<div class="hvr-ovrly">
		                    		<div class="hvr-ovrly-cntnt">
				                    	<?php 
				                    	the_title('<h3 class="pst-ttl">','</h3>');
				                    	
				                    	$property_location = get_field('property_location', get_the_ID());
				                    	if ($property_location) echo '<p class="prprty-lctn small d-block pt-1">' . esc_html(get_the_title($property_location)) . '</p>';
				                    	?>
				                    	<p class="d-none d-lg-block"><a href="<?php the_permalink(); ?>" class="mre-lnk">View property</a></p>
			                    	</div>   		
		                    	</div>
							</div>
							<p class="mre-lnk-wrp d-block d-lg-none"><a href="<?php the_permalink(); ?>" class="mre-lnk">View property</a></p>
						</div>						
					</div>
				</div>
			<?php endwhile; ?>
		</div>

	<?php else: ?>

		<div class="row no-gutters justify-content-md-center">
			<?php
			while($letest_properties->have_posts()): 
				$letest_properties->the_post();
				$property_price = get_field('property_price', get_the_ID());
				?>
				<div <?php post_class('blck blck-square-col col-6 col-md-4 col-xl-3 text-center'); ?>>
					<div class="blck-square">
						<div class="hvr-ovrly-bx">
							<div class="blck-cntnt">
								<a href="<?php the_permalink(); ?>" class="blck-img blck-square-col">
		                        	<div class="blck-square">
		                        		<?php
		                        		$overview_image = get_field('post_overview_image', get_the_ID());
		                        		if ($overview_image){
		                        			echo '<img src="' . $overview_image['url'] . '" title="' . $overview_image['title'] . '" alt="' . $overview_image['alt'] . '" class="pst-img">';
		                        		} elseif (get_the_post_thumbnail()) {
		                        			the_post_thumbnail('full',get_the_ID());
		                        		}
		                        		?>
		                        	</div>
		                        	<?php if ($property_price) echo '<span class="prprty-prce d-block d-lg-none"><span class="lbl">For Sale</span> | <span class="vle">R'. number_format($property_price) .'<span><span>'; ?>
		                    	</a>
		                    	<div class="hvr-ovrly">
		                    		<div class="hvr-ovrly-cntnt">
				                    	<?php 
				                    	the_title('<h3 class="pst-ttl">','</h3>'); 
				                    	the_excerpt();
				                    	?>
				                    	<p class="pb-0 d-none d-lg-block"><a href="<?php the_permalink(); ?>" class="mre-lnk">View property</a></p>
			                    	</div>
	                        		<?php if ($property_price) echo '<span class="prprty-prce d-none d-lg-block"><span class="lbl">For Sale</span> | <span class="vle">R'. number_format($property_price) .'<span><span>'; ?>   		
		                    	</div>
							</div>
							<p class="mre-lnk-wrp pb-0 d-block d-lg-none"><a href="<?php the_permalink(); ?>" class="mre-lnk">View property</a></p>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<p class="pt-3 pb-0 text-center"><a href="<?php echo get_post_type_archive_link( 'known_property' ); ?>" class="mrelnk">View all properties</a></p>
	<?php endif ?>

<?php
}
wp_reset_postdata();
?>
