<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.system
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app = JFactory::getApplication();

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

require_once JPATH_ADMINISTRATOR . '/components/com_users/helpers/users.php';

$twofactormethods = UsersHelper::getTwoFactorMethods();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template ?>/css/offline.css" type="text/css" />
	<link href="//fonts.googleapis.com/css?family=Raleway:300,400,500,600" rel="stylesheet" type="text/css">
</head>
<body>
	<jdoc:include type="message" />
	<div class="jm-allpage">
		<div class="container">
	    	<div class="container-in">
				<div id="jm-logo">
				<?php if ($app->get('offline_image') && file_exists($app->get('offline_image'))) { ?>
				<img src="<?php echo $app->get('offline_image'); ?>" alt="<?php echo htmlspecialchars($app->get('sitename')); ?>" />
				<?php } else { ?>
				<h1><?php echo htmlspecialchars($app->get('sitename')); ?></h1>
	      		<?php } ?>
				</div>
			</div>
		</div>
		<div class="container">
	    	<div class="container-in">
	      		<div class="wrapper">
	        		<?php if ($app->get('display_offline_message', 1) == 1 && str_replace(' ', '', $app->get('offline_message')) != '') : ?>
	          		<p><?php echo $app->get('offline_message'); ?></p>
	        		<?php elseif ($app->get('display_offline_message', 1) == 2 && str_replace(' ', '', JText::_('JOFFLINE_MESSAGE')) != '') : ?>
					<p><?php echo JText::_('JOFFLINE_MESSAGE'); ?></p>
	        		<?php endif; ?>
	        		<form action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="form-login">
	        			<fieldset class="input">
	          				<p id="form-login-username">
	            				<input name="username" id="username" type="text" class="inputbox" alt="<?php echo JText::_('JGLOBAL_USERNAME'); ?>" size="18"  placeholder="<?php echo JText::_('JGLOBAL_USERNAME'); ?>" />
	          				</p>
							<p id="form-login-password">
								<input type="password" name="password" class="inputbox" size="18" alt="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" id="passwd"  placeholder="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" />
							</p>
							<?php if (count($twofactormethods) > 1) : ?>
							<p id="form-login-secretkey">
								<input type="text" name="secretkey" class="inputbox" size="18" alt="<?php echo JText::_('JGLOBAL_SECRETKEY'); ?>" id="secretkey"  placeholder="<?php echo JText::_('JGLOBAL_SECRETKEY'); ?>" />
							</p>
							<?php endif; ?>
							<p id="submit-buton">
								<input type="submit" name="Submit" class="button login" value="<?php echo JText::_('JLOGIN'); ?>" />
							</p>
							<?php if (JPluginHelper::isEnabled('system', 'remember')) : ?>
							<p id="form-login-remember">
								<input type="checkbox" name="remember" class="inputbox" value="yes" alt="<?php echo JText::_('JGLOBAL_REMEMBER_ME'); ?>" id="remember" />
								<label for="remember"><?php echo JText::_('JGLOBAL_REMEMBER_ME'); ?></label>
							</p>
							<?php endif; ?>
							<input type="hidden" name="option" value="com_users" />
							<input type="hidden" name="task" value="user.login" />
							<input type="hidden" name="return" value="<?php echo base64_encode(JUri::base()); ?>" />
							<?php echo JHtml::_('form.token'); ?>
						</fieldset>
					</form>
				</div> 
			</div>
		</div>
	</div>
</body>
</html>