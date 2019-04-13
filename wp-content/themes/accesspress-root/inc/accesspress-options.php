<?php
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 */

function optionsframework_options() {

	$imagepath =  get_template_directory_uri() . '/inc/panel/images/';

	// Web Layouts
	$web_layout = array(
		'full-width' => __( 'Full Width', 'accesspress-root' ),
		'boxed' => __( 'Boxed', 'accesspress-root' )
	);

	// Slider Transitions
	$transitions = array(
		'fade' => __('Fade', 'accesspress-root'),
		'horizontal' => __('Slide Horizontal', 'accesspress-root'),
		'vertical' => __('Slide Vertical', 'accesspress-root')
	);

	// Website Background Options
	$background_options = array(
		'none' => __('-- None --', 'accesspress-root'),
		'image' => __('Image', 'accesspress-root'),
		'color' => __('Color', 'accesspress-root'),
		'pattern' => __('Pattern', 'accesspress-root'),
	);

	//Background Pattern
	$background_pattern = array( 
		'pattern1' => $imagepath . 'patterns/80X80/pattern1.png',  
		'pattern2' => $imagepath . 'patterns/80X80/pattern2.png', 
		'pattern3' => $imagepath . 'patterns/80X80/pattern3.png',
        'pattern4' => $imagepath . 'patterns/80X80/pattern4.png',  
		'pattern5' => $imagepath . 'patterns/80X80/pattern5.png', 
		'pattern6' => $imagepath . 'patterns/80X80/pattern6.png'
		);

	//Sidebar layout
	$sidebar_layout = array(
		'left-sidebar' => $imagepath . 'left-sidebar.png', 
		'right-sidebar' => $imagepath . 'right-sidebar.png', 
		'both-sidebar' => $imagepath . 'both-sidebar.png',
		'no-sidebar' => $imagepath . 'no-sidebar.png',
		);

	//Logo Options
	$logo_options = array(
		'image' => __('Image', 'accesspress-root'),
		'text' => __('Text', 'accesspress-root'),
		'image_text' => __('Image & Text', 'accesspress-root'),
		);

	// Website Background Options
	$blog_layout = array(
		'blog_layout1' => __('Blog Image Large', 'accesspress-root'),
		'blog_layout2' => __('Blog Image Medium', 'accesspress-root'),
		'blog_layout3' => __('Blog Image Alternate Medium', 'accesspress-root'),
		'blog_layout4' => __('Blog Full Content', 'accesspress-root'),
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	$options_categories['0'] = "-- select category--";
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}


	// Pull all the categories into an array
	$options_categories_multicheck = array();
	$options_categories_multicheck_obj = get_categories();
	foreach ($options_categories_multicheck_obj as $category) {
		$options_categories_multicheck[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages['0'] = '-- select page --';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	$theme = wp_get_theme();

	$about_content = '<div class="about-accesspress">
          <img src="'.esc_url($theme->get_screenshot()).'" /><br/>'
          .$theme->get('Description').
          '<br/><br/>
          <a class="button" target="_blank" href="'.esc_url('http://doc.accesspressthemes.com/accesspress-root-documentation/').'">'. __('View Documentaion','accesspress-root').'</a>
          <a class="button" target="_blank" href="'.esc_url('http://demo.accesspressthemes.com/accesspress-root/').'">'.__('View Demo','accesspress-root').'</a>
        </div>';
    $for_support =  __("Forum:","accesspress-root").' <a target="_blank" href="'. esc_url("https://accesspressthemes.com/support").'">accesspressthemes.com/support</a><br/>';
    $for_support .=  __("Visit Our website for live chat","accesspress-root").' <a target="_blank" href="'. esc_url("https://accesspressthemes.com").'">accesspressthemes.com</a><br/>';
	$for_customization = __('We offer WordPress Themes/Plugins development, customization, design integration, WordPress setup, fixes etc.','accesspress-root').'<br/>'
        .__('Email:','accesspress-root').' <a href="mailto:support@accesspressthemes.com">support@accesspressthemes.com</a>';
    $about_accesspress_themes = 'AccessPress Themes is an online WordPress themes store, that provides beautiful and useful themes. All of our themes are crafted with our years of experience. Our theme don\'t lack the basics and don\'t have a lot of non-sense features which you might never use. AccessPress Themes has beautiful and elegant, fully responsive, multipurpose themes to meet your need for free and premium basis. Our themes have bunch of easily customizable options and features, someone with no programming knowledge can use our easy theme options panel and configure/setup the theme as needed.';        
    $from_accesspress_thems = '<div class="accesspressthemes-products"><div class="ap-themes">
        <a target="_blank" href="https://accesspressthemes.com/wordpress-themes/">
        <div class="ap-themes-img">
        <img src="'.get_template_directory_uri().'/inc/panel/images/wordpress-themes.png">
        <span>'.__('View all Themes','accesspress-root').' <i class="fa fa-external-link"></i></span>
        </div>'
        .__('WordPress Themes','accesspress-root'). 
        '</a>
        </div>';

    $from_accesspress_thems .= '<div class="ap-plugins">
        <a target="_blank" href="https://accesspressthemes.com/plugins/">
        <div class="ap-themes-img">
        <img src="'.get_template_directory_uri().'/inc/panel/images/wordpress-plugins.png">
        <span>'. __('View all Plugins','accesspress-root').' <i class="fa fa-external-link"></i></span>
        </div>'
        .__('WordPress Plugins','accesspress-root').  
        '</a>
        </div>';

    $from_accesspress_thems .= '<div class="ap-customization">
        <a target="_blank" href="https://accesspressthemes.com/request-customization/">
        <div class="ap-themes-img">
        <img src="'. get_template_directory_uri().'/inc/panel/images/wordpress-customization.png">
        <span>'. __('Request Customization','accesspress-root').' <i class="fa fa-external-link"></i></span>
        </div>'
        .__('WordPress Customization','accesspress-root').  
        '</a>
        </div></div>';

	$options = array();
/* --------------------------GENERAL SETTINGS-------------------------- */
	$options[] = array(
		'name' => __( 'General Settings', 'accesspress-root' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Website Layout', 'accesspress-root' ),
		'id' => 'web_layout',
		'std' => 'full-width',
		'type' => 'select',
		'options' => $web_layout 
	);

	$options[] = array(
		'name' => __( 'Template Color', 'accesspress-root' ),
		'id' => 'template_color',
		'std' => '#1eb0bc',
		'type' => 'color',
	);

	$options[] = array(
		'name' => __('Responsive', 'accesspress-root'),
		'id' => 'responsive',
		'on' => __('Enable', 'accesspress-root'),
		'off' => __('Disable', 'accesspress-root'),
		'std' => '1',
		'type' => 'switch');

	$options[] = array( 
		"name" => __('Background', 'accesspress-root'),
		"desc" => __('Image/Color/Pattern', 'accesspress-root'),
		"id" => "page_background_option",
		"std" => "none",
		"type" => "select",
		"options" => $background_options );

	$options[] = array( 
		"name" => __('Background Image', 'accesspress-root'),
		"id" => __('page_background_image', 'accesspress-root'),
		"class" =>"sub-option",
		"type" => "background",
		'std' => array(
			'color' => '',
			'image' => '',
			'repeat' => 'repeat',
			'position' => 'top center',
			'attachment'=>'scroll',
			'size' => 'auto' )
		);

	$options[] = array( 
		"name" => __('Background Color', 'accesspress-root'),
		"desc" => __('Color for the Background', 'accesspress-root'),
		"id" => "page_background_color",
		"std" => "#FFFFFF",
		"type" => "color" );

	$options[] = array(
		'name' => __('Background Patterns', 'accesspress-root'),
		'id' => "page_background_pattern",
		'std' => "pattern1",
		'type' => "images",
		'options' => $background_pattern
	);

	$options[] = array( 
		"name" => __('Logo Settings', 'accesspress-root'),
		"id" => "logo_setting",
		"std" => "image",
		"type" => "select",
		"options" => $logo_options );

	$options[] = array(
		'name' => __( 'Upload Logo', 'accesspress-root' ),
		'id' => 'logo',
		'desc' => __('Standard size of the logo is 280X80px', 'accesspress-root'),
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Upload Fav Icon', 'accesspress-root' ),
		'id' => 'fav_icon',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __('Single Post Layout', 'accesspress-root' ),
		'id' => "single_post_layout",
		'std' => "right-sidebar",
		'type' => "images",
		'options' => $sidebar_layout
	);

	$options[] = array(
		'name' => __('Single Page Layout', 'accesspress-root' ),
		'id' => "single_page_layout",
		'std' => "right-sidebar",
		'type' => "images",
		'options' => $sidebar_layout
	);

	$options[] = array(
		'name' => __('Archive Page Layout', 'accesspress-root' ),
		'id' => "archive_page_layout",
		'std' => "right-sidebar",
		'type' => "images",
		'options' => $sidebar_layout
	);

	$options[] = array( 
		"name" => __('Blog Post Layout', 'accesspress-root' ),
		"id" => "blog_post_layout",
		"std" => "blog_layout1",
		"type" => "select",
		"options" => $blog_layout );

	$options[] = array(
		'name' => __('Exclude From Blog', 'accesspress-root'),
		'desc' => __('Check the categories to exclude from blog page.', 'accesspress-root'),
		'id' => 'exclude_from_blog',
		'type' => 'multicheck',
		'options' => $options_categories_multicheck);

/* --------------------------GENERAL SETTINGS-------------------------- */
	$options[] = array(
		'name' => __( 'Home Page Settings', 'accesspress-root' ),
		'type' => 'heading'
	);

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
		if($key == 'text_slider'){
			$options[] = array(
			'name' => __( 'Text Slider', 'accesspress-root' ),
			'id'   => 'text_slider',
			'group'=> 'home_order', 
			'type' => 'groupstart'
			);

		if ( $options_categories ) {
			$options[] = array(
				'name' => __( 'Select a Category', 'accesspress-root' ),
				'desc' => __( 'Select the category for text slider', 'accesspress-root' ),
				'id' => 'text_slider_cat',
				'type' => 'select',
				'options' => $options_categories
			);
		}

		$options[] = array(
			'type' => 'groupend'
		);
	}elseif($key == 'service_block'){
		$options[] = array(
			'name' => __( 'Service Block', 'accesspress-root' ),
			'id'   => 'service_block', 
			'group'=> 'home_order',
			'type' => 'groupstart'
		);

		$options[] = array(
			'name' => __( 'Service Section Title', 'accesspress-root' ),
			'id' => 'service_title',
			'std' => 'Service',
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'Service Section Desc', 'accesspress-root' ),
			'id' => 'service_desc',
			'settings' => array('rows' => 2),
			'type' => 'textarea'
		);

		for ($service_page_count = 1; $service_page_count <= 4; $service_page_count++) { 
			if ( $options_categories ) {
				$options[] = array(
					'name' => __( 'Service ', 'accesspress-root' ).$service_page_count,
					'id' => 'service'.$service_page_count,
					'type' => 'select',
					'options' => $options_pages
				);
			}
		}

		$options[] = array(
			'type' => 'groupend'
		);
	}elseif($key == 'call_to_action'){
		$options[] = array(
			'name' => __( 'Call To Action', 'accesspress-root' ),
			'id'   => 'call_to_action', 
			'group'=> 'home_order',
			'type' => 'groupstart'
		);

		$options[] = array(
			'name' => __( 'Title', 'accesspress-root' ),
			'id' => 'call_to_action_title',
			'std' => 'AccessPress Root',
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'Desc', 'accesspress-root' ),
			'id' => 'call_to_action_desc',
			'settings' => array('rows' => 2),
			'type' => 'textarea'
		);

		$options[] = array(
			'name' => __( 'Button Text', 'accesspress-root' ),
			'id' => 'call_to_action_button_text',
			'std' => 'Buy Now',
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'Button Link', 'accesspress-root' ),
			'id' => 'call_to_action_link',
			'std' => 'http://',
			'type' => 'url'
		);

		$options[] = array(
			'type' => 'groupend'
		);
	}elseif($key == 'feature_block'){
		$options[] = array(
			'name' => __( 'Feature Block', 'accesspress-root' ),
			'id'   => 'feature_block', 
			'group'=> 'home_order',
			'type' => 'groupstart'
		);

		$options[] = array(
			'name' => __( 'Feature Section Title', 'accesspress-root' ),
			'id' => 'feature_title',
			'std' => __( 'Our Features', 'accesspress-root' ),
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'Feature Section Desc', 'accesspress-root' ),
			'id' => 'feature_desc',
			'settings' => array('rows' => 2),
			'type' => 'textarea'
		);

		for ($service_page_count = 1; $service_page_count <= 4; $service_page_count++) { 
			if ( $options_pages ) {
				$options[] = array(
					'name' => __( 'Feature ', 'accesspress-root' ).$service_page_count,
					'id' => 'feature'.$service_page_count,
					'type' => 'select',
					'options' => $options_pages
				);
			}
		}

		$options[] = array(
			'name' => __( 'Read More Text', 'accesspress-root' ),
			'id' => 'feature_readmore',
			'std' => __( 'Read More', 'accesspress-root' ),
			'type' => 'text'
		);

		$options[] = array(
			'type' => 'groupend'
		);
	}elseif($key == 'latest_post_block'){
		$options[] = array(
			'name' => __( 'Latest Post Block', 'accesspress-root' ),
			'id'   => 'latest_post_block', 
			'group'=> 'home_order',
			'type' => 'groupstart'
		);

		$options[] = array(
			'name' => __( 'Title', 'accesspress-root' ),
			'id' => 'latest_post_title',
			'std' => __( 'AccessPress Root', 'accesspress-root' ),
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'Desc', 'accesspress-root' ),
			'id' => 'latest_post_desc',
			'settings' => array('rows' => 2),
			'type' => 'textarea'
		);

		$options[] = array(
			'name' => __( 'No of Post', 'accesspress-root' ),
			'id' => 'latest_post_count',
			'std' => '2',
			'type' => 'num'
		);

		$options[] = array(
			'type' => 'groupend'
		);

	}elseif($key == 'project_block'){
		$options[] = array(
			'name' => __( 'Project Block', 'accesspress-root' ),
			'id'   => 'project_block', 
			'group'=> 'home_order',
			'type' => 'groupstart'
		);

		if ( $options_pages ) {
			$options[] = array(
				'name' => __( 'Project ', 'accesspress-root' ),
				'id' => 'project',
				'type' => 'select',
				'options' => $options_pages
			);
		}

		$options[] = array(
			'name' => __( 'Project Read More', 'accesspress-root' ),
			'id' => 'project_readmore',
			'std' => __( 'Read More', 'accesspress-root' ),
			'type' => 'text'
		);

		if ( $options_categories ) {
			$options[] = array(
				'name' => __( 'Select a Category', 'accesspress-root' ),
				'desc' => __( 'Select the category for project.', 'accesspress-root' ),
				'id' => 'project_cat',
				'type' => 'select',
				'options' => $options_categories
			);
		}

		$options[] = array(
			'type' => 'groupend'
		);
	}elseif($key == 'testimonial_slider'){
		$options[] = array(
			'name' => __( 'Testimonial Slider', 'accesspress-root' ),
			'id'   => 'testimonial_slider', 
			'group'=> 'home_order',
			'type' => 'groupstart'
		);

		$options[] = array(
			'name' => __( 'Title', 'accesspress-root' ),
			'id' => 'testimonial_title',
			'std' => __( 'What Our Client Say', 'accesspress-root' ),
			'type' => 'text'
		);

		$options[] = array(
			'name' => __( 'Desc', 'accesspress-root' ),
			'id' => 'testimonial_desc',
			'settings' => array('rows' => 2),
			'type' => 'textarea'
		);

		if ( $options_categories ) {
			$options[] = array(
				'name' => __( 'Select a Category', 'accesspress-root' ),
				'desc' => __( 'Select the category for testimonial slider.', 'accesspress-root' ),
				'id' => 'testimonial_slider_cat',
				'type' => 'select',
				'options' => $options_categories
			);
		}

		$options[] = array(
			'type' => 'groupend'
		);
	}
}

/* --------------------------SLIDER IMAGES-------------------------- */

	$options[] = array(
		'name' => __( 'Slider Images', 'accesspress-root' ),
		'type' => 'heading'
	);

	for ($slider_count = 1; $slider_count < 6; $slider_count++) { 
	$options[] = array(
		'name' => __( 'Slider ', 'accesspress-root' ).$slider_count,
		'class' => 'title',
		'type' => 'title',
	);

	$options[] = array(
		'name' => __( 'Slider Image', 'accesspress-root' ),
		'id' => 'slider_image'.$slider_count,
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __( 'Slider Title', 'accesspress-root' ),
		'id' => 'slider_title'.$slider_count,
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Slider Description', 'accesspress-root' ),
		'id' => 'slider_desc'.$slider_count,
		'settings' => array('rows' => 2),
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __( 'Slider Button Text', 'accesspress-root' ),
		'id' => 'slider_button_text'.$slider_count,
		'std' => __( 'Read More', 'accesspress-root' ),
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Slider Button Link', 'accesspress-root' ),
		'id' => 'slider_button_link'.$slider_count,
		'std' => 'http://',
		'type' => 'url'
	);
	}

/* --------------------------SLIDER SETTINGS-------------------------- */
	$options[] = array(
		'name' => __('Slider Settings', 'accesspress-root'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Show Slider', 'accesspress-root'),
		'id' => 'show_slider',
		'on' => __( 'Yes', 'accesspress-root'),
		'off' => __( 'No', 'accesspress-root'),
		'std' => '1',
		'type' => 'switch');

	$options[] = array(
		'name' => __('Show Pager', 'accesspress-root'),
		'id' => 'show_pager',
		'on' => __( 'Yes', 'accesspress-root'),
		'off' => __( 'No', 'accesspress-root'),
		'std' => '1',
		'type' => 'switch');

	$options[] = array(
		'name' => __('Show Controls', 'accesspress-root'),
		'id' => 'show_controls',
		'on' =>  __('Yes', 'accesspress-root'),
		'off' =>  __('No', 'accesspress-root'),
		'std' => '1',
		'type' => 'switch');

	$options[] = array(
		'name' => __('Auto Transition', 'accesspress-root'),
		'id' => 'auto_transition',
		'on' =>  __('Yes', 'accesspress-root'),
		'off' =>  __('No', 'accesspress-root'),
		'std' => '1',
		'type' => 'switch');

	$options[] = array(
		'name' => __('Slider Transition', 'accesspress-root'),
		'id' => 'slider_transition',
		'std' => 'fade',
		'type' => 'select',
		'options' => $transitions);

	$options[] = array(
		'name' => __('Slider Transition Speed', 'accesspress-root'),
		'id' => 'slider_speed',
		'std' => '5000',
		"min" 	=> "1000",
		"step"	=> "100",
		"max" 	=> "10000",
		"type" 	=> "sliderui");

	$options[] = array(
		'name' => __('Slider Pause Duration', 'accesspress-root'),
		'id' => 'slider_pause',
		'std' => '5000',
		"min" 	=> "1000",
		"step"	=> "100",
		"max" 	=> "8000",
		"type" 	=> "sliderui");

	$options[] = array(
		'name' => __('Show Caption', 'accesspress-root'),
		'id' => 'show_caption',
		'on' =>  __('Yes', 'accesspress-root'),
		'off' =>  __('No', 'accesspress-root'),
		'std' => '1',
		'type' => 'switch');
	
/* --------------------------SOCIAL SETTINGS-------------------------- */
	$options[] = array(
		'name' => __('Social Links', 'accesspress-root'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Facebook', 'accesspress-root'),
		'id' => 'facebook',
		'type' => 'url');

	$options[] = array(
		'name' => __('Twitter', 'accesspress-root'),
		'id' => 'twitter',
		'type' => 'url');

	$options[] = array(
		'name' => __('Google Plus', 'accesspress-root'),
		'id' => 'google_plus',
		'type' => 'url');

	$options[] = array(
		'name' => __('Youtube', 'accesspress-root'),
		'id' => 'youtube',
		'type' => 'url');

	$options[] = array(
		'name' => __('Pinterest', 'accesspress-root'),
		'id' => 'pinterest',
		'type' => 'url');

	$options[] = array(
		'name' => __('Linkedin', 'accesspress-root'),
		'id' => 'linkedin',
		'type' => 'url');

	$options[] = array(
		'name' => __('Instagram', 'accesspress-root'),
		'id' => 'instagram',
		'type' => 'url');

	$options[] = array(
		'name' => __('StumbleUpon', 'accesspress-root'),
		'id' => 'stumbleupon',
		'type' => 'url');

	$options[] = array(
		'name' => __('Skype', 'accesspress-root'),
		'id' => 'skype',
		'type' => 'text');

/* --------------------------ABOUT SECTION-------------------------- */

	$options[] = array(
		'name' => __('About AccessPress Root', 'accesspress-root'),
		'icon' => 'fa fa-globe',
		'type' => 'heading');

	$options[] = array(
		'name' => __('For Support', 'accesspress-root'),
		'desc' => $for_support,
		'type' => 'info');

	$options[] = array(
		'name' => __('About AccessPress Pro', 'accesspress-root'),
		'desc' => $about_content,
		'type' => 'info');

	$options[] = array(
		'name' => __('For Customization', 'accesspress-root'),
		'desc' => $for_customization,
		'type' => 'info');


/* --------------------------ABOUT SECTION-------------------------- */

	$options[] = array(
		'name' => __('About AccessPress Themes', 'accesspress-root'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('About AccessPress Themes', 'accesspress-root'),
		'desc' => $about_accesspress_themes,
		'type' => 'info');

	$options[] = array(
		'name' => __('More from AccessPress Themes', 'accesspress-root'),
		'desc' => $from_accesspress_thems,
		'type' => 'info');


	$options[] = array( 
		"name" => "",
		"id" => "tab_id",
		"std" => "#options-group-1",
		"type" => "hidden" );

	return $options;
}