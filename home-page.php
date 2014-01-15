<?php
/**
 * Template Name: Home Page
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>

<div id="slider">
 
</div>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div id="mainContainer">
	
		<div id="latestNews" class="wrap">
			<h1 class="title">KGB News</h1>
			
			<?php
	        	
	        	$args=array(
	        	'post_type' => 'post',
				'showposts' => 5
				);
				
				$myposts = get_posts($args);
				foreach($myposts as $post) {
					setup_postdata($post);
					 ?>
					
						<div class="newsPost">
							<?php the_post_thumbnail( 'blogthumb' ); ?>
							
							<p class="date"><?php the_time('F d, Y'); ?></p>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php echo limit_words(get_the_excerpt(), '35'); ?> <a href="<?php the_permalink(); ?>">Read more</a></p>
						</div>
					
					<?php			
				}
				?>
		
		</div>
		
		<div class="rightContainer">
		
		<div id="latestVideo" class="wrap">
			<h1 class="title">KGB Video</h1>
			
			<?php 
				
					$args = array(
					'showposts' => 2,
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
		
					<div class="videoPost">
					<iframe width="314" height="196" src="http://www.youtube.com/embed/<?php echo $videolink; ?>" frameborder="0" allowfullscreen></iframe>
					<br><br>
						<h3><?php the_title(); ?></h3>
						<p><?php echo $post->post_content; ?></p>
					</div>
	     
	     		<?php 
	     			}
	     		?>
			<p><a href="">View other videos</a></p>
			</div>
			
			<div id="twitterContainer" class="wrap">
				<h1 class="title">KGB Twitter</h1>
				<div id="twitterFeed"></div>
			</div>
		
		</div>
		
		<!--div id="mapContainer" class="wrap">
			<h1 class="title">Where are the KGB</h1>
			test
		</div-->

	</div>
<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>