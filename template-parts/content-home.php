<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Prolook
 */
global $data;
?>




<?php if (is_mobile()): ?>
	<div class="intro">
		<?php 
			printf("<div class='intro-sub mobile'>%s</div>", $data[ 'slider_home' ]);
			printf("<a href='%s'>Shop Now</a>", $data[ 'link_slider' ] );
		?>
	</div>
<?php elseif (is_tablet()): ?>
	<div class="intro">
		<?php 
			printf("<div class='intro-sub'>%s</div>", $data[ 'slider_home' ]);
			printf("<a href='%s'>Shop Now</a>", $data[ 'link_slider' ] );
		?>
	</div>
<?php else: ?>
	<div class="intro">
		<?php 
			printf("<div class='intro-sub'>%s</div>", $data[ 'slider_home' ]);
			printf("<a href='%s'>Shop Now</a>", $data[ 'link_slider' ] );
		?>
	</div>

<?php endif; ?>