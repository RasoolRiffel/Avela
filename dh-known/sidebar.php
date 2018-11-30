<?php
/**
 * The sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package known
 */

?>

<div class="pge-sdbr col-md-4 pt-3 pt-md-0">
	<?php 
	if (is_singular()) {
		if (is_singular('post')) {
			dynamic_sidebar('news-sidebar');
		}elseif (is_singular('known_property')) {
			?>
			<?php if (get_field('property_stand_size', get_the_ID()) || get_field('property_house_size', get_the_ID()) || get_field('property_levy', get_the_ID()) || get_field('property_rates_and_taxes', get_the_ID()) || get_field('property_water_electricity', get_the_ID())) { ?>
				<div class="wdgt prprty-wdgt">
					<div class="wdgt-innr">
						<h3 class="h4">Property Information</h3>
						<ul class="p-0">
							<?php 
							if (get_field('property_stand_size', get_the_ID())) echo '<li class="row"><span class="lbl col-7">Stand Size:</span><span class="vle col pl-0">'.get_field('property_stand_size', get_the_ID()).' m<sup>2</sup></span></li>'; 
							if (get_field('property_house_size', get_the_ID())) echo '<li class="row"><span class="lbl col-7">House Size:</span><span class="vle col pl-0">'.get_field('property_house_size', get_the_ID()).' m<sup>2</sup></span></li>'; 
							if (get_field('property_levy', get_the_ID())) echo '<li class="row"><span class="lbl col-7">Levy:</span><span class="vle col pl-0">R'.number_format(get_field('property_levy', get_the_ID()), 0, '.', ' ').'</span></li>'; 
							if (get_field('property_rates_and_taxes', get_the_ID())) echo '<li class="row"><span class="lbl col-7">Rates & taxes:</span><span class="vle col pl-0">R'.number_format(get_field('property_rates_and_taxes', get_the_ID()), 0, '.', ' ').'</span></li>'; 
							if (get_field('property_water_electricity', get_the_ID())) echo '<li class="row"><span class="lbl col-7">Water & Electricity:</span><span class="vle col pl-0">R'.number_format(get_field('property_water_electricity', get_the_ID()), 0, '.', ' ').'</span></li>'; 
							?>
						</ul>
					</div>
				</div>
			<?php } ?>

			<?php
			$property_underfloor_heating = get_field('property_underfloor_heating', get_the_ID());
			$property_swimming_pool = get_field('property_swimming_pool', get_the_ID());
			if (get_field('property_bedrooms', get_the_ID()) || get_field('property_bathrooms', get_the_ID()) || get_field('property_garages', get_the_ID()) || ($property_swimming_pool['value'] != 'na') || ($property_underfloor_heating['value'] != 'na')) { ?>
				<div class="wdgt prprty-wdgt">
					<div class="wdgt-innr">
						<h3 class="h4">Property Features</h3>
						<ul class="p-0">
							<?php 
							if (get_field('property_bedrooms', get_the_ID())) echo '<li class="row"><span class="lbl col-7">Bedrooms:</span><span class="vle col pl-0">'.get_field('property_bedrooms', get_the_ID()).'</span></li>'; 
							if (get_field('property_bathrooms', get_the_ID())) echo '<li class="row"><span class="lbl col-7">Bathrooms:</span><span class="vle col pl-0">'.get_field('property_bathrooms', get_the_ID()).'</span></li>'; 
							if (get_field('property_garages', get_the_ID())) echo '<li class="row"><span class="lbl col-7">Garages:</span><span class="vle col pl-0">'.get_field('property_garages', get_the_ID()).'</span></li>'; 
							if ($property_swimming_pool['value'] != 'na') echo '<li class="row"><span class="lbl col-7">Pool</span><span class="vle col pl-0">'.$property_swimming_pool['label'].'</span></li>'; 
							if ($property_underfloor_heating['value'] != 'na') echo '<li class="row"><span class="lbl col-7">Underfloor Heating:</span><span class="vle col pl-0">'.$property_underfloor_heating['label'].'</span></li>'; 
							?>
						</ul>
					</div>
				</div>
			<?php } ?>


			<?php 
			$property_price = get_field('property_price', get_the_ID());
			if ($property_price){
				?>
					<div class="wdgt prprty-wdgt">
						<div class="wdgt-innr">					
							<?php echo '<h3 class="h4 row px-0"><span class="lbl col-7">Property Price:</span><span class="vle col pl-0">R' . number_format($property_price) . '</span></h3>'; ?>
						</div>
					</div>
				<?php
			}
		}
	} elseif (is_home() || is_search() || (is_archive() && !is_post_type_archive())) {
		if (is_search()) {
			if(isset($_GET['search'])) {
			    $search_sidebar = $_GET['search'];
			    if($search_sidebar == 'property') {
			    	echo get_search_form();
			    } elseif($search_sidebar == 'content') {
			        dynamic_sidebar('news-sidebar');
			    }
			}
		}else{
			dynamic_sidebar('news-sidebar');
		}
	}else{
		dynamic_sidebar('general-sidebar');
	}
	?>	
</div>