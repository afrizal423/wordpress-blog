<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package AccessPress Root
 */

get_header(); 
$archive_page_layout = esc_attr(of_get_option('archive_page_layout'));
?>
	<div class="page_header_wrap clearfix">
		<div class="ak-container">
		<header class="entry-header">
			<?php
				the_archive_title( '<h1 class="entry-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<?php accesspress_breadcrumbs() ?>
		</div>
	</div>

	<main id="main" class="site-main clearfix <?php echo esc_attr($archive_page_layout); ?>">
		<?php if($archive_page_layout == 'both-sidebar'): ?>
			<div id="primary-wrap" class="clearfix">
		<?php endif; ?>
		
		<div id="primary" class="content-area">
			
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content' , 'blog' );
					?>

				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</div><!-- #primary -->

		<?php 
		if($archive_page_layout == 'both-sidebar' || $archive_page_layout == 'left-sidebar'): 
			get_sidebar('left');
		endif; 
		?>

		<?php if($archive_page_layout == 'both-sidebar'): ?>
			</div>
		<?php endif; ?>
		
		<?php 
		if($archive_page_layout == 'both-sidebar' || $archive_page_layout == 'right-sidebar'): 
			get_sidebar('right');
		endif; 
		?>
	</main><!-- #main -->
<?php get_footer(); ?>
