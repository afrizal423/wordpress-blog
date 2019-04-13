/**
 * Custom scripts needed for the colorpicker, image button selectors,
 * and navigation tabs.
 */

jQuery(document).ready(function($) {

	// Loads the color pickers
	$('.of-color').wpColorPicker();

	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');
	});

	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();

	// Loads tabbed sections if they exist
	if ( $('.nav-tab-wrapper').length > 0 ) {
		options_framework_tabs();
	}

	$('.switch_options').each(function() {

        //This object
        var obj = $(this);

        var enb = obj.children('.switch_enable'); //cache first element, this is equal to ON
        var dsb = obj.children('.switch_disable'); //cache first element, this is equal to OFF
        var input = obj.children('input'); //cache the element where we must set the value
        var input_val = obj.children('input').val(); //cache the element where we must set the value

        /* Check selected */
        if (0 == input_val) {
            dsb.addClass('selected');
        }
        else if (1 == input_val) {
            enb.addClass('selected');
        }

        //Action on user's click(ON)
        enb.on('click', function() {
            $(dsb).removeClass('selected'); //remove "selected" from other elements in this object class(OFF)
            $(this).addClass('selected'); //add "selected" to the element which was just clicked in this object class(ON) 
            $(input).val(1).change(); //Finally change the value to 1
        });

        //Action on user's click(OFF)
        dsb.on('click', function() {
            $(enb).removeClass('selected'); //remove "selected" from other elements in this object class(ON)
            $(this).addClass('selected'); //add "selected" to the element which was just clicked in this object class(OFF) 
            $(input).val(0).change(); // //Finally change the value to 0
        });

    });

    $('.ap_sliderui').each(function() {

        var obj = $(this);
        var sId = "#" + obj.data('id');
        var val = obj.data('val');
        var min = obj.data('min');
        var max = obj.data('max');
        var step = obj.data('step');

        //slider init
        obj.slider({
            value: val,
            min: min,
            max: max,
            step: step,
            range: "min",
            slide: function(event, ui) {
                $(sId).val(ui.value);
            }
        });

    });

    //scope = scope || document;
    $('#optionsframework-wrap select').each(function() {
        if (!$(this).parent().hasClass('select-wrapper')) {
            $(this).wrap('<div class="select-wrapper" />');
            $(this).parent('.select-wrapper').prepend('<span>' + $(this).find('option:selected').text() + '</span>');
        }
    });

    $(document).on('change', '#optionsframework-wrap select', function() {
        $(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
    });

    $(document).on($.browser.msie ? 'click' : 'change', '#optionsframework-wrap select', function(event) {
        $(this).prev('span').replaceWith('<span>' + $(this).find('option:selected').text() + '</span>');
    });

	function options_framework_tabs() {

		var $group = $('.group'),
			$navtabs = $('.nav-tab-wrapper a'),
			active_tab = '';

		// Hides all the .group sections to start
		$group.hide();

		active_tab = $('#tab_id').attr('value');

		// If active tab is saved and exists, load it's .group
		if ( active_tab != '' && $(active_tab).length ) {
			$(active_tab).fadeIn();
			$(active_tab + '-tab').addClass('nav-tab-active');
		} else {
			$('.group:first').fadeIn();
			$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
		}

		// Bind tabs clicks
		$navtabs.click(function(e) {

			e.preventDefault();

			activeTab = $(this).attr('href');
            $('#tab_id').attr('value', activeTab);

			// Remove active class from all tabs
			$navtabs.removeClass('nav-tab-active');

			$(this).addClass('nav-tab-active').blur();

			var selected = $(this).attr('href');

			$group.hide();
			$(selected).fadeIn();

		});
	}

    $('#page_background_option').change(function() {
        var page_background_option_val = $(this).val();
        if (page_background_option_val == 'image') {
            $('#section-page_background_image').fadeIn();
            $('#section-page_background_pattern, #section-page_background_color').hide()
        } else if (page_background_option_val == 'color') {
            $('#section-page_background_color').fadeIn();
            $('#section-page_background_pattern, #section-page_background_image').hide()
        } else if (page_background_option_val == 'pattern') {
            $('#section-page_background_pattern').fadeIn();
            $('#section-page_background_color, #section-page_background_image').hide()
        } else {
            $('#section-page_background_color, #section-page_background_image, #section-page_background_pattern').hide()
        }
    }).change();

    $(".homepagesettings").sortable({
        axis: "y",
        handle: ".group-heading",
        items: "> div",
        stop: function(event, ui){
        var cnt = 1;
        $('.section-order').each(function(){
        $(this).val(cnt);
        cnt++;
        });
        }
    });
    $("h4.group-heading span").disableSelection();

    $('.homepagesettings h4.group-heading span').click(function(){
        $(this).parent('h4.group-heading').next('.group-content').slideToggle();
    });

    $('.pro-feature-title').click(function(){
        $('.feature-img').slideToggle();
    });

});