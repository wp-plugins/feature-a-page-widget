=== Feature A Page Widget ===
Contributors: mrwweb
Donate link: https://flattr.com/profile/mrwweb
Tags: Widget, Widgets, Sidebar, Page, Pages, Featured Page, Thumbnail, Featured Image, Content, Link, Post Thumbnail, Excerpt, Simple
Requires at least: 3.0.0
Tested up to: 3.4.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Shows a summary of any Page in any sidebar.

== Description ==

Feature A Page Widget aims to provide a "just works" solution for showcasing a Page in any sidebar. It features Core WordPress features, a *simple* set of options with a thought-through UI, three widget layouts, filters and templating for powerful customizations, and i18n readiness.

For those more technically adept, there are three filters and a template to customize the output of the widget (see the [FAQ](faq/) for more information).

= How to Use the Widget =
*This plugin enables Featured Images (technically, Post Thumbnails) and Excerpts for **Pages** in WordPress. If you don't see one or both of those fields, they may be hidden in the "Screen Options" (look in top-right corner) for Pages.*

1. Edit the page you will feature.
1. Fill out the [Excerpt](http://en.support.wordpress.com/splitting-content/excerpts/#creating-excerpts) and select a [Featured Image](http://en.support.wordpress.com/featured-images/#setting-a-featured-image) on that page.
1. Go to Appearance > Widgets.
1. Add an instance of the "Feature a Page Widget" to the sidebar that will feature the page.
1. Select the page you just edited. Choose a layout to use and give the Widget a title if you want.
1. Save the widget. Admire your handiwork.

= A Word About Image Sizes =
This plugin creates different image sizes for use in the plugin. If you plan to use images that were uploaded to your media library before you installed this plugin, you'd be wise to use a plugin like [Regenerate Thumbnails](http://wordpress.org/extend/plugins/regenerate-thumbnails/) or [Dynamic Image Resizer](http://wordpress.org/extend/plugins/regenerate-thumbnails/).

= Requested Options Poll and Giving Feedback =
Please [vote on the options](http://mrwweb.com/feature-a-page-widget-plugin-wordpress/#gform_wrapper_5) you'd like to see in future versions of the plugin. Only the very-most requested options will be added. A more [in-depth feedback form](http://mrwweb.com/feature-a-page-widget-plugin-wordpress/#gform_wrapper_4) is also available, and, as always, please consider [rating/reviewing the plugin](http://wordpress.org/support/view/plugin-reviews/feature-a-page-widget).

= Themes Tested =
Twenty Twelve, Twenty Eleven, Twenty Ten, P2, Kubrick (for old times' sake)

== Installation ==

1. Upload the `feature-a-page-widget` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Fill out the excerpt and select the featured image for the Page(s) you will feature.
1. From "Appearance" > "Widgets," you can now drag the "Feature a Page" widget into any sidebar.

== Frequently Asked Questions ==

= How do I set the widget image? =
The widget gets its image from the "Featured Image" field on the page you are featuring.

1. Go to the page you're featuring.
1. In the right sidebar, look for the "Set Featured Image" link.
1. Use the media picker to find the image and then select "Use as Featured Image."
1. Update the page and you're reading to go.

= How do I set the widget text? =
The widget gets its text from the "Excerpt" field on the page you are featuring.

1. Go to the page you want to featured.
1. Below the body field, look for the "Excerpt" field.
1. Fill it in.
1. Update the page.

= Where do I find the Featured Image or Excerpt fields? =
1. In the top right corner of any **Page**, click "Screen Options."
1. From the menu that slides down, make sure the "Excerpt" and "Featured Image" are both checked.
1. Done! WordPress remembers this choice on all pages.

= What if I don't want the Featured Image / Excerpt on my Page editing screen? =
The widget won't do much without those two fields, but if you really don't want them, uncheck the boxes mentioned in the previous question. You can always display them again by following the instructions in the previous question.

= How can I tell if a page has a featured image or excerpt already? =
When selecting the page to feature in the widget settings, the list of pages includes two icons. The first icon is the featured image, and the second is the excerpt. If the icon is "lit-up," that means that page has that piece of information. If both are lit-up, the page is ready for optimal use in the widget. See the "Screenshots" tab for a diagram.

= How can I modify the widget design or output? =
The widget offers three ways to customize its design and output. The right method for you depends on what you want to accomplish and what you're comfortable doing technically.

1. **Write your own CSS rules.** The plugin's CSS selectors have as low a priority as possible, so you should be able to override styles pretty easily.
1. **Filter the Title, Excerpt, or Image.** The plugin gives you three filters to modify the outputs in the widget: `fwp_page_title`, `fpw_excerpt`, and `fwp_featured_image`. The widget's title also goes through the `widget_title` filter.
  * Those comfortable writing filters can see the specifics in `fpw_widget.class.php`.
  * See the next FAQ for an example of adding a "Read More…" link.
1. **Override the Widget's output template.** The widget output can be overridden by a template in any parent or child theme. Copy the `/fpw_views/` folder from thi plugin's folder to your theme's folder and modify `fpw_default.php` to your heart's content. The template itself contains additional information on what data is available to work with.

= I want add a "Read More…" link. =
This may become a widget option some day, but for now, it's easy to add with a filter. Place it in your theme's `functions.php` file or in a [functionality plugin](http://justintadlock.com/archives/2011/02/02/creating-a-custom-functions-plugin-for-end-users):

`function test_func( $excerpt, $featured_page_id ) {
	return $excerpt . ' <a href="' . get_permalink( $featured_page_id ) . '">Read More…</a>';
}
add_filter( 'fpw_excerpt', 'test_func', 10, 2 );`

= I need to support IE8 and my theme doesn't use HTML5 =
If you are having trouble with this widget's layout in IE8, it may be due to the use of the `<article>` element in the widget. Double-check that your theme isn't using the HTML5 shiv/shim. If it's not, then adding the following to your theme's `functions.php` file may fix the issue ([snippet source](http://css-tricks.com/snippets/wordpress/html5-shim-in-functions-php/)):
`// add ie conditional html5 shim to header
function add_ie_html5_shim () {
	global $is_IE;
	if ($is_IE)
   	echo '<!--[if lt IE 9]>';
    	echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    	echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');`

= This widget isn't what I want. =
This widget is intended to be straightforward and avoid melting into "option soup." However, that means it might not be perfect for what you need.

If you think the widget is *almost right*, double-check that can't use the one of the plugin's filters or the widget view template (see "I want to modify how the widget looks/works"). If that doesn't work, submit some feedback or suggest a feature in the support forums.

If this plugin is more than a little off, you might be looking for something more like [Posts in Sidebar](http://wordpress.org/extend/plugins/posts-in-sidebar/), [Query Posts Widget](http://wordpress.org/extend/plugins/query-posts/), [Featured Page Widget](http://wordpress.org/extend/plugins/featured-page-widget/), [Simple Featured Posts Widget](http://wordpress.org/extend/plugins/simple-featured-posts-widget/), or something else. That's fine.

= How do you make the "Featured page" select list look so cool? =

I'm using the [Chosen](http://harvesthq.github.com/chosen/) jQuery plugin. It's awesome. I first saw it in Gravity Forms.

== Screenshots ==

1. Choose from three theme-agnostic layouts.
2. No need to choke down "option soup."
3. Widget interface shows you which pages have featured images and excerpts.

== Changelog ==

= 1.0.0 =
* Public release into repository.
* Thanks to awesome tester: [Jeremy Green](http://endocreative.com/) (clearfix!)

= 0.9.5 =
 * Private beta release for #wpseattle.
 * Awesome new icons to indicate whether page has featured image and/or excerpt.
 * Fix for fatal error. That was bad.
 * Change `require_once()` to `require()` to allow multiple widget instances.
 * Fix for select list not working when widget first added to sidebar.
 * Some other small CSS compatibility tweaks.
 * Significantly more complete `readme.txt`.
 * Caught some strings missing i18n. Pig Latin plugin says this is i18n ready.
 * Lots more testing on themes and with Developer plugin.
 * Thanks to awesome testers: [Bob Dunn](http://BobWP.com) and [Grant Landram](http://GrantLandram.com)

= 0.9.0 =
* Initial private alpha release.
* Thanks to awesome tester: [Christine Winckler](http://ChristineTheDesigner.com)

== Upgrade Notice ==

= 1.0.0 =
* Plugin's now in the repository. Upgrade for a few small CSS fixes.

= 0.9.5 =
 * Cool icons in the "Select page" interface plus fixes for two nasty bugs.

== Roadmap ==

= Philosophy =
I'm open to adding more features, but the widget options _must_ remain straight-forward and quick to set up. Following the 80/20 rule, I'm hoping this widget will contain the 20% of useful features that 80% of people need.

= 1.5.0 =
* New widget options added if/when a consensus arises from feedback.

= 1.0.0 =
* First Official WordPress.org Repository release.
* Stable. Simple.

= 0.9.5 =
* Beta Release. Bug fixes from Alpha.
* Added icons in "Select Page" list to show pages with featured image & excerpt