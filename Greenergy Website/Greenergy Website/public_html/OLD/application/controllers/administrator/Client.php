<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Client extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Client_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
     public function index()
    {
            $this->global['pageTitle'] = 'client:: Listing';
            $searchText = $this->input->post('searchText','');
            $data['searchText'] = $searchText;            
            $this->load->library('pagination');            
            $count = $this->Client_model->clientListCount($searchText);
			     $returns = $this->paginationCompress("administrator/client/", $count, 20);
            $segment = ($this->uri->segment(3)) ? $this->uri->segment(3)*10 : 0;       
            $data['records'] = $this->Client_model->clientList($searchText, $returns["page"], $segment);        
        $this->loadViews("administrator/client/index", $this->global, $data , NULL);
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
                
                $this->form_validation->set_rules('name','name','trim|required|max_length[255]|xss_clean');
                $this->form_validation->set_rules('company_name','Company Name','trim|required|xss_clean');
               // $this->form_validation->set_rules('time','Time','trim|required');
                $this->form_validation->set_rules('address','address','trim|required');
                //$this->form_validation->set_rules('language','Language','trim|required');
                
                if($this->form_validation->run() == FALSE)
                {                    
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('administrator/client/add-edit/'.$id);
                }
                else
                {
                    $name = $this->input->post('name');
                    $address = $this->input->post('address');
                    $companyName = $this->input->post('company_name');
                      /*Image upload section*/
                     if ($_FILES && $_FILES['file']['name'] !== "") {
                        $rootPath='./uploads/client/';
                        $newFolder='./uploads/client/thumbnail/';
                        $field_name ='file';
                         $rand=rand(1,10000);
                         $config['upload_path']   = $rootPath; 
                          $config['allowed_types'] = 'gif|jpg|png'; 
                          $config['remove_spaces'] = true;
                          $config['max_size']      = 2048;
                          $config['file_name']     = 'client-'.$rand.$_FILES['file']['name'];

                          $this->load->library('upload', $config);
                          if (!$this->upload->do_upload('file')) {
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect('administrator/client/add-edit/'.$id);
                          } else {
                            $uploadedImage = $this->upload->data();
                            $this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 159,39);                            
                          }
                      }
                      
                    $saveData = array('name'=>$name, 
                            'address'=>$address, 
                            'companyName'=> $companyName,
                            'type'=> 'Client',
                            'designation'=> '',
                            'status'=>'Active', 
                            'createdBy'=>$this->vendorId, 
                            'createdAt'=>date('Y-m-d H:i:s')
                    );
                    if(!empty($uploadedImage['file_name'])){
                        $saveData['image']=$uploadedImage['file_name'];
                    }
                    if($id){
                         $getData=$this->Client_model->getclientList($id);
                         if(!empty($getData)){
                             if(!empty($saveData['image'])) {
                                @unlink('./uploads/client/'.$getData['image']);
                                @unlink('./uploads/client/thumbnail/'.$getData['image']);
                                @chmod('./uploads/client/'.$getData['image'],0777);
                                @chmod('./uploads/client/thumbnail/'.$getData['image'],0777);
                             }
                            $result = $this->Client_model->updateData($saveData, $id);   
                         } else {
                            $this->session->set_flashdata('error', 'Invalid operation!');
                            redirect('administrator/client/add-edit/'.$id);
                         }
                         
                    } else {
                        $result = $this->Client_model->saveData($saveData);
                    }
                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Data has been save successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed.');
                    }
                     redirect('administrator/client/add-edit/'.$id);
                }
            }
        } else {
            $this->global['pageTitle'] = 'Our client :: Add & Edit';
            $this->global['pageHeading'] = 'Our client';
            if(!empty($id)){
                $this->global['pageSection'] = 'Update :: Our client Details';
                $data['getData'] = $this->Client_model->getclientList($id);

            }else{
                $this->global['pageSection'] = 'Save :: Our client Details';
            }
            
            $data['roles'] = $this->User_model->getUserRoles();
            $data['id'] = !empty($id) ? $id : 0;
            $this->loadViews("administrator/client/addEdit", $this->global, $data , NULL);
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
            $getData=$this->Client_model->getclientList($id);
             if(!empty($getData)){
                 if(!empty($getData['image'])) {
                    @unlink('./uploads/client/'.$getData['image']);
                    @unlink('./uploads/client/thumbnail/'.$getData['image']);
                    @chmod('./uploads/client/'.$getData['image'],0777);
                    @chmod('./uploads/client/thumbnail/'.$getData['image'],0777);
                 }
                  $result = $this->Client_model->deleteData($id);
                 $this->session->set_flashdata('success', 'Data has been deleted successfully');
                 redirect('administrator/client');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/client');
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
            $getData=$this->Client_model->getclientList($id);
             if(!empty($getData)){
                $data = array(
                    'status' => $active
                );           
                 $result = $this->Client_model->updateData($data, $id);   
                 $this->session->set_flashdata('success', 'Status has been update');
                 redirect('administrator/client');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/client');
             }
        }
    }
    
    

    
}

?>