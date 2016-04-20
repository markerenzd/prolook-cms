<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prolook
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php 
	if (is_mobile()): 
		echo "<meta name='viewport' content='width=420' />";
	elseif (is_tablet()): 
		echo "<meta name='viewport' content='width=767' />";
	else:
		echo "<meta name='viewport' content='width=device-width, initial-scale=1'/>";
	endif;
	
?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

<?php if (is_mobile()): ?>
	<?php get_template_part( 'template-parts/mobile/content', 'header' ); ?>

<?php elseif (is_tablet()): ?>
	<?php get_template_part( 'template-parts/tablet/content', 'header' ); ?>

<?php else: ?>
	<header id="masthead" class="site-header" role="banner">
		<div id="mastheader-wrapper" class="large-12 medium columns clearfix">		
			<div class="large-2 medium-2 columns">
				<div class="site-branding">
					<div class="logo-wrapper">
						<a href="<?php bloginfo( 'url' )?>"><img src="<?php bloginfo( 'template_url' )?>/images/prolook-logo.png" alt="ProLook Logo"></a>
					</div>
				</div><!-- .site-branding -->
			</div>
				
			<div class="large-6 medium-6 columns">
				<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu( array( 
							'theme_location' => 'primary', 
							'menu_id' => 'primary-menu' 
							) ); 
						?>			
				</nav><!-- #site-navigation -->
			</div>
			
			<div class="large-4 medium-4 columns">
				<div class="search-wrapper">
					<?php get_template_part( 'template-parts/searchform', 'none' ); ?>
				</div>		
			</div>
		</div>	
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="nav-backdrop"></div>

<?php endif; ?>





