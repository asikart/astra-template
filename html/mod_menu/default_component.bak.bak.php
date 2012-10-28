<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? 'class="'.$item->anchor_css.'" ' : '';
$title = $item->anchor_title ? 'title="'.$item->anchor_title.'" ' : '';
$dropdown = '';
if ( preg_match( '/dropdown/', $class_sfx) ) {
	$dropdown = " dropdown";
}
$nav_stacked = '';
if ( preg_match( '/nav-stacked/', $class_sfx ) ) {
	$nav_stacked = " nav-stacked";
}
$nav_list = '';
if ( preg_match( '/nav-list/', $class_sfx ) ) {
	$nav_list = " nav-list";
}
if ($item->menu_image) {
		$item->params->get('menu_text', 1 ) ?
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" /><span class="image-title">'.$item->title.'</span> ' :
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';

}
/*
elseif (($dropdown) && ($item->deeper)) {
		$class = 'class="'.$item->anchor_css.' dropdown-toggle" data-toggle="dropdown" ';
		$linktype = $item->title. '<b class="caret"></b>' ;
}
*/
elseif (($item->deeper) && (!$nav_stacked) && (!$nav_list)) {
		$linktype = $item->title. '<b class="caret"></b>' ;
}
else { 
	$linktype = $item->title;

}

switch ($item->browserNav) :
	default:
	case 0:
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
		break;
	case 1:
		// _blank
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
		break;
	case 2:
	// window.open
?><a <?php echo $class; ?>href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a>
<?php
		break;
endswitch;
