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

?>
<?php if (is_mobile()): ?>
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
					<?php the_content(); ?>
				</div>
			</div> 
		<?php echo "</div>"; ?>
	</header><!-- .entry-header -->	 

	<div id="item-wrapper" class="large-12 medium-12 columns" >
		<div id="baseball-uniform" class="container-sports small-up-2 wow fadeIn clearfix "> 
			<?php
		 	   $lacrosse_uniform = new WP_Query( array( 
		 		   		'post_type' 		=> 'lacrosse_uniform',
		 		   		'posts_per_page' 	=> -1, 
		 		   		'order' 			=> 'ASC',
		 		   		'tax_query' 		=> array(
				 		   					array (
								 		   			'taxonomy' => 'gender_uniform',
												    'field' => 'slug',
												    'terms' => 'youth'
					 		   						),
					   						),
		 		   		));		
				while ( $lacrosse_uniform ->have_posts() ) : $lacrosse_uniform ->the_post();
					$item_id = get_post_meta( $post->ID, '_cmb_item_id', true ); 
					$thumb_item = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					?>
					<div class="column">
						<div class="uniform-wrapper">
						<img src="<?php echo $thumb_item ?>" alt="<?php the_title(); ?>">
							<h2><?php echo get_the_title(); ?></h2>
							<p><?php echo get_the_content(); ?></p>
							<?php printf("<a href='http://alpha.qstrike.com/builder/0/%s'>GO BUILD</a>",$item_id); ?>
						</div>
						 
					</div>
				<?php endwhile; ?>
		</div>		 
	</div>

</article><!-- #post-## -->
<?php else: ?>
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
					<?php the_content(); ?>
				</div>
			</div> 
		<?php echo "</div>"; ?>
	</header><!-- .entry-header -->	 

	<div id="item-wrapper" class="large-12 medium-12 columns" >
		<div id="lacrosse_uniform" class="container-sports small-up-1 medium-up-2 large-up-3 wow fadeIn clearfix "> 
			<?php
		 	   $lacrosse_uniform = new WP_Query( array( 
		 		   		'post_type' 		=> 'lacrosse_uniform',
		 		   		'posts_per_page' 	=> -1, 
		 		   		'order' 			=> 'ASC',
		 		   		'tax_query' 		=> array(
				 		   					array (
								 		   			'taxonomy' => 'gender_uniform',
												    'field' => 'slug',
												    'terms' => 'youth'
					 		   						),
					   						),
		 		   		));	
				while ( $lacrosse_uniform ->have_posts() ) : $lacrosse_uniform ->the_post();
					$item_id = get_post_meta( $post->ID, '_cmb_item_id', true ); 
					$thumb_item = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					?>
					<div class="column">
						<div class="uniform-wrapper">
						<img src="<?php echo $thumb_item ?>" alt="<?php the_title(); ?>">
							<h2><?php echo get_the_title(); ?></h2>
							<p><?php echo get_the_content(); ?></p>
							<?php printf("<a href='http://alpha.qstrike.com/builder/0/%s'>GO BUILD</a>",$item_id); ?>
						</div>
						 
					</div>
				<?php endwhile; ?>
		</div>		 
	</div>

</article><!-- #post-## -->

<?php endif ?>	
