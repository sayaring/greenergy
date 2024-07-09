<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Category_model extends CI_Model {

	/**
	 * This function is used to get the user listing count
	 * @param string $searchText : This is optional search text
	 * @return number $count : This is row count
	 */
	public function categoryListCount($searchText = '') {
		$this->db->select('*');
		$this->db->from('tbl_category');
		if (!empty($searchText)) {
			$likeCriteria = "(name  LIKE '%" . $searchText . "%')";
			$this->db->where($likeCriteria);
		}
		$query = $this->db->get();

		return count($query->result());
	}
	public function categoryList($searchText = '', $page, $segment) {
		$this->db->select('*');
		$this->db->from('tbl_category');
		if (!empty($searchText)) {
			$likeCriteria = "(name  LIKE '%" . $searchText . "%')";
			$this->db->where($likeCriteria);
		}
		$this->db->limit($page, $segment);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	/**
	 * This function is used to add new data to system
	 * @return number $insert_id : This is last inserted id
	 */
	function saveData($data) {
		$this->db->trans_start();
		$this->db->insert('tbl_category', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	/**
	 * This function is used to add new data to system
	 */
	function updateData($data, $id) {
		$this->db->trans_start();
		$this->db->where('id', $id);
		$query = $this->db->update('tbl_category', $data);
		$this->db->trans_complete();
		return $query;
	}
	/**
	 * This function is used to add new data to system
	 */
	function deleteData($id) {
		$this->db->trans_start();
		$this->db->where('id', $id);
		$query = $this->db->delete('tbl_category');
		$this->db->trans_complete();
		return $query;
	}
	/**
	 * Category list id wise
	 */

	public function getCategoryList($id) {
		$this->db->select('*');
		$this->db->from('tbl_category');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	public function categoryDetails() {
		$this->db->select('*');
		$this->db->from('tbl_category');
		$this->db->where('status', 'Active');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function categoryDetailsByLink($link) {
		$this->db->select('*');
		$this->db->from('tbl_category');
		$this->db->where("link", $link);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
}
