<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Subcategory_model extends CI_Model {

	/**
	 * This function is used to get the user listing count
	 * @param string $searchText : This is optional search text
	 * @return number $count : This is row count
	 */
	public function subCategoryListCount($searchText = '') {
		$this->db->select('subCat.id, subCat.name as subcategory_name, subCat.status, cat.name as category_name');
		$this->db->from('tbl_sub_category as subCat');
		$this->db->join('tbl_category as cat', 'subCat.categoryId = cat.id', 'inner');
		if (!empty($searchText)) {
			$likeCriteria = "(subCat.name  LIKE '%" . $searchText . "%')";
			$this->db->where($likeCriteria);
		}
		$query = $this->db->get();

		return count($query->result());
	}
	public function subCategoryList($searchText = '', $page, $segment) {
		$this->db->select('subCat.id, subCat.name as subcategory_name, subCat.status, cat.name as category_name');
		$this->db->from('tbl_sub_category as subCat');
		$this->db->join('tbl_category as cat', 'subCat.categoryId = cat.id', 'inner');
		if (!empty($searchText)) {
			$likeCriteria = "(subCat.name  LIKE '%" . $searchText . "%')";
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
		$this->db->insert('tbl_sub_category', $data);
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
		$query = $this->db->update('tbl_sub_category', $data);
		$this->db->trans_complete();
		return $query;
	}
	/**
	 * This function is used to add new data to system
	 */
	function deleteData($id) {
		$this->db->trans_start();
		$this->db->where('id', $id);
		$query = $this->db->delete('tbl_sub_category');
		$this->db->trans_complete();
		return $query;
	}
	/**
	 * Category list id wise
	 */

	public function getSubCategoryList($id) {
		$this->db->select('*');
		$this->db->from('tbl_sub_category');
		$this->db->where("id", $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	public function subCategoryDetails() {
		$this->db->select('*');
		$this->db->from('tbl_sub_category');
		$this->db->where('status', 'Active');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function subCategoryDetailsByCategoryId($categoryId) {
		$this->db->select('*');
		$this->db->from('tbl_sub_category');
		$this->db->where('status', 'Active');
		$this->db->where('categoryId', $categoryId);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function subCategoryWithCategoryList($categoryId) {
		$this->db->select('subCat.id, subCat.name as subcategory_name, , subCat.link as subcategory_link, cat.link as category_link');
		$this->db->from('tbl_sub_category as subCat');
		$this->db->join('tbl_category as cat', 'subCat.categoryId = cat.id', 'inner');
		$this->db->where('categoryId', $categoryId);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function subCategoryWithCategoryLislByLink($categoryLink) {
		$this->db->select('subCat.id, subCat.name as subcategory_name, , subCat.link as subcategory_link, cat.link as category_link');
		$this->db->from('tbl_sub_category as subCat');
		$this->db->join('tbl_category as cat', 'subCat.categoryId = cat.id', 'inner');
		$this->db->where('cat.link', $categoryLink);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function getSubCategoryListSingle($categoryId) {
		$this->db->select('*');
		$this->db->from('tbl_sub_category');
		$this->db->where('link', $categoryId);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	public function subCategoryDetailsByLink($link) {
		$this->db->select('*');
		$this->db->from('tbl_sub_category');
		$this->db->where('status', 'Active');
		$this->db->where('link', $link);
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	public function subCategoryDetailsByArrayLink($link) {
		$this->db->select('id');
		$this->db->from('tbl_sub_category');
		$this->db->where('status', 'Active');
		$this->db->where_in('link', $link);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
}
