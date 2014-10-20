<?php

/**
 * App_Controller
 *
 * @property CI_Controller
 */
class App_Controller extends CI_Controller {

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();

		if (ENVIRONMENT === 'development') {
			// プロファイラをON
			$this->output->enable_profiler(TRUE);
		}

		// helperをロード
		$this->load->helper(array('html', 'form', 'url'));
		// libraryをロード
		$this->load->library(array('session', 'form_validation'));
		$this->form_validation->set_error_delimiters('<p class="text-error">', '</p>');

	}

}

/* End of file App_Controller.php */
/* Location: ./application/core/App_Controller.php */
