<?php

/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

/**
 * @package			Joomla.Site
 * @subpackage	Template.system
 *
 * @copyright		Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license			GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app	 = JFactory::getApplication();
$doc	 = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/system/css/general.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template ?>/css/print.css" type="text/css" />
	<!-- Load Bootstrap -->
	<?php if ($this->direction == 'rtl') { ?>
		<?php JHtmlBootstrap::loadCss($includeMaincss = true, $this->direction = 'rtl'); ?>
	<?php } else { ?>
		<?php JHtmlBootstrap::loadCss($includeMaincss = true, $this->direction = 'ltr'); ?>
	<?php } ?>
</head>
<body class="contentpane modal">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>