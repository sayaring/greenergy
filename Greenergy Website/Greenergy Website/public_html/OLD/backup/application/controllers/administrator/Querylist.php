<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Querylist extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Querylist_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Quote & Query :: Listing';
            $searchText = $this->input->post('searchText','');
            $data['searchText'] = $searchText;            
            $this->load->library('pagination');            
            $count = $this->Querylist_model->queryListCount($searchText);
			      $returns = $this->paginationCompress("administrator/query-list/", $count, 10);
			 $segment = ($this->uri->segment(3)) ? $this->uri->segment(3)*10 : 0;
            $data['records'] = $this->Querylist_model->queryList($searchText, $returns["page"], $segment);
            
            /*echo "<pre/>";
             print_r($data['records']);exit;*/
        $this->loadViews("administrator/query-list/index", $this->global, $data , NULL);
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
            $getData=$this->Querylist_model->getQueryList($id);
             if(!empty($getData)){               
                 $result = $this->Querylist_model->deleteData($id);   
                 $this->session->set_flashdata('success', 'Data has been deleted successfully');
                 redirect('administrator/query-list');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/query-list');
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
            $getData=$this->Querylist_model->getQueryList($id);
             if(!empty($getData)){
                $data = array(
                    'status' => $active
                );
                 $result = $this->Querylist_model->updateData($data, $id);   
                 $this->session->set_flashdata('success', 'Status has been update');
                 redirect('administrator/query-list');
             }else{
                $this->session->set_flashdata('error', 'Invalid operation!');
                redirect('administrator/query-list');
             }
        }
    }
}

?>