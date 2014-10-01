<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		// viewに渡す値
		$data = array();

		// モデルを別名でロードする
		$this->load->model('user_model', 'user');
		
		// user一覧取得
		$data['users'] = $this->user->find_all();
		
		// viewにセット
		$this->load->view('user/index', $data);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
