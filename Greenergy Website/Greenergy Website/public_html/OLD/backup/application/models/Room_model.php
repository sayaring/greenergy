<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Room_model extends CI_Model
{
	
	
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
	public function collegeListCount($searchText = '')
    {
        $this->db->select('tbl_rooms.*,tbl_category.name as categoryName');
        $this->db->from('tbl_rooms');
        $this->db->join('tbl_category','tbl_category.id = tbl_rooms.categoryId');
       
        if(!empty($searchText)) {
              $likeCriteria = "(tbl_rooms.title  LIKE '%".$searchText."%'
                            OR  tbl_rooms.shortDescription  LIKE '%".$searchText."%'
                            OR  tbl_category.name  LIKE '%".$searchText."%'
                            OR  tbl_rooms.description  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        
        return count($query->result());
    }
    public function collegeList($searchText = '', $page, $segment)
    {
        $this->db->select('tbl_rooms.*,tbl_category.name as categoryName');
        $this->db->from('tbl_rooms');
        $this->db->join('tbl_category','tbl_category.id = tbl_rooms.categoryId');
        if(!empty($searchText)) {
             $likeCriteria = "(tbl_rooms.title  LIKE '%".$searchText."%'
                            OR  tbl_rooms.shortDescription  LIKE '%".$searchText."%'
                            OR  tbl_category.name  LIKE '%".$searchText."%'
                            OR  tbl_rooms.description  LIKE '%".$searchText."%')";
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
    function saveData($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_rooms', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }

    /**
     * This function is used to add new data to system
     */
    function updateData($data, $id)
    {
        $this->db->trans_start();  
        $this->db->where('id',$id);
        $query=$this->db->update('tbl_rooms',$data);       
        $this->db->trans_complete();
        return $query; 
    }
     /**
     * This function is used to add new data to system
     */
    function deleteData($id)
    {
        $this->db->trans_start();  
        $this->db->where('id',$id);
        $query=$this->db->delete('tbl_rooms');       
        $this->db->trans_complete();
        return $query; 
    }

    public function getCollegeList($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_rooms');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
    public function collegeDetails()
    {
        $this->db->select('*');
        $this->db->from('tbl_rooms');
        $this->db->where('status','Active');
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function getCollegesDetailsByUrl($link)
    {
        if(empty($link))
            return false;
        
        $this->db->select('*');
        $this->db->from('tbl_rooms');
        $this->db->where("link", $link);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
    public function collegeDetailsMore()
    {
        $this->db->select('*');
        $this->db->from('tbl_rooms');
        $this->db->where('status','Active');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function collegeDetailsByCategoryId($categoryId)
    {
        $this->db->select('tbl_rooms.title,tbl_rooms.image as service_image,tbl_rooms.link,tbl_rooms.shortDescription,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_rooms');
        $this->db->join('tbl_category','tbl_category.id = tbl_rooms.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_rooms.subCategoryId');
        $this->db->where('tbl_rooms.status','Active');
        $this->db->where('tbl_rooms.categoryId',$categoryId);
        $this->db->order_by('tbl_rooms.title', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function collegeDetailsBySubCategoryId($subCategoryId)
    {
        $this->db->select('tbl_rooms.title,tbl_rooms.image as service_image,tbl_rooms.link,tbl_rooms.shortDescription,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_rooms');
        $this->db->join('tbl_category','tbl_category.id = tbl_rooms.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_rooms.subCategoryId');
        $this->db->where('tbl_rooms.status','Active');
        $this->db->where('tbl_rooms.subCategoryId',$subCategoryId);
        $this->db->order_by('tbl_rooms.title', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function collegeDetailsByLink($link)
    {
        $this->db->select('*');
        $this->db->from('tbl_rooms');
        $this->db->where('tbl_rooms.status','Active');
        $this->db->where('tbl_rooms.link',$link);
        $this->db->order_by('tbl_rooms.title', 'asc');
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }

    public function collageDetails($subCategoryId)
    {
        $this->db->select('tbl_rooms.title,tbl_rooms.image as service_image,tbl_rooms.link,tbl_rooms.shortDescription,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_rooms');
        $this->db->join('tbl_category','tbl_category.id = tbl_rooms.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_rooms.subCategoryId');
        $this->db->where('tbl_rooms.status','Active');
        $this->db->where_in('tbl_rooms.subCategoryId',$subCategoryId);
        $this->db->order_by('tbl_rooms.title', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function homeRoomList()
    {
        $this->db->select('tbl_rooms.title,tbl_rooms.image as service_image,tbl_rooms.link,tbl_rooms.price,tbl_rooms.discount,tbl_rooms.amenities,tbl_rooms.adult,tbl_rooms.size,tbl_rooms.rating,tbl_category.name as category_name,tbl_category.link as category_link');
        $this->db->from('tbl_rooms');
        $this->db->join('tbl_category','tbl_category.id = tbl_rooms.categoryId');
        $this->db->where('tbl_rooms.status','Active');
        $this->db->order_by('tbl_rooms.id', 'asc');
        //$this->db->limit(8);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function collegeListByArrayId($arrayId) {
        $this->db->select('*');
        $this->db->from('tbl_rooms');
        $this->db->where_in("subCategoryId", $arrayId);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function collegeListByLink($link) {
        $this->db->select('*');
        $this->db->from('tbl_rooms');
        $this->db->where("link", $link);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

}

  