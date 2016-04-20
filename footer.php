<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prolook
 */

?>

	</div><!-- #content -->
<?php if( is_mobile() ): ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
		<div class="large-12 medium-12 columns">
			<div id="sports-section" class="large-4 medium-4 columns">
				<?php dynamic_sidebar( 'sports-1' ); ?>
			</div>

			<div class="large-8 medium-8 columns">
				<div class="large-12 medium-12 columns">
					<?php dynamic_sidebar( 'quicklinks-1' ); ?>
				</div>
			</div>		
		</div>
	  
	  <div id="social-media">
		<div class="large-12 medium-12 columns">
			<?php dynamic_sidebar( 'social-1' ); ?>
		</div>		
	  </div>

	  	<div id="copyrights">                
			<div class="large-12 medium-12 columns">
				<span id="footer-text">Copyright <?php echo date("Y"); ?> <?php echo bloginfo('name'); ?></span>
			</div>		
	  </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
<?php elseif( is_tablet() ): ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
		<div class="tab-section-1 large-12 columns">
			<div id="sports-section" class="large-4 columns">
				<?php dynamic_sidebar( 'sports-1' ); ?>
			</div>

			<div class="large-8 olumns">
				<div class="tab-section-2 large-12 columns">
					<?php dynamic_sidebar( 'quicklinks-1' ); ?>
				</div>
			</div>		
		</div>
	  
	  <div id="social-media">
		<div class="large-12columns">
			<?php dynamic_sidebar( 'social-1' ); ?>
		</div>		
	  </div>

	  	<div id="copyrights">                
			<div class="large-12 columns">
				<span id="footer-text">Copyright <?php echo date("Y"); ?> <?php echo bloginfo('name'); ?></span>
			</div>		
	  </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
<?php else: ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
		<div class="large-12 medium-12 columns">
			<div id="sports-section" class="large-4 medium-4 columns">
				<?php dynamic_sidebar( 'sports-1' ); ?>
			</div>

			<div class="large-8 medium-8 columns">
				<div class="large-12 medium-12 columns">
					<?php dynamic_sidebar( 'quicklinks-1' ); ?>
				</div>
			</div>		
		</div>
	  
	  <div id="social-media">
		<div class="large-12 medium-12 columns">
			<?php dynamic_sidebar( 'social-1' ); ?>
		</div>		
	  </div>

	  	<div id="copyrights">                
			<div class="large-12 medium-12 columns">
				<span id="footer-text">Copyright <?php echo date("Y"); ?> <?php echo bloginfo('name'); ?></span>
			</div>		
	  </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>


