<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Product_model extends CI_Model
{
	
	
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
	public function productListCount($searchText = '')
    {
        $this->db->select('tbl_products.id');
        $this->db->from('tbl_products');
        $this->db->join('tbl_category as cat', 'tbl_products.categoryId = cat.id', 'inner');
        $this->db->join('tbl_sub_category as subCat', 'tbl_products.subCategoryId = subCat.id', 'inner');
        
        if(!empty($searchText)) {
              $likeCriteria = "(tbl_products.title  LIKE '%".$searchText."%'
                            OR  cat.name  LIKE '%".$searchText."%'
                            OR  subCat.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();
        
        return count($query->result());
    }
    public function productList($searchText = '', $page, $segment)
    {
        
        $this->db->select('tbl_products.*,subCat.name as subcategory_name, cat.name as category_name');
        $this->db->from('tbl_products');
        $this->db->join('tbl_category as cat', 'tbl_products.categoryId = cat.id', 'inner');
        $this->db->join('tbl_sub_category as subCat', 'tbl_products.subCategoryId = subCat.id', 'inner');        
        if(!empty($searchText)) {
              $likeCriteria = "(tbl_products.title  LIKE '%".$searchText."%'
                            OR  cat.name  LIKE '%".$searchText."%'
                            OR  subCat.name  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
		$this->db->order_by('tbl_products.orderBy', 'asc');
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
        $this->db->insert('tbl_products', $data);        
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
        $query=$this->db->update('tbl_products',$data);       
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
        $query=$this->db->delete('tbl_products');       
        $this->db->trans_complete();
        return $query; 
    }

    public function getproductList($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where("id", $id);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
    public function productDetails()
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('status','Active');
        $this->db->order_by('orderBy', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function getproductsDetailsByUrl($link)
    {
        if(empty($link))
            return false;
        
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where("link", $link);
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
    public function productDetailsMore()
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('status','Active');
        $this->db->order_by('orderBy', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function productDetailsByCategoryId($categoryId)
    {
        $this->db->select('tbl_products.title,tbl_products.image as service_image,tbl_products.link,tbl_products.shortDescription,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_products');
        $this->db->join('tbl_category','tbl_category.id = tbl_products.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_products.subCategoryId');
        $this->db->where('tbl_products.status','Active');
        $this->db->where('tbl_products.categoryId',$categoryId);
        $this->db->order_by('tbl_products.title', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function productDetailsBySubCategoryId($subCategoryId)
    {
        $this->db->select('tbl_products.title,tbl_products.image as service_image,tbl_products.link,tbl_products.shortDescription,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_products');
        $this->db->join('tbl_category','tbl_category.id = tbl_products.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_products.subCategoryId');
        $this->db->where('tbl_products.status','Active');
        $this->db->where('tbl_products.subCategoryId',$subCategoryId);
        $this->db->order_by('tbl_products.title', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function productDetailsBySubCategoryLink($categoryLink,$subCategoryLink)
    {
        $this->db->select('tbl_products.title,tbl_products.image as service_image,tbl_products.link,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_products');
        $this->db->join('tbl_category','tbl_category.id = tbl_products.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_products.subCategoryId');
        $this->db->where('tbl_products.status','Active');
        $this->db->where('tbl_category.link',$categoryLink);
        $this->db->where('tbl_sub_category.link',$subCategoryLink);
        $this->db->order_by('tbl_products.title', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    public function productDetailsByLink($link)
    {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('tbl_products.status','Active');
        $this->db->where('tbl_products.link',$link);
        $this->db->order_by('tbl_products.orderBy', 'asc');
        $query = $this->db->get();
        $result = $query->row_array();        
        return $result;
    }
    public function collegeListByLink($link) {
        $this->db->select('*');
        $this->db->from('tbl_products');
         $this->db->where('tbl_products.status','Active');
        $this->db->where("link", $link);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function collageDetails($subCategoryId)
    {
        $this->db->select('tbl_products.title,tbl_products.image as service_image,tbl_products.link,tbl_products.shortDescription,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_products');
        $this->db->join('tbl_category','tbl_category.id = tbl_products.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_products.subCategoryId');
        $this->db->where('tbl_products.status','Active');
        $this->db->where_in('tbl_products.subCategoryId',$subCategoryId);
        $this->db->order_by('tbl_products.title', 'asc');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    public function homeProductsList()
    {
        $this->db->select('tbl_products.title,tbl_products.image as service_image,tbl_products.link,tbl_category.name as category_name,tbl_category.link as category_link,tbl_sub_category.link as subcategory_link');
        $this->db->from('tbl_products');
        $this->db->join('tbl_category','tbl_category.id = tbl_products.categoryId');
        $this->db->join('tbl_sub_category','tbl_sub_category.id = tbl_products.subCategoryId');
        $this->db->where('tbl_products.status','Active');
        $this->db->where('tbl_products.showHome','Yes');
        $this->db->order_by('tbl_products.title', 'asc');
        $this->db->limit(9);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
    
    public function productListByArrayId($arrayId) {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where_in("subCategoryId", $arrayId);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    public function productListByLink($link) {
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where("link", $link);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

}

  