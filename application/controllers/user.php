<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// プロファイラをON
		$this->output->enable_profiler(TRUE);

		// helperをロード
		$this->load->helper(array('html', 'form', 'url'));
		// libraryをロード
		$this->load->library(array('session', 'form_validation'));
		$this->form_validation->set_error_delimiters('<p class="text-error">', '</p>');

		// モデルを別名でロードする
		$this->load->model('user_model', 'user');
	}

	/**
	 * 一覧
	 */
	public function index() {

		// viewに渡す値
		$data = array();

		// pagination設定
		$this->load->library('pagination');
		$limit = 10;  // 1ページに表示する件数
		$offset = $this->uri->segment(3);  // 表示するOffset取得
		$config['base_url'] = strtolower(base_url() . DIRECTORY_SEPARATOR . __CLASS__ . DIRECTORY_SEPARATOR . __FUNCTION__);
		$config['total_rows'] = $this->user->count_all();  // 総件数
		$config['per_page'] = $limit;
		$this->pagination->initialize($config);

		// user一覧取得
		$data['users'] = $this->user->find_offset_list($offset, $limit);

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
				$this->session->set_flashdata('message', 'completed registration.');
				redirect('user/index');
				return;
			}
		} else {
			$this->load->view('user/add');
			return;
		}
	}

	/**
	 * 更新
	 * @param int $id id
	 * @param string $type "confirm" or "complete"
	 */
	public function edit($id, $type = null) {
		if (empty($id)) {
			show_404();
		}

		$user = $this->user->find($id);
		if (empty($user)) {
			show_404();
		}

		if ($this->input->post()) {
			// バリデート実行
			if ($this->form_validation->run('user_edit') == FALSE) {
				// バリデートエラー
				$this->load->view('user/edit', $this->input->post());
				return;
			}

			if ($this->input->post('back')) {
				// 確認画面の戻るボタン押下時
				$this->load->view('user/edit', $this->input->post());
				return;
			}

			if ($type == 'confirm') {
				// 確認画面へ
				$this->load->view('user/edit_confirm', $this->input->post());
				return;
			} else if ($type == 'complete') {
				// 更新処理
				$this->user->set($this->input->post());
				$this->user->update($this->input->post('id'));

				// 一覧で更新完了メッセージ表示
				$this->session->set_flashdata('message', 'edited completed.');
				redirect('user/index');
				return;
			}
		} else {
			$this->load->view('user/edit', $user);
			return;
		}
	}

	/**
	 * 詳細
	 * @param int $id id
	 */
	public function view($id) {
		if (empty($id)) {
			show_404();
		}

		$user = $this->user->find($id);
		if (empty($user)) {
			show_404();
		}

		$this->load->view('user/view', $user);
		return;
	}

	/**
	 * 削除
	 * @param int $id id
	 * @param string $type "confirm" or "complete"
	 */
	public function delete($id, $type = null) {

		if (empty($id)) {
			show_404();
		}

		$user = $this->user->find($id);
		if (empty($user)) {
			show_404();
		}

		if (!empty($type) && $type === 'complete') {
			$this->user->delete($id);
			// 一覧で削除完了メッセージ表示
			$this->session->set_flashdata('message', 'deleted completed.');
			redirect('/user/');
			return;
		}

		$this->output->enable_profiler(false);
		$this->load->set_header(null);
		$this->load->set_footer(null);
		$this->load->view('user/delete', $user);
		return;
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
