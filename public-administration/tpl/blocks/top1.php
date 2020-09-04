<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

$highContrast = htmlspecialchars($this->params->get('highContrast','0'));
$top1bg = ($this->params->get('top1bg')) ? 'bg' : '';

if($this->countFlexiblock('top1')) : ?>
<div id="jm-top1" class="<?php echo $top1bg; ?><?php echo $this->getClass('block#top1') ?>" <?php if($highContrast) echo 'tabindex="-1" role="region" aria-label="'.JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LABEL_TOP1' ).'"'; ?>>
	<div id="jm-top1-in" class="container-fluid">
		<?php echo $this->renderFlexiblock('top1','jmmodule'); ?>
	</div>
</div>
<?php endif; ?>