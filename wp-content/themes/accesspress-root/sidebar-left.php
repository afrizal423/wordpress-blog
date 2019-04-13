<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package AccessPress Root
 */

if ( ! is_active_sidebar( 'sidebar-left' ) ) {
	return;
}
?>

<div id="secondary" class="secondary-left">
	<?php dynamic_sidebar( 'sidebar-left' ); ?>
</div><!-- #secondary -->
