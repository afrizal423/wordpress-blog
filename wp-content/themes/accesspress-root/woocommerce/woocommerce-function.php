<?php
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
add_action('woocommerce_before_main_content','woocommerce_page_start',10);
add_action('woocommerce_after_main_content','woocommerce_page_end',10);

function woocommerce_page_start(){
    echo '<div class="page_header_wrap clearfix">';
		echo '<div class="ak-container">';
		echo '<header class="entry-header">';
			the_title( '<h1 class="entry-title">', '</h1>' );
		echo '</header>';

		accesspress_breadcrumbs();
    echo '</div>';
	echo '</div>';
    echo '<main id="main" class="site-main clearfix right-sidebar">';
	       echo '<div id="primary" class="content-area">';
}
function woocommerce_page_end(){
                echo '</div>';
        get_sidebar('right');
    echo '</main>';
}