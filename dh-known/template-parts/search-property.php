
<?php

if(!isset($_GET['searched_property_reset'])){
    if (isset($_GET['property_location'])){ $searched_property_location = $_GET['property_location'];}else{ $searched_property_location = '';}
    if (isset($_GET['property_type'])){ $searched_property_type = $_GET['property_type'];}else{ $searched_property_type = '';}
    if (isset($_GET['price_range'])){ $searched_price_range = $_GET['price_range'];}else{ $searched_price_range = '';}
}

$form_price_range_min_1 = get_field('form_price_range_min_1', 15);
$form_price_range_max_1 = get_field('form_price_range_max_1', 15);
$form_price_range_min_2 = get_field('form_price_range_min_2', 15);
$form_price_range_max_2 = get_field('form_price_range_max_2', 15);
$form_price_range_min_3 = get_field('form_price_range_min_3', 15);
$form_price_range_max_3 = get_field('form_price_range_max_3', 15);
$form_price_range_min_4 = get_field('form_price_range_min_4', 15);
$form_price_range_max_4 = get_field('form_price_range_max_4', 15);
$form_price_range_min_5 = get_field('form_price_range_min_5', 15);
$form_price_range_max_5 = get_field('form_price_range_max_5', 15);
$form_price_range_min_6 = get_field('form_price_range_min_6', 15);
$form_price_range_max_6 = get_field('form_price_range_max_6', 15);
$form_price_range_min_7 = get_field('form_price_range_min_7', 15);
$form_price_range_max_7 = get_field('form_price_range_max_7', 15);
$form_price_range_min_8 = get_field('form_price_range_min_8', 15);
$form_price_range_max_8 = get_field('form_price_range_max_8', 15);
$form_price_range_min_9 = get_field('form_price_range_min_9', 15);
$form_price_range_max_9 = get_field('form_price_range_max_9', 15);
$form_price_range_min_10 = get_field('form_price_range_min_10', 15);
?>



<div class="pge-sctn ltst-prprts prprts-archv">
	<h1 class="pst-ttl text-center">Property Search Filter</h1>
	<div class="blg-pge-cntcnt row">

		<?php get_sidebar(); ?>

		<div class="clmn-main prprts col-md-8">

			<?php
			if(!isset($_GET['searched_property_reset'])){
                if($searched_property_location || $searched_property_type || $searched_price_range){
                	if ($searched_price_range == 'price_range_1') {
                		$properties_meta_query_value = array($form_price_range_min_1, $form_price_range_max_1);
                		$properties_meta_query_compare = 'BETWEEN';
                	} elseif ($searched_price_range == 'price_range_2') {
                		$properties_meta_query_value = array($form_price_range_min_2, $form_price_range_max_2);
                		$properties_meta_query_compare = 'BETWEEN';
                	} elseif ($searched_price_range == 'price_range_3') {
                		$properties_meta_query_value = array($form_price_range_min_3, $form_price_range_max_3);
                		$properties_meta_query_compare = 'BETWEEN';
                	} elseif ($searched_price_range == 'price_range_4') {
                		$properties_meta_query_value = array($form_price_range_min_4, $form_price_range_max_4);
                		$properties_meta_query_compare = 'BETWEEN';
                	} elseif ($searched_price_range == 'price_range_5') {
                		$properties_meta_query_value = array($form_price_range_min_5, $form_price_range_max_5);
                		$properties_meta_query_compare = 'BETWEEN';
                	} elseif ($searched_price_range == 'price_range_6') {
                		$properties_meta_query_value = array($form_price_range_min_6, $form_price_range_max_6);
                		$properties_meta_query_compare = 'BETWEEN';
                	} elseif ($searched_price_range == 'price_range_7') {
                		$properties_meta_query_value = array($form_price_range_min_7, $form_price_range_max_7);
                		$properties_meta_query_compare = 'BETWEEN';
                	} elseif ($searched_price_range == 'price_range_8') {
                		$properties_meta_query_value = array($form_price_range_min_8, $form_price_range_max_8);
                		$properties_meta_query_compare = 'BETWEEN';
                	} elseif ($searched_price_range == 'price_range_9') {
                		$properties_meta_query_value = array($form_price_range_min_9, $form_price_range_max_9);
                		$properties_meta_query_compare = 'BETWEEN';
                	} elseif ($searched_price_range == 'price_range_10') {
                		$properties_meta_query_value = $form_price_range_min_10;
                		$properties_meta_query_compare = '>=';
                	}

	                if ($searched_property_location && $searched_property_type && $searched_price_range) {
	                    $filtered_properties_meta_query = array(
	                        'relation'  => 'AND',
	                        array(
	                            'key'       => 'property_location',
	                            'value'     => $searched_property_location,
	                            'compare'   => '='
	                        ),
	                        array(
	                            'key'       => 'property_price',
	                            'value'     => $properties_meta_query_value,
	                            'compare'   => $properties_meta_query_compare,
	                            'type'    => 'numeric',
	                        ),
	                    );
                        $filtered_properties_tax_query = array(
                            array(
                                'taxonomy' => 'known_property_type',
                                'field' => 'slug',
                                'terms' => $searched_property_type
                            )
                        );
	                } elseif ($searched_property_location && $searched_property_type) {
	                    $filtered_properties_meta_query = array(
	                        'relation'  => 'AND',
	                        array(
	                            'key'       => 'property_location',
	                            'value'     => $searched_property_location,
	                            'compare'   => '='
	                        ),
	                    );
                        $filtered_properties_tax_query = array(
                            array(
                                'taxonomy' => 'known_property_type',
                                'field' => 'slug',
                                'terms' => $searched_property_type
                            )
                        );
	                } elseif ($searched_property_location && $searched_price_range) {
	                    $filtered_properties_meta_query = array(
	                        'relation'  => 'AND',
	                        array(
	                            'key'       => 'property_location',
	                            'value'     => $searched_property_location,
	                            'compare'   => '='
	                        ),
	                        array(
	                            'key'       => 'property_price',
	                            'value'     => $properties_meta_query_value,
	                            'compare'   => $properties_meta_query_compare,
	                            'type'    => 'numeric',
	                        ),
	                    );
	                }  elseif ($searched_property_type && $searched_price_range) {
	                    $filtered_properties_meta_query = array(
	                        'relation'  => 'AND',
	                        array(
	                            'key'       => 'property_price',
	                            'value'     => $properties_meta_query_value,
	                            'compare'   => $properties_meta_query_compare,
	                            'type'    => 'numeric',
	                        ),
	                    );
                        $filtered_properties_tax_query = array(
                            array(
                                'taxonomy' => 'known_property_type',
                                'field' => 'slug',
                                'terms' => $searched_property_type
                            )
                        );
	                } 
	                elseif ($searched_property_location) {
	                    $filtered_properties_meta_query = array(
	                        'relation'  => 'AND',
	                        array(
	                            'key'       => 'property_location',
	                            'value'     => $searched_property_location,
	                            'compare'   => '='
	                        ),
	                    );
                        $filtered_properties_tax_query = array();
	                } elseif ($searched_property_type) {
                        $filtered_properties_meta_query = array();
                        $filtered_properties_tax_query = array(
                            array(
                                'taxonomy' => 'known_property_type',
                                'field' => 'slug',
                                'terms' => $searched_property_type
                            )
                        );
	                } elseif ($searched_price_range) {
	                    $filtered_properties_meta_query = array(
	                        'relation'  => 'AND',
	                        array(
	                            'key'       => 'property_price',
	                            'value'     => $properties_meta_query_value,
	                            'compare'   => $properties_meta_query_compare,
	                            'type'    => 'numeric',
	                        ),
	                    );
                        $filtered_properties_tax_query = array( );
	                }


	                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	                $filtered_properties_args = array(
	                    'paged'=>   $paged,
	                    'post_type' => 'known_property',
	                    'order' => 'ASC',
	                    'orderby' => 'title',
                        'tax_query' => $filtered_properties_tax_query,
	                    'meta_query' => $filtered_properties_meta_query
	                );

	                $filtered_properties = new WP_Query( $filtered_properties_args);

	                if ($filtered_properties->have_posts()){
	                	echo '<div class="row">';     
	                		?>
				            <div class="col-12 archv-mta">
				            	<div class="rslts-cnt">
				            		<p class="pb-0">Showing <?php echo $filtered_properties->post_count; ?> of <?php echo $filtered_properties->found_posts; ?></p>
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
		                    // $showing_posts = 0;
		                    while($filtered_properties->have_posts()): 
		                        $filtered_properties->the_post();
		                        $property_price = get_field('property_price', get_the_ID());
		                        ?>
		                        <div <?php post_class('blck blck-square-col col-6 text-center'); ?>>
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
		                    	<?php
		                    	// $showing_posts ++;
		                    endwhile;
	                	echo '</div>';
	                }else{
	                    ?>
	                    <div class="col-12">
	                        <p class="h3"></p>
	                        <p class="strng pt-3pb-3">Sorry, nothing matched your search.</p>
	                    </div>
	                    <?php
	                }
	                wp_reset_postdata();
                } else {
            		echo '<p class="h3 pt-md-0">Nothing searched. <span class="h4">showing all properties:</span></p>';
					get_template_part( 'template-parts/content', 'property' ); 
                }
            }else{
            	echo '<p class="h3 pt-md-0">Searched Cleared. <span class="h4">showing all properties:</span></p>';
				get_template_part( 'template-parts/content', 'property' ); 
            }
			?>
		</div>
	</div>
</div>
