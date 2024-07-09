<?php
/**
 * 
 */
class JobpostModel extends CI_Model
{
    protected $User_Column = array(
                    'u.id',
                    
                    ''
                );

    public function getJobData($searchVal='', $sortColIndex='0', $sortBy='DESC', $limit='0', $offset='0',$id='')
    {
        $this->db->select('u.*,ps.name as positionqa');
        $this->db->join('position ps','ps.id=u.position','left');
        
        if($searchVal){
            $searchCondition = "(
                
            )";
          $this->db->where($searchCondition);
        }
     
        if ($id) {
            $this->db->where('u.id',$id);
        }
          $this->db->where('u.deleted_by',NULL);

        if ($limit) {
        $this->db->limit($limit, $offset);
        }
        $this->db->order_by($this->User_Column[$sortColIndex], $sortBy);

        $result = $this->db->get('job_post u')
                           ->result_array();
        return $result;

    }

    public function getSerch($searchTerm='')
    {
          $this->db->select('p.*'); 
       
          $this->db->from('position p');
      
        if($searchTerm){
             $searchCondition = "(
                p.name like '%$searchTerm%'
                 )";

            $this->db->where($searchCondition);
            }
            $result = $this->db->get()
                           ->result_array();

            return $result;
    
    }
  
}
?>
