<?php  
/**
 * FUEL CMS
 * http://www.getfuelcms.com
 *
 * An open source Content Management System based on the 
 * Codeigniter framework (http://codeigniter.com)
 *
 * @package		FUEL CMS
 * @author		David McReynolds @ Daylight Studio
 * @copyright	Copyright (c) 2014, Run for Daylight LLC.
 * @license		http://docs.getfuelcms.com/general/license
 * @link		http://www.getfuelcms.com
 */

// ------------------------------------------------------------------------

/**
 * Questionnaire Helper
 *
 * Contains functions for the Questionnaire module
 *
 * @package		User Guide
 * @subpackage	Helpers
 * @category	Helpers
 */

// --------------------------------------------------------------------

/**
* Get Modules
*
* Returns a list of Modules from the 'modules_allowed' configuration
*
* @access public
* @return array modules
*/
if (!function_exists('get_modules'))
{
	function get_modules()
	{
		$CI =& get_instance();

		static $modules;

		if (is_null($modules)) {
			$modules[] = 'app';
			$modules = array_merge($modules, $CI->fuel->config('modules_allowed'));
		}

		return array_combine($modules, $modules);
	}
}
