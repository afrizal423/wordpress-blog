<?php
/**
 * Template Name: Home Template
 *
 * @package AccessPress Root
 */

get_header(); ?>

<?php 
	$home_order = of_get_option('home_order');
	if(empty($home_order)):
		$home_order = array(
			'text_slider' => '1', 
			'service_block' => '2',
			'call_to_action' => '3',
			'feature_block' => '4',
			'latest_post_block' => '5',
			'project_block' => '6',
	    	'testimonial_slider' => '7'
			);
	endif;

	foreach ($home_order as $key => $value) {
		if($key == 'text_slider'){ ?>
			<?php if(of_get_option('text_slider_cat') > 0): ?>
			<section id="message-slider" class="message-slides clearfix">
				<div class="ak-container">
					<div class="text-slider">
					<?php 
					$args = array(
						'cat' => of_get_option('text_slider_cat'),
						'posts_per_page' => 5 
						);
					$query = new WP_Query($args);
					if($query -> have_posts()):
						while($query->have_posts()):
							$query->the_post();
						?>
						<div class="slides">
							<h1 class="message-title">
								<?php the_title(); ?>
							</h1>
							<div class="message-content">
								<?php the_content(); ?>
							</div>
						</div>
						<?php
						endwhile;
					endif;
					wp_reset_postdata();
					?>
					</div> <!-- bx-wrapper -->
				</div>
			</section> <!-- message-slider end -->
			<?php endif; ?>
		<?php
		}elseif($key == 'service_block'){ ?>
			<section id="service-section" class="clearfix">
				<div class="ak-container">
                <?php if(of_get_option('service_title') || of_get_option('service_desc') ): ?>
					<div class="section-title-wrap">
						<?php if(of_get_option('service_title')): ?>
							<h1 class="main-title"><?php echo esc_attr(of_get_option('service_title')); ?></h1>
						<?php endif; ?>

						<?php if(of_get_option('service_desc')): ?>
						<div class="sub-desc">
							<?php echo wp_kses_post(of_get_option('service_desc')); ?>
						</div>
						<?php endif; ?>
					</div>
                    <?php endif; ?>

					<?php 
					$service_array = array(of_get_option('service1') , of_get_option('service2'), of_get_option('service3'), of_get_option('service4'));
					$args = array(
						'post_type' => 'page',
						'post__in' => $service_array,
						'posts_per_page' => 4, 
						'orderby' => 'post__in'
						);

					$query = new WP_Query($args);					
					if($query->have_posts()): ?>
					<div class="service-block-wrap clearfix">
					<?php
						while($query->have_posts()):
							$query->the_post();
						?>
							<div class="service-block">
								<div class="service-image">
									<?php if(has_post_thumbnail()):
									$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'accesspress-root-service-thumbnail' );
									?>
									<a href="<?php the_permalink(); ?>" class="image-wrap"> 
									<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
									</a>
									<div class="service-overlay">
										<a href="<?php the_permalink(); ?>"> <i class="fa fa-external-link"></i> </a>
									</div>
									<?php
									endif; ?>
								</div>
								<div class="service-content">
									<h1 class="service-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
									<div class="service-desc"><?php echo esc_html(accesspress_letter_count(get_the_content(),'120')); ?></div>
								</div>
							</div>
					<?php
						endwhile; ?>
					</div> <!-- service-block-wrap end -->
					<?php	
					endif;
					wp_reset_postdata();	
					?>
				</div>
			</section> <!--service section end -->	
		<?php 
		}elseif($key == 'call_to_action'){ ?>
			<?php 
			$call_to_action_title = of_get_option('call_to_action_title');
			$call_to_action_desc = of_get_option('call_to_action_desc');
			$call_to_action_button_text = of_get_option('call_to_action_button_text');
			$call_to_action_link = of_get_option('call_to_action_link');
			if(!empty($call_to_action_title) || !empty($call_to_action_desc) || !empty($call_to_action_button_text)) :
				$class = (!empty($call_to_action_button_text)) ? "" : "full-width"; 
			?>
			<section id="cta-banner" class="clearfix">
				<div class="ak-container">
					<div class="cta-banner-text <?php echo esc_attr($class); ?>">
						<h1 class="cta-banner-title color-bold"><?php echo esc_attr($call_to_action_title); ?></h1>
						<div class="cta-banner-desc"><?php echo wp_kses_post($call_to_action_desc); ?></div>
					</div>

					<?php if(!empty($call_to_action_button_text)): ?>
					<div class="cta-banner-btn">
						<a href="<?php echo esc_url($call_to_action_link); ?>"><?php echo esc_attr($call_to_action_button_text); ?></a>
					</div>
					<?php endif; ?>
				</div>
			</section> <!-- cta-simple -->
			<?php 
			endif;
			?>
		<?php
		}elseif($key == 'feature_block'){ ?>
			<section id="features" class="clearfix">
				<div class="ak-container">
                <?php if(of_get_option('feature_title') || of_get_option('feature_desc')): ?>
					<div class="section-title-wrap">
						<?php if(of_get_option('feature_title')): ?>
							<h1 class="main-title"><?php echo esc_attr(of_get_option('feature_title')); ?></h1>
						<?php endif; ?>
						<?php if(of_get_option('feature_desc')): ?>
						<div class="sub-desc">
							<?php echo wp_kses_post(of_get_option('feature_desc')); ?>
						</div>
						<?php endif; ?>
					</div>
                <?php endif; ?>

					<?php 
					$feature_array = array(of_get_option('feature1') , of_get_option('feature2'), of_get_option('feature3'), of_get_option('feature4'));
					$args = array(
						'post_type' => 'page',
						'post__in' => $feature_array,
						'orderby' => 'post__in'
						);

					$query = new WP_Query($args);					
					if($query->have_posts()): ?>

					<div class="feature-block-wrapper">
						<div class="feature-block-wrap clearfix">
							<?php
								while($query->have_posts()):
									$query->the_post();
								?>	
								<div class="feature-block">
									<?php if(has_post_thumbnail()): ?>
									<a href="<?php the_permalink(); ?>" class="feature-icon">
										<?php the_post_thumbnail('thumbnail'); ?>
									</a>
									<?php endif; ?>
									<div class="feature-content">
										<h1 class="feature-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h1>
										<div class="feature-desc"><?php echo esc_html(accesspress_letter_count(get_the_content(),'90')); ?></div>
										<a class="feature-read-more" href="<?php the_permalink(); ?>"><?php echo esc_html(of_get_option('feature_readmore')); ?></a>
									</div>
								</div>
								<?php
								endwhile; ?>
						</div>
					</div> <!-- feature-block-wrap end -->
					<?php	
					endif;
					wp_reset_postdata();	
					?>
				</div>
			</section> <!-- Features -->

		<?php
		}elseif($key == 'latest_post_block'){ ?>
			<section id="blog" class="clearfix">
				<div class="ak-container">
				<?php if(of_get_option('latest_post_title') || of_get_option('latest_post_desc')): ?>
					<div class="section-title-wrap">
						<?php if(of_get_option('latest_post_title')): ?>
							<h1 class="main-title"><?php echo esc_attr(of_get_option('latest_post_title'));?></h1>
						<?php endif; ?>
						
						<?php if(of_get_option('latest_post_desc')): ?>
							<div class="sub-desc">
								<?php echo wp_kses_post(of_get_option('latest_post_desc'));?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				</div>

				<?php 
				if(of_get_option('latest_post_count') > 0) :
				$args = array(
					'posts_per_page' => of_get_option('latest_post_count')
					);
				$query = new WP_Query($args);					
				if($query->have_posts()): 
				?>
				<div class="blog-block-wrapper clearfix">
					<div class="ak-container">
					<div class="block-block-wrap">
						<?php
						$count = 0;
						while($query->have_posts()):
							$query->the_post(); 
							$count++;
							$class = ($count % 2 == 0) ? "right-blog" : "left-blog";
						?>
							<div class="blog-block <?php echo esc_attr($class); ?>">
								<div class="blog-image">
									<?php if(has_post_thumbnail()):
										$big_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
										$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'accesspress-root-blog-thumbnail' );
									?>
									<a class="blog-img-wrap" href="<?php the_permalink(); ?>">
									<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
									</a>
									<div class="blog-overlay">
										<div class="blog-anchor-wrap">
											<a class="search fancybox-gallery" data-lightbox-gallery="gallery" href="<?php echo esc_url($big_image[0]); ?>"> <i class="fa fa-search"></i></a>
											<a class="link" href="<?php the_permalink(); ?>"> <i class="fa fa-link"> </i> </a>
										</div>
									</div>
									<?php 
									endif; ?>
								</div>

								<div class="blog-content-wrapper clearfix"> 
									<div class="blog-date-wrap">
										<div class="blog-date">
											<?php echo get_the_date('d'); ?><br/>
											<?php echo get_the_date('M'); ?>
										</div>
									</div>
									<div class="blog-content">
										<h1 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h1>
										<div class="blog-desc"><?php echo esc_html(accesspress_letter_count(get_the_content(),'200')); ?></div>
									</div>
									<div class="clearfix"> </div>
									<div class="blog-comments-wrap clearfix">
                                        <div class="blog-comments">
    										<span><a class="author" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"> <i class="fa fa-user"> </i><?php echo esc_html(get_the_author()); ?></a></span>
    										<span><a class="comment" href="<?php echo esc_url(get_comments_link( $post->ID )); ?>"> <i class="fa fa-comments"> </i><?php echo absint(get_comments_number()); ?></a></span>
    										<?php if(has_category()): ?>
    										<span>
    										<i class="fa fa-folder"></i><?php echo wp_kses(get_the_category_list(', '), array( 'a' => array( 'href' => array(), 'rel' => array() ) )); ?>
    										</span>
    										<?php endif; ?>
    										<?php if(has_tag()): ?>
    										<span>
    										<i class="fa fa-tags"></i><?php echo wp_kses(get_the_tag_list('' , ', '), array( 'a' => array( 'href' => array(), 'rel' => array() ) )); ?>
    										</span>
    										<?php endif; ?>
                                        </div>
									</div>
								</div>
							</div>
							<?php 
							endwhile; ?>
						</div>
					</div>
				</div> <!-- blog-block-wrapper end -->
				<?php 
				endif; 
				wp_reset_postdata(); 
				endif; ?>
			</section> <!-- blog -->
		<?php
		}elseif($key == 'project_block'){ ?>
			<?php if(of_get_option('project') || of_get_option('project_cat') ): ?>
			<section id="widgets">
				<div class="ak-container widget-container clearfix">
					<div class="widget-container-wrap">
					<?php 
					if(of_get_option('project')):
					$args = array(
						'page_id' => of_get_option('project')
						);
					$query = new WP_Query($args);
					if($query->have_posts()):
						while($query->have_posts()):
							$query->the_post();
						?>
						<div class="widget-block">
							<div class="info-block-wrap">
								<div class="info-title"><?php the_title(); ?></div>
								<?php if(has_post_thumbnail()):
									$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'accesspress-root-project-big-thumbnail' );
								?>
								<div class="info-img"> 
								<a href="<?php the_permalink(); ?>">
								<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>">
								</a> 
								</div>
								<?php endif; ?>
								<div class="info-content"><?php echo esc_html(accesspress_letter_count(get_the_content(),'200')); ?></div>
								<a class="info-read-more" href="<?php the_permalink(); ?>"><?php echo esc_attr(of_get_option('project_readmore')); ?></a>
							</div>
						</div> <!-- widget-block -->
						<?php
						endwhile;
					endif;
					wp_reset_postdata();
					endif;
					?>

					<?php if(of_get_option('project_cat')): ?>
					<div class="widget-block">
						<div class="project-block-wrap">
						<div class="info-title"><?php echo esc_html(get_cat_name(of_get_option('project_cat'))); ?></div>	
					<?php 
					$args = array(
						'posts_per_page' => 6,
						'cat' => of_get_option('project_cat')
						);
					$query = new WP_Query($args);
					if($query->have_posts()): ?>
					<div class="project-slider">
					<?php
						while($query->have_posts()):
							$query->the_post();
					?>
					<div class="slides">
						<div class="project-img-wrap">
							<?php 
								$big_image[0] = "";
							if(has_post_thumbnail()):
								$big_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
								$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'accesspress-root-project-thumbnail' );
							?>
							<img src="<?php echo esc_url($image[0]); ?>">
							<?php 
							endif; ?>
							<div class="project-title"><?php the_title(); ?></div>
						</div>
						<div class="project-content-wrap">
							<div class="project-title"><?php the_title(); ?></div>
							<div class="project-content"><?php echo esc_html(accesspress_letter_count(get_the_content(),'120')); ?></div>
							<div class="project-link-wrap">
								<a class="project-search fancybox-gallery" data-lightbox-gallery="gallery1" href="<?php echo esc_url($big_image[0]); ?>"> <i class="fa fa-search"> </i> </a>
								<a class="project-link" href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
							</div>
						</div>
					</div><!-- slides -->
					<?php
						endwhile; ?>
					</div>
					<?php	
					endif;
					wp_reset_postdata();
					?>
						</div> <!-- project-block-wrap -->
					</div> <!-- widget-block -->
				<?php endif; ?>
				</div>
				</div>
			</section> <!-- widget section -->
		<?php endif; ?>

		<?php 
		}elseif($key == 'testimonial_slider'){ ?>
			<section id="testimonial" class="clearfix">
				<div class="ak-container">
					<div class="section-title-wrap">
						<?php if(of_get_option('testimonial_title')): ?>
						<h1 class="main-title"><?php echo esc_attr(of_get_option('testimonial_title'));?></h1>
						<?php endif; ?>

						<?php if(of_get_option('testimonial_desc')): ?>
						<div class="sub-desc">
							<?php echo wp_kses_post(of_get_option('testimonial_desc'));?>
						</div>
						<?php endif; ?>
					</div>

					<?php 
						if(of_get_option('testimonial_slider_cat')): ?>
						<div class="testimonial-block-wrapper">
						<?php 
						$args = array(
							'cat' => of_get_option('testimonial_slider_cat'),
							'posts_per_page' => 5
							);
						$query = new WP_Query($args);
						if($query->have_posts()): ?>
						<div class="testimonial-thumb-wrap">
						<?php
							while($query->have_posts()):
								$query->the_post();
							?>
							<a id="testimonial-<?php echo the_ID(); ?>" class="testimonial-thumb" href="#">
							<?php 
							if(has_post_thumbnail()):
								the_post_thumbnail('thumbnail'); 
							else: ?>
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/testimonial-dummy.jpg">
							<?php
							endif;
							?>
							</a>
						<?php endwhile; ?>
						</div> <!-- testimonial-thumb-wrap -->
						<?php endif; ?>

						<?php 
						$args = array(
							'cat' => of_get_option('testimonial_slider_cat'),
							'posts_per_page' => 5
							);
						$query = new WP_Query($args);
						if($query->have_posts()): ?>
						<div class="testimonail-content-wrap">
						<?php
							while($query->have_posts()):
								$query->the_post();
							?>
							<div class="testimonail-content testimonial-<?php echo the_ID() ?>"> 
								<div class="testimonial-quote"><?php the_content(); ?></div>
								<div class="speaker-name">-<?php the_title(); ?></div>
							</div>
						<?php endwhile; ?>
						</div> <!-- testimonial-thumb-wrap -->
						<?php endif; ?>
						</div> <!-- testimonial-block-wrapper -->
					<?php
						endif;
					?>				
				</div>
			</section> <!-- testimonial section -->
		<?php
		}

	}
?>

<?php get_footer(); ?>