<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Applyonline extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Applyonline_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Apply Online :: Listing';
            $searchText = $this->input->post('searchText','');
            $data['searchText'] = $searchText;            
            $this->load->library('pagination');            
            $count = $this->Applyonline_model->queryListCount($searchText);
			      $returns = $this->paginationCompress("administrator/applyonline/", $count, 10);
			 $segment = ($this->uri->segment(3)) ? $this->uri->segment(3)*10 : 0;
            $data['records'] = $this->Applyonline_model->queryList($searchText, $returns["page"], $segment);
            
            /*echo "<pre/>";
             print_r($data['records']);exit;*/
        $this->loadViews("administrator/applyonline/index", $this->global, $data , NULL);
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
            $getData=$this->Applyonline_model->getQueryList($id);
             if(!empty($getData)){               
                 $result = $this->Applyonline_model->deleteData($id);   
                 $this->session->set_flashdata('success', 'Data has been deleted successfully');
                 redirect('administrator/applyonline');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/applyonline');
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
            $getData=$this->Applyonline_model->getQueryList($id);
             if(!empty($getData)){
                $data = array(
                    'status' => $active
                );
                 $result = $this->Applyonline_model->updateData($data, $id);   
                 $this->session->set_flashdata('success', 'Status has been update');
                 redirect('administrator/applyonline');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/applyonline');
             }
        }
    }
}

?>