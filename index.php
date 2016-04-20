<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Prolook
 */
global $data;
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section id="home" class="tt-fullHeight" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2" style="background:url(<?php echo $data[ 'home_media' ]; ?>) no-repeat center center; ">

				<?php get_template_part( 'template-parts/content', 'home' ); ?>

			</section>
		</main><!-- #main -->

	</div><!-- #primary -->

<?php get_footer();?>
