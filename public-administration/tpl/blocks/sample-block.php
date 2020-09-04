<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

// get the name of this block
$name = JFile::stripExt(JFile::getName(__FILE__));

if($this->countFlexiblock($name)) : ?>
<div id="jm-<?php echo $name ?>" class="<?php echo $this->getClass('block#'.$name) ?>">
	<div class="container-fluid">
		<?php echo $this->renderFlexiblock($name,'jmmodule'); ?>
	</div>
</div>
<?php endif; ?>