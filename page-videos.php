<?php
/**
 * Template Name: videos
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
	<h1 class="pageTitle">KGB Videos</h1>
	
	<?php 
				
	$args = array(
	'showposts' => 20,
	'post_type' => 'video'
	);
	
	$myposts = get_posts($args);
	foreach($myposts as $post) {
		setup_postdata($post); 
		
		$custom_fields = get_post_custom($post->ID);
    $my_custom_field = $custom_fields['videolink'];
    foreach ( $my_custom_field as $key => $value ){
	    if ($value != ''){
	    	$videolink = $value;
	    	}
	}
		
		?>

	<div class="videoPost blogPost">
	<iframe width="314" height="196" src="http://www.youtube.com/embed/<?php echo $videolink; ?>" frameborder="0" allowfullscreen></iframe>
	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><span class="date"><?php the_time('F m, Y'); ?></span></h1>
	<p><?php echo limit_words(get_the_excerpt(), '35'); ?></p>
	<p><a href="<?php the_permalink(); ?>">Read more</a></p>
	</div>

	<?php 
		}
	?>
	
	
				
<?php endwhile; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>