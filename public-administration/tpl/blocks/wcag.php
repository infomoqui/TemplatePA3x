<?php if($nightVersion or $highContrast or $wideSite or $fontswitcher) : ?>
<ul class="jm-wcag-settings <?php echo $wcagPosition; ?>">
	<?php if($nightVersion or $highContrast) : ?>
	<li class="contrast">
		<ul>
			<li class="contrast-label"><span class="jm-separator"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_CONTRAST_TITLE' );?></span></li>
			<li><a href="index.php?contrast=normal" rel="nofollow" class="jm-normal" title="<?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_DEFAULT_LAYOUT_DESC' );?>"><span class="fa fa-sun-o" aria-hidden="true"></span><span class="sr-only"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_DEFAULT_LAYOUT_LABEL' );?></span></a></li>
			<?php if($nightVersion) : ?>
			<li><a href="index.php?contrast=night" rel="nofollow" class="jm-night" title="<?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_NIGHT_VERSION_DESC' );?>"><span class="fa fa-moon-o" aria-hidden="true"></span><span class="sr-only"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_NIGHT_VERSION_LABEL' );?></span></a></li>
			<?php endif; ?>
			<?php if($highContrast) : ?>
			<li><a href="index.php?contrast=highcontrast" rel="nofollow" class="jm-highcontrast" title="<?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_HIGH_CONTRAST1_DESC' );?>"><span class="fa fa-eye" aria-hidden="true"></span><span class="sr-only"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_HIGH_CONTRAST1' );?></span></a></li>
			<li><a href="index.php?contrast=highcontrast2" rel="nofollow" class="jm-highcontrast2" title="<?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_HIGH_CONTRAST2_DESC' );?>"><span class="fa fa-eye" aria-hidden="true"></span><span class="sr-only"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_HIGH_CONTRAST2' );?></span></a></li>
			<li><a href="index.php?contrast=highcontrast3" rel="nofollow" class="jm-highcontrast3" title="<?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_HIGH_CONTRAST3_DESC' );?>"><span class="fa fa-eye" aria-hidden="true"></span><span class="sr-only"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_HIGH_CONTRAST3' );?></span></a></li>
			<?php endif; ?>
		</ul>
	</li>
	<?php endif; ?>
	<?php if($wideSite) : ?>
	<li class="container-width">
		<ul>
			<li class="width-label"><span class="jm-separator"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_WIDTH_TITLE' );?></span></li>
			<li><a href="index.php?width=fixed" rel="nofollow" class="jm-fixed" title="<?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_FIXED_SITE_DESC' );?>"><span class="fa fa-compress" aria-hidden="true"></span><span class="sr-only"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_FIXED_SITE_LABEL' );?></span></a></li>
			<li><a href="index.php?width=wide" rel="nofollow" class="jm-wide" title="<?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_WIDE_SITE_DESC' );?>"><span class="fa fa-expand" aria-hidden="true"></span><span class="sr-only"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_WIDE_SITE_LABEL' );?></span></a></li>
		</ul>
	</li>
	<?php endif; ?>
	<?php if($fontswitcher) : ?>
	<li class="resizer">
		<ul>
			<li class="resizer-label"><span class="jm-separator"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_RESIZER_TITLE' );?></span></li>
			<li><a href="index.php?fontsize=70" rel="nofollow" class="jm-font-smaller" title="<?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_RESIZER_SMALL_DESC' );?>"><span class="fa fa-minus-circle" aria-hidden="true"></span><span class="sr-only"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_RESIZER_SMALL' );?></span></a></li>
			<li><a href="index.php?fontsize=100" rel="nofollow" class="jm-font-normal" title="<?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_RESIZER_NORMAL_DESC' );?>"><span class="fa fa-font" aria-hidden="true"></span><span class="sr-only"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_RESIZER_NORMAL' );?></span></a></li>
			<li><a href="index.php?fontsize=130" rel="nofollow" class="jm-font-larger" title="<?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_RESIZER_LARGE_DESC' );?>"><span class="fa fa-plus-circle" aria-hidden="true"></span><span class="sr-only"><?php echo JText::_( 'PLG_SYSTEM_JMFRAMEWORK_CONFIG_RESIZER_LARGE' );?></span></a></li>
		</ul>
	</li>
	<?php endif; ?>
</ul>
<?php endif; ?>
