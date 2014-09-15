<?php
/**
 * "Big Image" Layout Template File
 * 
 * DO NOT MODIFY THIS FILE!
 * 
 * To override, copy the /fpw2_views/ folder to your active theme's folder.
 * Modify the file in the theme's folder and the plugin will use it.
 * See: http://wordpress.org/extend/plugins/feature-a-page-widget/faq/
 */
?>

<article class="hentry fpw-clearfix fpw-layout-big">

	<a href="<?php the_permalink(); ?>" class="fpw-featured-link" rel="bookmark">
		<div class="fpw-featured-image">
			<?php echo fpw_featured_image( 'fpw_big' ); ?>
		</div>
		<h3 class="fpw-page-title entry-title"><?php echo fpw_page_title(); ?></h3>
	</a>	

	<div class="fpw-excerpt entry-summary">
		<?php echo fpw_excerpt(); ?>
	</div>

</article>