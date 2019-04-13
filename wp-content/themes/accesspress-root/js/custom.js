jQuery(function($){

	$(window).scroll(function(){
        if($(window).scrollTop() > 200){
            $('#go-top').fadeIn();
        }else{
            $('#go-top').fadeOut();
        }
    });

	$(window).resize(function(){
	    $('.slider-caption').each(function(){
	    var cap_height = $(this).actual( 'outerHeight' );
	    $(this).css('margin-top',-(cap_height/2));
	    })
    }).resize();

	$(window).on('load', function(){
		var pagerWidth = $('#message-slider .bx-pager').outerWidth();
		$('#message-slider .bx-pager').css('margin-left',-(pagerWidth/2));
	})

    $('.text-slider').bxSlider({
    	controls:false
    });

    $('.project-slider').bxSlider({
    	minSlides: 1,
		maxSlides: 2,
		slideWidth: 263,
		slideMargin: 10,
    	controls:false,
    	moveSlide:1,

    });

    $(".fancybox-gallery").nivoLightbox();

    $('.testimonail-content:first').show();
    $('.testimonial-thumb:first').addClass('active');

    $('.testimonial-thumb').click(function(){
        $('.testimonial-thumb').removeClass('active');
        $(this).addClass('active');
        var id = $(this).attr('id');
        $('.testimonail-content').hide();
        $('.'+id).fadeIn();
        return false;
    });

    $('.search-icon a').click(function() {
        $('.search-box').addClass('active');
    });

    $('.search-box .close').click(function() {
        $('.search-box').removeClass('active');
    });

});