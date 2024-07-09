<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Projects extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Products & Industries :: Listing';	
            $searchText = $this->input->post('searchText','');
            $data['searchText'] = $searchText;            
            $this->load->library('pagination');            
            $count = $this->Project_model->projectListCount($searchText);
            //print_r($count);
			     $returns = $this->paginationCompress("administrator/projects/", $count, 20);
			     $segment = ($this->uri->segment(3)) ? $this->uri->segment(3)*10 : 0;
            $data['records'] = $this->Project_model->projectList($searchText, $returns["page"], $segment);        
        $this->loadViews("administrator/projects/index", $this->global, $data , NULL);
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
                //$this->form_validation->set_rules('location','location','trim|required');
                $this->form_validation->set_rules('description','Description','trim|required');
                 $this->form_validation->set_rules('type','Type','trim|required');
                $this->form_validation->set_rules('orderBy','Order By','trim|required');
                $this->form_validation->set_rules('meta_keywords','Meta Keywords','trim|required');
                $this->form_validation->set_rules('meta_title','Meta Title','trim|required');
                $this->form_validation->set_rules('meta_description','Meta Description','trim|required');
                $this->form_validation->set_rules('meta_keywords','Meta Keywords','trim|required');
                
                if($this->form_validation->run() == FALSE)
                {                    
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('administrator/projects/add-edit/'.$id);
                }
                else
                {
                    $title = $this->input->post('title');
                    $url=url_title($title,'-',TRUE);
                    $location = $this->input->post('location','N/A'); 
                    $type = $this->input->post('type');
                    $description = $this->input->post('description');
                    $metaTitle = $this->input->post('meta_title');
                    $metaDescription = $this->input->post('meta_description');
                    $metaKeywords = $this->input->post('meta_keywords');
                    $orderBy = $this->input->post('orderBy');
                    $saveData = array('title'=>$title, 
                            'link'=>$url, 
                            'location'=>$location,
                            'type'=>$type,
                            'description'=> $description,
                            'orderBy'=> $orderBy,
                            'metaTitle'=>$metaTitle,
                            'metaKeywords'=>$metaKeywords, 
                            'metaDescription'=> $metaDescription,
                            'createdBy'=>$this->vendorId, 
                            'createdAt'=>date('Y-m-d H:i:s')
                    );
                     /*Image upload section*/

                      $rootPath='./uploads/projects/';
                      $newFolder='./uploads/projects/thumbnail/';
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
                            redirect('administrator/projects/add-edit/'.$id);
                          } else {
                            $uploadedImage = $this->upload->data();
                            $this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 370,370);
                            if(!empty($uploadedImage['file_name'])){
                                $saveData['image']=$uploadedImage['file_name'];
                            }                          
                          }
                      }
                     
                    if($id){
                         $getData=$this->Project_model->getprojectList($id);
                         if(!empty($getData)){
                            if(!empty($saveData['image'])) {
                                @unlink('./uploads/projects/'.$getData['image']);
                                @unlink('./uploads/projects/thumbnail/'.$getData['image']);
                                @chmod('./uploads/projects/'.$getData['image'],0777);
                                @chmod('./uploads/projects/thumbnail/'.$getData['image'],0777);
                             }
                             
                            $result = $this->Project_model->updateData($saveData, $id);   
                         } else {
                            $this->session->set_flashdata('error', 'Invalid operation!');
                            redirect('administrator/projects/add-edit/'.$id);
                         }
                         
                    } else {
                        $saveData['status']='Active';
                        $result = $this->Project_model->saveData($saveData);
                    }
                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Data has been save successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed.');
                    }
                    redirect('administrator/projects/add-edit/'.$id);
                }
            }
        } else {
            $this->global['pageTitle'] = 'Products & Industries :: Add & Edit';
            $this->global['pageHeading'] = 'Products & Industries';
            if(!empty($id)){
                $this->global['pageSection'] = 'Update :: Products & Industries Details';
                $getData = $this->Project_model->getprojectList($id);
                
                //$categoryId = !empty($getData['categoryId']) ? $getData['categoryId'] : 0;
                $data['getData'] = !empty($getData) ? $getData : '';
                //$data['subCategoryDetails'] = $this->Subcategory_model->subCategoryDetailsByCategoryId($categoryId);
                // echo "<pre/>";
                // print_r($data['subCategoryDetails']);
                // exit;

            }else{
                $this->global['pageSection'] = 'Save :: Products & Industries Details';
            }
           // $data['categoryData'] = $this->Category_model->categoryDetails();
            $data['roles'] = $this->User_model->getUserRoles();
            $data['id'] = !empty($id) ? $id : 0;
            $this->loadViews("administrator/projects/addEdit", $this->global, $data , NULL);
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
            $getData=$this->Project_model->getprojectList($id);
             if(!empty($getData)){
                if(!empty($saveData['image'])) {
                    @unlink('./uploads/projects/'.$getData['image']);
                    @unlink('./uploads/projects/thumbnail/'.$getData['image']);
                    @chmod('./uploads/projects/'.$getData['image'],0777);
                    @chmod('./uploads/projects/thumbnail/'.$getData['image'],0777);                   
                    
                 }
                 $result = $this->Project_model->deleteData($id);   
                 $this->session->set_flashdata('success', 'Data has been deleted successfully');
                 redirect('administrator/projects');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/projects');
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
            $getData=$this->Project_model->getprojectList($id);
             if(!empty($getData)){
                $data = array(
                    'status' => $active
                );           
                 $result = $this->Project_model->updateData($data, $id);   
                 $this->session->set_flashdata('success', 'Status has been update');
                 redirect('administrator/projects');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/projects');
             }
        }
    }
}

?>