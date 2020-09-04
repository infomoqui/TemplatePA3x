<?php
	/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

// get logo and site description
$logo = htmlspecialchars($this->params->get('logo'));
$logotext = htmlspecialchars($this->params->get('logoText'));
$sitedescription = htmlspecialchars($this->params->get('siteDescription'));
$app = JFactory::getApplication();
$sitename = $app->getCfg('sitename');

$nightVersion = htmlspecialchars($this->params->get('nightVersion','0'));
$highContrast = htmlspecialchars($this->params->get('highContrast','0'));
$wideSite = htmlspecialchars($this->params->get('wideSite','0'));
$fontswitcher = $this->params->get('fontSizeSwitcher', '0');

$wcagPosition = $this->params->get('wcagPosition', 'pull-right');

$topbarClass = '';
if( $this->checkModules('top-bar-left') || $wcagPosition == 'pull-left' ) {
	$topbarClass .= ' tbl';
}
if( $this->checkModules('top-bar-right') || $wcagPosition == 'pull-right' ) {
	$topbarClass .= ' tbr';
}
if( $this->checkModules('top-bar-center') || $wcagPosition == 'pull-center' ) {
	$topbarClass .= ' tbc';
}

if( ($this->checkModules('top-bar-center') || $wcagPosition == 'pull-center') ) {
	if( $wcagPosition == 'pull-center' ) {
		$topbarSpanLeft = 'span3';
		$topbarSpanRight = 'span3';
		$topbarCenterSpan = 'span6';
	} else {
		$topbarSpanLeft = 'span4';
		$topbarSpanRight = 'span4';
		$topbarCenterSpan = 'span4';
	}
} else {
	$topbarSpanLeft = 'span6';
	$topbarSpanRight = 'span6';
	$topbarCenterSpan = 'hidden';
}

if( $topbarSpanLeft == 'span6' && $wcagPosition == 'pull-left' && !$this->checkModules('top-bar-right') ) {
	$topbarSpanLeft = 'span8';
	$topbarSpanRight = 'span4';
}

if( $topbarSpanRight == 'span6' && $wcagPosition == 'pull-right' && !$this->checkModules('top-bar-left') ) {
	$topbarSpanRight = 'span8';
	$topbarSpanLeft = 'span4';
}

if ($nightVersion
	or $highContrast
	or $wideSite
	or $fontswitcher
	or $this->checkModules('before-top')
	or $this->checkModules('skip-menu')
	or $this->checkModules('logo-right1')
	or $this->checkModules('logo-right2')
	or $this->checkModules('top-menu-nav')
	or ($logo != '')
	or ($logotext != '')
	or ($sitedescription != '')) : ?>
<header id="jm-logo-nav" class="<?php echo $this->getClass('block#logo-nav') ?>" <?php if($highContrast) echo 'role="banner"'; ?>>

	<?php if($this->checkModules('before-top')) : ?>
	<div id="jm-before-top">
		<div class="<?php echo $this->getClass('before-top') ?>">
			<jdoc:include type="modules" name="<?php echo $this->getPosition('before-top') ?>" style="jmmoduleraw" />
		</div>
	</div>
	<?php endif; ?>

	<?php if($this->checkModules('skip-menu')) : ?>
	<nav id="jm-skip-menu" <?php if($highContrast) echo 'tabindex="-1" role="navigation" aria-label="'.JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LABEL_SKIP_MENU' ).'"'; ?>>
		<div id="jm-skip-menu-in" class="<?php echo $this->getClass('skip-menu') ?>">
			<jdoc:include type="modules" name="<?php echo $this->getPosition('skip-menu') ?>" style="jmmoduleraw" />
		</div>
	</nav>
	<?php endif; ?>

	<?php if(( $this->checkModules('top-bar-left') or $this->checkModules('top-bar-right') or $this->checkModules('top-bar-center') or $nightVersion or $highContrast or $wideSite or $fontswitcher) and JFactory::getApplication()-> isSite()) : ?>
	<div id="jm-top-bar" class="<?php echo $topbarClass; ?>">
		<div id="jm-top-bar-in" class="container-fluid">
			<div class="row-fluid">
			<?php //if( $this->checkModules('top-bar-left') || $wcagPosition == 'pull-left' ) : ?>
			<div id="jm-top-bar-left" class="<?php echo $topbarSpanLeft . ' ' . $this->getClass('top-bar-left') ?>">
				<?php 
				if($wcagPosition == 'pull-left') {
					include('wcag.php');
				}
				?>	
				<?php if( $this->checkModules('top-bar-left') ) { ?>
				<div id="jm-top-bar-left-mod" class="pull-left"><jdoc:include type="modules" name="<?php echo $this->getPosition('top-bar-left') ?>" style="jmmoduleraw" /></div>
				<?php } ?>
				
			</div>
			<?php //endif; ?>

			<?php if( $this->checkModules('top-bar-center') || $wcagPosition == 'pull-center' ) : ?>
			<div id="jm-top-bar-center" class="<?php echo $topbarCenterSpan . ' ' . $this->getClass('top-bar-center') ?>">
				<?php 
				if($wcagPosition == 'pull-center') {
					include('wcag.php');
				} 
				if( $this->checkModules('top-bar-center') ) { ?>
					<div id="jm-top-bar-center-mod">
						<jdoc:include type="modules" name="<?php echo $this->getPosition('top-bar-center') ?>" style="jmmoduleraw" />
					</div>
				<? } ?>
			</div>
			<?php endif; ?>

			<?php //if( $this->checkModules('top-bar-right') || $wcagPosition == 'pull-right' ) : ?>
			<div id="jm-top-bar-right" class="<?php echo  $topbarSpanRight . ' ' . $this->getClass('top-bar-right') ?>">
				<?php 
				if($wcagPosition == 'pull-right') {
					include('wcag.php');
				}
				?>
				<?php if( $this->checkModules('top-bar-right') ) { ?>
				<div id="jm-top-bar-right-mod" class="pull-right"><jdoc:include type="modules" name="<?php echo $this->getPosition('top-bar-right') ?>" style="jmmoduleraw" /></div>
				<?php } ?>
			</div>
			<?php //endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if ($this->checkModules('logo-left') or $this->checkModules('logo-right1') or $this->checkModules('logo-right2') or ($logo != '') or ($logotext != '') or ($sitedescription != '')) : ?>
	<div id="jm-logo-wrap-static"></div>
	<div id="jm-logo-wrap">
		<div class="container-fluid">
		<div id="jm-logo-wrap-in">


					<?php if($this->checkModules('logo-left')) : ?>
					<div id="jm-logo-left" class="<?php echo $this->getClass('logo-left') ?>" <?php if($highContrast) echo 'tabindex="-1" role="navigation" aria-label="' . JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_MENU_BUTTON' ) . '"'; ?>>
						<jdoc:include type="modules" name="<?php echo $this->getPosition('logo-left') ?>" style="jmmoduleraw" />
					</div>
					<?php endif; ?>

					<?php if (($logo != '') or ($logotext != '') or ($sitedescription != '')) : ?>
					<div id="jm-logo">

						<?php if (($logo != '') or ($logotext != '') or ($sitedescription != '')) : ?>
							<a href="<?php echo JURI::base(); ?>">
								<?php if ($logo != '') { ?>
								<span id="jm-logo-img"><img src="<?php echo JURI::base(), $logo; ?>" alt="<?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_LOGO_ALT' );?>" /></span>
								<?php } ?>
								<?php if (($logo != '') or ($logotext != '') or ($sitedescription != '')) : ?>
									<span id="jm-logotext-desc">
									<?php if ($logotext != '') { ?>
									<span id="jm-logotext">
									<?php echo $logotext; ?>
									</span>
									<?php } ?>
									<?php if ($sitedescription != '') : ?>
									<span id="jm-sitedesc">
										<?php echo $sitedescription; ?>
									</span>
									<?php endif; ?>
									</span>
								<?php endif; ?>
							</a>
						<?php endif; ?>

					</div>
					<?php endif; ?>


			<?php if($this->checkModules('logo-right1') or $this->checkModules('logo-right2')) : ?>
			<div id="jm-logo-right">
				<?php if($this->checkModules('logo-right1')) : ?>
				<div id="jm-logo-right1" class="clearfix <?php echo $this->getClass('logo-right1') ?>">
					<jdoc:include type="modules" name="<?php echo $this->getPosition('logo-right1') ?>" style="jmmoduleraw" />
				</div>
				<?php endif; ?>

				<?php if($this->checkModules('logo-right2')) : ?>
				<div id="jm-logo-right2" class="clearfix <?php echo $this->getClass('logo-right2') ?>">
					<jdoc:include type="modules" name="<?php echo $this->getPosition('logo-right2') ?>" style="jmmoduleraw" />
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>

		</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if($this->checkModules('top-menu-nav')) : ?>
	<nav id="jm-top-menu" class="<?php echo $this->getClass('top-menu-nav') ?>" <?php if($highContrast) echo 'tabindex="-1" role="navigation" aria-label="' . JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_TOPMENU' ) . '"'; ?>>
		<div id="jm-top-menu-in" class="container-fluid">
			<jdoc:include type="modules" name="<?php echo $this->getPosition('top-menu-nav') ?>" style="jmmoduleraw" />
		</div>
	</nav>
	<?php endif; ?>

</header>
<?php endif; ?>

