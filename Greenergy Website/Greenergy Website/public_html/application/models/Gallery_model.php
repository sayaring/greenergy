<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Gallery_model extends CI_Model
{
	
	
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
	public function galleryListCount($searchText = '')
    {
        $this->db->select('tbl_gallery.id');
        $this->db->from('tbl_gallery');
        $this->db->join('tbl_projects as product', 'tbl_gallery.type = product.id', 'inner');
        if(!empty($searchText)) {
             $likeCriteria = "(tbl_gallery.title  LIKE '%".$searchText."%'
                            OR  product.title  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        
        return count($query->result());
    }
    public function galleryList($searchText = '', $page, $segment)
    {
        $this->db->select('tbl_gallery.*,product.title as course_title');
        $this->db->from('tbl_gallery');
        $this->db->join('tbl_projects as product', 'tbl_gallery.type = product.id', 'inner');
        if(!empty($searchText)) {
             $likeCriteria = "(tbl_gallery.title  LIKE '%".$searchText."%'
                            OR  product.title  LIKE '%".$searchText."%')";
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
        $this->db->insert('tbl_gallery', $data);        
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
        $query=$this->db->update('tbl_gallery',$data);       
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
        $query=$this->db->delete('tbl_gallery');       
        $this->db->trans_complete();
        return $query; 
    }

    public function getGalleryList($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
    public function getGalleryListByCourse($type)
    {
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->where("type", $type);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function galleryDetails()
    {
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->where('status','Active');
        $this->db->where('type','Gallery');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
}

  