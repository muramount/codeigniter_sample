<?php

/**
 * App_Model
 * モデル基底クラス
 *
 * @property CI_DB_active_record $db
 */
class App_Model extends CI_Model {

	/**
	 * table name
	 * 
	 * @var string
	 */
	protected $_table;

	/**
	 * constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database();

		// モデル名は「テーブル名_model」にすること
		$class_name = get_class($this);
		$this->_table = strtolower(substr($class_name, 0, strpos($class_name, '_')));
	}

	/**
	 * setter
	 * 
	 * @param array $data
	 * @return boolean
	 */
	public function set($data) {
		if (is_array($data)) {
			foreach ($data as $key => $val) {
				$this->{$key} = $val;
			}
		} else {
			return FALSE;
		}
	}

	/**
	 * insert
	 * 
	 * @param array $data
	 * @return boolean
	 */
	public function insert($data = null) {
		$now = $this->now();
		$this->db->set(array('created' => $now, 'updated' => $now));
		if ($data === null) {
			$data = $this;
		}
		$ret = $this->db->insert($this->_table, $data);
		if ($ret === FALSE) {
			return FALSE;
		}
		return $this->db->insert_id();
	}

	/**
	 * update
	 * 
	 * @param integer|string $id
	 */
	public function update($id, $data = null) {
		$now = $this->now();
		$this->db->set(array('updated' => $now));
		if ($data === null) {
			$data = $this;
		}
		$ret = $this->db->update($this->_table, $data, array('id' => $id));
		if ($ret === FALSE) {
			return FALSE;
		}
	}

	/**
	 * delete
	 * 
	 * @param int $id
	 */
	public function delete($id) {
		$this->db->delete($this->_table, array('id' => $id));
	}

	/**
	 * find_all
	 * 
	 * @return array
	 */
	public function find_all() {
		return $this->db->get($this->_table)->result();
	}

	/**
	 * find_list
	 * 
	 * @param int $limit
	 * @return array
	 */
	public function find_list($limit = 10) {
		return $this->db->limit($limit)->order_by('id')->get($this->_table)->result();
	}

	/**
	 * find
	 * 
	 * @param int $id
	 * @return stdClass
	 */
	public function find($id) {
		$ret = $this->db->where(array('id' => $id))->get($this->_table)->row();
		return $ret;
	}

	/**
	 * now
	 * 
	 * @return string
	 */
	public function now() {
		return date('Y-m-d H:i:s');
	}
}

/* End of file App_Model.php */
/* Location: ./application/models/App_Model.php */
