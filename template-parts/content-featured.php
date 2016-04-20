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

<section id="featured-slider" class="clearfix">
	<?php 

		$featured_slider = $data[ 'featured_slider' ];
	?>

	<div class="flexslider">
		<ul class="slides">
		<?php if ( is_array($featured_slider) || is_object($featured_slider) ):?>
			<?php 
			  foreach ( $featured_slider as $slider) :?>
				  <li>
					<div class="tt-fullHeight slider-bg" style="background:url('<?php echo $slider[ 'url' ]; ?>')no-repeat center;">
					  	<div class="intro">
					  		<div class="intro-sub">
					  			<span><?php echo $data[ 'featured_heading' ]; ?></span>
					  		</div>
					  			<p><?php echo $data[ 'featured_text' ]; ?></p>
					  			<a href="<?php echo $data[ 'builder_link' ]; ?>" class="hvr-sweep-to-right">Build Now</a>
					  	</div>
				  	</div>
				  </li>
			<?php endforeach; ?>
		<?php endif; ?>
		</ul>
	</div>
	
</section>

<?php if ( is_mobile() ): ?>
	<section id="sports-wrapper" class="clearfix">
		<div class="large-12 columns">
			<div class="large-10 large-centered medium-centered columns">
				<div id="container-sports" class="small-up-1 clearfix">
					<?php
					   $content = get_the_content();
			 		   $sports_item = new WP_Query( array( 'post_type' => 'featured','posts_per_page' => 100, 'order' => 'ASC'));	
						while ( $sports_item ->have_posts() ) : $sports_item ->the_post();
							$item_id = get_post_meta( $post->ID, '_cmb_item_id', true ); 
							$thumb_item = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							?>
							<div class="column">
								<div class="sports-item-wrapper">
								<img src="<?php echo $thumb_item ?>" alt="<?php the_title(); ?>">
									<span><?php echo get_the_title(); ?></span>
									<p><?php echo get_the_excerpt();  ?></p>
								<div class="sports-btn">
									<a href="<?php echo get_permalink(); ?>">See Sport</a>
									<a href="#">Customize</a>
								</div>	
								</div>
							</div>
						<?php endwhile; ?>
				</div>
			</div>	
		</div>
	</section>
<?php elseif ( is_tablet() ): ?>
	<section id="sports-wrapper" class="clearfix">
		<div class="large-12 medium-12 columns">
			<div class="large-10 medium-centered columns">
				<div id="container-sports" class="small-up-2 clearfix">
					<?php
					   $content = get_the_content();
			 		   $sports_item = new WP_Query( array( 'post_type' => 'featured','posts_per_page' => 100, 'order' => 'ASC'));	
						while ( $sports_item ->have_posts() ) : $sports_item ->the_post();
							$item_id = get_post_meta( $post->ID, '_cmb_item_id', true ); 
							$thumb_item = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							?>
							<div class="column">
								<div class="sports-item-wrapper">
								<img src="<?php echo $thumb_item ?>" alt="<?php the_title(); ?>">
									<span><?php echo get_the_title(); ?></span>
									<p><?php echo get_the_excerpt();  ?></p>
								<div class="sports-btn">
									<a href="<?php echo get_permalink(); ?>">See Sport</a>
									<a href="#">Customize</a>
								</div>	
								</div>
							</div>
						<?php endwhile; ?>
				</div>
			</div>	
		</div>
	</section>
<?php else: ?>
	<section id="sports-wrapper" class="clearfix">
		<div class="large-12 medium-12 columns">
			<div class="large-10 medium-10 large-centered medium-centered columns">
				<div id="container-sports" class="small-up-1 medium-up-2 large-up-2 clearfix">
					<?php
					   $content = get_the_content();
			 		   $sports_item = new WP_Query( array( 'post_type' => 'featured','posts_per_page' => 100, 'order' => 'ASC'));	
						while ( $sports_item ->have_posts() ) : $sports_item ->the_post();
							$item_id = get_post_meta( $post->ID, '_cmb_item_id', true ); 
							$thumb_item = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							?>
							<div class="column">
								<div class="sports-item-wrapper">
								<img src="<?php echo $thumb_item ?>" alt="<?php the_title(); ?>">
									<span><?php echo get_the_title(); ?></span>
									<p><?php echo get_the_excerpt();  ?></p>
								<div class="sports-btn">
									<a href="<?php echo get_permalink(); ?>">See Sport</a>
									<a href="#">Customize</a>
								</div>	
								</div>
							</div>
						<?php endwhile; ?>
				</div>
			</div>	
		</div>
	</section>
<?php endif; ?>