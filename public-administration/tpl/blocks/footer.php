<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

// get information about 'back to top' button
$backtotop = $this->params->get('backToTop', '1');

$highContrast = htmlspecialchars($this->params->get('highContrast','0'));

?>
<footer id="jm-footer" <?php if($highContrast) echo 'tabindex="-1" role="contentinfo" aria-label="'.JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LABEL_COPYRIGHT' ).'"'; ?>>
	<div id="jm-footer-in" class="container-fluid">
		<?php if($this->checkModules('footer-menu')) : ?>
		<div id="jm-footer-menu" class="pull-left <?php echo $this->getClass('footer-menu') ?>">
			<jdoc:include type="modules" name="<?php echo $this->getPosition('footer-menu') ?>" style="raw" />
		</div>
		<?php endif; ?>

		<div id="jm-copy-powered" class="pull-right">
			<?php if($this->checkModules('copyrights')) : ?>
			<div id="jm-copyrights" class="<?php echo $this->getClass('copyrights') ?>">
				<jdoc:include type="modules" name="<?php echo $this->getPosition('copyrights') ?>" style="raw" />
			</div>
			<?php endif; ?>
			<div id="jm-poweredby">
				<a href="https://design-joomla.eu" target="_blank" rel="nofollow">Design</a> by Design-Joomla.eu
			</div>
		</div>
	</div>

	<?php if($this->checkModules('mobile-menu')) : ?>
	<nav id="jm-mobile-menu" <?php if($highContrast) echo 'tabindex="-1" role="navigation" aria-label="'.JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LABEL_MOBILE_MENU' ).'"'; ?>>
		<div id="jm-mobile-menu-in" class="<?php echo $this->getClass('mobile-menu') ?>">
			<jdoc:include type="modules" name="<?php echo $this->getPosition('mobile-menu') ?>" style="jmmoduleraw" />
		</div>
	</nav>
	<?php endif; ?>

	<?php if($this->checkModules('after-footer')) : ?>
	<div id="jm-after-footer">
		<div class="<?php echo $this->getClass('after-footer') ?>">
			<jdoc:include type="modules" name="<?php echo $this->getPosition('after-footer') ?>" style="jmmoduleraw" />
		</div>
	</div>
	<?php endif; ?>

</footer>
<?php if($backtotop == '1' && JFactory::getApplication()-> isSite()) : ?>
<div id="jm-back-top">
	<a href="#"><span class="sr-only"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_BACKTOTOP_LABEL' );?></span></a>
</div>
<?php endif; ?>
