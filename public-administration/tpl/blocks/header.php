<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

$highContrast = htmlspecialchars($this->params->get('highContrast','0'));

if ($this->checkModules('header')) : ?>
	<div id="jm-header" class="<?php echo $this->getClass('block#header') ?>" <?php if($highContrast) echo 'tabindex="-1" role="region" aria-label="'.JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LABEL_HEADER' ).'"'; ?>>
		<div id="jm-header-in" class="container-fluid">
				<jdoc:include type="modules" name="<?php echo $this->getPosition('header'); ?>" style="jmmodule"/>
		</div>
	</div>
<?php endif; ?>