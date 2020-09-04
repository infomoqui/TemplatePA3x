<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

// get direction
$direction = $this->params->get('direction', 'ltr');

// get logo and site description
$logo = htmlspecialchars($this->params->get('logo'));
$logotext = htmlspecialchars($this->params->get('logoText'));

// get coming soon
$comingsoondate = $this->params->get('comingSoonDate');
$tz = new DateTimeZone(JFactory::getConfig()->get('offset', 'UTC'));
$server_date_cs = JFactory::getDate($comingsoondate, $tz);
$timestamp_cs = $server_date_cs->toUnix();
$server_date_now = JFactory::getDate(null, $tz);
$timestamp_now = $server_date_now->toUnix();

?>
<div id="jm-coming-soon">
  <div class="container-fluid container-large">
    <script type="text/javascript">
    /*
    * Basic Count Down to Date and Time
    * Author: @mrwigster / trulycode.com
    */
    (function (e) {
      e.fn.countdown = function (t) {
      function i() {
        eventDate = <?php echo $timestamp_cs ?>;
        local = Math.floor(e.now() / 1000);
        var nowDate = new Date();
        currentDate = Math.floor(nowDate.getTime()/1000);
        if (eventDate <= currentDate) {
          jQuery('.button').css('display', 'inline-block');
          jQuery('#countdown').hide();
        }
        seconds = eventDate - currentDate;
        days = Math.floor(seconds / 86400);
        seconds -= days * 60 * 60 * 24;
        hours = Math.floor(seconds / 3600);
        seconds -= hours * 60 * 60;
        minutes = Math.floor(seconds / 60);
        seconds -= minutes * 60;
        days == 1 ? thisEl.find(".timeRefDays").text("<?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_COMINGSOON_DAY'); ?>") : thisEl.find(".timeRefDays").text("<?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_COMINGSOON_DAYS'); ?>");
        hours == 1 ? thisEl.find(".timeRefHours").text("<?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_COMINGSOON_HOUR'); ?>") : thisEl.find(".timeRefHours").text("<?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_COMINGSOON_HOURS'); ?>");
        minutes == 1 ? thisEl.find(".timeRefMinutes").text("<?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_COMINGSOON_MINUTE'); ?>") : thisEl.find(".timeRefMinutes").text("<?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_COMINGSOON_MINUTES'); ?>");
        seconds == 1 ? thisEl.find(".timeRefSeconds").text("<?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_COMINGSOON_SECOND'); ?>") : thisEl.find(".timeRefSeconds").text("<?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_COMINGSOON_SECONDS'); ?>");
        
        days = String(days).length >= 2 ? days : "0" + days;
        hours = String(hours).length >= 2 ? hours : "0" + hours;
        minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
        seconds = String(seconds).length >= 2 ? seconds : "0" + seconds
      
            if (!isNaN(eventDate)) {
              thisEl.find(".days").text(days);
          thisEl.find(".hours").text(hours);
          thisEl.find(".minutes").text(minutes);
          thisEl.find(".seconds").text(seconds)
        }
      }
      thisEl = e(this);
    
      i();
      interval = setInterval(i, 1000)
      }
      })(jQuery);
      jQuery(document).ready(function () {
      function e() {
        var e = new Date;
      }
      jQuery("#countdown").countdown();
    });
    </script>
    <?php if (($logo != '') or ($logotext != '')) : ?>
    <div id="jm-logo">
      <a href="<?php echo JURI::base(); ?>">
        <?php if ($logo != '') : ?>
        <img src="<?php echo JURI::base(), $logo; ?>" alt="<?php if($logotext) { echo $logotext; }; ?>" />
        <?php else : ?>
        <?php echo '<h1>'.$logotext.'</h1>';?>
        <?php endif; ?>
      </a>
    </div>
    <?php endif;
	if($this->countModules('coming-soon')) : ?>
    <div id="jm-coming-module">
        <jdoc:include type="modules" name="coming-soon" style="jmmodule"/>
    </div> 
    <?php endif; ?> 
    <div id="countdown">
		<p class="d"><span class="days">00</span><span class="timeRefDays"><?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_COMINGSOON_DAYS'); ?></span></p>
		<p><span class="hours">00</span><span class="timeRefHours"><?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_COMINGSOON_HOURS'); ?></span></p>
		<p><span class="minutes">00</span><span class="timeRefMinutes"><?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_COMINGSOON_MINUTES'); ?></span></p>
		<p><span class="seconds">00</span><span class="timeRefSeconds"><?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_COMINGSOON_SECONDS'); ?></span></p>  
    </div>
    <a class="button" href="<?php echo JURI::base(); ?>" title="<?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_HOME_PAGE'); ?>" style="display: none;"><?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_HOME_PAGE'); ?></a>
  </div>
</div>