<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package AccessPress Root
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?> 
</head>

<body <?php body_class(); ?>>
<div id="outer-wrap">
<div id="inner-wrap"> 
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="ak-container">
			<div id="site-branding" class="clearfix">
			<?php if(of_get_option('logo_setting') == 'image' || of_get_option('logo_setting') == 'image_text') : 
				if(of_get_option('logo')): ?>
				<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(of_get_option('logo')); ?>" alt="<?php bloginfo( 'name' ); ?>"/> </a> 
				<?php 
				endif;
			endif;
			if(of_get_option('logo_setting') == NUll || of_get_option('logo_setting') == 'text' || of_get_option('logo_setting') == 'image_text'): ?>
				<a class="site-text" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</a>
			<?php endif; ?>	
			</div><!-- .site-branding -->

			<div class="right-header">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<a class="menu-toggle"><?php esc_html_e( 'Menu', 'accesspress-root' ); ?></a>
					<?php wp_nav_menu( array( 
					'theme_location' => 'primary',
					'container'       => false, 
					) ); ?>
				</nav><!-- #site-navigation -->

				<div class="search-icon">
					<a href="javascript:void(0)"><i class="fa fa-search"></i></a>

					<div class="search-box">
						<div class="close"> &times; </div>
						<?php get_search_form(); ?>
					</div>
				</div> <!--  search-icon-->
			</div> <!-- right-header -->
			<div id="top" class="hide"> 
				<div class="block">
					<a href="#nav" id="nav-open-btn" class="nav-btn">
						<span class="nav-row"> </span>
						<span class="nav-row"> </span>
						<span class="nav-row"> </span>
					</a>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<nav id="nav" role="navigation" class="hide"> 
		<div class="block">
			<?php wp_nav_menu( array( 
			'theme_location' => 'primary',
			'container'       => false, 
			) ); ?>
			<a href="#top" id="nav-close-btn" class="close-btn">&times;</a>
		</div>
	</nav><!-- #site-navigation -->

	<div id="content" class="site-content">
	<?php 
	if(is_front_page()) :
		do_action('accesspress_bxslider'); 
	endif;
	?>
