<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Content extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Content :: Listing';
            $searchText = $this->input->post('searchText','');
            $data['searchText'] = $searchText;            
            $this->load->library('pagination');            
            $count = $this->Content_model->contentListCount($searchText);
			$returns = $this->paginationCompress("administrator/content/", $count, 20);
			$segment = ($this->uri->segment(3)) ? $this->uri->segment(3)*10 : 0;
            $data['records'] = $this->Content_model->contentList($searchText, $returns["page"], $segment);        
        $this->loadViews("administrator/content/index", $this->global, $data , NULL);
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
                $this->form_validation->set_rules('section','Section','trim|required|max_length[255]|xss_clean');
                $this->form_validation->set_rules('short_description','Short Description','trim|required|max_length[255]|xss_clean');
                $this->form_validation->set_rules('description','Description','trim|required');
                $this->form_validation->set_rules('meta_keywords','Meta Keywords','trim|required');
                $this->form_validation->set_rules('meta_title','Meta Title','trim|required');
                $this->form_validation->set_rules('meta_description','Meta Description','trim|required');
                $this->form_validation->set_rules('meta_keywords','Meta Keywords','trim|required');
                
                if($this->form_validation->run() == FALSE)
                {                    
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('administrator/content/add-edit/'.$id);
                }
                else
                {
                    $title = $this->input->post('title');
                    $url=url_title($title,'-',TRUE);
                    $section = $this->input->post('section');
                    $shortDescription = $this->input->post('short_description');
                    $description = $this->input->post('description');
                    $metaTitle = $this->input->post('meta_title');
                    $metaDescription = $this->input->post('meta_description');
                    $metaKeywords = $this->input->post('meta_keywords');
                    $metaTitle = $this->input->post('meta_title');
                     
                     /*Image upload section*/
                     if ($_FILES && $_FILES['file']['name'] !== "") {
                        $rootPath='./uploads/content/';
                        $newFolder='./uploads/content/thumbnail/';
                        $field_name ='file';
                         $rand=rand(1,10000);
                         $config['upload_path']   = $rootPath; 
                          $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx'; 
                          $config['remove_spaces'] = true;
                          $config['max_size']      = 2048;
                          $config['file_name']     = $rand.$_FILES['file']['name'];

                          $this->load->library('upload', $config);
                          if (!$this->upload->do_upload('file')) {
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect('administrator/content/add-edit/'.$id);
                          } else {
                            $uploadedImage = $this->upload->data();
                            $this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 120,130);                            
                          }
                      }
                    $saveData = array('title'=>$title, 
                            'link'=>$url,
                            'section'=>$section, 
                            'shortDescription'=>$shortDescription, 
                            'description'=> $description,
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
                         $getData=$this->Content_model->getContentList($id);
                         if(!empty($getData)){
                            if(!empty($saveData['image'])) {
                                @unlink('./uploads/content/'.$getData['image']);
                                @unlink('./uploads/content/thumbnail/'.$getData['image']);
                                @chmod('./uploads/content/'.$getData['image'],0777);
                                @chmod('./uploads/content/thumbnail/'.$getData['image'],0777);
                             }
                            $result = $this->Content_model->updateData($saveData, $id);   
                         } else {
                            $this->session->set_flashdata('error', 'Invalid operation!');
                            redirect('administrator/content/add-edit/'.$id);
                         }
                         
                    } else {
                        $result = $this->Content_model->saveData($saveData);
                    }
                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Data has been save successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed.');
                    }
                     redirect('administrator/content/add-edit/'.$id);
                }
            }
        } else {
            $this->global['pageTitle'] = 'Content :: Add & Edit';
            $this->global['pageHeading'] = 'Content';
            if(!empty($id)){
                $this->global['pageSection'] = 'Update :: Content Details';
                $data['getData'] = $this->Content_model->getContentList($id);

            }else{
                $this->global['pageSection'] = 'Save :: Content Details';
            }
            
            $data['roles'] = $this->User_model->getUserRoles();
            $data['id'] = !empty($id) ? $id : 0;
            $this->loadViews("administrator/content/addEdit", $this->global, $data , NULL);
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
            $getData=$this->Content_model->getContentList($id);
             if(!empty($getData)){
                if(!empty($saveData['image'])) {
                    @unlink('./uploads/content/'.$getData['image']);
                    @unlink('./uploads/content/thumbnail/'.$getData['image']);
                    @chmod('./uploads/content/'.$getData['image'],0777);
                    @chmod('./uploads/content/thumbnail/'.$getData['image'],0777);                   
                    
                 }
                 $result = $this->Content_model->deleteData($id);   
                 $this->session->set_flashdata('success', 'Data has been deleted successfully');
                 redirect('administrator/content');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/content');
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
            $getData=$this->Content_model->getContentList($id);
             if(!empty($getData)){
                $data = array(
                    'status' => $active
                );           
                 $result = $this->Content_model->updateData($data, $id);   
                 $this->session->set_flashdata('success', 'Status has been update');
                 redirect('administrator/content');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/content');
             }
        }
    }
}

?>