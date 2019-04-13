<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package AccessPress Root
 */

get_header(); 
$single_page_layout = of_get_option('single_page_layout');
?>
	<div class="page_header_wrap clearfix">
		<div class="ak-container">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<?php accesspress_breadcrumbs() ?>
		</div>
	</div>

	<main id="main" class="site-main clearfix <?php echo esc_attr($single_page_layout); ?>">
		<?php if($single_page_layout == 'both-sidebar'): ?>
			<div id="primary-wrap" class="clearfix">
		<?php endif; ?>
		
		<div id="primary" class="content-area">

			<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
			<?php endwhile; // end of the loop. ?>
		</div><!-- #primary -->

		<?php 
		if($single_page_layout == 'both-sidebar' || $single_page_layout == 'left-sidebar'): 
			get_sidebar('left');
		endif; 
		?>

		<?php if($single_page_layout == 'both-sidebar'): ?>
			</div>
		<?php endif; ?>
		
		<?php 
		if($single_page_layout == 'both-sidebar' || $single_page_layout == 'right-sidebar'): 
			get_sidebar('right');
		endif; 
		?>
	</main>
	
<?php get_footer(); ?>
