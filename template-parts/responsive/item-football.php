<?php 
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