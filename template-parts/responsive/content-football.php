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
		<?php
			$categories = array('post_type' => 'football_uniform','orderby' => 'name','order' => 'ASC');
			$categories = get_categories($categories); 
		?>
			<div id="filter-menu">
				<ul id="category-menu">
						<li id="btn-all">
					   		 <a href="#">All</a>
					    </li>
				    <?php foreach ( $categories as $cat ) : ?>
					    <li id="cat-<?php echo $cat->term_id ?>" class="class-btn">
					   		 <a class="<?php echo $cat->slug; ?> ajax" data-cat-id="<?php echo $cat->term_id; ?> " href="#"><?php echo $cat->name; ?></a>
					    </li>
				    <?php endforeach; ?>
				</ul>
			</div>


		<div id="footaball-uniform-all" class="container-sports small-up-1 medium-up-2 large-up-3 wow fadeIn clearfix ">
			<!-- <?php 
				 $football_item = new WP_Query( array( 'post_type' => 'football_uniform','posts_per_page' => 100, 'order' => 'ASC'));
			 ?>

			 <?php if( $football_item->have_posts() ): ?>
			 	
				<?php while( $football_item ->have_posts() ) : $football_item ->the_post();?>

					<?php $thumb_item = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

						<?php get_template_part( 'template-parts/responsive/item', 'football' ); ?>

				<?php endwhile; ?>

			 <?php endif; ?>
 -->
		</div>
<!-- 
		<div id="footaball-uniform-filter" class="container-sports small-up-1 medium-up-2 large-up-3 fadeIn clearfix ">

			<div id="loading-image" style="display: none;">
				<img src="<?php echo get_bloginfo( 'template_directory' ) ?>/images/loading.gif" alt="loading">
			</div>
			<div id="category-post-content">
				

			</div>	
		</div>
 -->
	</div>
</div>
</article><!-- #post-## -->