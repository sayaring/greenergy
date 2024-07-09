<?php
/**
 * 
 */
class CommonModel extends CI_Model
{
	protected $Product_Column = array(
									'p.id',
									'p.products',
									'p.quantity',
									'p.price',
									''
							);
	protected $Category_Column = array(
									'c.id',
									'c.category',
									'c.path',
									''
							);

	public function getData($table, $where='',$fields='',$group_by='',$return='')
	{
		if ($fields) {
			$this->db->select($fields);
		}
		if ($where) {
			$this->db->where($where);
		}
		if ($group_by) {
			$this->db->group_by($group_by);
		}
		$query = $this->db->get($table);
		
		if($return == 'row'){
			$result = $query->row();
		}else if($return == 'row_array'){
			$result = $query->row_array();
		}else if($return == 'result'){
			$result = $query->result();
		}else if($return == 'num_rows'){
			$result = $query->num_rows();
		}else{
			$result = $query->result_array();
		}
		return $result;
	}

	public function iudAction($table='',$data = array(), $action='', $where =array())
	{
		switch ($action) {
			case 'insert':
				$this->db->insert($table, $data);
				return $this->db->insert_id();
				break;
			case 'update':
				$this->db->where($where);
				$this->db->set($data);
				$this->db->update($table); 
				return ($this->db->affected_rows() > 0)? true : false ;
				break;
			case 'delete':
				$this->db->where($where);
				$this->db->delete($table); 
				return ($this->db->affected_rows() > 0)? true : false ;
				break;

			default:
				return false;
				break;
		}
	}

	public function getProductsList($searchVal='', $sortColIndex='', $sortBy='DESC', $limit=0, $offset=0,$id='')
	{
		$this->db->select('p.*,i.quantity,i.price,i.date,c.path')
				 ->join('tbl_inventory as i','i.product_id=p.id','left')
				 ->join('tbl_category as c','c.id=p.category_id','left');
		if ($id) {
			$this->db->where('p.id',$id);
		}

		if ($searchVal) {

			$search = "(
						p.products '%$searchVal%' or
						p.quantity '%$searchVal%' or
						p.price '%$searchVal%' or

					)";
			$this->db->where($search);
		}
		$this->db->where('p.is_deleted', 0);
		if($limit){
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by($this->Product_Column[$sortColIndex], $sortBy);
        $result = $this->db->get('tbl_products as p')->result_array();
     
        return $result;

	}

	
}
?>