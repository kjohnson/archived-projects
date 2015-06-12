<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * FUEL CMS
 * http://www.getfuelcms.com
 *
 * An open source Content Management System based on the 
 * Codeigniter framework (http://codeigniter.com)
 *
 * @package		FUEL CMS
 * @author		David McReynolds @ Daylight Studio
 * @copyright	Copyright (c) 2013, Run for Daylight LLC.
 * @license		http://docs.getfuelcms.com/general/license
 * @link		http://www.getfuelcms.com
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Contact Helper
 *
 * @package		Contact
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Kyle B. Johnson
 * @link		https://github.com/kbjohnson90/FUEL-CMS-Contact-Module
 */


// --------------------------------------------------------------------

/**
 * Returns an HTML block from the specified theme's _block
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	boolean
 * @return	string
 */
function contact_block($view, $vars = array(), $return = FALSE) {
	$CI =& get_instance();
	$theme_path = $CI->fuel->contact->config('theme_path');
	$module = $CI->fuel->contact->config('theme_module');
	$block_path = $theme_path . "/_blocks/" . $view;
	if ($return) {
		return $CI->load->module_view($module, $block_path, $vars);
	}
	$CI->load->module_view($module, $block_path, $vars);
}


/* End of file contact_helper.php */
/* Location: ./modules/contact/helpers/contact_helper.php */