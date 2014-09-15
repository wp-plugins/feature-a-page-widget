<?php
/**
 * Feature a Page Widget Template Tags
 * 
 * Functions used in Widget Template Files for Output, Filtering, and Supporting Options
 * 
 * You can change the widget output by copying any of the three template files
 * in the /fpw_views-2/ folder to an /fpw_views-2/ folder in the active theme.
 * 
 * There are a variety of filters documented below that are provided to modify the output.
 * 
 * @package feature_a_page_widget
 * @author 	Mark Root-Wiley (info@MRWweb.com)
 * @link 	http://wordpress.org/plugins/feature-a-page-widget
 * @since	2.0.0
 * @license	http://www.gnu.org/licenses/gpl-2.0.html	GPLv2 or later
 */
/**
 * output a post's Title in a widget template file
 * 
 * @since 2.0.0
 * 
 * @return string 	title of page
 */
function fpw_page_title() {

	$custom_title = get_post_meta( get_the_id(), 'fpw_page_title', true );
	if( $custom_title ) {
		$title = $custom_title;
	} else {
		$title = get_the_title();
	}
	
	$title = apply_filters( 'fpw_page_title', $title );
	
	return $title;
	
}

/**
 * output a post's Featured Image in a widget template file
 * 
 * @since 2.0.0
 * 
 * @param  string $image_size a registered image size
 * @return string             html output of image
 */
function fpw_featured_image( $image_size ) {

	$image_size = apply_filters( 'fpw_image_size', $image_size );

	$custom_image = get_post_meta( get_the_id(), 'fpw_featured_image_id', true );
	if( $custom_image ) {
		$image_id = $custom_image;
	} else {
		$image_id = get_post_thumbnail_id();
	}

	$image = wp_get_attachment_image( (int) $image_id, $image_size, false, array( 'classes' => 'fpw-featured-image-img' ) );
	
	// IDs are for backward compatibility with old filters
	$image = apply_filters( 'fpw_featured_image', $image, get_the_id(), $image_size );
	
	return $image;

}

/**
 * output a post's Excerpt in a widget template file
 * 
 * @since 2.0.0
 * 
 * @return string excerpt text
 */
function fpw_excerpt() {

	// prevent an auto-truncated excerpt
	if( !has_excerpt() )
		return;

	$custom_excerpt = get_post_meta( get_the_id(), 'fpw_excerpt', true );
	if( $custom_excerpt ) {
		$excerpt = $custom_excerpt;
	} else {
		$excerpt = get_the_excerpt();
	}

	// IDs are for backward compatibility with old filters
	$excerpt = apply_filters( 'fpw_excerpt', $excerpt, get_the_id() );
	$excerpt = apply_filters( 'the_excerpt', $excerpt );

	return $excerpt;

}