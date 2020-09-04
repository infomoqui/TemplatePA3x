<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

if (!defined('JMF_EXEC')) {
	throw new Exception(JText::_('TPL_JMTEMPLATE_MISSING_JFM'));
}

include_once(JMF_TPL_PATH.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'jm_template.php');

$jmtpl = new JMTemplate($this);
$jmtpl->renderScheme('default');
