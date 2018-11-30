    
<?php
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

<?php if(is_post_type_archive('known_property')): ?>



	<form role="search" method="get" class="srch-frm srch-frm-fltr search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="frm-innr">
			<span class="screen-reader-text">Properties Filter:</span>
            <input type="hidden" name="search" value="property" />
			<input type="hidden" class="search-field" placeholder="search …" value="" name="s">
			<div class="row">
				<div class="frm-col prprty-lctn col-sm">
                    <select class="" name="property_location">
                        <option value="">Location</option>
                        <?php
                        $locations_args = array(
                            'post_type' => 'known_location',
                            'order' => 'ASC',
                            'orderby' => 'title',
                        );
                        $locations = new WP_Query( $locations_args );
                        if ($locations->have_posts()){ 
                            while($locations->have_posts()): 
                                $locations->the_post();
                                ?>
                                <option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
                            <?php
                            endwhile;
                        } 
                        wp_reset_postdata();
                        ?>
                    </select>
				</div>
				<div class="frm-col prprty-tpe col-sm">
                    <select class="" name="property_type">
                        <option value="">Property Type</option>



		                <?php 
		                $property_types = get_terms( 
		                    array(
		                        'taxonomy' => 'known_property_type',
		                        'hide_empty' => true,
		                    ) 
		                );
		                if ($property_types){
		                    ?>
		                    <p class="strng pt-2 pb-1">TOURS TYPES</p>
		                    <?php foreach ( $property_types as $property_type) { ?>
	                            <option value="<?php echo $property_type->slug; ?>"<?php if(isset($searched_property_type) && $searched_property_type && !isset($_GET['sdbr-pckgs-srch-frm-rest']) == $property_type->slug) echo' selected'; ?>><?php echo $property_type->name; ?></option>
		                    <?php } ?>
		                <?php } ?>



                        <?php
                        $filter_countries_args = array(
                            'post_type' => 'country',
                            'order' => 'ASC',
                            'orderby' => 'title',
                        );
                        $filter_countries = new WP_Query( $filter_countries_args );
                        if ($filter_countries->have_posts()){ 
                            while($filter_countries->have_posts()): 
                                $filter_countries->the_post();
                                ?>
                            <?php
                            endwhile;
                        } 
                        wp_reset_postdata();
                        ?>
                    </select>
				</div>
				<div class="frm-col prprty-prce-rnge col-sm">
                    <select class="" name="price_range">
                        <option value="">Price Range</option>
                        <?php
                        echo '<option value="price_range_1">R' . number_format($form_price_range_min_1, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_1, 0, '.', ' ') .'</option>';
                        echo '<option value="price_range_2">R' . number_format($form_price_range_min_2, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_2, 0, '.', ' ') .'</option>';
                        echo '<option value="price_range_3">R' . number_format($form_price_range_min_3, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_3, 0, '.', ' ') .'</option>';
                        echo '<option value="price_range_4">R' . number_format($form_price_range_min_4, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_4, 0, '.', ' ') .'</option>';
                        echo '<option value="price_range_5">R' . number_format($form_price_range_min_5, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_5, 0, '.', ' ') .'</option>';
                        echo '<option value="price_range_6">R' . number_format($form_price_range_min_6, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_6, 0, '.', ' ') .'</option>';
                        echo '<option value="price_range_7">R' . number_format($form_price_range_min_7, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_7, 0, '.', ' ') .'</option>';
                        echo '<option value="price_range_8">R' . number_format($form_price_range_min_8, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_8, 0, '.', ' ') .'</option>';
                        echo '<option value="price_range_9">R' . number_format($form_price_range_min_9, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_9, 0, '.', ' ') .'</option>';
                        echo '<option value="price_range_10">R' . number_format($form_price_range_min_10, 0, '.', ' ') . ' +</option>';
                        ?>
                    </select>
				</div>
				<div class="frm-col bttn-col col-sm">
					<span class="bttn-wrp d-block text-center text-sm-right">
						<button type="submit" class="srch-sbmt d-inline-block" id="srch-sbmt search-submit" value="Search">
							<i class="icn fa fa-search" aria-hidden="true"></i>
						</button>						
					</span>
				</div>
			</div>			
		</div>
	</form>

<?php elseif (is_search()) : ?>

    <?php
    if(!isset($_GET['searched_property_reset'])){
        if (isset($_GET['property_location'])){ $searched_property_location = $_GET['property_location'];}else{ $searched_property_location = '';}
        if (isset($_GET['property_type'])){ $searched_property_type = $_GET['property_type'];}else{ $searched_property_type = '';}
        if (isset($_GET['price_range'])){ $searched_price_range = $_GET['price_range'];}else{ $searched_price_range = '';}
    }
    ?>

    <form role="search" method="get" class="srch-frm srch-frm-fltr search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="frm-innr">
            <span class="screen-reader-text">Properties Filter:</span>
            <input type="hidden" name="search" value="property" />
            <input type="hidden" class="search-field" placeholder="search …" value="" name="s">
            <div class="row">
                <div class="frm-col prprty-lctn col-12">
                    <?php 
                    $locations_args = array(
                        'post_type' => 'known_location',
                        'order' => 'ASC',
                        'orderby' => 'title',
                    );
                    $locations = new WP_Query( $locations_args );
                    if ($locations->have_posts()){
                        ?>
                        <p class="lbl chce-lbl">Location</p>
                        <?php
                        while($locations->have_posts()): 
                            $locations->the_post();
                            ?>
                            <div class="form-check">
                                <input type="radio" name="property_location" class="form-check-input" value="<?php the_ID(); ?>"<?php if(isset($searched_property_location) && $searched_property_location == get_the_ID()) echo " checked"; ?>>
                                <label class="lbl fld-lbl" for="<?php echo $tour_type->name; ?>"><?php the_title(); ?></label>
                            </div>
                        <?php 
                        endwhile;
                    }
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="frm-col prprty-tpe col-12">
                    <?php 
                    $property_types = get_terms( 
                        array(
                            'taxonomy' => 'known_property_type',
                            'hide_empty' => true,
                        ) 
                    );
                    if ($property_types){
                        ?>
                        <p class="lbl chce-lbl">Property Type</p>
                        <?php foreach ( $property_types as $property_type) { ?>
                            <div class="form-check">
                                <input type="radio" name="property_type" class="form-check-input" value="<?php echo $property_type->slug; ?>"<?php if(isset($searched_property_type) && $searched_property_type == $property_type->slug) echo" checked"; ?>>
                                <label class="lbl fld-lbl" for="<?php echo $tour_type->name; ?>"><?php echo $property_type->name; ?></label>
                            </div>
                        <?php 
                        } 
                    }
                    ?>
                </div>
                <div class="frm-col prprty-prce-rnge col-12">
                    <?php
                    ?>
                    <p class="lbl chce-lbl">Price Range</p>
                    <div class="form-check">
                        <input type="radio" name="price_range" class="form-check-input" value="price_range_1"<?php if(isset($searched_price_range) && $searched_price_range === 'price_range_1') echo" checked"; ?>>
                        <label class="lbl fld-lbl" for="price_range_1"><?php echo 'R' . number_format($form_price_range_min_1, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_1, 0, '.', ' '); ?></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="price_range" class="form-check-input" value="price_range_2"<?php if(isset($searched_price_range) && $searched_price_range === 'price_range_2') echo" checked"; ?>>
                        <label class="lbl fld-lbl" for="price_range_2"><?php echo 'R' . number_format($form_price_range_min_2, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_2, 0, '.', ' '); ?></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="price_range" class="form-check-input" value="price_range_3"<?php if(isset($searched_price_range) && $searched_price_range === 'price_range_3') echo" checked"; ?>>
                        <label class="lbl fld-lbl" for="price_range_3"><?php echo 'R' . number_format($form_price_range_min_3, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_3, 0, '.', ' '); ?></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="price_range" class="form-check-input" value="price_range_4"<?php if(isset($searched_price_range) && $searched_price_range === 'price_range_4') echo" checked"; ?>>
                        <label class="lbl fld-lbl" for="price_range_4"><?php echo 'R' . number_format($form_price_range_min_4, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_4, 0, '.', ' '); ?></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="price_range" class="form-check-input" value="price_range_5"<?php if(isset($searched_price_range) && $searched_price_range === 'price_range_5') echo" checked"; ?>>
                        <label class="lbl fld-lbl" for="price_range_5"><?php echo 'R' . number_format($form_price_range_min_5, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_5, 0, '.', ' '); ?></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="price_range" class="form-check-input" value="price_range_6"<?php if(isset($searched_price_range) && $searched_price_range === 'price_range_6') echo" checked"; ?>>
                        <label class="lbl fld-lbl" for="price_range_6"><?php echo 'R' . number_format($form_price_range_min_6, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_6, 0, '.', ' '); ?></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="price_range" class="form-check-input" value="price_range_7"<?php if(isset($searched_price_range) && $searched_price_range === 'price_range_7') echo" checked"; ?>>
                        <label class="lbl fld-lbl" for="price_range_7"><?php echo 'R' . number_format($form_price_range_min_7, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_7, 0, '.', ' '); ?></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="price_range" class="form-check-input" value="price_range_8"<?php if(isset($searched_price_range) && $searched_price_range === 'price_range_8') echo" checked"; ?>>
                        <label class="lbl fld-lbl" for="price_range_8"><?php echo 'R' . number_format($form_price_range_min_8, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_8, 0, '.', ' '); ?></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="price_range" class="form-check-input" value="price_range_9"<?php if(isset($searched_price_range) && $searched_price_range === 'price_range_9') echo" checked"; ?>>
                        <label class="lbl fld-lbl" for="price_range_9"><?php echo 'R' . number_format($form_price_range_min_9, 0, '.', ' ') . ' - R' . number_format($form_price_range_max_9, 0, '.', ' '); ?></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="price_range" class="form-check-input" value="price_range_10"<?php if(isset($searched_price_range) && $searched_price_range === 'price_range_10') echo" checked"; ?>>
                        <label class="lbl fld-lbl" for="price_range_10"><?php echo 'R' . number_format($form_price_range_min_10, 0, '.', ' ') . ' +'; ?></label>
                    </div>
                </div>
                <div class="frm-col bttn-col col-12">
                    <button id="sdbr-pckgs-srch-frm-rest" name="searched_property_reset" class="bttn srch-clr">RESET</button>
                    <button type="submit" class="bttn srch-sbmt" id="srch-sbmt search-submit" value="Search">SEARCH</button> 
                </div>
            </div>          
        </div>
    </form>

<?php else: ?>

	<form role="search" method="get" class="srch-frm search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="frm-innr">
			<span class="screen-reader-text">Search for:</span>
            <input type="hidden" name="search" value="content" />
			<input type="search" class="search-field" placeholder="search …" value="" name="s">
			<button type="submit" class="srch-sbmt" id="srch-sbmt search-submit" value="Search">
				<i class="icn fa fa-search" aria-hidden="true"></i>
			</button>
		</div>
	</form>

<?php endif; ?>