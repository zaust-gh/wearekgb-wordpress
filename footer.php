<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>
		</section><!-- #main -->
		<footer role="contentinfo" id="bottomFooter">
			<div class="contentWrapper">
				<div id="footerText">
				
				<?php
				$post_id = 32;
				$queried_post = get_post($post_id);
				$content = $queried_post->post_content;
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
				echo $content;
				?>
				
				</div>
				<div id="hitlist">
					<h1 class="title">KGB Hitlist</h1>
					<p>What's coming up next...</p>
					<?php
					$post_id = 30;
					$queried_post = get_post($post_id);
					$content = $queried_post->post_content;
					$content = apply_filters('the_content', $content);
					$content = str_replace(']]>', ']]&gt;', $content);
					echo $content;
					?>
				</div>
				<div id="socialMedia">
					<a id="twitterLink" target="_blank" href="http://twitter.com/#!/TeamKGB">Twitter</a>
					<a id="facebookLink" target="_blank" href="http://www.facebook.com/pages/Team-KGB/105402380779">Facebook</a>
					<!--a id="rssLink" href="">RSS</a-->
				</div>
			
			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with four columns of widgets.
				 */
				get_sidebar( 'footer' );
			?>

			</div>
				<div id="footerQuote">
					<div class="contentWrapper">
						
						<?php query_posts(array('post_type' => 'sitecontent', 'orderby' => 'rand', 'category_name' => 'quote', 'showposts' => 1)); if (have_posts()) : while (have_posts()) : the_post(); ?>
					
						<h1><?php the_title(); ?></h1>
						<h3><?php echo $post->post_content; ?></h3>
						
						<?php endwhile; else: ?>

						<?php _e('<h1>Pain is temporary, failure is forever</h1><h2>random rockstar up Scafell Pike</h2>'); ?>
						
						<?php endif; ?>
					</div>
				</div>
		</footer><!-- footer -->
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>
	</body>
</html>