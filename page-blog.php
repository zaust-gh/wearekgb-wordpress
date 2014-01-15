<?php
/**
 * Template Name: Blog
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div id="mainContainer">
	<h1 class="pageTitle">KGB Blog</h1>
				<?php
	        	
	        	$args=array(
				'showposts' => 20
				);
				
				$myposts = get_posts($args);
				foreach($myposts as $post) {
					setup_postdata($post);
					
					 ?>
					
						<div class="blogPost">
							<?php the_post_thumbnail( 'blogthumb' ); ?>
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="date"><?php the_time('F m, Y'); ?></span></h1>
							<p><?php echo limit_words(get_the_excerpt(), '35'); ?></p>
							<p><a href="<?php the_permalink(); ?>">Read more</a></p>
						</div>
				<?php
				}?>
<?php endwhile; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>