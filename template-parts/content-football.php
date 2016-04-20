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
<!-- 
<?php

	$size = array( 'width' => 1600, 'height' => 400);
	$post_thumbnail_id = get_post_thumbnail_id($post->ID);
	$image = wp_get_attachment_image_src( $post_thumbnail_id);
	$image_default= get_bloginfo('template_directory')."/images/football-default.jpg";
	$thumb_url = str_replace('-150x150', '', $image[0]);	
		
		if ($image) {
			$background_banner =  bfi_thumb($thumb_url, $size);
		}
		else{
				
			$background_banner =  $image_default;
		}

?> -->

<?php if (is_mobile()): ?>
	<?php get_template_part( 'template-parts/mobile/content', 'football' ); ?>
<?php else: ?>
	<?php get_template_part( 'template-parts/responsive/content', 'football' ); ?>
<?php endif; ?>

