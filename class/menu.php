<?php
/**
 * @version     1.0.0
 * @package     tpl_astrap
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Created by AKHelper - http://asikart.com
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Astra helper.
 */
class AstraHelperMenu
{
	
	/*
	 * function getMenus
	 * @param $menutype
	 */
	
	public static function getMenus($menutype)
	{
		$app 	= JFactory::getApplication();
		$menu 	= $app->getMenu();
		$active = ($menu->getActive()) ? $menu->getActive() : $menu->getDefault();
		
		$items  = $menu->getItems('menutype', $params->get('menutype'));
	}
	
	
	/*
	 * function render
	 * @param $menutype
	 */
	
	public static function render($menutype)
	{
		//$menus = self::getMenus($menutype);
		include_once JPATH_ROOT.'/modules/mod_menu/helper.php' ;
		$params = new JRegistry();
		$params->set('menutype', $menutype);
		$params->set('showAllChildren', true);
		
		$items 		= modMenuHelper::getList($params);
		$active		= modMenuHelper::getActive($params);
		$active_id 	= $active->id;
		$path		= $active->tree;
		
		self::renBegin(1);
		
		foreach ($items as $i => &$item) :
			$class = 'item-'.$item->id;
			if ($item->id == $active_id) {
				$class .= ' current';
			}
		
			if (	$item->type == 'alias' &&
					in_array($item->params->get('aliasoptions'),$path)
				||	in_array($item->id, $path)) {
				$class .= ' active';
			}
		
			if (($item->deeper)) {
				$class .= $item->level < 2 ? ' dropdown' : ' dropdown-submenu';
			}
				
			elseif ($item->deeper) {
				$class .= ' deeper';
			}
			
			if ($item->parent) {
				$class .= ' parent';
			}
		
			if (!empty($class)) {
				$class = ' class="'.trim($class) .'"';
			}
		
			echo '<li'.$class.'>';
		
			// Render the menu item.
			switch ($item->type) :
				case 'separator':
				case 'url':
				case 'component':
					require dirname(__FILE__).'/menuitem_type/default_'.$item->type.'.php';
					break;
		
				default:
					require dirname(__FILE__).'/menuitem_type/default_url.php';
					break;
			endswitch;
		
			// The next item is deeper.
			if (($item->deeper)){
				if ($item->level < 2) {
					echo '<ul class="dropdown-menu">';
				}
				else {
					echo '<ul class="dropdown-menu">';
				}
			}
			elseif ($item->deeper) {
				echo '<ul>';
			}
			// The next item is shallower.
			elseif ($item->shallower) {
				echo '</li>';
				echo str_repeat('</ul></li>', $item->level_diff);
			}
			// The next item is on the same level.
			else {
				echo '</li>';
			}
		endforeach;
		
		self::renEnd();
	}
	
	
	/*
	 * function renBegin
	 * @param $level
	 */
	
	public static function renBegin($level)
	{
		if($level = 1) {
			echo '<ul class="nav">' ;
		}
	}
	
	
	/*
	 * function renEnd
	 * @param 
	 */
	
	public static function renEnd()
	{
		echo '</ul>' ;
	}
}
