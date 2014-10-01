<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();

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

	public function add($type = null) {
		if ($this->input->post()) {
			// バリデーション設定
			$this->form_validation->set_rules('name', '名前', 'required|max_length[256]');
			$this->form_validation->set_rules('password', 'パスワード', 'required|min_length[6]|max_length[256]');
			$this->form_validation->set_rules('mail', 'メールアドレス', 'required|valid_email|max_length[256]');

			// バリデート実行
			if ($this->form_validation->run() == FALSE) {
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

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
