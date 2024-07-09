<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Client_model extends CI_Model
{
	
	
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
	public function clientListCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_clients');
        if(!empty($searchText)) {
             $likeCriteria = "(title  LIKE '%".$searchText."%'
                            OR  shortDescription  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('type','Client');
        $query = $this->db->get();
        
        return count($query->result());
    }
    public function clientList($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_clients');
        if(!empty($searchText)) {
             $likeCriteria = "(title  LIKE '%".$searchText."%'
                            OR  shortDescription  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        } 
        $this->db->where('type','Client');
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function professionalListCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_clients');
        if(!empty($searchText)) {
             $likeCriteria = "(title  LIKE '%".$searchText."%'
                            OR  shortDescription  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('type','Professional');
        $query = $this->db->get();
        
        return count($query->result());
    }
    public function professionalList($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_clients');
        if(!empty($searchText)) {
             $likeCriteria = "(title  LIKE '%".$searchText."%'
                            OR  shortDescription  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        } 
        $this->db->where('type','Professional');
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
        $this->db->insert('tbl_clients', $data);        
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
        $query=$this->db->update('tbl_clients',$data);       
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
        $query=$this->db->delete('tbl_clients');       
        $this->db->trans_complete();
        return $query; 
    }

    public function getClientList($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_clients');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
    public function getHomeClientList($type)
    {
        $this->db->select('*');
        $this->db->from('tbl_clients');
        $this->db->where("status", 'Active');
        $this->db->where('type',$type);
        $query = $this->db->get();
        $result = $query->result();    
        return $result;
    }
    
    public function clientDetails()
    {
        $this->db->select('*');
        $this->db->from('tbl_clients');
        $this->db->where('status','Active');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}

  