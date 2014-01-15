<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php
			/*
			 * Print the <title> tag based on what is being viewed.
			 * We filter the output of wp_title() a bit -- see
			 * boilerplate_filter_wp_title() in functions.php.
			 */
			wp_title( '|', true, 'right' );
		?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_url' ); ?>/css/site.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'template_directory'); ?>/css/orbit.css" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link href='http://fonts.googleapis.com/css?family=Arvo:regular,italic,bold,bolditalic' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo( 'template_directory'); ?>/js/jquery.orbit-1.2.3.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo( 'template_directory'); ?>/js/twitter-1.13.js"></script>
		<script type="text/javascript" src="<?php bloginfo( 'template_directory'); ?>/js/init.js"></script>
		
<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
?>
	</head>
	<body <?php body_class(); ?>>
		<header role="banner" id="topHeader">
			<hgroup>
				<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<nav id="access" role="navigation">
				  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
					<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
					<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #access -->
			</hgroup>
			
		</header>
		
		<?php if ( is_front_page() ) { ?>
			
			<script type="text/javascript">
				$(window).load(function() {
					$('#featured').orbit({
				  		'bullets' : true,		
			            'pauseOnHover': true,
			            'startClockOnMouseOut': true, 
			            'startClockOnMouseOutAfter': 1000,
			            'advanceSpeed': 6000
			 		});
				});
			</script>
			
		   	<div id="sliderContainer">
		   		<div class="contentWrapper">
			   		<div class="sliderWrapper">
					   	<div id="featured">
						     <?php 
				
								$args = array(
								'showposts' => 5,
								'meta_query' => array(
						                        array(
									'key' => 'isforslider',
									'value' => 'on'
									))
								);
								
								$myposts = get_posts($args);
								foreach($myposts as $post) {
									setup_postdata($post); ?>
							
								<div class="content">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'blogslider' ); ?>
										<div class="sliderDetails">
											<h1><?php the_title(); ?></h1>
											<h3><?php echo limit_words(get_the_excerpt(), '25'); ?> <span>read more</span></h3>
										</div>
									</a>
								</div>
				     
				     		<?php 
				     			}
				     		?>
						</div>
					</div>   		
		   		</div>
		   	</div>
		<?php } ?>
		
		<section id="content" role="main">
