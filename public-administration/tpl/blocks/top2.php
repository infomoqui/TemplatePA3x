<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

$highContrast = htmlspecialchars($this->params->get('highContrast','0'));
$top2bg = ($this->params->get('top2bg')) ? 'bg' : '';

if($this->countFlexiblock('top2')) : ?>
<div id="jm-top2" class="<?php echo $top2bg; ?><?php echo $this->getClass('block#top2') ?>" <?php if($highContrast) echo 'tabindex="-1" role="region" aria-label="'.JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LABEL_TOP2' ).'"'; ?>>
	<div id="jm-top2-in" class="container-fluid">
		<?php echo $this->renderFlexiblock('top2','jmmodule'); ?>
	</div>
</div>
<?php endif; ?>