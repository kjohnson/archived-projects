<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * FUEL CMS
 * http://www.getfuelcms.com
 *
 * An open source Content Management System based on the 
 * Codeigniter framework (http://codeigniter.com)
 */

// ------------------------------------------------------------------------

/**
 * Fuel Contact object 
 *
 * @package		FUEL CMS
 * @subpackage	Libraries
 * @category	Libraries
 */

// --------------------------------------------------------------------

class Fuel_contact extends Fuel_advanced_module {
	
	public $name = "contact"; // the folder name of the module
	
	/**
	 * Constructor - Sets preferences
	 *
	 * The constructor can be passed an array of config values
	 */
	function __construct($params = array())
	{
		parent::__construct();
		$this->initialize($params);
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Initialize the backup object
	 *
	 * Accepts an associative array as input, containing backup preferences.
	 * Also will set the values in the config as properties of this object
	 *
	 * @access	public
	 * @param	array	config preferences
	 * @return	void
	 */	
	function initialize($params)
	{
		parent::initialize($params);
		$this->set_params($this->_config);
	}

	// --------------------------------------------------------------------
	
	/**
	 * Add your custom methods for this advanced module below.
	 * You will be able to access it via $this->fuel->contact->my_method()
	 */	
	
}