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
	 	$categories = array( 
	 		   		'post_type' 		=> 'football_uniform',
	 		   		'posts_per_page' 	=> -1, 
	 		   		'order' 			=> 'ASC',
	 		   		);	
		$categories = get_categories($categories);
	?>
<div id="filter-menu">
	<ul id="category-menu" class="filter-tags">
			<li><a class="active" href="#" data-group="all">All</a></li>
		<?php foreach ( $categories as $cat):?>
			<li><a href="#" data-group="<?php echo $cat->category_nicename ?>"><?php echo $cat->cat_name ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>

<div class="large-12 columns clearfix">
	<div id="grid" class="container-sports small-up-1 medium-up-2 large-up-3">
		<?php 
 		   $football_item = new WP_Query( array( 
 		   		'post_type' 		=> 'football_uniform',
 		   		'posts_per_page' 	=> -1, 
 		   		'order' 			=> 'ASC',
 		   		));	
		 ?>

		 <?php if( $football_item->have_posts() ): ?>
				
				<?php while( $football_item ->have_posts() ) : $football_item ->the_post();?>
				
				<?php $thumb_item = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
				 	  $cat = get_the_category(); ?>

				 	  <?php foreach ( $cat as $cats): ?>
				 	  	<?php $c = $cats->category_nicename; ?>
							
							<div class="column picture-item" data-groups='["all", "<?php echo "$c"; ?>"]'>
								<div class="uniform-wrapper">
									<img src="<?php echo $thumb_item ?>" alt="<?php the_title(); ?>">
										<h2><?php echo get_the_title(); ?></h2>
										<p><?php echo get_the_content(); ?></p>
									<?php printf("<a href='http://alpha.qstrike.com/builder/0/%s'>GO BUILD</a>",$item_id); ?>
								</div>
					 		</div>	

				 	  <?php endforeach; ?>	

				<?php endwhile; ?>

		 <?php endif; ?>
		 
	</div>
</div>


		</div>

</article><!-- #post-## -->