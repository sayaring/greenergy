<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Review_model extends CI_Model
{
	
	
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
	public function blogListCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_reviews');
        if(!empty($searchText)) {
             $likeCriteria = "(name  LIKE '%".$searchText."%'
                            OR  shortDescription  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        
        return count($query->result());
    }
    public function blogsList($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_reviews');
        if(!empty($searchText)) {
             $likeCriteria = "(name  LIKE '%".$searchText."%'
                            OR  shortDescription  LIKE '%".$searchText."%')";
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
        $this->db->insert('tbl_reviews', $data);        
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
        $query=$this->db->update('tbl_reviews',$data);       
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
        $query=$this->db->delete('tbl_reviews');       
        $this->db->trans_complete();
        return $query; 
    }

    public function getBlogsList($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_reviews');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }

    public function getBlogDetails($limit = 0)
    {
        
        $this->db->select('*');
        $this->db->from('tbl_reviews');
        $this->db->where("status", 'Active');
        $this->db->order_by('id', 'desc');
        if(!empty($limit)){
            $this->db->limit($limit);
        }        
        $query = $this->db->get();
        $result = $query->result();   
        return $result;
    }
    public function getBlogDetailsByUrl($link)
    {
        if(empty($link))
            return false;
        
        $this->db->select('*');
        $this->db->from('tbl_reviews');
        $this->db->where("link", $link);
        $query = $this->db->get();
        $result =$query->row_array();      
        return $result;
    }
    public function blogDetailsMore($link)
    {
        $this->db->select('*');
        $this->db->from('tbl_reviews');
        $this->db->where('status','Active');
        $this->db->where("link !=", $link);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function getBlogRecent($limit = 0)
    {
        
        $this->db->select('*');
        $this->db->from('tbl_reviews');
        $this->db->where("status", 'Active');
        $this->db->order_by('id', 'asc');
        if(!empty($limit)){
            $this->db->limit($limit);
        }        
        $query = $this->db->get();
        $result = $query->result();   
        return $result;
    }
}

  