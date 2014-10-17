<?php

/**
 * App_Loader
 *
 * @property CI_Loader 
 */
class App_Loader extends CI_Loader {
	
	private $_header_path;
	private $_footer_path;

	/**
	 * constructor
	 */
	function __construct() {
		parent::__construct();
		$this->_header_path = APPPATH . 'views/header.php';
		$this->_footer_path = APPPATH . 'views/footer.php';
	}

	/**
	 * set header file path 
	 * @param string $view
	 */
	public function set_header($view) {
		$this->_header_path = APPPATH . 'views/' . $view . '.php';
	}

	/**
	 * set footer file path 
	 * @param string $view
	 */
	public function set_footer($view) {
		$this->_footer_path = APPPATH . 'views/' . $view . '.php';
	}

	/**
	 * override method
	 * @see CI_Loader::view()
	 */
	public function view($view, $vars = array(), $return = FALSE) {
		$ci = & get_instance();
		$ci->router->fetch_class(); // Get class
		$ci->router->fetch_method(); // Get action

		if (file_exists($this->_header_path)) {
			// ヘッダーファイルあればロード
			$this->_ci_load(array('_ci_path' => $this->_header_path, '_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
		}

		$body = $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));

		if (file_exists($this->_footer_path)) {
			// フッターファイルあればロード
			$this->_ci_load(array('_ci_path' => $this->_footer_path, '_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
		}

		if ($return) {
			return $body;
		}
	}

}
