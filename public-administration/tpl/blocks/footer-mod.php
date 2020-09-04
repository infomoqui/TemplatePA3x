<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

$highContrast = htmlspecialchars($this->params->get('highContrast','0'));

if($this->countFlexiblock('footer')) : ?>
<div id="jm-footer-mod" class="<?php echo $this->getClass('block#footer-mod') ?>" <?php if($highContrast) echo 'tabindex="-1" role="region" aria-label="'.JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LABEL_FOOTER_MOD' ).'"'; ?>>
	<div id="jm-footer-mod-in" class="container-fluid">
		<?php echo $this->renderFlexiblock('footer','jmmodule'); ?>
	</div>
</div>
<?php endif; ?>