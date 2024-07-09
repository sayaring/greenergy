<?php
class PositionModel extends CI_Model
{

    protected $dt_Column = array(
                                    'b.id',
                                    'b.name',
                                    // 'b.is_active',
                                    ''
                            );
   

    public function getPositionData($searchVal='',$sortColIndex=0,$sortBy='desc',$limit=0, $offset=0,$id=0)
     {

        $this->db->select('b.*');
        if ($id) {
            $this->db->where('b.id', $id);           
        }
        
        if (strlen($searchVal)) {
            $searchCondition = "(               
               
                b.name  like '%$searchVal%' 
            )";
            $this->db->where($searchCondition);
        }

        $this->db->from('position b');
        // $this->db->where('b.is_active',1);
     
        if($limit){
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by($this->dt_Column[$sortColIndex], $sortBy);

        $query = $this->db->get();
      
        return $query->result_array();
    }

    
    
}
  ?>