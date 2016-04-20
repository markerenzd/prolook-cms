<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * Template Name: Builder Uniform Page
 * @package Prolook
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				while ( have_posts() ) : the_post();
				
					if ( is_page( 'Football' ) ) {
						get_template_part( 'template-parts/content', 'football' );

					} elseif ( is_page( 'Baseball' )) {
						get_template_part( 'template-parts/content', 'baseball' );

					} elseif ( is_page( 'Softball' )) {
						get_template_part( 'template-parts/content', 'softball' );

					} elseif ( is_page( 'Baseball Men' )) {
						get_template_part( 'template-parts/gender/men/content', 'baseball-men' );

					} elseif ( is_page( 'Football Men' )) {
						get_template_part( 'template-parts/gender/men/content', 'football-men' );
						
					} elseif ( is_page( 'Basketball Men' )) {
						get_template_part( 'template-parts/gender/men/content', 'basketball-men' );

					} elseif ( is_page( 'Soccer Men' )) {
						get_template_part( 'template-parts/gender/men/content', 'soccer-men' );

					} elseif ( is_page( 'Hockey Men' )) {
						get_template_part( 'template-parts/gender/men/content', 'hockey-men' );

					} elseif ( is_page( 'Lacrosse Men' )) {
						get_template_part( 'template-parts/gender/men/content', 'lacrosse-men' );

					} elseif ( is_page( 'Softball Women' )) {
						get_template_part( 'template-parts/gender/women/content', 'softball-women' );
						
					} elseif ( is_page( 'Basketball Women' )) {
						get_template_part( 'template-parts/gender/women/content', 'basketball-women' );
						
					} elseif ( is_page( 'Football Women' )) {
						get_template_part( 'template-parts/gender/women/content', 'football-women' );

					} elseif ( is_page( 'Soccer Women' )) {	
						get_template_part( 'template-parts/gender/women/content', 'soccer-women' );
					
					} elseif ( is_page( 'Hockey Women' )) {	
						get_template_part( 'template-parts/gender/women/content', 'hockey-women' );

					} elseif ( is_page( 'Lacrosse Women' )) {	
						get_template_part( 'template-parts/gender/women/content', 'lacrosse-women' );

					} elseif ( is_page( 'Baseball Youth' )) {
						get_template_part( 'template-parts/gender/youth/content', 'baseball-youth' );
						
					} elseif ( is_page( 'Basketball Youth' )) {
						get_template_part( 'template-parts/gender/youth/content', 'basketball-youth' );
						
					} elseif ( is_page( 'Football Youth' )) {
						get_template_part( 'template-parts/gender/youth/content', 'football-youth' );

					} elseif ( is_page( 'Football Youth' )) {
						get_template_part( 'template-parts/gender/youth/content', 'football-youth' );

					} elseif ( is_page( 'Soccer Youth' )) {	
						get_template_part( 'template-parts/gender/youth/content', 'soccer-youth' );
					
					} elseif ( is_page( 'Hockey Youth' )) {	
						get_template_part( 'template-parts/gender/youth/content', 'hockey-youth' );

					} elseif ( is_page( 'Lacrosse Youth' )) {	
						get_template_part( 'template-parts/gender/youth/content', 'lacrosse-youth' );
					}

					echo "test";
				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
