<?php
/**
 * The header for mobile devices 
 **/
?>
<header id="masthead" class="site-header mobile" role="banner">
	
	<div id="mastheader-wrapper" class="large-12 medium-12 columns clearfix">		
		<div class="small-3 columns">
			<div class="site-branding">
				<div class="logo-wrapper">
					<a href="<?php bloginfo( 'url' )?>">
						<img src="<?php bloginfo( 'template_url' )?>/images/prolook-logo.png" alt="ProLook Logo">
					</a>
				</div>
			</div><!-- .site-branding -->
		</div>

		<div class="small-9 columns">
			<div id="nav-mobile"class="navTrigger">
			  <i></i><i></i><i></i>
			</div>
				<?php 
					wp_nav_menu( array(
					    'menu'           => 'Mobile Menu', // Do not fall back to first non-empty menu.
					    'theme_location' => '__no_such_location',
					    'menu_id' => 'mobile-menu' 
					) );
				 ?> 
		</div>
	</div>	
</header><!-- #masthead -->

		

