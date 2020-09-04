<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.joomla-monster.com/license.html Joomla-Monster Proprietary Use License
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

//advanced selectors font parameters
$advancedfontsize = $this->params->get('advancedFontSize', $this->defaults->get('advancedFontSize'));
$advancedfonttype = $this->params->get('advancedFontType', $this->defaults->get('advancedFontType'));
$advancedfontfamily = $this->params->get('advancedFontFamily', $this->defaults->get('advancedFontFamily'));
$advancedgooglewebfontfamily = $this->params->get('advancedGoogleWebFontFamily');
$advancedgeneratedfontfamily = $this->params->get('advancedGeneratedWebFont');
$advancedselectors = $this->params->get('advancedSelectors');
if($advancedselectors != '') {
		echo $advancedselectors; ?> {
		<?php 
		switch($advancedfonttype) {
				case "0":
						echo "font-family: ".$advancedfontfamily.";";
				break;
				case "1":
						echo "font-family: ".$advancedgooglewebfontfamily.";";
				break;
				case "2":
						echo "font-family: ".$advancedgeneratedfontfamily.";";
				break;
				default: 
						echo "font-family: ".$this->defaults->get('advancedFontFamily').";";
		}
		?>
		font-size: <?php echo $advancedfontsize; ?>;
}
<?php
}
?>