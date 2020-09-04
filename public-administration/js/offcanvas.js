/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

//jQuery Off-Canvas

var scrollsize;

jQuery(function() {
	// Toggle Nav on Click
	jQuery('.toggle-nav').click(function() {
		// Get scroll size on offcanvas open
		if(!jQuery('body').hasClass('off-canvas')) scrollsize = jQuery(window).scrollTop();
			// Calling a function
			toggleNav();
	});
});

function toggleNav() {
	var y = jQuery(window).scrollTop();
	if (jQuery('body').hasClass('off-canvas')) {
		// Do things on Nav Close
		jQuery('body').removeClass('off-canvas');
		setTimeout(function() {
			jQuery('.sticky-bar #jm-logo-nav').removeAttr('style');
			jQuery('html').removeClass('no-scroll').removeAttr('style');
			jQuery(window).scrollTop(scrollsize);
		}, 300);
	} else {
		// Do things on Nav Open
		jQuery('body').addClass('off-canvas');
		jQuery('.sticky-bar #jm-logo-nav').css({'position':'absolute', 'top':y});
		setTimeout(function() {
			jQuery('html').addClass('no-scroll').css('top',-y);
		}, 300);
	}
}
