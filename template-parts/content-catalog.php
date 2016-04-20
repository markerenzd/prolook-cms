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

	$size = array( 'width' => 1600, 'height' => 300);
	$post_thumbnail_id = get_post_thumbnail_id($post->ID);
	$image = wp_get_attachment_image_src( $post_thumbnail_id);
	$image_default= get_bloginfo('template_directory')."/images/football-default.jpg";
	$thumb_url = str_replace('-150x150', '', $image[0]);
	$hours = get_post_meta( $post->ID, 'image', true );

			
		if ($image) {
			$background_banner =  bfi_thumb($thumb_url, $size);
		}
		else{
				
			$background_banner =  $image_default;
		}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php echo "<div class='banner-wrapper' style='background: url(".$background_banner.")'>" ;?>
			<div class="inner-content-wrapper">
				<div class="entry-title">
					<div class="large-12 medium-12 columns">
						<?php
							 echo "<h1>".get_the_title()."</h1>"; 
						 ?>
					</div>
				</div>
				<div id="entry-content-wrapper" class="large-12 medium-12 columns">
					
				</div>
			</div> 
		<?php echo "</div>"; ?>
	</header><!-- .entry-header -->	

	<div id="catalog-wrapper" class="large-12 medium-12 columns">
		<?php the_content(); ?>
	</div>

</article><!-- #post-## 
