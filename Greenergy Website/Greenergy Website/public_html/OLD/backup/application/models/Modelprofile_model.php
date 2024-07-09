<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Modelprofile_model extends CI_Model {

	/**
	 * This function is used to get the user listing count
	 * @param string $searchText : This is optional search text
	 * @return number $count : This is row count
	 */
	public function modelProfileListCount($searchText = '') {
		$this->db->select('mp.*, subCat.name as subCategoryName');
		$this->db->from('tbl_model_profiles as mp');
		$this->db->join('tbl_sub_category as subCat', 'mp.subCategoryId = subCat.id', 'inner');
		if (!empty($searchText)) {
			$likeCriteria = "(mp.name  LIKE '%" . $searchText . "%'
							OR  subCat.name  LIKE '%" . $searchText . "%')";
			$this->db->where($likeCriteria);
		}
		$query = $this->db->get();

		return count($query->result());
	}
	public function modelProfileList($searchText = '', $page, $segment) {
		$this->db->select('mp.*, subCat.name as subCategoryName');
		$this->db->from('tbl_model_profiles as mp');
		$this->db->join('tbl_sub_category as subCat', 'mp.subCategoryId = subCat.id', 'inner');
		if (!empty($searchText)) {
			$likeCriteria = "(mp.name  LIKE '%" . $searchText . "%'
							OR  subCat.name  LIKE '%" . $searchText . "%')";
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
		$this->db->insert('tbl_model_profiles', $data);
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
		$query = $this->db->update('tbl_model_profiles', $data);
		$this->db->trans_complete();
		return $query;
	}
	/**
	 * This function is used to add new data to system
	 */
	function deleteData($id) {
		$this->db->trans_start();
		$this->db->where('id', $id);
		$query = $this->db->delete('tbl_model_profiles');
		$this->db->trans_complete();
		return $query;
	}

	public function getModelProfileList($id) {
		$this->db->select('*');
		$this->db->from('tbl_model_profiles');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	public function modelProfileDetails() {
		$this->db->select('*');
		$this->db->from('tbl_model_profiles');
		$this->db->where('status', 'Active');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
