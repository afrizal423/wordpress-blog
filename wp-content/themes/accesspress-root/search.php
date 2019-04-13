<?php
/**
 * The template for displaying search results pages.
 *
 * @package AccessPress Root
 */

get_header(); ?>
<div class="page_header_wrap clearfix">
	<div class="ak-container">
		<header class="entry-header">
			<h1 class="entry-title"><?php /* translators: %s : search keyword */ printf( esc_html__( 'Search Results for: %s', 'accesspress-root' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</header><!-- .page-header -->

		<?php accesspress_breadcrumbs() ?>
	</div>
</div>

<main id="main" class="site-main clearfix">
	<div id="primary" class="content-area">
		

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
	
	</div><!-- #primary -->

	<?php get_sidebar('right'); ?>
</main><!-- #main -->
<?php get_footer(); ?>
