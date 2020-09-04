<?php

/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

class JMTemplate extends JMFTemplate {
	public function postSetUp() {

	// ---------------------------------------------------------
	// LESS MAP
	// ---------------------------------------------------------
		
		// --------------------------------------
		// BOOTSTRAP
		// --------------------------------------
		
		$this->lessMap['bootstrap.less'] = array(
			'bootstrap_variables.less', 
			'template_variables.less',  
			'override/ltr/accordion.less',
			'override/ltr/breadcrumbs.less',
			'override/ltr/button-groups.less',
			'override/ltr/buttons.less',
			'override/ltr/dropdowns.less',
			'override/ltr/forms.less',
			'override/ltr/labels-badges.less',
			'override/ltr/navbar.less',
			'override/ltr/navs.less',
			'override/ltr/pager.less',
			'override/ltr/pagination.less',
			'override/ltr/scaffolding.less',
			'override/ltr/tables.less',
			'override/ltr/type.less',
			'override/ltr/utilities.less',
			'override/ltr/wells.less'
		);

		$this->lessMap['bootstrap_responsive.less'] = array(
			'bootstrap_variables.less', 
			'override/ltr/responsive-767px-max.less'
		);

		// --------------------------------------
		// TEMPLATE
		// --------------------------------------
		
		$this->lessMap['template.less'] = array(
			'bootstrap_variables.less', 
			'template_variables.less',
			'override/ltr/buttons.less', 
			'template_mixins.less',
			//template
			'animated_buttons.less',
			'editor.less',
			'joomla.less',
			'layout.less',
			'menus.less',
			'modules.less',
			//extensions
			'djmediatools.less',
			'djtabs.less',
		);
		
		//RESPONSIVE
		$this->lessMap['template_responsive.less'] = array(
			'bootstrap_variables.less', 
			'template_variables.less', 
			'override/ltr/buttons.less',
			'template_mixins.less',
			//extensions
			'djmediatools_responsive.less'
		);
		
		// other files
		// ---------------------------
		
		$common_ltr = array(
			'bootstrap_variables.less',
			'template_variables.less',
			'override/ltr/buttons.less',
			'template_mixins.less'
		);

		$this->lessMap['comingsoon.less'] = $common_ltr;
		$this->lessMap['offcanvas.less'] = $common_ltr;
		$this->lessMap['offline.less'] = $common_ltr;
		$this->lessMap['custom.less'] = $common_ltr;
		
		//extensions
		$this->lessMap['djmegamenu.less'] = $common_ltr;

		// ---------------------------------------------------------
		// LESS VARIABLES
		// ---------------------------------------------------------
		
		$bootstrap_vars = array();

		/* Template Layout */

		$templatefluidwidth = $this->params->get('JMfluidGridContainerLg', $this->defaults->get('JMfluidGridContainerLg'));
		$bootstrap_vars['JMfluidGridContainerLg'] = $templatefluidwidth;

		$gutterwidth = $this->params->get('JMbaseSpace', $this->defaults->get('JMbaseSpace'));
		$bootstrap_vars['JMbaseSpace'] = $gutterwidth;

		$offcanvaswidth = $this->params->get('JMoffCanvasWidth', $this->defaults->get('JMoffCanvasWidth'));
		$bootstrap_vars['JMoffCanvasWidth'] = $offcanvaswidth;

		/* Font Modifications */

		//body

		$bodyfontsize = (int)$this->params->get('JMbaseFontSize', $this->defaults->get('JMbaseFontSize'));
		$bootstrap_vars['JMbaseFontSize'] = $bodyfontsize.'px';

		$bodyfonttype = $this->params->get('bodyFontType', $this->defaults->get('bodyFontType'));
		$bodyfontfamily = $this->params->get('bodyFontFamily', $this->defaults->get('bodyFontFamily')); 
		$bodygooglewebfontfamily = $this->params->get('bodyGoogleWebFontFamily', $this->defaults->get('bodyGoogleWebFontFamily')); 
		$bodygeneratedwebfontfamily = $this->params->get('bodyGeneratedWebFont');

		switch($bodyfonttype) {
			case "0" : {
				$bootstrap_vars['JMbaseFontFamily'] = $bodyfontfamily;
				break;
			}
			case "1" :{
				$bootstrap_vars['JMbaseFontFamily'] = $bodygooglewebfontfamily;
				break;
			}
			case "2" :{
				$bootstrap_vars['JMbaseFontFamily'] = $bodygeneratedwebfontfamily;
				break;
			}
			default: {
				$bootstrap_vars['JMbaseFontFamily'] = $this->defaults->get('bodyGoogleWebFontFamily');
				break;
			}
		}

		//module title

	 	$headingsfontsize = (int)$this->params->get('JMmoduleTitleFontSize', $this->defaults->get('JMmoduleTitleFontSize'));
		$bootstrap_vars['JMmoduleTitleFontSize'] = $headingsfontsize.'px';

		$headingsfonttype = $this->params->get('headingsFontType', $this->defaults->get('headingsFontType'));
		$headingsfontfamily = $this->params->get('headingsFontFamily', $this->defaults->get('headingsFontFamily')); 
		$headingsgooglewebfontfamily = $this->params->get('headingsGoogleWebFontFamily', $this->defaults->get('headingsGoogleWebFontFamily'));
		$headingsgeneratedwebfontfamily = $this->params->get('headingsGeneratedWebFont');

		switch($headingsfonttype) {
			case "0" : {
				$bootstrap_vars['JMmoduleTitleFontFamily'] = $headingsfontfamily;
				break;
			}
			case "1" :{
				$bootstrap_vars['JMmoduleTitleFontFamily'] = $headingsgooglewebfontfamily;
				break;
			}
			case "2" :{
				$bootstrap_vars['JMmoduleTitleFontFamily'] = $headingsgeneratedwebfontfamily;
				break;
			}
			default: {
				$bootstrap_vars['JMmoduleTitleFontFamily'] = $this->defaults->get('headingsGoogleWebFontFamily');
				break;
			}
		}

		//top menu horizontal

		$djmenufontsize = (int)$this->params->get('JMtopmenuFontSize', $this->defaults->get('JMtopmenuFontSize'));
		$bootstrap_vars['JMtopmenuFontSize'] = $djmenufontsize.'px';

		$djmenufonttype = $this->params->get('djmenuFontType', $this->defaults->get('djmenuFontType'));
		$djmenufontfamily = $this->params->get('djmenuFontFamily', $this->defaults->get('djmenuFontFamily'));
		$djmenugooglewebfontfamily = $this->params->get('djmenuGoogleWebFontFamily', $this->defaults->get('djmenuGoogleWebFontFamily'));
		$djmenugeneratedwebfontfamily = $this->params->get('djmenuGeneratedWebFont');

			switch($djmenufonttype) {
				case "0" : {
					$bootstrap_vars['JMtopmenuFontFamily'] = $djmenufontfamily;
					break;
				}
				case "1" :{
					$bootstrap_vars['JMtopmenuFontFamily'] = $djmenugooglewebfontfamily;
					break;
				}
				case "2" :{
					$bootstrap_vars['JMtopmenuFontFamily'] = $djmenugeneratedwebfontfamily;
					break;
				}
				default: {
					$bootstrap_vars['JMtopmenuFontFamily'] = $this->defaults->get('djmenuGoogleWebFontFamily');
					break;
				}
			}
			
		//blog title

		$blogfontsize = (int)$this->params->get('JMblogTitleFontSize', $this->defaults->get('JMblogTitleFontSize'));
		$bootstrap_vars['JMblogTitleFontSize'] = $blogfontsize.'px';

		$blogfonttype = $this->params->get('blogFontType', $this->defaults->get('blogFontType'));
		$blogfontfamily = $this->params->get('blogFontFamily', $this->defaults->get('blogFontFamily'));
		$bloggooglewebfontfamily = $this->params->get('blogGoogleWebFontFamily');
		$bloggeneratedfontfamily = $this->params->get('blogGeneratedWebFont');

		switch($blogfonttype) {
			case "0" : {
				$bootstrap_vars['JMblogTitleFontFamily'] = $blogfontfamily;
				break;
			}
			case "1" :{
				$bootstrap_vars['JMblogTitleFontFamily'] = $bloggooglewebfontfamily;
				break;
			}
			case "2" :{
				$bootstrap_vars['JMblogTitleFontFamily'] = $bloggeneratedfontfamily;
				break;
			}
			default: {
				$bootstrap_vars['JMblogTitleFontFamily'] = $this->defaults->get('blogFontFamily');
				break;
			}
		}			

		//article title

		$articlesfontsize = (int)$this->params->get('JMarticleTitleFontSize', $this->defaults->get('JMarticleTitleFontSize'));
		$bootstrap_vars['JMarticleTitleFontSize'] = $articlesfontsize.'px';

		$articlesfonttype = $this->params->get('articlesFontType', $this->defaults->get('articlesFontType'));
		$articlesfontfamily = $this->params->get('articlesFontFamily', $this->defaults->get('articlesFontFamily'));
		$articlesgooglewebfontfamily = $this->params->get('articlesGoogleWebFontFamily');
		$articlesgeneratedfontfamily = $this->params->get('articlesGeneratedWebFont');

		switch($articlesfonttype) {
			case "0" : {
				$bootstrap_vars['JMarticleTitleFontFamily'] = $articlesfontfamily;
				break;
			}
			case "1" :{
				$bootstrap_vars['JMarticleTitleFontFamily'] = $articlesgooglewebfontfamily;
				break;
			}
			case "2" :{
				$bootstrap_vars['JMarticleTitleFontFamily'] = $articlesgeneratedfontfamily;
				break;
			}
			default: {
				$bootstrap_vars['JMarticleTitleFontFamily'] = $this->defaults->get('articlesFontFamily');
				break;
			}
		}

		//logo

		$logofontsize = (int)$this->params->get('JMlogoFontSize', $this->defaults->get('JMlogoFontSize'));
		$bootstrap_vars['JMlogoFontSize'] = $logofontsize.'px';

		$logofonttype = $this->params->get('logoFontType', $this->defaults->get('logoFontType'));
		$logofontfamily = $this->params->get('logoFontFamily', $this->defaults->get('logoFontFamily'));
		$logogooglewebfontfamily = $this->params->get('logoGoogleWebFontFamily');
		$logogeneratedfontfamily = $this->params->get('logoGeneratedWebFont');

		switch($logofonttype) {
			case "0" : {
				$bootstrap_vars['JMlogoFontFamily'] = $logofontfamily;
				break;
			}
			case "1" :{
				$bootstrap_vars['JMlogoFontFamily'] = $logogooglewebfontfamily;
				break;
			}
			case "2" :{
				$bootstrap_vars['JMlogoFontFamily'] = $logogeneratedfontfamily;
				break;
			}
			default: {
				$bootstrap_vars['JMlogoFontFamily'] = $this->defaults->get('logoFontFamily');
				break;
			}
		}

		/* Color Modifications */

		//scheme color
		$JMcolorVersion = $this->params->get('JMcolorVersion', $this->defaults->get('JMcolorVersion'));
		$bootstrap_vars['JMcolorVersion'] = $JMcolorVersion;

		$JMschemeFontColor = $this->params->get('JMschemeFontColor', $this->defaults->get('JMschemeFontColor'));
		$bootstrap_vars['JMschemeFontColor'] = $JMschemeFontColor;

		//scheme images directory
		$JMimagesDir = $this->params->get('JMimagesDir', 'scheme1');
		$bootstrap_vars['JMimagesDir'] = $JMimagesDir;

		// global
		// -------------------------------------

		$JMpageBackground = $this->params->get('JMpageBackground', $this->defaults->get('JMpageBackground'));
		$bootstrap_vars['JMpageBackground'] = $JMpageBackground;

		$JMbaseFontColor = $this->params->get('JMbaseFontColor', $this->defaults->get('JMbaseFontColor'));
		$bootstrap_vars['JMbaseFontColor'] = $JMbaseFontColor;
		
		$JMarticleTitleColor = $this->params->get('JMarticleTitleColor', $this->defaults->get('JMarticleTitleColor'));
		$bootstrap_vars['JMarticleTitleColor'] = $JMarticleTitleColor;
		
		$JMmoduleTitleColor = $this->params->get('JMmoduleTitleColor', $this->defaults->get('JMmoduleTitleColor'));
		$bootstrap_vars['JMmoduleTitleColor'] = $JMmoduleTitleColor;

		$JMborder = $this->params->get('JMborder', $this->defaults->get('JMborder'));
		$bootstrap_vars['JMborder'] = $JMborder;

		// Top bar
		// -------------------------------------
		
		$JMtopbarFontColor = $this->params->get('JMtopbarFontColor', $this->defaults->get('JMtopbarFontColor'));
		$bootstrap_vars['JMtopbarFontColor'] = $JMtopbarFontColor;
		
		$JMtopbarBackground = $this->params->get('JMtopbarBackground', $this->defaults->get('JMtopbarBackground'));
		$bootstrap_vars['JMtopbarBackground'] = $JMtopbarBackground;

		// header
		// -------------------------------------
		
		$JMheaderFontColor = $this->params->get('JMheaderFontColor', $this->defaults->get('JMheaderFontColor'));
		$bootstrap_vars['JMheaderFontColor'] = $JMheaderFontColor;
		
		$JMheaderBackground = $this->params->get('JMheaderBackground', $this->defaults->get('JMheaderBackground'));
		$bootstrap_vars['JMheaderBackground'] = $JMheaderBackground;
		
		$JMheaderModuleTitle = $this->params->get('JMheaderModuleTitle', $this->defaults->get('JMheaderModuleTitle'));
		$bootstrap_vars['JMheaderModuleTitle'] = $JMheaderModuleTitle;
		

		// topmenu
		// -------------------------------------

		$JMtopmenuFontColor = $this->params->get('JMtopmenuFontColor', $this->defaults->get('JMtopmenuFontColor'));
		$bootstrap_vars['JMtopmenuFontColor'] = $JMtopmenuFontColor;

		//submenu
		$JMtopSubmenuBackground = $this->params->get('JMtopSubmenuBackground', $this->defaults->get('JMtopSubmenuBackground'));
		$bootstrap_vars['JMtopSubmenuBackground'] = $JMtopSubmenuBackground;
		
		$JMtopSubmenuFontColor = $this->params->get('JMtopSubmenuFontColor', $this->defaults->get('JMtopSubmenuFontColor'));
		$bootstrap_vars['JMtopSubmenuFontColor'] = $JMtopSubmenuFontColor;
		

		// top2 & bottom2
		// -------------------------------------
		
		$JMtop2FontColor = $this->params->get('JMtop2FontColor', $this->defaults->get('JMtop2FontColor'));
		$bootstrap_vars['JMtop2FontColor'] = $JMtop2FontColor;
		
		$JMtop2Background = $this->params->get('JMtop2Background', $this->defaults->get('JMtop2Background'));
		$bootstrap_vars['JMtop2Background'] = $JMtop2Background;
		
		$JMtop2ModuleTitle = $this->params->get('JMtop2ModuleTitle', $this->defaults->get('JMtop2ModuleTitle'));
		$bootstrap_vars['JMtop2ModuleTitle'] = $JMtop2ModuleTitle;
		
		// bottom3
		// -------------------------------------
		
		$JMbottom3FontColor = $this->params->get('JMbottom3FontColor', $this->defaults->get('JMbottom3FontColor'));
		$bootstrap_vars['JMbottom3FontColor'] = $JMbottom3FontColor;
		
		$JMbottom3Background = $this->params->get('JMbottom3Background', $this->defaults->get('JMbottom3Background'));
		$bootstrap_vars['JMbottom3Background'] = $JMbottom3Background;
		
		$JMbottom3ModuleTitle = $this->params->get('JMbottom3ModuleTitle', $this->defaults->get('JMbottom3ModuleTitle'));
		$bootstrap_vars['JMbottom3ModuleTitle'] = $JMbottom3ModuleTitle;

		// footer
		// -------------------------------------
		
		$JMfooterFontColor = $this->params->get('JMfooterFontColor', $this->defaults->get('JMfooterFontColor'));
		$bootstrap_vars['JMfooterFontColor'] = $JMfooterFontColor;
		
		$JMfooterBackground = $this->params->get('JMfooterBackground', $this->defaults->get('JMfooterBackground'));
		$bootstrap_vars['JMfooterBackground'] = $JMfooterBackground;
		
		$JMfooterModuleTitle = $this->params->get('JMfooterModuleTitle', $this->defaults->get('JMfooterModuleTitle'));
		$bootstrap_vars['JMfooterModuleTitle'] = $JMfooterModuleTitle;

		$JMfooterLinkColor = $this->params->get('JMfooterLinkColor', $this->defaults->get('JMfooterLinkColor'));
		$bootstrap_vars['JMfooterLinkColor'] = $JMfooterLinkColor;

		// blog
		// -------------------------------------
		
		$JMblogFontColor = $this->params->get('JMblogFontColor', $this->defaults->get('JMblogFontColor'));
		$bootstrap_vars['JMblogFontColor'] = $JMblogFontColor;
		
		$JMblogBackground = $this->params->get('JMblogBackground', $this->defaults->get('JMblogBackground'));
		$bootstrap_vars['JMblogBackground'] = $JMblogBackground;
		
		$JMblogTitleFontColor = $this->params->get('JMblogTitleFontColor', $this->defaults->get('JMblogTitleFontColor'));
		$bootstrap_vars['JMblogTitleFontColor'] = $JMblogTitleFontColor;

		// offcanvas
		// -------------------------------------

		$JMoffCanvasBackground = $this->params->get('JMoffCanvasBackground', $this->defaults->get('JMoffCanvasBackground'));
		$bootstrap_vars['JMoffCanvasBackground'] = $JMoffCanvasBackground;

		$JMoffCanvasFontColor = $this->params->get('JMoffCanvasFontColor', $this->defaults->get('JMoffCanvasFontColor'));
		$bootstrap_vars['JMoffCanvasFontColor'] = $JMoffCanvasFontColor;
		
		$JMoffCanvasModuleTitle = $this->params->get('JMoffCanvasModuleTitle', $this->defaults->get('JMoffCanvasModuleTitle'));
		$bootstrap_vars['JMoffCanvasModuleTitle'] = $JMoffCanvasModuleTitle;

		// -------------------------------------
		// extensions
		// -------------------------------------

		$JMmediatoolsDescriptionFontColor = $this->params->get('JMmediatoolsDescriptionFontColor', $this->defaults->get('JMmediatoolsDescriptionFontColor'));
		$bootstrap_vars['JMmediatoolsDescriptionFontColor'] = $JMmediatoolsDescriptionFontColor;

		$JMmediatoolsDescriptionBackground = $this->params->get('JMmediatoolsDescriptionBackground', $this->defaults->get('JMmediatoolsDescriptionBackground'));
		$bootstrap_vars['JMmediatoolsDescriptionBackground'] = $JMmediatoolsDescriptionBackground;

		$JMmediatoolsOpacity = $this->params->get('JMmediatoolsOpacity', $this->defaults->get('JMmediatoolsOpacity'));
		$bootstrap_vars['JMmediatoolsOpacity'] = $JMmediatoolsOpacity;

		// tabs
		// -------------------------------------
		
		$JMtabsFontColor = $this->params->get('JMtabsFontColor', $this->defaults->get('JMtabsFontColor'));
		$bootstrap_vars['JMtabsFontColor'] = $JMtabsFontColor;
		
		$JMtabsBackground = $this->params->get('JMtabsBackground', $this->defaults->get('JMtabsBackground'));
		$bootstrap_vars['JMtabsBackground'] = $JMtabsBackground;
		
		$JMtabsTitleFontColor = $this->params->get('JMtabsTitleFontColor', $this->defaults->get('JMtabsTitleFontColor'));
		$bootstrap_vars['JMtabsTitleFontColor'] = $JMtabsTitleFontColor;

		$JMtabsTitleBackground = $this->params->get('JMtabsTitleBackground', $this->defaults->get('JMtabsTitleBackground'));
		$bootstrap_vars['JMtabsTitleBackground'] = $JMtabsTitleBackground;

		// -------------------------------------

		$this->params->set('jm_bootstrap_variables', $bootstrap_vars);

		// -------------------------------------
		// compile LESS
		// -------------------------------------

		$app=JFactory::getApplication();

		// Offline Page
		$this->CompileStyleSheet(JPath::clean(JMF_TPL_PATH.'/less/offline.less'), true);

		// DJ-Megamenu
		$djmegamenu_theme_css = $this->CompileStyleSheet(JPath::clean(JMF_TPL_PATH.'/less/djmegamenu.less'), true, true);

		$djmegamenu_theme_less = 'templates/'.$app->getTemplate().'/less/djmegamenu.less';

		// -------------------------------------
		// extensions themes
		// -------------------------------------

		$themer=(int)$this->params->get('themermode',0)==1?true:false;

		if($themer) {// add LESS files when Theme Customizer enabled
			$urlsToRemove=array(
				'templates/'.$app->getTemplate().'/css/djmegamenu.css' => array('url' => $djmegamenu_theme_less, 'type' => 'less'),
			);
			$app->set('jm_remove_stylesheets',$urlsToRemove);
		} else {// add CSS files when Theme Customizer disabled
			$urlsToRemove=array(
				'templates/'.$app->getTemplate().'/css/djmegamenu.css' => array('url' => $djmegamenu_theme_css, 'type' => 'css'),
			);
			$app->set('jm_remove_stylesheets',$urlsToRemove);
		}
	}
}