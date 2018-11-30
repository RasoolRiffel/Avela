<?php
/**
 * KNOWN Bootstrap 4.1.1
 *
 * @link https://getbootstrap.com/docs/4.1/getting-started/introduction/
 */

/*
 * Make Wordpress Embeds Responsive (defaults to 16-9 by bootstrap 4.0 )
 *
 * WordPress - https://developer.wordpress.org/reference/hooks/embed_oembed_html/
 * Bootstrap - https://getbootstrap.com/docs/4.0/utilities/embed/
 */
add_filter( 'embed_oembed_html', 'wrap_oembed_html', 99, 4 );
function wrap_oembed_html( $cached_html, $url, $attr, $post_id ) {
    return '<div class="embed-responsive embed-responsive-16by9">' . $cached_html . '</div>';
}

?>