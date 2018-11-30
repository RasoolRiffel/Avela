

<?php
	$args = array( 'post_type' => 'post' );
	$args = array_merge( $args, $wp_query->query );
	query_posts( $args );
?>
