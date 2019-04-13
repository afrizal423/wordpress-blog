<?php
/**
 * The template for displaying all single posts.
 *
 * @package AccessPress Root
 */

get_header(); 
$single_post_layout = esc_attr(of_get_option('single_post_layout'));
?>

	<div class="page_header_wrap clearfix">
		<div class="ak-container">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<div class="entry-meta">
			<?php accesspress_root_posted_on(); ?>
			</div>
		</header><!-- .entry-header -->

		<?php accesspress_breadcrumbs() ?>
		</div>
	</div>

	<main id="main" class="site-main clearfix <?php echo esc_attr($single_post_layout); ?>">
	<?php if($single_post_layout == 'both-sidebar'): ?>
		<div id="primary-wrap" class="clearfix">
	<?php endif; ?>

	<div id="primary" class="content-area">

		<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

		<?php the_post_navigation(); ?>
		
		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
		
		<?php endwhile; // end of the loop. ?>
	</div><!-- #primary -->

	<?php 
	if($single_post_layout == 'both-sidebar' || $single_post_layout == 'left-sidebar'): 
		get_sidebar('left');
	endif; 
	?>

	<?php if($single_post_layout == 'both-sidebar'): ?>
		</div>
	<?php endif; ?>
	
	<?php 
	if($single_post_layout == 'both-sidebar' || $single_post_layout == 'right-sidebar'): 
		get_sidebar('right');
	endif; 
	?>
	</main><!-- #main -->

<?php get_footer(); ?>
