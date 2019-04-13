<?php
/**
 * The template for displaying search forms in Catch Kathmandu
 *
 * @package AccesspressLite
 */
 ?>
	<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<input type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" class="search-field" placeholder="<?php esc_html_e('Type something and hit Enter to begin your search...','accesspress-root') ?>" />
        <button type="submit" name="submit" class="searchsubmit"><i class="fa fa-search"></i></button> 
	</form>
