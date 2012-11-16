<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.Astra
 *
 * @copyright   Copyright (C) 2008 - 2012 Asikart, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Astrap helper.
 */
class AstraHelperPosition
{
	/*
	 * function count
	 * @param 
	 */
	
	public static function countPositions($positions = array())
	{
		$tpl 	= AstraHelper::getTemplate();
		$p 		= array() ;
		
		foreach( $positions as $position ):
			$count = $tpl->countModules($position);
			if($count){
				$p[$position] = $count ;
			}
		endforeach;
		
		return $p ;
	}
	
	
	/*
	 * function countBlocks
	 * @param $block
	 */
	
	public static function getBlockPositions($block)
	{
		$tpl 	= AstraHelper::getTemplate();
		$p 		= array() ;
		
		foreach( range(1, 4) as $num ):
			$position = $block.'-'.$num ;
			$count = $tpl->countModules($position);
			if($count){
				$p[$position] = $count ;
			}
		endforeach;
		
		return $p ;
	}
	
	
	/*
	 * function getBlockPositions
	 * @param $block
	 */
	
	public static function render($block)
	{
		$positions = self::getBlockPositions($block) ;
		$count = count($positions);
		
		$defaultChromeStyle = Astra::getParam('defaultChromeStyle') ;
		
		switch($count){
			case 1 :
				$span = 12 ;
				break;
			
			case 2 :
				$span = 6 ;
				break;
			
			case 3 :
				$span = 4 ;
				break;
			
			case 4 :
				$span = 3 ;
				break ;
			
			default :
				$span = 3 ;
				break ;
		}
		
		$tags = array();
		foreach( $positions as $position => $num ):
			$html = '<jdoc:include type="modules" name="'.$position.'" style="'.$defaultChromeStyle.'" />' ;
			$html = '<div class="span'.$span.'">'.$html.'</div>' ;
			$tags[] = $html ;
		endforeach;
		
		return implode("\n", $tags) ;
	}
}
