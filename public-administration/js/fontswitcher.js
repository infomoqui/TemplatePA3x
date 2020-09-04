/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

jQuery(document).ready(function() { 
	
	var JMbody = jQuery('body');
	var isSticky = JMbody.hasClass('sticky-bar');
	
	if(jQuery.cookie('jm-font-size')) {
		count = parseInt(jQuery.cookie('jm-font-size'));
		JMbody.addClass('fsize' + count); 
	} else {
		count = 100; //default step
	}

	jQuery('.jm-font-larger').click(function(event){    
		event.preventDefault();
		if(count<130) {
			JMbody.removeClass('fsize' + count);
			count = count + 10;
			JMbody.addClass('fsize' + count);
			jQuery.cookie('jm-font-size', count, { expires: 7, path: window.cookiePath });
			if(isSticky) {
				setTimeout(stickyBar, 300);
			}
		}	

	});
	
	jQuery('.jm-font-smaller').click(function(event){
		event.preventDefault();
		if(count>70) {
			JMbody.removeClass('fsize' + count);
			count = count - 10;
			JMbody.addClass('fsize' + count);
			jQuery.cookie('jm-font-size', count, { expires: 7, path: window.cookiePath });
			if(isSticky) {
				setTimeout(stickyBar, 300);
			}
		}
		
	});
	
	jQuery('.jm-font-normal').click(function(event){
		event.preventDefault();
		JMbody.removeClass('fsize70 fsize80 fsize90 fsize100 fsize110 fsize120 fsize130');
		count = 100;
		jQuery.removeCookie('jm-font-size', { path: window.cookiePath });
		if(isSticky) {
			setTimeout(stickyBar, 300);
		}
	}); 
	
});