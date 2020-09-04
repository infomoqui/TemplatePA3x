<?php
/*--------------------------------------------------------------
 # Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

// get column's classes
$class = $this->params->get('class');

$highContrast = htmlspecialchars($this->params->get('highContrast','0'));

// check component part
if($this->checkModules('breadcrumbs')
 OR ($this->displayComponent())
 OR ($this->checkModules('content-top'))
 OR ($this->checkModules('left-column'))
 OR ($this->checkModules('right-column'))
 OR ($this->checkModules('content-bottom'))) : ?>
<div id="jm-main" <?php if($highContrast) echo 'tabindex="-1"'; ?>>
	<div class="container-fluid">
		<?php if($this->checkModules('breadcrumbs')) : ?>
		<div class="row-fluid">
			<div id="jm-breadcrumbs" class="span12 <?php echo $this->getClass('breadcrumbs') ?>" <?php if($highContrast) echo 'role="navigation" aria-label="'.JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LABEL_BREADCRUMBS' ).'"'; ?>>
				<jdoc:include type="modules" name="<?php echo $this->getPosition('breadcrumbs') ?>" style="jmmodule" />
			</div>
		</div>
		<?php endif; ?>
		<div class="row-fluid">
			<div id="jm-content" class="<?php echo $class['content']; ?>">
				<?php if($this->checkModules('content-top')) : ?>
				<div id="jm-content-top" class="<?php echo $this->getClass('content-top') ?>" <?php if($highContrast) echo 'role="complementary" aria-label="'.JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LABEL_CONTENT_TOP' ).'"'; ?>>
					<?php echo $this->renderModules('content-top','jmmodule'); ?>
				</div>
				<?php endif; ?>
				<?php if ($this->displayComponent()) : ?>
				<main id="jm-maincontent" <?php if($highContrast) echo 'tabindex="-1" role="main"'; ?>>
					<jdoc:include type="component" />
				</main>
				<?php endif ?>
				<?php if($this->checkModules('content-bottom')) : ?>
				<div id="jm-content-bottom" class="<?php echo $this->getClass('content-bottom') ?>" <?php if($highContrast) echo 'role="complementary" aria-label="'.JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LABEL_CONTENT_BOTTOM' ).'"'; ?>>
					<?php echo $this->renderModules('content-bottom','jmmodule'); ?>
				</div>
				<?php endif; ?>
			</div>
			<?php if($this->checkModules('left-column')) : ?>
			<aside id="jm-left" class="<?php echo $class['left']; ?>" <?php if($highContrast) echo 'role="complementary" aria-label="'.JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LABEL_LEFT_COLUMN' ).'"'; ?>>
				<div class="<?php echo $this->getClass('left-column'); ?>">
					<?php echo $this->renderModules('left-column','jmmodule'); ?>
				</div>
			</aside>
			<?php endif; ?>
			<?php if($this->checkModules('right-column')) : ?>
			<aside id="jm-right" class="<?php echo $class['right']; ?>" <?php if($highContrast) echo 'role="complementary" aria-label="'.JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LABEL_RIGHT_COLUMN' ).'"'; ?>>
				<div class="<?php echo $this->getClass('right-column'); ?>">
					<?php echo $this->renderModules('right-column','jmmodule'); ?>
				</div>
			</aside>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?>