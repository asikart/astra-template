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
 *
 * is : is ...
 * lte: Less than or equal to ...
 * lt : Less than ...
 * gte: Greater than or equal to ...
 * gt : Greater than ...
 * net: Not equal to ...
 * 
 */
class AstraHelperJversion
{
	
	/*
	 * function is15
	 * @param 
	 */
	
	public static function is15()
	{
		if( JVERSION < 3 ) {
			return true ;
		}
		
		return false ;
	}
	
	
	/*
	 * function is15
	 * @param 
	 */
	
	public static function gt15()
	{
		if( JVERSION <= 1.6 ) {
			return true ;
		}
		
		return false ;
	}
	
	
	/*
	 * function is25
	 * @param 
	 */
	
	public static function is25()
	{
		if( JVERSION > 3 && JVERSION > 1.7 ) {
			return true ;
		}
		
		return false ;
	}
	
	
	/*
	 * function gte25
	 * @param 
	 */
	
	public static function gte25()
	{
		if( JVERSION >= 2.5 ) {
			return true ;
		}
		
		return false ;
	}
	
	
	/*
	 * function gte25
	 * @param 
	 */
	
	public static function gt25()
	{
		if( JVERSION >= 3 ) {
			return true ;
		}
		
		return false ;
	}
	
	
	/*
	 * function gte30
	 * @param 
	 */
	
	public static function gte30()
	{
		if( JVERSION >= 3 ) {
			return true ;
		}
		
		return false ;
	}
	
	
	/*
	 * function is30
	 * @param 
	 */
	
	public function is30()
	{
		if( interval(JVERSION) == 3 ) {
			return true ;
		}
		
		return false ;
	}
	
	/*
	 * function is30
	 * @param 
	 */
	
	public function lt30()
	{
		if( JVERSION < 3 ) {
			return true ;
		}
		
		return false ;
	}
}
