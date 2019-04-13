<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package AccessPress Root
 */

get_header(); ?>
<div class="page_header_wrap clearfix">
	<div class="ak-container">
	<header class="entry-header">
		<h1 class="entry-title"> 404 error </h1>
	</header><!-- .entry-header -->
	<?php accesspress_breadcrumbs() ?>
	</div>
</div>

<main id="main" class="site-main clearfix">
	<div id="primary" class="content-area">
		<section class="error-404 not-found">
			<div class="page-content">
				<div class="page-404-wrap clearfix">
					<span class="oops"><?php esc_html_e('Oops!!','accesspress-root'); ?></span>
					<div class="error-num"> 
					<span class="num"><?php esc_html_e('404','accesspress-root'); ?></span>
					<span class="not_found"><?php esc_html_e('Page Not Found','accesspress-root'); ?></span>
					</div> 
				</div>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->
	</div><!-- #primary -->
</main><!-- #main -->

<?php get_footer(); ?>
