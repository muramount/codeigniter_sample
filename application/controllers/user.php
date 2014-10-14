<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// プロファイラをON
		$this->output->enable_profiler(TRUE);

		// helperをロード
		$this->load->helper(array('form', 'url'));
		// libraryをロード
		$this->load->library(array('session', 'form_validation'));

		// モデルを別名でロードする
		$this->load->model('user_model', 'user');
	}

	/**
	 * 一覧
	 */
	public function index() {
		// viewに渡す値
		$data = array();

		// user一覧取得
		$data['users'] = $this->user->find_all();

		// viewにセット
		$this->load->view('user/index', $data);
	}

	/**
	 * 登録
	 * @param string $type "confirm" or "complete"
	 */
	public function add($type = null) {
		if ($this->input->post()) {
			// バリデート実行
			if ($this->form_validation->run('user_add') == FALSE) {
				// バリデートエラー
				$this->load->view('user/add', $this->input->post());
				return;
			}

			if ($this->input->post('back')) {
				// 確認画面の戻るボタン押下時
				$this->load->view('user/add', $this->input->post());
				return;
			}

			if ($type == 'confirm') {
				// 確認画面へ
				$this->load->view('user/add_confirm', $this->input->post());
				return;
			} else if ($type == 'complete') {
				// 登録処理
				$this->user->set($this->input->post());
				$this->user->insert();

				// 一覧で登録完了メッセージ表示
				$this->session->set_flashdata('message', '登録しました');
				redirect('user/index');
				return;
			}
		} else {
			$this->load->view('user/add');
			return;
		}
	}

	/**
	 * バッチ処理
	 * @param mixed $param
	 */
	public function batch($param = null) {
		if ($this->input->is_cli_request()) {
			// CLIで実行された場合

			$this->output->enable_profiler(false);
			echo $param . "\n";
		} else {
			// HTTPアクセスなどは404へ
			show_404();
		}
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
