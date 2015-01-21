var $ = jQuery.noConflict();
$(document).ready(function(){

	// add class has-js & js if load js
	$("html").removeClass("no-js").addClass("js has-js");

	// add element after sidebar shop
	$('#sidebar-shop').after("<div class='cl'/>");

	// Tag Cloud
	$('.tagcloud a, .term-cloud a').removeAttr('style');

	var avaBlock = "<span class='block'/>";

	// ada element 
	$(".testimonial-avatar, .list-item .item-img, .list-item-ii .item-thumb a").append(avaBlock);

	// $(".testimonial-avatar").append(avaBlock);
	// add element to a porto
	$('.port-img > a').append('<span class="block"/>');

	// If use logo
	$('#site-logo').parents(".header-top").addClass('use-logo');

	// If use logo
	$('#site-title').parents(".header-top").addClass('use-title');

	// Add class to .sub-menu
	$('.sub-menu').parent().addClass("have-submenu");

	$("#access .menu ul.sub-menu").hover(function() {
		$(this).parent().addClass("runing");
	}, function() {
		$(this).parent().removeClass("runing");
		// Stuff to do when the mouse leaves the element;
	});

	// Menu hover
	$("#access ul > li").hover(function() {
		$(this).find('.sub-menu').stop( true, true).show();
		$(this).find('.sub-menu .sub-menu').hide();
	}, function() {
		$(this).find('.sub-menu').stop( true, true).hide();
	});

	// Mega Menu
	$("#menu-menu > .use-mega-menu > .sub-menu").wrapInner("<div class='mega-inner'/>");
	$("#menu-menu .mega-inner").parent().addClass('mega');
	$("#menu-menu .mega-inner").children().addClass('mega-item');
	$("#menu-menu .mega-inner .sub-menu").removeClass('sub-menu');
	$("#menu-menu li > ul.sub-menu").parent().addClass('have-sub-menu');
	$("#menu-menu .have-sub-menu > a").append('<span class="sub-ico"> +</span>');

	// Mobile Menu
	$('#page').after('<div class="mobile-menu-open-wrap"><span id="mobile-menu-btn"/></div>');
	var MobileMenu = $("#menu-menu").html();
		$("#access").after('<div class="cl"></div><nav id="mobile-menu"><ul></ul></nav>');
		$("#mobile-menu > ul").html(MobileMenu);

	$('#mobile-menu').wrapInner('<div class="mobile-menu-wrap"/>');
	$('#mobile-menu').prepend('<span id="mobile-menu-btn2"/>');

	$('#mobile-menu-btn').click(function() {
		$('#mobile-menu').toggleClass('run');
	});

	$('#mobile-menu-btn2').click(function(event) {
		$('#mobile-menu-btn').click();
	});

	// Swipe close menu for mobile
	// $(function() {
	// 	$("#mobile-menu").swipe( {
	// 	swipeLeft:function(event, direction, distance, duration, fingerCount) {
	// 		$('#mobile-menu-btn').click();
	// 	},
	// 	//Default is 75px, set to 0 for demo so any distance triggers swipe
	// 	threshold:0
	// 	});
	// });

	// Decect Ipad
	if(navigator.vendor != null && navigator.vendor.match(/Apple Computer, Inc./) && navigator.userAgent.match(/iPhone/i) || (navigator.userAgent.match(/iPod/i))){

		$('body').parent().addClass("this-is-ipad");

	}
	// Add element porfolio
	$(".portfolio .list-related li a").append("<div class='hover'></div>");

	// Add label to Quanity
	var QuantityText = '<span class="quantity-text">Quantity</span>';
	$('.variations_form .quantity').prepend(QuantityText);

	// Hide place holder if focus
	$("form input[type='text']").each(function() {

		var placeVall = $(this).attr("placeholder");

		$(this).focus(function(){
			$(this).removeAttr("placeholder");
		});

		$(this).focusout(function() {
			$(this).attr("placeholder", placeVall);
		});

	});

	// Created wrapper elemen blog
	$('.blog-home').append('<div class="blog-odd"><div class="blog-data"></div></div><div class="blog-even"><div class="blog-data"></div></div>');

	var ContentOdd = $('.blog-page > .hentry:odd');
	var ContentEven = $('.blog-page > .hentry:even');

	$('.blog-odd .blog-data').html(ContentOdd);
	$('.blog-even .blog-data').html(ContentEven);

	// Add Slider for blog
	$('.format-gallery .framebox').addClass('flexslider');
	$('.format-gallery .framebox > ul').addClass('slides');


	// Animation for scroll
	$(window).scroll(function () {

		var scrollTop = $(window).scrollTop();
		var scrollBottom = $(document).height() - $(window).height() - $(window).scrollTop();

		if (scrollTop > 700){
			$('.access-wrap').addClass('run');
			$('#access .wrap-account-top').fadeIn(432);
		} else if( scrollTop < 700 ){
			$('.access-wrap').removeClass('run');
			$('#access .wrap-account-top').fadeOut(432);
		}
	});

     // Appear element
    $('.header-top').appear(function() {
        $(this).addClass('app');
    },{accX: 0, accY: 0});

    $('#access').appear(function() {
        $(this).addClass('app');
    },{accX: 0, accY: 0});

    $('.home-featured .wrap-items').appear(function() {
        $(this).addClass('app');
    },{accX: 0, accY: -220});

    $('.home-featured .featured-right').appear(function() {
        $(this).addClass('app');
    },{accX: 0, accY: -260});

    $('.recent-book').appear(function() {
        $(this).addClass('app');
    },{accX: 0, accY: -220});


    $('.featured-bottom').appear(function() {
        $(this).addClass('app');
    },{accX: 0, accY: -220});


    $('.featured-search.for-home').appear(function() {
        $(this).addClass('app');
    },{accX: 0, accY: -220});


    $('.widget-bottom').appear(function() {
        $(this).addClass('app');
    },{accX: 0, accY: -220});

    $('#colophon').appear(function() {
        $(this).addClass('app');
    },{accX: 0, accY: 0});

	// Blog: Add class if image < the image wrapper
	$('.post .entry-feature').each(function(index) {

		var thisWidth = $(this).width();
		var ChilWidht = $(this).find("img").width();

		if ( thisWidth > ChilWidht ){
			$(this).parent().addClass('child-small');
		}
		
	});

	// Slider default
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "fade",
			useCSS: false,
			animationLoop: false,
			smoothHeight: true,
		});
		
		$('.portfolio-img .flexslider').flexslider({
			animation: "slide",
			smoothHeight: true,
		});

	});

});// End ready

