<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * App_System_Filter
 * 
 * System common call back class.
 */
class App_System_Filter {

	/**
	 * Called very early during system execution.
	 */
	public function pre_system() {
		log_message('debug', 'Hooks Call to method: ' . __CLASS__ . '::' . __FUNCTION__);
	}

	/**
	 * Enables you to call your own function instead of the _display_cache() function in the output class.
	 */
//	public function cache_override() {
//		log_message('debug', 'Hooks Call to method: ' . __CLASS__ . '::'. __FUNCTION__);
//	}

	/**
	 * Called immediately prior to any of your controllers being called.
	 */
	public function pre_controller() {
		log_message('debug', 'Hooks Call to method: ' . __CLASS__ . '::' . __FUNCTION__);
	}

	/**
	 * Called immediately after your controller is instantiated.
	 */
	public function post_controller_constructor() {
		log_message('debug', 'Hooks Call to method: ' . __CLASS__ . '::' . __FUNCTION__);
	}

	/**
	 * Called immediately after your controller is fully executed.
	 */
	public function post_controller() {
		log_message('debug', 'Hooks Call to method: ' . __CLASS__ . '::' . __FUNCTION__);
	}

	/**
	 * Overrides the _display() function,
	 * used to send the finalized page to the web browser at the end of system execution.
	 */
//	public function display_override() {
//		log_message('debug', 'Hooks Call to method: ' . __CLASS__ . '::'. __FUNCTION__);
//	}

	/**
	 * Called after the final rendered page is sent to the browser,
	 * at the end of system execution after the finalized data is sent to the browser.
	 */
	public function post_system() {
		log_message('debug', 'Hooks Call to method: ' . __CLASS__ . '::' . __FUNCTION__);
	}

}
