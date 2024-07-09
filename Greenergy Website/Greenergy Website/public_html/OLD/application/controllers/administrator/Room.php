<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Room extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->model('Subcategory_model');
        $this->load->model('Room_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Room:: Listing';		 
       // echo "hi";exit; 
            $searchText = $this->input->post('searchText','');
            $data['searchText'] = $searchText;            
            $this->load->library('pagination');            
            $count = $this->Room_model->collegeListCount($searchText);
			$returns = $this->paginationCompress("administrator/room/", $count, 20);
			$segment = ($this->uri->segment(3)) ? $this->uri->segment(3)*10 : 0;
            $data['records'] = $this->Room_model->collegeList($searchText, $returns["page"], $segment);        
        $this->loadViews("administrator/room/index", $this->global, $data , NULL);
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
                //$this->form_validation->set_rules('short_description','Short Description','trim|required|max_length[255]|xss_clean');
                //$this->form_validation->set_rules('description','Description','trim|required');
                $this->form_validation->set_rules('category','category','trim|required');
                $this->form_validation->set_rules('price','price','trim|required');
                $this->form_validation->set_rules('discount','discount','trim|required');
                $this->form_validation->set_rules('amenities','amenities','trim|required');
                $this->form_validation->set_rules('adult','adult','trim|required');
                $this->form_validation->set_rules('size','size','trim|required');
                $this->form_validation->set_rules('rating','rating','trim|required');
                $this->form_validation->set_rules('meta_keywords','Meta Keywords','trim|required');
                $this->form_validation->set_rules('meta_title','Meta Title','trim|required');
                $this->form_validation->set_rules('meta_description','Meta Description','trim|required');
                $this->form_validation->set_rules('meta_keywords','Meta Keywords','trim|required');
                
                if($this->form_validation->run() == FALSE)
                {                    
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('administrator/room/add-edit/'.$id);
                }
                else
                {
                    $title = $this->input->post('title');
                    $url=url_title($title,'-',TRUE);
                    $category = $this->input->post('category');
                    $subcategory = 0;
                    $shortDescription = $this->input->post('short_description');
                    $price = $this->input->post('price');
                    $discount = $this->input->post('discount');
                    $amenities = $this->input->post('amenities');
                    $adult = $this->input->post('adult');
                    $size = $this->input->post('size');
                    $rating = $this->input->post('rating');
                    $metaTitle = $this->input->post('meta_title');
                    $metaDescription = $this->input->post('meta_description');
                    $metaKeywords = $this->input->post('meta_keywords');
                    $metaTitle = $this->input->post('meta_title');
                     
                     /*Image upload section*/
                     if ($_FILES && $_FILES['file']['name'] !== "") {
                        $rootPath='./uploads/room/';
                        $newFolder='./uploads/room/thumbnail/';
                        $field_name ='file';
                         $rand=rand(1,10000);
                         $config['upload_path']   = $rootPath; 
                          $config['allowed_types'] = 'gif|jpg|png'; 
                          $config['remove_spaces'] = true;
                          $config['max_size']      = 2048;
                          $config['file_name']     = $rand.$_FILES['file']['name'];

                          $this->load->library('upload', $config);
                          if (!$this->upload->do_upload('file')) {
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect('administrator/room/add-edit/'.$id);
                          } else {
                            $uploadedImage = $this->upload->data();
                            $this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 370, 278);                            
                          }
                      }
                    $saveData = array('title'=>$title, 
                            'link'=>$url, 
                            'shortDescription'=>$shortDescription, 
                            'description'=> '',
                            'categoryId'=>$category, 
                            'price'=> $price,
                            'discount'=> $discount,
                            'amenities'=> $amenities,
                            'adult'=> $adult,
                            'size'=> $size,
                            'rating'=> $rating,
                            'metaTitle'=>$metaTitle,
                            'metaKeywords'=>$metaKeywords, 
                            'metaDescription'=> $metaDescription,
                            'status'=>'Active', 
                            'createdBy'=>$this->vendorId, 
                            'createdAt'=>date('Y-m-d H:i:s')
                    );
                    if(!empty($uploadedImage['file_name'])){
                        $saveData['image']=$uploadedImage['file_name'];
                    }
                    if($id){
                         $getData=$this->Room_model->getCollegeList($id);
                         if(!empty($getData)){
                            if(!empty($saveData['image'])) {
                                @unlink('./uploads/room/'.$getData['image']);
                                @unlink('./uploads/room/thumbnail/'.$getData['image']);
                                @chmod('./uploads/room/'.$getData['image'],0777);
                                @chmod('./uploads/room/thumbnail/'.$getData['image'],0777);
                             }
                            $result = $this->Room_model->updateData($saveData, $id);   
                         } else {
                            $this->session->set_flashdata('error', 'Invalid operation!');
                            redirect('administrator/room/add-edit/'.$id);
                         }
                         
                    } else {
                        $result = $this->Room_model->saveData($saveData);
                    }
                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Data has been save successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed.');
                    }
                    redirect('administrator/room/add-edit/'.$id);
                }
            }
        } else {
            $this->global['pageTitle'] = ' Room :: Add & Edit';
            $this->global['pageHeading'] = 'Room';
            if(!empty($id)){
                $this->global['pageSection'] = 'Update :: Rooms Details';
                $getData = $this->Room_model->getCollegeList($id);
                /*echo "<pre/>";
                print_r($getData);
                exit;*/
                $categoryId = !empty($getData['categoryId']) ? $getData['categoryId'] : 0;
                $data['getData'] = !empty($getData) ? $getData : '';
                // $data['subCategoryDetails'] = $this->Subcategory_model->subCategoryDetailsByCategoryId($categoryId);
                // echo "<pre/>";
                // print_r($data['subCategoryDetails']);
                // exit;

            }else{
                $this->global['pageSection'] = 'Save :: Room Details';
            }
            $data['categoryData'] = $this->Category_model->categoryDetails();
            $data['roles'] = $this->User_model->getUserRoles();
            $data['id'] = !empty($id) ? $id : 0;
            $this->loadViews("administrator/room/addEdit", $this->global, $data , NULL);
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
            $getData=$this->Room_model->getCollegeList($id);
             if(!empty($getData)){
                if(!empty($saveData['image'])) {
                    @unlink('./uploads/room/'.$getData['image']);
                    @unlink('./uploads/room/thumbnail/'.$getData['image']);
                    @chmod('./uploads/room/'.$getData['image'],0777);
                    @chmod('./uploads/room/thumbnail/'.$getData['image'],0777);                   
                    
                 }
                 $result = $this->Room_model->deleteData($id);   
                 $this->session->set_flashdata('success', 'Data has been deleted successfully');
                 redirect('administrator/room');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/room');
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
            $getData=$this->Room_model->getCollegeList($id);
             if(!empty($getData)){
                $data = array(
                    'status' => $active
                );           
                 $result = $this->Room_model->updateData($data, $id);   
                 $this->session->set_flashdata('success', 'Status has been update');
                 redirect('administrator/room');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/room');
             }
        }
    }
}

?>