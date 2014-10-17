<?php

/**
 * App_Loader
 *
 * @property CI_Loader 
 */
class App_Loader extends CI_Loader {

	/**
	 * constructor
	 */
	function __construct() {
		parent::__construct();
		$this->header_path = APPPATH . 'views/header.php';
		$this->footer_path = APPPATH . 'views/footer.php';
	}

	/**
	 * set header file path 
	 * @param string $view
	 */
	public function set_header($view) {
		$this->header_path = APPPATH . 'views/' . $view . '.php';
	}

	/**
	 * set footer file path 
	 * @param string $view
	 */
	public function set_footer($view) {
		$this->footer_path = APPPATH . 'views/' . $view . '.php';
	}

	/**
	 * override method
	 * @see CI_Loader::view()
	 */
	public function view($view, $vars = array(), $return = FALSE) {
		$ci = & get_instance();
		$ci->router->fetch_class(); // Get class
		$ci->router->fetch_method(); // Get action

		if (file_exists($this->header_path)) {
			// ヘッダーファイルあればロード
			$this->_ci_load(array('_ci_path' => $this->header_path, '_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
		}

		$body = $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));

		if (file_exists($this->footer_path)) {
			// フッターファイルあればロード
			$this->_ci_load(array('_ci_path' => $this->footer_path, '_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
		}

		if ($return) {
			return $body;
		}
	}

}
