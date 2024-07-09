<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Products extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->model('Subcategory_model');
        $this->load->model('Product_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Product:: Listing';	
            $searchText = $this->input->post('searchText','');
            $data['searchText'] = $searchText;            
            $this->load->library('pagination');            
            $count = $this->Product_model->productListCount($searchText);
            //print_r($count);
			     $returns = $this->paginationCompress("administrator/products/", $count, 20);
			     $segment = ($this->uri->segment(3)) ? $this->uri->segment(3)*10 : 0;
            $data['records'] = $this->Product_model->productList($searchText, $returns["page"], $segment);        
        $this->loadViews("administrator/products/index", $this->global, $data , NULL);
    }

    /**
     * This function used to load the first screen of the user
     */
    public function addEdit($id)
    {
        if($this->input->server('REQUEST_METHOD') == 'POST'){

            if($this->isAdmin() == TRUE)
            {
                $this->loadThis();
            } else {                
                
                $this->form_validation->set_rules('title','Title','trim|required|max_length[255]|xss_clean');
                $this->form_validation->set_rules('category','category','trim|required');
                $this->form_validation->set_rules('subcategory','subcategory','trim|required');
                $this->form_validation->set_rules('description','Description','trim|required');
                $this->form_validation->set_rules('showhome','showhome','trim|required');
                $this->form_validation->set_rules('orderBy','Order By','trim|required');
                $this->form_validation->set_rules('meta_keywords','Meta Keywords','trim|required');
                $this->form_validation->set_rules('meta_title','Meta Title','trim|required');
                $this->form_validation->set_rules('meta_description','Meta Description','trim|required');
                $this->form_validation->set_rules('meta_keywords','Meta Keywords','trim|required');
                
                if($this->form_validation->run() == FALSE)
                {                    
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('administrator/products/add-edit/'.$id);
                }
                else
                {
                    $title = $this->input->post('title');
                    $url=url_title($title,'-',TRUE);
                    $category = $this->input->post('category');                    
                    $subcategory = $this->input->post('subcategory');
                    $description = $this->input->post('description');
                    $showHome = $this->input->post('showhome');
                    $metaTitle = $this->input->post('meta_title');
                    $metaDescription = $this->input->post('meta_description');
                    $metaKeywords = $this->input->post('meta_keywords');
                    $orderBy = $this->input->post('orderBy');
                    $saveData = array('title'=>$title, 
                            'link'=>$url, 
                            'categoryId'=>$category, 
                            'subCategoryId'=> $subcategory,
                            'description'=> $description,
                            'showHome'=> $showHome,
                            'orderBy'=> $orderBy,
                            'metaTitle'=>$metaTitle,
                            'metaKeywords'=>$metaKeywords, 
                            'metaDescription'=> $metaDescription,
                            'status'=>'Active', 
                            'createdBy'=>$this->vendorId, 
                            'createdAt'=>date('Y-m-d H:i:s')
                    );
                     /*Image upload section*/

                      $rootPath='./uploads/products/';
                      $newFolder='./uploads/products/thumbnail/';
                     if ($_FILES && $_FILES['file']['name'] !== "") {
                        $field_name ='file';
                         $rand=rand(1,10000);
                         $config['upload_path']   = $rootPath; 
                          $config['allowed_types'] = 'gif|jpg|png'; 
                          $config['remove_spaces'] = true;
                          $config['max_size']      = 2048;
                          $config['file_name']     = $rand.time().$_FILES['file']['name'];

                          $this->load->library('upload', $config);
                          if (!$this->upload->do_upload('file')) {
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect('administrator/products/add-edit/'.$id);
                          } else {
                            $uploadedImage = $this->upload->data();
                            $this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 330,310);
                            if(!empty($uploadedImage['file_name'])){
                                $saveData['image']=$uploadedImage['file_name'];
                            }                          
                          }
                      }
                     
                    if($id){
                         $getData=$this->Product_model->getproductList($id);
                         if(!empty($getData)){
                            if(!empty($saveData['image'])) {
                                @unlink('./uploads/products/'.$getData['image']);
                                @unlink('./uploads/products/thumbnail/'.$getData['image']);
                                @chmod('./uploads/products/'.$getData['image'],0777);
                                @chmod('./uploads/products/thumbnail/'.$getData['image'],0777);
                             }
                             if(!empty($saveData['detailsImage'])) {
                                @unlink('./uploads/products/'.$getData['detailsImage']);
                                @unlink('./uploads/products/thumbnail/'.$getData['detailsImage']);
                                @chmod('./uploads/products/'.$getData['detailsImage'],0777);
                                @chmod('./uploads/products/thumbnail/'.$getData['detailsImage'],0777);
                             }
                            $result = $this->Product_model->updateData($saveData, $id);   
                         } else {
                            $this->session->set_flashdata('error', 'Invalid operation!');
                            redirect('administrator/products/add-edit/'.$id);
                         }
                         
                    } else {
                        $result = $this->Product_model->saveData($saveData);
                    }
                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Data has been save successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed.');
                    }
                    redirect('administrator/products/add-edit/'.$id);
                }
            }
        } else {
            $this->global['pageTitle'] = ' Product :: Add & Edit';
            $this->global['pageHeading'] = 'Product';
            if(!empty($id)){
                $this->global['pageSection'] = 'Update :: Product Details';
                $getData = $this->Product_model->getproductList($id);
                
                $categoryId = !empty($getData['categoryId']) ? $getData['categoryId'] : 0;
                $data['getData'] = !empty($getData) ? $getData : '';
                $data['subCategoryDetails'] = $this->Subcategory_model->subCategoryDetailsByCategoryId($categoryId);
                // echo "<pre/>";
                // print_r($data['subCategoryDetails']);
                // exit;

            }else{
                $this->global['pageSection'] = 'Save :: Product Details';
            }
            $data['categoryData'] = $this->Category_model->categoryDetails();
            $data['roles'] = $this->User_model->getUserRoles();
            $data['id'] = !empty($id) ? $id : 0;
            $this->loadViews("administrator/products/addEdit", $this->global, $data , NULL);
        }
        
    }
    
    function gallery($id){
      if($this->input->server('REQUEST_METHOD') == 'POST'){

            if($this->isAdmin() == TRUE)
            {
                $this->loadThis();
            } else {                
                
                $this->form_validation->set_rules('type','type','trim|required|max_length[255]|xss_clean');
                
                
                if($this->form_validation->run() == FALSE)
                {                    
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('administrator/products/gallery/'.$id);
                }
                else
                {
                    $type = $this->input->post('type');
                  
                    $saveData = array();
                     /*Image upload section*/

                      $rootPath='./uploads/products/';
                      $newFolder='./uploads/products/thumbnail/';
                     if ($_FILES && $_FILES['file']['name'] !== "") {
                        $field_name ='file';
                         $rand=rand(1,10000);
                         $config['upload_path']   = $rootPath; 
                          $config['allowed_types'] = 'gif|jpg|png'; 
                          $config['remove_spaces'] = true;
                          $config['max_size']      = 2048;
                          $config['file_name']     = 'documents'.$rand.time().$_FILES['file']['name'];

                          $this->load->library('upload', $config);
                          if (!$this->upload->do_upload('file')) {
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect('administrator/products/gallery/'.$id);
                          } else {
                            $uploadedImage = $this->upload->data();
                            //$this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 330,310);
                            if(!empty($uploadedImage['file_name'])){
                                $saveData['detailsImage']=$uploadedImage['file_name'];
                            }                          
                          }
                      }
                     
                    if($id){
                         $getData=$this->Product_model->getproductList($id);
                         if(!empty($getData)){
                            if(!empty($saveData['detailsImage'])) {
                                @unlink('./uploads/products/'.$getData['detailsImage']);
                               // @unlink('./uploads/products/thumbnail/'.$getData['detailsImage']);
                                @chmod('./uploads/products/'.$getData['detailsImage'],0777);
                                //@chmod('./uploads/products/thumbnail/'.$getData['detailsImage'],0777);
                             }
                            
                            $result = $this->Product_model->updateData($saveData, $id);   
                         } else {
                            $this->session->set_flashdata('error', 'Invalid operation!');
                            redirect('administrator/products/gallery/'.$id);
                         }
                         
                    } else {
                        $result = 1;//$this->Product_model->saveData($saveData);
                    }
                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Data has been save successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed.');
                    }
                    redirect('administrator/products/gallery/'.$id);
                }
            }
        } else {
            $this->global['pageTitle'] = ' Product :: Details Image';
            $this->global['pageHeading'] = 'Product :: Details Image';
            if(!empty($id)){
                $this->global['pageSection'] = 'Update :: Product :: Details Image';
                $getData = $this->Product_model->getproductList($id);
                $data['getData'] = !empty($getData) ? $getData : '';

            }else{
                $this->global['pageSection'] = 'Save :: Product Details';
            }
            // $data['categoryData'] = $this->Category_model->categoryDetails();
            // $data['roles'] = $this->User_model->getUserRoles();
            $data['id'] = !empty($id) ? $id : 0;
            $this->loadViews("administrator/products/gallary", $this->global, $data , NULL);
        }
    }
   

     /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteData($id)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        { 
            $getData=$this->Product_model->getproductList($id);
             if(!empty($getData)){
                if(!empty($saveData['image'])) {
                    @unlink('./uploads/products/'.$getData['image']);
                    @unlink('./uploads/products/thumbnail/'.$getData['image']);
                    @chmod('./uploads/products/'.$getData['image'],0777);
                    @chmod('./uploads/products/thumbnail/'.$getData['image'],0777);                   
                    
                 }
                 $result = $this->Product_model->deleteData($id);   
                 $this->session->set_flashdata('success', 'Data has been deleted successfully');
                 redirect('administrator/products');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/products');
             }
        }
    }
    
    

    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function changeStatus($id, $active)
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        { 
            $getData=$this->Product_model->getproductList($id);
             if(!empty($getData)){
                $data = array(
                    'status' => $active
                );           
                 $result = $this->Product_model->updateData($data, $id);   
                 $this->session->set_flashdata('success', 'Status has been update');
                 redirect('administrator/products');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/products');
             }
        }
    }
}

?>