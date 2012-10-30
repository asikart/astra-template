<?php

include_once JPATH_THEMES.'/astra/class/astra.php' ;

AstraHelper::init($this) ;

$app 	= JFactory::getApplication();
$doc 	= JFactory::getDocument();
$user 	= JFactory::getUser();
$this->language = $doc->language;
$this->direction = $doc->direction;



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
	$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap-responsive'.$min.'.css');
}else{
	$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap'.$min.'.css');
	$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap-responsive'.$min.'.css');
	$doc->addScript('templates/'.$this->template.'/js/bootstrap'.$min.'.js');
}



// Add Stylesheets
// ==========================================================================================
$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');



// Navbar
// ==========================================================================================
$inverse = $this->params->get('menucolor', 'black') == 'black' ? ' navbar-inverse' : null ;
$fixtop  = $this->params->get('menufixtop', 1) == true ? true : null ;


// Default Module Chrome Style
// ==========================================================================================
if( Astra::_('jversion.gte30') ){
	$DefaultChromeStyle = 'html5' ;
}else{
	$DefaultChromeStyle = 'xhtml' ;
}
Astra::$view->params->set('defaultChromeStyle', $DefaultChromeStyle) ;