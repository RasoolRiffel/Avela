<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package known
 */

get_header(); 

?>

<?php
if(isset($_GET['search'])) {

    $search_for = $_GET['search'];

    if($search_for == 'property') {

        load_template(TEMPLATEPATH . '/template-parts/search-property.php');

    } elseif ($search_for == 'content') {

    	?>

    	<div class="pge-sctn indx-hntry wth-sdbr">
    		<h1 class="pst-ttl text-center">Search Results</h1>
			<div class="blg-pge-cntcnt row">
				<div class="clmn-main col-md-8">
					<div class="row">
						<?php
						if (have_posts()) :
		                    while ( have_posts() ) : 
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
								<?php 
							endwhile;
						else:
						?>
							<div class="col-12">								
								<p><?php esc_html_e( 'Sorry, nothing matched your search terms. Please try again with some different keywords.', 'known' ); ?></p>
							</div>

						<?php endif; ?>
					</div>
				</div>

				<?php get_sidebar(); ?>
			</div>
		</div>
    <?php
    }
}
?>


<?php get_footer(); ?>