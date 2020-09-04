/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

//jQuery high contrast/night version switcher

jQuery(document).ready(function(){
	var NormalButton = jQuery('.jm-normal');
	var NightVersionButton = jQuery('.jm-night');
	var HighContrastButton = jQuery('.jm-highcontrast');
	var HighContrastButton2 = jQuery('.jm-highcontrast2');
	var HighContrastButton3 = jQuery('.jm-highcontrast3');
	var FixedButton = jQuery('.jm-fixed');
	var WideButton = jQuery('.jm-wide');
	//stickybar
	var body = jQuery('body');
	var isSticky = body.hasClass('sticky-bar');
	
	NormalButton.click(function(event) {
		event.preventDefault();
		jQuery.removeCookie('contrast', { path: window.cookiePath });
		jQuery('body').removeClass('night highcontrast highcontrast2 highcontrast3');
		if(isSticky) {
			setTimeout(stickyBar, 300);
		}
	});
	
	NightVersionButton.click(function(event) {
		event.preventDefault();
		jQuery.cookie('contrast', 'night', { expires: 7, path: window.cookiePath });
		jQuery('body').removeClass('highcontrast highcontrast2 highcontrast3');
		jQuery('body').addClass('night');
		if(isSticky) {
			setTimeout(stickyBar, 300);
		}
	});
	
	HighContrastButton.click(function(event) {
		event.preventDefault();
		jQuery.cookie('contrast', 'highcontrast', { expires: 7, path: window.cookiePath });
		jQuery('body').removeClass('night highcontrast2 highcontrast3');
		jQuery('body').addClass('highcontrast');
		if(isSticky) {
			setTimeout(stickyBar, 300);
		}
	});
	
	HighContrastButton2.click(function(event) {
		event.preventDefault();
		jQuery.cookie('contrast', 'highcontrast2', { expires: 7, path: window.cookiePath });
		jQuery('body').removeClass('night highcontrast highcontrast3');
		jQuery('body').addClass('highcontrast2');
		if(isSticky) {
			setTimeout(stickyBar, 300);
		}
	});
	
	HighContrastButton3.click(function(event) {
		event.preventDefault();
		jQuery.cookie('contrast', 'highcontrast3', { expires: 7, path: window.cookiePath });
		jQuery('body').removeClass('night highcontrast highcontrast2');
		jQuery('body').addClass('highcontrast3');
		if(isSticky) {
			setTimeout(stickyBar, 300);
		}
	});
	
	FixedButton.click(function(event) {
		event.preventDefault();
		jQuery.removeCookie('pagewidth', { path: window.cookiePath });
		jQuery('body').removeClass('wide-page');
		if(isSticky) {
			setTimeout(stickyBar, 300);
		}
	});
	
	WideButton.click(function(event) {
		event.preventDefault();
		jQuery.cookie('pagewidth', 'wide', { expires: 7, path: window.cookiePath });
		jQuery('body').addClass('wide-page');
		if(isSticky) {
			setTimeout(stickyBar, 300);
		}
	});
	
});