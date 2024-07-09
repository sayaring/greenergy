<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Generalsetting extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Generalsetting_model');
        $this->isLoggedIn();   

    }
    
    

    /**
     * This function used to load the first screen of the user
     */
    public function addEdit()
    {

        if($this->input->server('REQUEST_METHOD') == 'POST'){

            if($this->isAdmin() == TRUE)
            {
                $this->loadThis();
            } else {                
                $this->form_validation->set_rules('name','Name','trim|required|max_length[255]|xss_clean');
                $this->form_validation->set_rules('email','Email','trim|required|max_length[255]');
                $this->form_validation->set_rules('phone','Section','trim|required|max_length[255]');
                //$this->form_validation->set_rules('mapLink','Map Link','trim|required');
                $this->form_validation->set_rules('metaTitle','Meta Title','trim|required');
                $this->form_validation->set_rules('metaKeywords','Meta Keywords','trim|required');
                $this->form_validation->set_rules('metaDescription','Meta Description','trim|required');
                
                if($this->form_validation->run() == FALSE)
                {                    
                    $this->session->set_flashdata('error', validation_errors());
                    redirect('administrator/generalsetting');
                }
                else
                {
                    $name = $this->input->post('name');
                    $email = $this->input->post('email');
                    $phone = $this->input->post('phone');
                    $facebookLink = $this->input->post('facebookLink');
                    $googlePlusLink = $this->input->post('googlePlusLink');
                    $instagramLink = $this->input->post('instagramLink');
                    $youtubeLink = $this->input->post('youtubeLink');
                    $mapLink = $this->input->post('mapLink');
                    $metaTitle = $this->input->post('metaTitle');
                    $metaKeywords = $this->input->post('metaKeywords');
                    $metaDescription = $this->input->post('metaDescription');
                     
                     /*Image upload section*/
                     if ($_FILES && $_FILES['file']['name'] !== "") {
                        $rootPath='./uploads/logo/';
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
                            redirect('administrator/generalsetting');
                          } else {
                            $uploadedImage = $this->upload->data();             
                          }
                      }
                      /*Favicon Upload*/
                      if ($_FILES && $_FILES['favicon']['name'] !== "") {
                        $rootPath='./uploads/logo/';
                        $field_name ='favicon';
                         $rand=rand(1,10000).time();
                         $config['upload_path']   = $rootPath; 
                          $config['allowed_types'] = 'gif|jpg|png|ico'; 
                          $config['remove_spaces'] = true;
                          $config['max_size']      = 2048;
                          $config['file_name']     = $rand.$_FILES['favicon']['name'];

                          $this->load->library('upload', $config);
                          if (!$this->upload->do_upload('favicon')) {
                            $this->session->set_flashdata('error', $this->upload->display_errors());
                            redirect('administrator/generalsetting');
                          } else {
                            $uploadedFavicon = $this->upload->data();             
                          }
                      }
                    $saveData = array('name'=>$name, 
                            'email'=>$email,
                            'phone'=>$phone, 
                            'facebookLink'=>$facebookLink,
                            'twitterLink'=>$twitterLink, 
                            'googlePlusLink'=>$googlePlusLink,
                            'instagramLink'=>$instagramLink, 
                            'youtubeLink'=>$youtubeLink, 
                            'mapLink'=> $mapLink,
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
                    if(!empty($uploadedFavicon['file_name'])){
                        $saveData['favicon']=$uploadedFavicon['file_name'];
                    }
                     $getData=$this->Generalsetting_model->getGeneralsettingList(99);
                     if(!empty($getData)){
                        if(!empty($saveData['image'])) {
                            @unlink('./uploads/logo/'.$getData['image']);
                            @chmod('./uploads/logo/'.$getData['image'],0777);
                         }
                        $result = $this->Generalsetting_model->updateData($saveData, 99);   
                     } else {
                        $this->session->set_flashdata('error', 'Invalid operation!');
                        redirect('administrator/generalsetting');
                     }                    
                    if($result > 0)
                    {
                        $this->session->set_flashdata('success', 'Data has been save successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Failed.');
                    }
                     redirect('administrator/generalsetting');
                }
            }
        } else {
            $this->global['pageTitle'] = 'General Setting';
            $this->global['pageHeading'] = 'General Setting';
           $this->global['pageSection'] = 'Update :: General Setting Details';
            $data['getData'] = $this->Generalsetting_model->getGeneralsettingList(99);
            
            $data['roles'] = $this->User_model->getUserRoles();
            $this->loadViews("administrator/generalsetting/addEdit", $this->global, $data , NULL);
        }
        
    }
   
}

?>