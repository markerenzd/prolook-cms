<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Prolook
 */
global $data;
global $post;
?>
<?php 
	
	$google_map_code = get_post_meta( $post->ID, '_cmb_google_map', true );
	$address 		 = get_post_meta( $post->ID, '_cmb_address_text', true );
	$pobox 			 = get_post_meta( $post->ID, '_cmb_po_box', true );
	$email 			 = get_post_meta( $post->ID, '_cmb_mail', true );
	$phone 			 = get_post_meta( $post->ID, '_cmb_phone', true );
	$email 			 = get_post_meta( $post->ID, '_cmb_email', true );
	$day 			 = get_post_meta( $post->ID, '_cmb_day', true );
	$hours 			 = get_post_meta( $post->ID, '_cmb_hours', true );


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div id="goole-map" class="large-12 medium-12 columns">
			<?php echo $google_map_code; ?>
		</div>
	
	</header><!-- .entry-header -->	 

	<div id="entry-content-wrapper" class="large-12 medium-12 columns">
		<div class="large-10 medium-10 large-centered medium-centered columns clearfix">
			<div class="large-12 columns">
				<div id="location" class="contact-details large-4 medium-4 columns">
					<h2>Our Location</h2>
						<p><i class="fa fa-map-marker"></i><span><?php echo $address ?></span></p>
						<p><i class="fa fa-home"></i><span><?php echo $pobox ?></span></p>
				</div>
				<div id="contact-us" class="contact-details large-4 medium-4 columns">
					<h2>Contact Us</h2>
						<p><i class="fa fa-envelope"></i><span><?php echo $email ?></span></p>
						<p><i class="fa fa-phone"></i><span><?php echo $phone ?></span></p>
						<p><i class="fa fa-globe"></i><span><?php echo $email ?></span></p>
				</div>
				<div id="opening" class="contact-details large-4 medium-4 columns">
					<h2>Opening Hours</h2>
						<p><?php echo $day ?><span><?php echo $hours ?></span></p>	
				</div>
			</div>
		</div>
	</div>

	<div id="form-wrapper" class="clearfix" >
		<div class="contact-bg large-12 medium-12 columns clearfix" style="background:url('<?php echo get_bloginfo( 'template_url'); ?>/images/contact-form.jpg');">
			<div class="lager-6 medium-6 large-centered medium-centered columns">
				<?php echo do_shortcode( '[contact-form-7 id="121" title="Contact-Page"]' ); ?>
			</div>
		</div>
	</div>

</article><!-- #post-## -->

