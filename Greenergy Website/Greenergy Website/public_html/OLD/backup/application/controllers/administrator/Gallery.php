<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Gallery extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gallery_model');
        $this->load->model('Project_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Gallery:: Listing';
            $searchText = $this->input->post('searchText','');
            $data['searchText'] = $searchText;            
            $this->load->library('pagination');            
            $count = $this->Gallery_model->galleryListCount($searchText);
			$returns = $this->paginationCompress("administrator/gallery/", $count, 20);
            $data['records'] = $this->Gallery_model->galleryList($searchText, $returns["page"], $returns["segment"]);        
        $this->loadViews("administrator/gallery/index", $this->global, $data , NULL);
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
                
                //$this->form_validation->set_rules('title','Title','trim|required|max_length[255]|xss_clean');
                $this->form_validation->set_rules('type','Type','trim|required|max_length[255]|xss_clean');
                
                if($this->form_validation->run() == FALSE)
                {                    
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('administrator/gallery/add-edit/'.$id);
                }
                else
                {
                    $title = $this->input->post('title','');
                    $type = $this->input->post('type');
                     
                     /*Image upload section*/
                     if ($_FILES && $_FILES['file']['name'] !== "") {
                        $rootPath='./uploads/products/';
                        $newFolder='./uploads/products/thumbnail/';
                        $field_name ='file';
                         $rand=rand(99,10000).time();
                         $config['upload_path']   = $rootPath; 
                          $config['allowed_types'] = 'gif|jpg|png'; 
                          $config['remove_spaces'] = true;
                          $config['max_size']      = 2048;
                          $config['file_name']     = 'products-'.$rand.$_FILES['file']['name'];

                          $this->load->library('upload', $config);
                          if (!$this->upload->do_upload('file')) {
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect('administrator/gallery/add-edit/'.$id);
                          } else {
                            $uploadedImage = $this->upload->data();
                            $this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 270, 270);                            
                          }
                      }
                    $saveData = array('title'=>$title, 
                            'type'=>$type, 
                            'shortDescription'=>'',
                            'status'=>'Active', 
                            'createdBy'=>$this->vendorId, 
                            'createdAt'=>date('Y-m-d H:i:s')
                    );
                    if(!empty($uploadedImage['file_name'])){
                        $saveData['image']=$uploadedImage['file_name'];
                    }
                    if($id){
                         $getData=$this->Gallery_model->getGalleryList($id);
                         if(!empty($getData)){
                            if(!empty($saveData['image'])) {
                                @unlink('./uploads/gallery/'.$getData['image']);
                                @unlink('./uploads/gallery/thumbnail/'.$getData['image']);
                                @chmod('./uploads/gallery/'.$getData['image'],0777);
                                @chmod('./uploads/gallery/thumbnail/'.$getData['image'],0777);
                             }
                            $result = $this->Gallery_model->updateData($saveData, $id);   
                         } else {
                            $this->session->set_flashdata('error', 'Invalid operation!');
                            redirect('administrator/gallery/add-edit/'.$id);
                         }
                         
                    } else {
                        $result = $this->Gallery_model->saveData($saveData);
                    }
                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Data has been save successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed.');
                    }
                     redirect('administrator/gallery/add-edit/'.$id);
                }
            }
        } else {
            $this->global['pageTitle'] = 'Gallery :: Add & Edit';
            $this->global['pageHeading'] = 'Gallery';
            if(!empty($id)){
                $this->global['pageSection'] = 'Update :: Gallery Details';
                $data['getData'] = $this->Gallery_model->getGalleryList($id);

            }else{
                $this->global['pageSection'] = 'Save :: Gallery Details';
            }
            $courseList = $this->Project_model->projectDetails();
            $data['courseList'] = !empty($courseList) ?  $courseList : '';
            $data['roles'] = $this->User_model->getUserRoles();
            $data['id'] = !empty($id) ? $id : 0;
            $this->loadViews("administrator/gallery/addEdit", $this->global, $data , NULL);
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
            $getData=$this->Gallery_model->getGalleryList($id);
             if(!empty($getData)){
                if(!empty($saveData['image'])) {
                    @unlink('./uploads/gallery/'.$getData['image']);
                    @unlink('./uploads/gallery/thumbnail/'.$getData['image']);
                    @chmod('./uploads/gallery/'.$getData['image'],0777);
                    @chmod('./uploads/gallery/thumbnail/'.$getData['image'],0777);                   
                    
                 }
                 $result = $this->Gallery_model->deleteData($id);   
                 $this->session->set_flashdata('success', 'Data has been deleted successfully');
                 redirect('administrator/gallery');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/gallery');
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
            $getData=$this->Gallery_model->getGalleryList($id);
             if(!empty($getData)){
                $data = array(
                    'status' => $active
                );           
                 $result = $this->Gallery_model->updateData($data, $id);   
                 $this->session->set_flashdata('success', 'Status has been update');
                 redirect('administrator/gallery');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/gallery');
             }
        }
    }
    
  
}

?>