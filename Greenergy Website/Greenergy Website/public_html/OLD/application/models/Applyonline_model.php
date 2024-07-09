<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Applyonline_model extends CI_Model
{
	
	
   
  
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    public function queryListCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_apply_online');
        if(!empty($searchText)) {
             $likeCriteria = "(name  LIKE '%".$searchText."%'
                            OR  email  LIKE '%".$searchText."%'
                            OR  course  LIKE '%".$searchText."%'
                            OR  college  LIKE '%".$searchText."%'
                            OR  phone  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        
        return count($query->result());
    }
    public function queryList($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_apply_online');
        if(!empty($searchText)) {
             $likeCriteria = "(name  LIKE '%".$searchText."%'
                            OR  email  LIKE '%".$searchText."%'
                            OR  course  LIKE '%".$searchText."%'
                            OR  college  LIKE '%".$searchText."%'
                            OR  phone  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->order_by('id','DESC');
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
        $this->db->insert('tbl_apply_online', $data);        
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
        $query=$this->db->update('tbl_apply_online',$data);       
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
        $query=$this->db->delete('tbl_apply_online');       
        $this->db->trans_complete();
        return $query; 
    }

    public function getQueryList($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_apply_online');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
}

  