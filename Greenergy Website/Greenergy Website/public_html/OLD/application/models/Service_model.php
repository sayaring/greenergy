<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Service_model extends CI_Model
{
	
	
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
	public function serviceListCount($searchText = '')
    {
        $this->db->select('tbl_services.*,tbl_category.name as categoryName,tbl_sub_category.name as subCategoryName');
        $this->db->from('tbl_services');
        $this->db->join('tbl_category','tbl_category.id = tbl_services.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_services.subCategoryId');
        if(!empty($searchText)) {
              $likeCriteria = "(tbl_services.title  LIKE '%".$searchText."%'
                            OR  tbl_services.shortDescription  LIKE '%".$searchText."%'
                            OR  tbl_category.name  LIKE '%".$searchText."%'
                            OR  tbl_sub_category.name  LIKE '%".$searchText."%'
                            OR  tbl_services.description  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        
        return count($query->result());
    }
    public function servicesList($searchText = '', $page, $segment)
    {
        $this->db->select('tbl_services.*,tbl_category.name as categoryName,tbl_sub_category.name as subCategoryName');
        $this->db->from('tbl_services');
        $this->db->join('tbl_category','tbl_category.id = tbl_services.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_services.subCategoryId');
        if(!empty($searchText)) {
             $likeCriteria = "(tbl_services.title  LIKE '%".$searchText."%'
                            OR  tbl_services.shortDescription  LIKE '%".$searchText."%'
                            OR  tbl_category.name  LIKE '%".$searchText."%'
                            OR  tbl_sub_category.name  LIKE '%".$searchText."%'
                            OR  tbl_services.description  LIKE '%".$searchText."%')";
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
        $this->db->insert('tbl_services', $data);        
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
        $query=$this->db->update('tbl_services',$data);       
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
        $query=$this->db->delete('tbl_services');       
        $this->db->trans_complete();
        return $query; 
    }

    public function getServicesList($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_services');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
    public function serviceDetails()
    {
        $this->db->select('*');
        $this->db->from('tbl_services');
        $this->db->where('status','Active');
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function getServicesDetailsByUrl($link)
    {
        if(empty($link))
            return false;
        
        $this->db->select('*');
        $this->db->from('tbl_services');
        $this->db->where("link", $link);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
    public function serviceDetailsMore()
    {
        $this->db->select('*');
        $this->db->from('tbl_services');
        $this->db->where('status','Active');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function serviceDetailsByCategoryId($categoryId)
    {
        $this->db->select('tbl_services.title,tbl_services.image as service_image,tbl_services.link,tbl_services.shortDescription,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_services');
        $this->db->join('tbl_category','tbl_category.id = tbl_services.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_services.subCategoryId');
        $this->db->where('tbl_services.status','Active');
        $this->db->where('tbl_services.categoryId',$categoryId);
        $this->db->order_by('tbl_services.title', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function serviceDetailsBySubCategoryId($subCategoryId)
    {
        $this->db->select('tbl_services.title,tbl_services.image as service_image,tbl_services.link,tbl_services.shortDescription,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_services');
        $this->db->join('tbl_category','tbl_category.id = tbl_services.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_services.subCategoryId');
        $this->db->where('tbl_services.status','Active');
        $this->db->where('tbl_services.subCategoryId',$subCategoryId);
        $this->db->order_by('tbl_services.title', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function serviceDetailsByLink($link)
    {
        $this->db->select('*');
        $this->db->from('tbl_services');
        $this->db->where('tbl_services.status','Active');
        $this->db->where('tbl_services.link',$link);
        $this->db->order_by('tbl_services.title', 'asc');
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }

    public function relatedProducts($subCategoryId,$link)
    {
        $this->db->select('tbl_services.title,tbl_services.image as service_image,tbl_services.link,tbl_services.shortDescription,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_services');
        $this->db->join('tbl_category','tbl_category.id = tbl_services.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_services.subCategoryId');
        $this->db->where('tbl_services.status','Active');
        $this->db->where('tbl_services.subCategoryId',$subCategoryId);
        $this->db->where('tbl_services.link !=',$link);
        $this->db->order_by('tbl_services.title', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function homeProductsList()
    {
        $this->db->select('tbl_services.title,tbl_services.image as service_image,tbl_services.link,tbl_services.shortDescription,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_services');
        $this->db->join('tbl_category','tbl_category.id = tbl_services.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_services.subCategoryId');
        $this->db->where('tbl_services.status','Active');
        $this->db->order_by('tbl_services.title', 'asc');
        $this->db->limit(8);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

}

  