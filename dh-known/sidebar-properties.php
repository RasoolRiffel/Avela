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
	<div class="hro-lght py-2">
		<?php 

		if (is_singular('post') || is_home() || is_archive()) {

			dynamic_sidebar('news-sidebar');

		}elseif(is_search()){

			// dynamic_sidebar('search-sidebar');

		}else{

		}

		?>	
	</div>
</div>