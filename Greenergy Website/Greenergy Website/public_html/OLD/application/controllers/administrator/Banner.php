<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Banner extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Banner_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Banner :: Listing';
            $searchText = $this->input->post('searchText','');
            $data['searchText'] = $searchText;            
            $this->load->library('pagination');            
            $count = $this->Banner_model->bannerListCount($searchText);
			      $returns = $this->paginationCompress("administrator/banner/", $count, 20);
            $data['records'] = $this->Banner_model->bannerList($searchText, $returns["page"], $returns["segment"]);        
        $this->loadViews("administrator/banner/index", $this->global, $data , NULL);
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
                
                $this->form_validation->set_rules('title','Heading','trim|required|max_length[255]|xss_clean');
                $this->form_validation->set_rules('heading_two','heading two','trim|required|max_length[255]|xss_clean');
                
                if($this->form_validation->run() == FALSE)
                {                    
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('administrator/banner/add-edit/'.$id);
                }
                else
                {
                    $title = $this->input->post('title');
                    $headingTwo = $this->input->post('heading_two');
                    $ourMission = $this->input->post('our_mission');
                     
                     /*Image upload section*/
                     if ($_FILES && $_FILES['file']['name'] !== "") {
                        $rootPath='./uploads/banner/';
                        $newFolder='./uploads/banner/thumbnail/';
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
                            redirect('administrator/banner/add-edit/'.$id);
                          } else {
                            $uploadedImage = $this->upload->data();
                            $this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 120,130);                            
                          }
                      }
                    $saveData = array('title'=>$title,
                            'heading_two'=>$headingTwo,
                           // 'our_mission'=>$ourMission,
                            'status'=>'Active', 
                            'createdBy'=>$this->vendorId, 
                            'createdAt'=>date('Y-m-d H:i:s')
                    );
                    if(!empty($uploadedImage['file_name'])){
                        $saveData['image']=$uploadedImage['file_name'];
                    }
                    if($id){
                         $getData=$this->Banner_model->getbannerList($id);
                         if(!empty($getData)){
                            if(!empty($saveData['image'])) {
                                @unlink('./uploads/banner/'.$getData['image']);
                                @unlink('./uploads/banner/thumbnail/'.$getData['image']);
                                @chmod('./uploads/banner/'.$getData['image'],0777);
                                @chmod('./uploads/banner/thumbnail/'.$getData['image'],0777);
                             }
                            $result = $this->Banner_model->updateData($saveData, $id);   
                         } else {
                            $this->session->set_flashdata('error', 'Invalid operation!');
                            redirect('administrator/banner/add-edit/'.$id);
                         }
                         
                    } else {
                        $result = $this->Banner_model->saveData($saveData);
                    }
                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Data has been save successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed.');
                    }
                     redirect('administrator/banner/add-edit/'.$id);
                }
            }
        } else {
            $this->global['pageTitle'] = 'Banner :: Add & Edit';
            $this->global['pageHeading'] = 'Banner';
            if(!empty($id)){
                $this->global['pageSection'] = 'Update :: Banner Details';
                $data['getData'] = $this->Banner_model->getbannerList($id);

            }else{
                $this->global['pageSection'] = 'Save :: Banner Details';
            }
            
            $data['roles'] = $this->User_model->getUserRoles();
            $data['id'] = !empty($id) ? $id : 0;
            $this->loadViews("administrator/banner/addEdit", $this->global, $data , NULL);
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
            $getData=$this->Banner_model->getBannerList($id);
             if(!empty($getData)){
                if(!empty($saveData['image'])) {
                    @unlink('./uploads/banner/'.$getData['image']);
                    @unlink('./uploads/banner/thumbnail/'.$getData['image']);
                    @chmod('./uploads/banner/'.$getData['image'],0777);
                    @chmod('./uploads/banner/thumbnail/'.$getData['image'],0777);                   
                    
                 }
                 $result = $this->Banner_model->deleteData($id);   
                 $this->session->set_flashdata('success', 'Data has been deleted successfully');
                 redirect('administrator/banner');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/banner');
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
            $getData=$this->Banner_model->getbannerList($id);
             if(!empty($getData)){
                $data = array(
                    'status' => $active
                );           
                 $result = $this->Banner_model->updateData($data, $id);   
                 $this->session->set_flashdata('success', 'Status has been update');
                 redirect('administrator/banner');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/banner');
             }
        }
    }
}

?>