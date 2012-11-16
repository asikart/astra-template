<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.Astra
 *
 * @copyright   Copyright (C) 2008 - 2012 Asikart, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

include_once JPATH_THEMES.'/astra/class/astra.php' ;

AstraHelper::init($this) ;

$app 	= JFactory::getApplication();
$doc 	= JFactory::getDocument();
$user 	= JFactory::getUser();
$this->language = $doc->language;
$this->direction = $doc->direction;



// Setting params
// ==========================================================================================
if( empty($this->params) ) {
	$this->params = $params = JFactory::getApplication()->getTemplate(true)->params;
}


// Detecting Active Variables
// ==========================================================================================
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}



// Add JavaScript Frameworks
// ==========================================================================================
$min = JDEBUG ? '.min' : '' ;
if( Astra::_('jversion.gte30') ){
	JHtml::_('bootstrap.framework');
	$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap'.$min.'.css');
	
	if($this->params->get('responsive', 1)){
		$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap-responsive'.$min.'.css');
	}
}else{
	$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap'.$min.'.css');
	
	if($this->params->get('responsive', 1)){
		$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap-responsive'.$min.'.css');
	}
	
	
	$doc->addScript('templates/'.$this->template.'/js/bootstrap-j25-fix.js');
	$doc->addScript('templates/'.$this->template.'/js/jquery'.$min.'.js');
	$doc->addScript('templates/'.$this->template.'/js/jquery-noconflict.js');
	$doc->addScript('templates/'.$this->template.'/js/bootstrap'.$min.'.js');
}



// Add Stylesheets
// ==========================================================================================
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');


// Template Color
// ==========================================================================================
$bg_color 	= $this->params->get('template_background_color', '#FFF');
$text_color = $this->params->get('template_text_color', '#111');


// Site Title
// ==========================================================================================
$site_title = $this->params->get('site_title', $app->getCfg('sitename'));
$site_desc 	= $this->params->get('site_description');
$logo_file 	= $this->params->get('logo_file');
$footer_logo_file 	= $this->params->get('footer_logo_file');


// Navbar
// ==========================================================================================
$inverse = $this->params->get('menucolor', 'black') == 'black' ? ' navbar-inverse' : null ;
$fixtop  = $this->params->get('menufixtop', 1) == true ? true : null ;


// Banner
// ==========================================================================================
$banner_bg_file 	= $this->params->get('banner_bg_file');
$banner_text_color 	= $this->params->get('banner_text_color');


// Default Module Chrome Style
// ==========================================================================================
if( Astra::_('jversion.gte30') ){
	$DefaultChromeStyle = 'html5' ;
}else{
	$DefaultChromeStyle = 'xhtml' ;
}
Astra::$view->params->set('defaultChromeStyle', $DefaultChromeStyle) ;


// Fluid Container
// ==========================================================================================
$fluid = $this->params->get('fluidContainer', 0) ? '-fluid' : null ;


// SideBar
// ==========================================================================================
if($this->getType() == 'html'){
	$leftColSpan 		= $this->countModules('left') 		? $this->params->get('left_col_width', 3) 		: 0 ;
	$rightColSpan 		= $this->countModules('right') 		? $this->params->get('right_col_width', 3) 		: 0 ;
	$leftInnerColSpan 	= $this->countModules('left-inner') ? $this->params->get('leftinner_col_width', 2) 	: 0 ;
	$rightInnerColSpan 	= $this->countModules('right-inner')? $this->params->get('rightinner_col_width', 2) : 0 ;
}



// Footer
// ==========================================================================================
$footer_color 		= $this->params->get('footercolor', 'black') ;
$footer_logo_float 	= $this->params->get('footer_logo_float', 'pull-left') ;
