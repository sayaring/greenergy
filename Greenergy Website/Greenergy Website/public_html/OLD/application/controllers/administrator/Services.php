<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Services extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->model('Subcategory_model');
        $this->load->model('Service_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = ' Product & Service:: Listing';		 
       // echo "hi";exit; 
            $searchText = $this->input->post('searchText','');
            $data['searchText'] = $searchText;            
            $this->load->library('pagination');            
            $count = $this->Service_model->serviceListCount($searchText);
			$returns = $this->paginationCompress("administrator/services/", $count, 20);
			$segment = ($this->uri->segment(3)) ? $this->uri->segment(3)*10 : 0;
            $data['records'] = $this->Service_model->servicesList($searchText, $returns["page"], $segment);        
        $this->loadViews("administrator/service/index", $this->global, $data , NULL);
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
                $this->form_validation->set_rules('short_description','Short Description','trim|required|max_length[255]|xss_clean');
                $this->form_validation->set_rules('description','Description','trim|required');
                $this->form_validation->set_rules('meta_keywords','Meta Keywords','trim|required');
                $this->form_validation->set_rules('meta_title','Meta Title','trim|required');
                $this->form_validation->set_rules('meta_description','Meta Description','trim|required');
                $this->form_validation->set_rules('meta_keywords','Meta Keywords','trim|required');
                
                if($this->form_validation->run() == FALSE)
                {                    
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('administrator/services/add-edit/'.$id);
                }
                else
                {
                    $title = $this->input->post('title');
                    $url=url_title($title,'-',TRUE);
                    $category = $this->input->post('category');
                    $subcategory = $this->input->post('subcategory');
                    $shortDescription = $this->input->post('short_description');
                    $description = $this->input->post('description');
                    $overview = $this->input->post('overview');
                    $specification = $this->input->post('specification');
                    $metaTitle = $this->input->post('meta_title');
                    $metaDescription = $this->input->post('meta_description');
                    $metaKeywords = $this->input->post('meta_keywords');
                    $metaTitle = $this->input->post('meta_title');
                     
                     /*Image upload section*/
                     if ($_FILES && $_FILES['file']['name'] !== "") {
                        $rootPath='./uploads/services/';
                        $newFolder='./uploads/services/thumbnail/';
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
                            redirect('administrator/services/add-edit/'.$id);
                          } else {
                            $uploadedImage = $this->upload->data();
                            $this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 360,200);                            
                          }
                      }
                    $saveData = array('title'=>$title, 
                            'link'=>$url, 
                            'shortDescription'=>$shortDescription, 
                            'description'=> $description,
                            'categoryId'=>$category, 
                            'subCategoryId'=> $subcategory,
                            'overview'=>$overview, 
                            'specification'=> $specification,
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
                         $getData=$this->Service_model->getServicesList($id);
                         if(!empty($getData)){
                            if(!empty($saveData['image'])) {
                                @unlink('./uploads/services/'.$getData['image']);
                                @unlink('./uploads/services/thumbnail/'.$getData['image']);
                                @chmod('./uploads/services/'.$getData['image'],0777);
                                @chmod('./uploads/services/thumbnail/'.$getData['image'],0777);
                             }
                            $result = $this->Service_model->updateData($saveData, $id);   
                         } else {
                            $this->session->set_flashdata('error', 'Invalid operation!');
                            redirect('administrator/services/add-edit/'.$id);
                         }
                         
                    } else {
                        $result = $this->Service_model->saveData($saveData);
                    }
                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Data has been save successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed.');
                    }
                    redirect('administrator/services/add-edit/'.$id);
                }
            }
        } else {
            $this->global['pageTitle'] = ' Products & Services :: Add & Edit';
            $this->global['pageHeading'] = 'Product & Services';
            if(!empty($id)){
                $this->global['pageSection'] = 'Update :: Product & Service Details';
                $getData = $this->Service_model->getservicesList($id);
                $categoryId = !empty($getData['categoryId']) ? $getData['categoryId'] : 0;
                $data['getData'] = !empty($getData) ? $getData : '';
                $data['subCategoryDetails'] = $this->Subcategory_model->subCategoryDetailsByCategoryId($categoryId);

            }else{
                $this->global['pageSection'] = 'Save :: Product &  Service Details';
            }
            $data['categoryData'] = $this->Category_model->categoryDetails();
            $data['roles'] = $this->User_model->getUserRoles();
            $data['id'] = !empty($id) ? $id : 0;
            $this->loadViews("administrator/service/addEdit", $this->global, $data , NULL);
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
            $getData=$this->Service_model->getServicesList($id);
             if(!empty($getData)){
                if(!empty($saveData['image'])) {
                    @unlink('./uploads/services/'.$getData['image']);
                    @unlink('./uploads/services/thumbnail/'.$getData['image']);
                    @chmod('./uploads/services/'.$getData['image'],0777);
                    @chmod('./uploads/services/thumbnail/'.$getData['image'],0777);                   
                    
                 }
                 $result = $this->Service_model->deleteData($id);   
                 $this->session->set_flashdata('success', 'Data has been deleted successfully');
                 redirect('administrator/services');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/services');
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
            $getData=$this->Service_model->getServicesList($id);
             if(!empty($getData)){
                $data = array(
                    'status' => $active
                );           
                 $result = $this->Service_model->updateData($data, $id);   
                 $this->session->set_flashdata('success', 'Status has been update');
                 redirect('administrator/services');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/services');
             }
        }
    }
}

?>