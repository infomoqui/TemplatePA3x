/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

//Set Module's Height script

function setModulesHeight() {
	var regexp = new RegExp("_mod([0-9]+)$");

	var jmmodules = jQuery(document).find('.jm-module') || [];
	if (jmmodules.length) {
		jmmodules.each(function(index,element){
			var match = regexp.exec(element.className) || [];
			if (match.length > 1) {
				var modHeight = parseInt(match[1]);
				jQuery(element).find('.jm-module-in').css('height', modHeight + 'px');
			}
		});
	}
}

// Sticky Bar
function stickyBar() {
	var body = jQuery('body');
	var isSticky = body.hasClass('sticky-bar');
	if(isSticky) {
		var bar = jQuery('#jm-logo-wrap');
		if(bar.length) {
			var topbar = jQuery('#jm-top-bar');
			var barHeight = bar.outerHeight();
			var barPos = ( topbar ) ? topbar.outerHeight() : 0;
			var barStatic = jQuery('#jm-logo-wrap-static');
			barStatic.css('height', barHeight + 'px');
			bar.css('top', barPos + 'px');
			var scroll = jQuery(window).scrollTop();
			if(scroll > barPos) {
				body.addClass('scrolled');
				bar.css('top', 0 + 'px');
			} else {
				body.removeClass('scrolled');
				bar.css('top', barPos + 'px');
			}
		}
	}
}

jQuery(document).ready(function(){

	jQuery('.section-link-ms').closest('[aria-label]').addClass('small-padding');
	jQuery('.login label[for="remember"]').closest('.control-group').addClass('login-remember');

	jQuery('.contact-form #jform_spacer-lbl').closest('.control-group').addClass('contact-required');
	jQuery('.contact-form #jform_captcha-lbl').closest('fieldset').addClass('contact-captcha');
	jQuery('.contact-ps .contact-form #jform_contact_message').closest('.control-group').addClass('contact-message').nextAll().andSelf().wrapAll('<div class="right-column"></div>');
	jQuery('.contact-ps .contact-form fieldset:first-child > .control-group').wrapAll('<div class="left-column"></div>');


	jQuery('#jm-mobile-menu, #jm-mobile-menu a').on('focus blur', function(){
		jQuery('body').toggleClass('mobile-menu-focused');
	});

	setModulesHeight();
	stickyBar();
	jQuery(window).resize(function() {
		stickyBar();
	});
	jQuery(window).scroll(function () {
		stickyBar();
	});
});

jQuery(window).load(function() {
	jQuery('#g-recaptcha-response').attr('aria-labelledby', 'g-recaptcha-response');
	jQuery('.field-calendar button').attr('aria-label', jQuery('.field-calendar button').attr('title'));
	jQuery('.chzn-container-single.chzn-container-single-nosearch .chzn-search').remove();
});


