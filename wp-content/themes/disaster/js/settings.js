/*!
 * jQuery Cookie Plugin v1.4.0
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD. Register as anonymous module.
		define(['jquery'], factory);
	} else {
		// Browser globals.
		factory(jQuery);
	}
}(function ($) {

	var pluses = /\+/g;

	function encode(s) {
		return config.raw ? s : encodeURIComponent(s);
	}

	function decode(s) {
		return config.raw ? s : decodeURIComponent(s);
	}

	function stringifyCookieValue(value) {
		return encode(config.json ? JSON.stringify(value) : String(value));
	}

	function parseCookieValue(s) {
		if (s.indexOf('"') === 0) {
			// This is a quoted cookie as according to RFC2068, unescape...
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}

		try {
			// Replace server-side written pluses with spaces.
			// If we can't decode the cookie, ignore it, it's unusable.
			// If we can't parse the cookie, ignore it, it's unusable.
			s = decodeURIComponent(s.replace(pluses, ' '));
			return config.json ? JSON.parse(s) : s;
		} catch(e) {}
	}

	function read(s, converter) {
		var value = config.raw ? s : parseCookieValue(s);
		return $.isFunction(converter) ? converter(value) : value;
	}

	var config = $.cookie = function (key, value, options) {

		// Write

		if (value !== undefined && !$.isFunction(value)) {
			options = $.extend({}, config.defaults, options);

			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setTime(+t + days * 864e+5);
			}

			return (document.cookie = [
				encode(key), '=', stringifyCookieValue(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}

		// Read

		var result = key ? undefined : {};

		// To prevent the for loop in the first place assign an empty array
		// in case there are no cookies at all. Also prevents odd result when
		// calling $.cookie().
		var cookies = document.cookie ? document.cookie.split('; ') : [];

		for (var i = 0, l = cookies.length; i < l; i++) {
			var parts = cookies[i].split('=');
			var name = decode(parts.shift());
			var cookie = parts.join('=');

			if (key && key === name) {
				// If second argument (value) is a function it's a converter...
				result = read(cookie, value);
				break;
			}

			// Prevent storing a cookie that we couldn't decode.
			if (!key && (cookie = read(cookie)) !== undefined) {
				result[name] = cookie;
			}
		}

		return result;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		if ($.cookie(key) === undefined) {
			return false;
		}

		// Must not alter options, thus extending a fresh object...
		$.cookie(key, '', $.extend({}, options, { expires: -1 }));
		return !$.cookie(key);
	};

}));


/* ============================================================================================================================================== */

var $ = jQuery.noConflict();

var data_layout = "";
var data_pattern = "";
var data_pattern_widget = "";

$(document).ready(function(){

/* Open & Close Settings */
	$('.button-setting').click(function(event) {
		$('#tt-theme-settings').toggleClass('run');
		$(this).toggleClass('run');
	});
/* Close Settings Outher element */
	$('html').click(function() {
		$("#tt-theme-settings").removeClass('run');
		$("#tt-theme-settings .button-setting").removeClass('run');
		// return false;
	});

	$('#tt-theme-settings').click(function(event){
		event.stopPropagation();
	});

 /* Set Variable pattern */
	var data_layout = $.cookie('data-layout');
	var data_pattern = $.cookie('data-pattern');
	var data_pattern_widget = $.cookie('data-pattern-widget');

/* Setting selected first load */
	$('.tt-layout').find("a[data-layout=" + data_layout + "]").addClass('selected');
	$('.tt-bg-pattern').find("a[data-pattern=" + data_pattern + "]").addClass('selected');
	$('.tt-bg-pattern-widget').find("a[data-pattern-widget=" + data_pattern_widget + "]").addClass('selected');

/* Setting value first load */
	$('#root').attr('data-layout', data_layout);
	$('#root').attr('data-pattern', data_pattern);
	$('#root').attr('data-pattern-widget', data_pattern_widget);

/* Button layout */
	$('.tt-layout a[data-layout]').each(function(index) {
		var data_layout = $(this).attr('data-layout');

		$(this).click(function(event) {

			$('.tt-layout a[data-layout]').removeClass('selected');
			$(this).addClass('selected');

			$.removeCookie('data-layout');
			$.cookie('data-layout', data_layout);
			$('#root').attr('data-layout', data_layout);

			return false;
		});
	});

/* Button main pattern */
	$('.tt-bg-pattern a[data-pattern]').each(function(index) {
		var data_pattern = $(this).attr('data-pattern');
		$(this).click(function(event) {

			$('.tt-bg-pattern a[data-pattern]').removeClass('selected');
			$(this).addClass('selected');

			$.removeCookie('data-pattern');
			$.cookie('data-pattern', data_pattern);
			$('#root').attr('data-pattern', data_pattern);

			$('html, body').animate({ scrollTop: $("#main").offset().top }, 400);

			return false;

		});
	});

/* Button widget pattern */
	$('.tt-bg-pattern-widget a[data-pattern-widget]').each(function(index) {
		var data_pattern_widget = $(this).attr('data-pattern-widget');
		$(this).click(function(event) {

			$('.tt-bg-pattern-widget a[data-pattern-widget]').removeClass('selected');
			$(this).addClass('selected');

			$.removeCookie('data-pattern-widget');
			$.cookie('data-pattern-widget', data_pattern_widget);
			$('#root').attr('data-pattern-widget', data_pattern_widget);
			
			$('html, body').animate({ scrollTop: $(".widget-bottom").offset().top }, 400);
			return false;

		});
	});

/* Button reset */
	$('.reset-default').click(function() {
		$.removeCookie('data-pattern-widget');
		$.removeCookie('data-pattern');

		$.removeCookie('data-layout');
		$('#root').removeAttr('data-pattern');
		$('#root').removeAttr('data-layout');
		$('#root').removeAttr('data-pattern-widget');

		$('.tt-layout a[data-layout], .tt-bg-pattern a[data-pattern], .tt-bg-pattern-widget a[data-pattern-widget]').removeClass('selected');

			return false;

	});

$(window).load(function() {

});

});