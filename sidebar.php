<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>

<aside>

<?php if ( is_front_page() ) { ?>
	<img src="<?php bloginfo( 'template_url' ); ?>/images/PCB.jpg" />
	<img src="<?php bloginfo( 'template_url' ); ?>/images/RJC.jpg" />
	<img src="<?php bloginfo( 'template_url' ); ?>/images/MW.jpg" />
<?php }
else { ?>

<ul class="xoxo">

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
	
			<li>
				<?php get_search_form(); ?>
			</li>

			<li>
				<h3><?php _e( 'Archives', 'boilerplate' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>

		<?php endif; // end primary widget area ?>
			</ul>

<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

			<ul class="xoxo">
				<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
			</ul>

<?php endif; ?>

<?php } ?>

<br>
<div class="twitter">
<h1>Twitter</h1>
			<div id="twitterFeed"></div>
</div>
</aside>