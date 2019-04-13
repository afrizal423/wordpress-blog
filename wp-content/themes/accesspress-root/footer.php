<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package AccessPress Root
 */
?>

	</div><!-- #content -->

	<footer id="colophon">
		<div id="top-footer" class="clearfix columns-<?php echo esc_attr(accesspress_footer_count()); ?>">
			<div class="ak-container">
			<div class="top-footer-wrap clearfix">
			<?php if(is_active_sidebar('footer-1')): ?>
				<div class="top-footer-block">
					<?php dynamic_sidebar('footer-1') ?>
				</div>
			<?php endif; ?>
			
			<?php if(is_active_sidebar('footer-2')): ?>
				<div class="top-footer-block">
					<?php dynamic_sidebar('footer-2') ?>
				</div>
			<?php endif; ?>

			<?php if(is_active_sidebar('footer-3')): ?>
				<div class="top-footer-block">
					<?php dynamic_sidebar('footer-3') ?>
				</div>
			<?php endif; ?>

			<?php if(is_active_sidebar('footer-4')): ?>
				<div class="top-footer-block">
					<?php dynamic_sidebar('footer-4') ?>
				</div>
			<?php endif; ?>
			</div>
			</div>
		</div> <!-- top footer end -->

		<?php if(has_nav_menu('footer')){ ?>
		<div id="middle-footer">
			<div class="ak-container">
				<div class="footer-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'footer', 'depth' => -1, 'fallback_cb' => false ) ); ?>
				</div>
			</div>
		</div> <!-- middle-footr end -->
		<?php } ?>

		<div id="bottom-footer" class="clearfix">
			<div class="ak-container">
				<div class="copyright"><?php esc_html_e('WordPress Theme: ', 'accesspress-root'); ?> <a title="AccessPress Themes" href="<?php echo esc_url('http://accesspressthemes.com/wordpress-themes/accesspress-root'); ?>">AccessPress Root</a>  by AccessPress Themes </div>
				<ul class="social-icon">
					<?php do_action('accesspress_social'); ?>
				</ul>
			</div>
		</div> <!-- bottom footer end -->
	</footer><!-- #colophon --> 
</div><!-- #page -->
</div> <!-- Inner wrap -->
</div> <!-- Outer wrap -->
<?php wp_footer(); ?>

</body>
</html>