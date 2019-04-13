<?php
/**
 * @package AccessPress Root
 */
?>

<?php 
$blog_post_layout = of_get_option('blog_post_layout');
if(has_post_thumbnail()):
switch ($blog_post_layout) {
	case 'blog_layout1':
		$image_size = 'accesspress-root-blog-big-thumbnail';
		break;

	case 'blog_layout2':
		$image_size = 'accesspress-root-service-thumbnail';
		break;

	case 'blog_layout3':
		$image_size = 'accesspress-root-service-thumbnail';
		break;

	case 'blog_layout4':
		$image_size = 'accesspress-root-blog-big-thumbnail';
		break;
	
	default:
		$image_size = 'accesspress-root-blog-big-thumbnail';
		break;
}

$image = wp_get_attachment_image_src(get_post_thumbnail_id(),$image_size);
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php accesspress_root_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if(has_post_thumbnail()):  ?>
	<div class="entry-thumbanil">
	<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>"></a>
	</div>
	<?php endif; ?>

	<div class="entry-content">

		<?php 
		if($blog_post_layout == 'blog_layout4'):
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'accesspress-root' )  );
		else:
			echo esc_html(accesspress_letter_count(get_the_content(),'460'));
		endif;
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'accesspress-root' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php accesspress_root_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->