<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Emailtemplate extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Emailtemplate_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Email Template :: Listing';
            $searchText = $this->input->post('searchText','');
            $data['searchText'] = $searchText;            
            $this->load->library('pagination');            
            $count = $this->Emailtemplate_model->emailtemplateListCount($searchText);
			      $returns = $this->paginationCompress("administrator/emailtemplate/", $count, 20);
            $data['records'] = $this->Emailtemplate_model->emailtemplateList($searchText, $returns["page"], $returns["segment"]);        
        $this->loadViews("administrator/emailtemplate/index", $this->global, $data , NULL);
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
                $this->form_validation->set_rules('subject','subject','trim|required|max_length[255]|xss_clean');
                $this->form_validation->set_rules('description','Description','trim|required');
                
                if($this->form_validation->run() == FALSE)
                {                    
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('administrator/emailtemplate/add-edit/'.$id);
                }
                else
                {
                    $title = $this->input->post('title');
                    $subject = $this->input->post('subject');
                    $description = $this->input->post('description');                
                     
                    $saveData = array('title'=>$title,
                            'subject'=>$subject, 
                            'description'=> $description,
                            'status'=>'Active', 
                            'createdBy'=>$this->vendorId, 
                            'createdAt'=>date('Y-m-d H:i:s')
                    );
                    
                    if($id){
                         $getData=$this->Emailtemplate_model->getEmailtemplateList($id);
                         if(!empty($getData)){                            
                            $result = $this->Emailtemplate_model->updateData($saveData, $id);   
                         } else {
                            $this->session->set_flashdata('error', 'Invalid operation!');
                            redirect('administrator/emailtemplate/add-edit/'.$id);
                         }
                         
                    } else {
                        $result = $this->Emailtemplate_model->saveData($saveData);
                    }
                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Data has been save successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed.');
                    }
                     redirect('administrator/emailtemplate/add-edit/'.$id);
                }
            }
        } else {
            $this->global['pageTitle'] = 'Email Template :: Add & Edit';
            $this->global['pageHeading'] = 'Email Template';
            if(!empty($id)){
                $this->global['pageSection'] = 'Update :: emailtemplate Details';
                $data['getData'] = $this->Emailtemplate_model->getEmailtemplateList($id);

            }else{
                $this->global['pageSection'] = 'Save :: Email Template Details';
            }
            
            $data['roles'] = $this->User_model->getUserRoles();
            $data['id'] = !empty($id) ? $id : 0;
            $this->loadViews("administrator/emailtemplate/addEdit", $this->global, $data , NULL);
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
            $getData=$this->Emailtemplate_model->getEmailtemplateList($id);
             if(!empty($getData)){
                if(!empty($saveData['image'])) {
                    @unlink('./uploads/emailtemplate/'.$getData['image']);
                    @unlink('./uploads/emailtemplate/thumbnail/'.$getData['image']);
                    @chmod('./uploads/emailtemplate/'.$getData['image'],0777);
                    @chmod('./uploads/emailtemplate/thumbnail/'.$getData['image'],0777);                   
                    
                 }
                 $result = $this->Emailtemplate_model->deleteData($id);   
                 $this->session->set_flashdata('success', 'Data has been deleted successfully');
                 redirect('administrator/emailtemplate');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/emailtemplate');
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
            $getData=$this->Emailtemplate_model->getEmailtemplateList($id);
             if(!empty($getData)){
                $data = array(
                    'status' => $active
                );           
                 $result = $this->Emailtemplate_model->updateData($data, $id);   
                 $this->session->set_flashdata('success', 'Status has been update');
                 redirect('administrator/emailtemplate');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/emailtemplate');
             }
        }
    }
}

?>