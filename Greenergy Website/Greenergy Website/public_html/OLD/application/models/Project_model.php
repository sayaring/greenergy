<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Project_model extends CI_Model
{
	
	
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
	public function projectListCount($searchText = '')
    {
        $this->db->select('tbl_projects.id');
        $this->db->from('tbl_projects');
        
        if(!empty($searchText)) {
              $likeCriteria = "(tbl_projects.title  LIKE '%".$searchText."%'
                            OR  tbl_projects.location  LIKE '%".$searchText."%'
                            OR  tbl_projects.description  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        
        return count($query->result());
    }
    public function projectList($searchText = '', $page, $segment)
    {
        
        $this->db->select('tbl_projects.*');
        $this->db->from('tbl_projects');
        if(!empty($searchText)) {
              $likeCriteria = "(tbl_projects.title  LIKE '%".$searchText."%'
                            OR  tbl_projects.location  LIKE '%".$searchText."%'
                            OR  tbl_projects.description  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->order_by('tbl_projects.orderBy', 'asc');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();  
       // print_r($this->db->last_query());          
        return $result;
    }
  
  /**
     * This function is used to add new data to system
     * @return number $insert_id : This is last inserted id
     */
    function saveData($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_projects', $data);        
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
        $query=$this->db->update('tbl_projects',$data);       
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
        $query=$this->db->delete('tbl_projects');       
        $this->db->trans_complete();
        return $query; 
    }

    public function getprojectList($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
    public function projectDetails()
    {
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where('status','Active');
        $this->db->order_by('orderBy', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function getprojectsDetailsByUrl($type="Project",$link)
    {
        if(empty($link))
            return false;
        
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where("link", $link);
        $this->db->where("type", $type);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
    public function getprojectLists($type="Project",$limit = 0)
    {
        
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where("status", 'Active');
        $this->db->where('type',$type);
        $this->db->order_by('id', 'desc');
        if(!empty($limit)){
            $this->db->limit($limit);
        }        
        
        $query = $this->db->get();
        $result = $query->result();   
        return $result;
    }
    public function projectDetailsMore($type="Project",$link)
    {
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where('status','Active');
        $this->db->where('type',$type); 
        $this->db->where("link !=", $link);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

   
    public function projectDetailsByLink($link)
    {
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where('tbl_projects.status','Active');
        $this->db->where('tbl_projects.link',$link);
        $this->db->order_by('tbl_projects.orderBy', 'asc');
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
    public function collegeListByLink($link) {
        $this->db->select('*');
        $this->db->from('tbl_projects');
         $this->db->where('tbl_projects.status','Active');
        $this->db->where("link", $link);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }


    public function projectWithGallaryDetails($type,$limit=0)
    {
        $this->db->select('tbl_projects.title,tbl_projects.id as project_id,tbl_projects.link as project_link,tbl_gallery.image as gallary_image,tbl_gallery.title as gallary_title,tbl_gallery.type as gallary_type');
        $this->db->from('tbl_projects');
        $this->db->join('tbl_gallery','tbl_gallery.type = tbl_projects.id');
        $this->db->where('tbl_projects.status','Active');
        $this->db->where('tbl_projects.type',$type);
        $this->db->order_by('tbl_projects.title', 'asc');
       // $this->db->join('tbl_products as product', 'tbl_gallery.type = product.id', 'inner');
        $this->db->limit($limit);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function homeprojectssList()
    {
        $this->db->select('tbl_projects.title,tbl_projects.image as service_image,tbl_projects.link,tbl_projects.shortDescription,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_projects');
        $this->db->join('tbl_category','tbl_category.id = tbl_projects.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_projects.subCategoryId');
        $this->db->where('tbl_projects.status','Active');
        $this->db->order_by('tbl_projects.title', 'asc');
        $this->db->limit(8);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function projectsListByArrayId($arrayId) {
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where_in("subCategoryId", $arrayId);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function projectsListByLink($link) {
        $this->db->select('*');
        $this->db->from('tbl_projects');
        $this->db->where("link", $link);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

}

  