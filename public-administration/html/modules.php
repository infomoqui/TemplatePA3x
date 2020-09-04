<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.joomla-monster.com/license.html Joomla-Monster Proprietary Use License
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

/**
 * @package		Joomla
 * @copyright	Copyright (C) 2005 - 2016 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined('_JEXEC') or die;

function modChrome_jmmodule($module, &$params, &$attribs) {
	$moduleTag			= $params->get('module_tag', 'div');
	$headerTag			= htmlspecialchars($params->get('header_tag', 'h3'));
	$bootstrapSize	= (int) $params->get('bootstrap_size', '0');
	$moduleClass		= $bootstrapSize != '0' ? $bootstrapSize : '';
	if($module->showtitle == 0) { $notitle='notitle'; } else $notitle='';
	$title = $module->title;
	$title = preg_split('#\s#', $title);
		
	if (!empty ($module->content)) {
		echo '<'.$moduleTag.' class="jm-module '.htmlspecialchars($params->get('moduleclass_sfx')).'">';
		echo '<'.$moduleTag.' class="jm-module-in">';
		
		if ((bool) $module->showtitle) {
			echo '<'.$headerTag.' class="jm-title '.$params->get('header_class').'">';
			foreach ($title as $title_word) {
				echo '<span>'.$title_word.'</span> ';
			}
			echo '</'.$headerTag.'>';
		}
		
		echo '<'.$moduleTag.' class="jm-module-content clearfix '.$notitle.'">';
		echo $module->content;
		echo '</'.$moduleTag.'>';
		
		echo '</'.$moduleTag.'>';
		echo '</'.$moduleTag.'>';
	}
}		

function modChrome_jmmoduleraw($module, &$params, &$attribs) {
	if ($module->content != '') {
		$moduleTag	  = $params->get('module_tag', 'div');
		echo '<'.$moduleTag.' class="jm-module-raw '.$params->get('moduleclass_sfx').'">';
		echo $module->content;
		echo '</'.$moduleTag.'>';
	}
}
