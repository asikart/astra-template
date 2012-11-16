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
 * Astra helper.
 */
class AstraHelper
{
	
	static public $view ;
	
	static public $params ;
	
	/*
	 * function init
	 * @param 
	 */
	
	public static function init($view)
	{
		self::$view = $view ;
	}
	
	/*
	 * function getParam
	 * @param $key
	 */
	
	public static function getParam($key = null, $del = null)
	{
		if($key && $del){
			return self::$view->params->get($key, $del) ;
		}elseif( $key ){
			return self::$view->params->get($key) ;
		}else{
			return self::$view->params ;
		}
	}
	
	/*
	 * function getTemplate
	 * @param 
	 */
	
	public static function getTemplate()
	{
		return self::$view ;
	}
	
	/*
	 * function getVersion
	 * @param 
	 */
	
	public static function getVersion()
	{
		return JVERSION ;
	}
	
	
	public static function addIncludePath( $path='' )
    {
        static $paths;
 
        if (!isset($paths)) {
            $paths = array( dirname(__FILE__) );
        }
 
        // force path to array
        settype($path, 'array');
 
        // loop through the path directories
        foreach ($path as $dir)
        {
            if (!empty($dir) && !in_array($dir, $paths)) {
                array_unshift($paths, JPath::clean( $dir ));
            }
        }
 
        return $paths;
    }
	
	
	public static function _( $type )
    {
        //Initialise variables
        $prefix = 'AstraHelper';
        $file   = '';
        $func   = $type;
 
        // Check to see if we need to load a helper file
        $parts = explode('.', $type);
 
        switch(count($parts))
        {
            case 3 :
            {
                $prefix        = preg_replace( '#[^A-Z0-9_]#i', '', $parts[0] );
                $file        = preg_replace( '#[^A-Z0-9_]#i', '', $parts[1] );
                $func        = preg_replace( '#[^A-Z0-9_]#i', '', $parts[2] );
            } break;
 
            case 2 :
            {
                $file        = preg_replace( '#[^A-Z0-9_]#i', '', $parts[0] );
                $func        = preg_replace( '#[^A-Z0-9_]#i', '', $parts[1] );
            } break;
        }
 
        $className    = $prefix.ucfirst($file);
 
        if (!class_exists( $className ))
        {
            jimport('joomla.filesystem.path');
            if ($path = JPath::find(self::addIncludePath(), strtolower($file).'.php'))
            {
                require_once $path;
 
                if (!class_exists( $className ))
                {
                    JError::raiseWarning( 0, $className.'::' .$func. ' not found in file.' );
                    return false;
                }
            }
            else
            {
                JError::raiseWarning( 0, $prefix.$file . ' not supported. File not found.' );
                return false;
            }
        }
 
        if (is_callable( array( $className, $func ) ))
        {
            $temp = func_get_args();
            array_shift( $temp );
            $args = array();
            foreach ($temp as $k => $v) {
                $args[] = &$temp[$k];
            }
            return call_user_func_array( array( $className, $func ), $args );
        }
        else
        {
            JError::raiseWarning( 0, $className.'::'.$func.' not supported.' );
            return false;
        }
    }
}


class Astra extends AstraHelper
{
	
}

