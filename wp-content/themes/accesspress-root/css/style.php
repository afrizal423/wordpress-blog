<?php
	/** Dynamic Styles **/
	function accesspress_root_header_styles_scripts(){
	    $tpl_color = of_get_option('template_color');

        $custom_css = "";

	    if( $tpl_color ) {
	       
           $dark_tpl_color = accesspress_root_colour_brightness($tpl_color, -0.8);
           
           $tpl_color_arr = accesspress_root_hex2rgb($tpl_color);

            /** Color **/
            $custom_css .= "
                #site-navigation > ul > li > a:hover,
                #site-navigation > ul > li.current-menu-item > a,
                #site-navigation > ul > li.current-menu-ancestor > a,
                .search-icon a,
                #site-navigation ul li ul.sub-menu > li:hover > a,
                #site-navigation ul li ul.sub-menu > li.current-menu-item > a,
                #site-navigation ul li ul.sub-menu > li.current-menu-ancestor > a,
                .color-bold, .message-title span,
                .cta-banner-btn a,
                .feature-block .feature-icon,
                .feature-title a:hover,
                .feature-content a,
                #blog .blog-title a:hover,
                .blog-comments a:hover,
                .feature-read-more, .info-read-more,
                .feature-read-more:hover, .info-read-more:hover,
                .widget a:hover, .widget a:hover:before,
                .copyright a:hover, .social-icon a:hover,
                .logged-in-as a,
                .widget_search button, .oops,
                .error404 .not_found,
                .cat-links a:hover, .tags-links a:hover,
                .contact-info-wrap a, .search-icon a:hover{
                    color: {$tpl_color}; 
                }";
                
            /** Background **/
            $custom_css .= "
                .main-navigation ul ul,
                .caption-read-more:hover,
                #main-slider .bx-pager-item a:hover,
                #main-slider .bx-pager-item a.active,
                #message-slider .bx-controls .bx-pager-item a:hover,
                #message-slider .bx-controls .bx-pager-item a.active,
                .project-block-wrap .bx-controls .bx-pager-item a:hover,
                .project-block-wrap .bx-controls .bx-pager-item a.active,
                .cta-banner-btn a:hover,
                .service-overlay a,
                .blog-overlay a,
                .blog-date, .project-content-wrap,
                .page_header_wrap, .edit-link a,
                #respond input#submit,
                .error404 .error-num .num,
                button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"],
                .nav-previous a, .nav-next a{
                    background: {$tpl_color} 
                }";
                
            /** 0.7 Background Opacity **/
            $custom_css .= "
                .search-box{
                    background: rgba({$tpl_color_arr[0]},$tpl_color_arr[1],{$tpl_color_arr[2]},0.7);
                }";
                
            /** Dark Background **/
            $custom_css .= "
                .service-overlay a:hover,
                .blog-overlay a:hover,
                .edit-link a:hover,
                #respond input#submit:hover{
                    background: {$dark_tpl_color} 
                }";
                
            /** Border Color **/
            $custom_css .= "
                .caption-read-more:hover,
                .cta-banner-btn a,
                .feature-block .feature-icon,
                .feature-read-more, .info-read-more,
                .feature-read-more:hover, .info-read-more:hover,
                .testimonail-content-wrap,
                .secondary-left .widget, .secondary-right .widget,
                button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"]{
                    border-color: {$tpl_color} 
                }";
                
            /** Border Bottom Color **/
            $custom_css .= "
                .main-navigation ul ul:before{
                    border-bottom-color: {$tpl_color} 
                }";
                
            /** Box Shadow **/
            $custom_css .= "
                .blog-date:hover:after{
                    box-shadow: 0 0 0 1px {$tpl_color}; 
                }";

            /** Media Queiries **/
            $custom_css .= "
                @media (max-width: 767px){
                    #top .nav-btn, .js-ready #nav{
                        background: {$tpl_color} !important;
                    }
                }";

            $custom_css .= "
                .js-ready #nav .close-btn{
                    background: {$dark_tpl_color} !important;
                }";

	    }

		wp_add_inline_style( 'accesspress-root-style', $custom_css );
	}

	add_action( 'wp_enqueue_scripts', 'accesspress_root_header_styles_scripts' );

    function accesspress_root_colour_brightness($hex, $percent) {
        // Work out if hash given
        $hash = '';
        if (stristr($hex, '#')) {
            $hex = str_replace('#', '', $hex);
            $hash = '#';
        }
        /// HEX TO RGB
        $rgb = array(hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
        //// CALCULATE 
        for ($i = 0; $i < 3; $i++) {
            // See if brighter or darker
            if ($percent > 0) {
                // Lighter
                $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1 - $percent));
            } else {
                // Darker
                $positivePercent = $percent - ($percent * 2);
                $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1 - $positivePercent));
            }
            // In case rounding up causes us to go to 256
            if ($rgb[$i] > 255) {
                $rgb[$i] = 255;
            }
        }
        //// RBG to Hex
        $hex = '';
        for ($i = 0; $i < 3; $i++) {
            // Convert the decimal digit to hex
            $hexDigit = dechex($rgb[$i]);
            // Add a leading zero if necessary
            if (strlen($hexDigit) == 1) {
                $hexDigit = "0" . $hexDigit;
            }
            // Append to the hex string
            $hex .= $hexDigit;
        }
        return $hash . $hex;
    }

    function accesspress_root_hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }