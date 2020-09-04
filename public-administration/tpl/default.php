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

// sticky bar
$stickybar = $this->params->get('stickyBar','0') ? 'sticky-bar' : '';

// mobile menu
$mobilemenu = $this->checkModules('mobile-menu') ? 'mobile-menu' : '';

// responsive
$responsivelayout = $this->params->get('responsiveLayout', '1');
$responsivedisabled = ($responsivelayout != '1') ? 'responsive-disabled' : '';

// coming soon
$comingsoon = $this->params->get('comingSoon', '0');
$comingsoondate = $this->params->get('comingSoonDate');

$tz = new DateTimeZone(JFactory::getConfig()->get('offset', 'UTC'));
$server_date_cs = JFactory::getDate($comingsoondate, $tz);
$timestamp_cs = $server_date_cs->toUnix();
$server_date_now = JFactory::getDate(null, $tz);
$timestamp_now = $server_date_now->toUnix();
$futuredate = ($timestamp_now > $timestamp_cs) ? '0' : '1';

// get offcanvas
$offcanvas = $this->params->get('offCanvas', '0');

// get off-canvas position
$offcanvasside = ($offcanvas == '1') ? $this->params->get('offCanvasPosition', $this->defaults->get('offCanvasPosition')) : '';
if ($offcanvasside == 'right') {
	$offcanvasposition = 'off-canvas-right';
} else if ($offcanvasside == 'left') {
	$offcanvasposition = 'off-canvas-left';
} else {
	$offcanvasposition = '';
}

// contrast
$contrast = '';
$width = '';
$fsize = '';
$expire = time()+3600*24*7;
$path = JURI::root(true).'/';
$document = JFactory::getDocument();
//add js path
$document -> addScriptDeclaration('window.cookiePath = \''.$path.'\';');

if (isset($_GET['contrast'])) { //check contrast in address
	switch($_GET['contrast']) {
		case "normal" : {
			if(isset($_COOKIE['contrast'])) {
				setcookie('contrast', '', time() - 3600, $path); //remove cookie
			}
			break;
		}
		case "night" :{
			setcookie('contrast', 'night', $expire, $path);
			$contrast = 'night';
			break;
		}
		case "highcontrast" :{
			setcookie('contrast', 'highcontrast', $expire, $path);
			$contrast = 'highcontrast';
			break;
		}
		case "highcontrast2" :{
			setcookie('contrast', 'highcontrast2', $expire, $path);
			$contrast = 'highcontrast2';
			break;
		}
		case "highcontrast3" :{
			setcookie('contrast', 'highcontrast3', $expire, $path);
			$contrast = 'highcontrast3';
			break;
		}
		default: {
			$contrast = '';
			break;
		}
	}
} else {
	if(isset($_COOKIE['contrast'])) { //check contrast in cookie
		switch($_COOKIE['contrast']) {
			case "night" :{
				$contrast = 'night';
				break;
			}
			case "highcontrast" :{
				$contrast = 'highcontrast';
				break;
			}
			case "highcontrast2" :{
				$contrast = 'highcontrast2';
				break;
			}
			case "highcontrast3" :{
				$contrast = 'highcontrast3';
				break;
			}
			default: {
				$contrast = '';
				break;
			}
		}
	}
}

// width
if (isset($_GET['width'])) { //check width in address
	switch($_GET['width']) {
		case "fixed" :{
			if(isset($_COOKIE['pagewidth'])) {
				setcookie('pagewidth', '', time() - 3600, $path); //remove cookie
			}
			break;
		}
		case "wide" :{
			setcookie('pagewidth', 'wide', $expire, $path);
			$width = 'wide-page';
			break;
		}
		default: {
			$width = '';
			break;
		}
	}
} else {
	if(isset($_COOKIE['pagewidth'])=='wide') { //check width in cookie
		$width = 'wide-page';
	}
}

// font-size
if (isset($_GET['fontsize'])) { //check fsize in address
	switch($_GET['fontsize']) {
		case "70" :{
			setcookie('jm-font-size', '70', $expire, $path);
			$fsize = 'fsize70';
			break;
		}
		case "100" :{
			if(isset($_COOKIE['jm-font-size'])) {
				setcookie('jm-font-size', '', time() - 3600, $path); //remove cookie
			}
			$fsize = 'fsize100';
			break;
		}
		case "130" :{
			setcookie('jm-font-size', '130', $expire, $path);
			$fsize = 'fsize130';
			break;
		}
		default: {
			$fsize = '';
			break;
		}
	}
} else {
	if(isset($_COOKIE['jm-font-size'])) { //check fsize in cookie
		$fsize = 'fsize'.$_COOKIE['jm-font-size'];
	}
}

// custom classes
$nightVersion = htmlspecialchars($this->params->get('nightVersion','0'));
$highContrast = htmlspecialchars($this->params->get('highContrast','0'));
$wideSite = htmlspecialchars($this->params->get('wideSite','0'));
$fontswitcher = $this->params->get('fontSizeSwitcher', '0');

$wcagsettings = ($nightVersion or $highContrast or $wideSite or $fontswitcher) ? 'settings' : '';

// define default blocks and their default order (can be changed in layout builder)
$blocks = $this->getBlocks('logo-nav,header,top1,top2,system-message,main,bottom1,bottom2,bottom3,footer-mod,footer','comingsoon');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $direction; ?>">
<head>
	<?php $this->renderBlock('head'); ?>
</head>
<body class="<?php echo $responsivedisabled.' '.$offcanvasposition.' '.$stickybar.' '.$mobilemenu.' '.$contrast. ' '.$width.' '.$fsize. ' '.$wcagsettings; ?>">
	<div id="jm-allpage">
		<?php
	if(($comingsoon!='0') AND (!empty($comingsoondate)) AND ($futuredate=='1') AND JFactory::getApplication()-> isSite() AND JFactory::getUser()->guest) {
			$this->renderBlock('comingsoon'); 
	} else { ?>
			<?php if($offcanvas == '1') : ?>
				<?php $this->renderBlock('offcanvas'); ?>
			<?php endif; ?>
			<?php foreach($blocks as $block) { ?>
				<?php $this->renderBlock($block); ?>
			<?php } ?>
		<?php } ?>
	</div>
</body>
</html>