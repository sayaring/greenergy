<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class News extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
     public function index()
    {
            $this->global['pageTitle'] = 'News:: Listing';
            $searchText = $this->input->post('searchText','');
            $data['searchText'] = $searchText;            
            $this->load->library('pagination');            
            $count = $this->News_model->blogListCount($searchText);
			     $returns = $this->paginationCompress("administrator/news/", $count, 20);
            $segment = ($this->uri->segment(3)) ? $this->uri->segment(3)*10 : 0;       
            $data['records'] = $this->News_model->blogsList($searchText, $returns["page"], $segment);        
        $this->loadViews("administrator/news/index", $this->global, $data , NULL);
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
                $this->form_validation->set_rules('date','Date','trim|required');
               // $this->form_validation->set_rules('time','Time','trim|required');
               // $this->form_validation->set_rules('place','Place','trim|required');
                $this->form_validation->set_rules('meta_keywords','Meta Keywords','trim|required');
                $this->form_validation->set_rules('meta_title','Meta Title','trim|required');
                $this->form_validation->set_rules('meta_description','Meta Description','trim|required');
                $this->form_validation->set_rules('meta_keywords','Meta Keywords','trim|required');
                
                if($this->form_validation->run() == FALSE)
                {                    
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('administrator/blogs/add-edit/'.$id);
                }
                else
                {
                    $title = $this->input->post('title');
                    $url=url_title($title,'-',TRUE);
                    $shortDescription = $this->input->post('short_description');
                    $description = $this->input->post('description');
                    $date = $this->input->post('date');
                     $time = $this->input->post('time');
                      $place = $this->input->post('place');
                    $metaTitle = $this->input->post('meta_title');
                    $metaDescription = $this->input->post('meta_description');
                    $metaKeywords = $this->input->post('meta_keywords');
                    $metaTitle = $this->input->post('meta_title');
                     
                     /*Image upload section*/
                     if ($_FILES && $_FILES['file']['name'] !== "") {
                        $rootPath='./uploads/blogs/';
                        $newFolder='./uploads/blogs/thumbnail/';
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
                            redirect('administrator/news/add-edit/'.$id);
                          } else {
                            $uploadedImage = $this->upload->data();
                            $this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 370,250);                            
                          }
                      }
                    $saveData = array('title'=>$title, 
                            'link'=>$url,
                            'type'=>'News',  
                            'shortDescription'=>$shortDescription, 
                            'description'=> $description,
                            'metaTitle'=>$metaTitle,
                            'metaKeywords'=>$metaKeywords, 
                            'metaDescription'=> $metaDescription,
                            'date'=> $date,
                            'time'=> $time,
                            'place'=> $place,
                            'status'=>'Active', 
                            'createdBy'=>$this->vendorId, 
                            'createdAt'=>date('Y-m-d H:i:s')
                    );
                    if(!empty($uploadedImage['file_name'])){
                        $saveData['image']=$uploadedImage['file_name'];
                    }
                    if($id){
                         $getData=$this->News_model->getBlogsList($id);
                         if(!empty($getData)){
                            if(!empty($saveData['image'])) {
                                @unlink('./uploads/blogs/'.$getData['image']);
                                @unlink('./uploads/blogs/thumbnail/'.$getData['image']);
                                @chmod('./uploads/blogs/'.$getData['image'],0777);
                                @chmod('./uploads/blogs/thumbnail/'.$getData['image'],0777);
                             }
                            $result = $this->News_model->updateData($saveData, $id);   
                         } else {
                            $this->session->set_flashdata('error', 'Invalid operation!');
                            redirect('administrator/news/add-edit/'.$id);
                         }
                         
                    } else {
                        $result = $this->News_model->saveData($saveData);
                    }
                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Data has been save successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed.');
                    }
                     redirect('administrator/news/add-edit/'.$id);
                }
            }
        } else {
            $this->global['pageTitle'] = 'News :: Add & Edit';
            $this->global['pageHeading'] = 'News';
            if(!empty($id)){
                $this->global['pageSection'] = 'Update :: News Details';
                $data['getData'] = $this->News_model->getBlogsList($id);

            }else{
                $this->global['pageSection'] = 'Save :: News Details';
            }
            
            $data['roles'] = $this->User_model->getUserRoles();
            $data['id'] = !empty($id) ? $id : 0;
            $this->loadViews("administrator/news/addEdit", $this->global, $data , NULL);
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
            $getData=$this->News_model->getBlogsList($id);
             if(!empty($getData)){
                if(!empty($getData['image'])) {
                    @unlink('./uploads/blogs/'.$getData['image']);
                    @unlink('./uploads/blogs/thumbnail/'.$getData['image']);
                    @chmod('./uploads/blogs/'.$getData['image'],0777);
                    @chmod('./uploads/blogs/thumbnail/'.$getData['image'],0777);
                 }
                 $result = $this->News_model->deleteData($id);   
                 $this->session->set_flashdata('success', 'Data has been deleted successfully');
                 redirect('administrator/news');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/news');
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
            $getData=$this->News_model->getBlogsList($id);
             if(!empty($getData)){
                $data = array(
                    'status' => $active
                );           
                 $result = $this->News_model->updateData($data, $id);   
                 $this->session->set_flashdata('success', 'Status has been update');
                 redirect('administrator/news');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/news');
             }
        }
    }
    
    

    
}

?>