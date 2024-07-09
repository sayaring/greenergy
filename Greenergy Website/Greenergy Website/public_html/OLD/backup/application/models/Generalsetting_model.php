<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Generalsetting_model extends CI_Model
{
	
	
   
  

    /**
     * This function is used to add new data to system
     */
    function updateData($data, $id)
    {
        $this->db->trans_start();  
        $this->db->where('id',$id);
        $query=$this->db->update('tbl_general_setting',$data);       
        $this->db->trans_complete();
        return $query; 
    }
   

    public function getGeneralsettingList($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_general_setting');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
}

  