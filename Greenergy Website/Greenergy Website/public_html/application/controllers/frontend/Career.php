<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class  Career extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
       
         $this->load->model('frontend/JobpostModel');
         $this->load->model('frontend/CommonModel');
         $this->common->setGlobalSettingsData();
          $this->load->library('pagination');
          $this->load->helper('custom_helper');
          $this->load->library('upload');
        // $this->load->model('Room_model');
        //$this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function apply_job()
    {       
        $data=array();    
     
      //$this->load->view('frontend/applyjob/career');
     
         $data['is_footer_js']=1;
        $this->webLoadViews("frontend/applyjob/job_listing", $this->global, $data , NULL);
    }

     public function apply_job_details($id)
    {       
        $data=array();    
        $data['is_footer_js']=1;
        if($id){

                $data['job_data_details'] = $this->CommonModel->getData('job_post',array('id'=>$id));
               
            }
        $this->webLoadViews("frontend/applyjob/job_details", $this->global, $data , NULL);
    }

   
    public function applyjobModal()
  {

    $id = $this->input->post('id');
     $data['sub_title'] = 'Add applyjob';
   
    $html = $this->load->view('frontend/applyjob/applyjobmodal', $data,true);
    if ($html) {
      $response['html'] = $html;
      $response['result'] = true;
      $response['reason'] = 'Data Found';
    }else{
      $response['result'] = fasle;
      $response['reason'] = 'Something went to wrong!';
    }
    echo json_encode($response);
  }
  public function add_jobdetails(){
    //echo 'hiiii';die;
     $post = $this->input->post();
       
        $value =$image_name='';
        $image_name ='';
         // print_r($post);die;
        if ($_FILES) {
                $result = myUpload('uploads/cv', 'cv', false);
                //print_r($result);
                 if (isset($result['data'])) {
                    $image_name = $result['data']['file_name']; 
                 }
        }
       // print_r($image_name);die;
         $data=array(
                        
                        'name'=>$this->input->post('name'),
                        'mobile'=>$this->input->post('mobile'),
                        'position'=>$this->input->post('postion'),
                        'job_post_id'=>$this->input->post('job_post_id'),
                        'qualification'=>$this->input->post('qualification'),      
                        'stream'=>$this->input->post('stream'),   
                        'passoutyear'=>$this->input->post('passoutyear'),   
                        'experience'=>$this->input->post('experience'),   
                        );
         //print_r($data);die;
        if ($post) {
           

                        if($image_name){
                         $data['resume_link']=$image_name;
                        }
                         // print_r($data);die;
                        if ($this->CommonModel->iudAction('job_post_applicant_list',$data,'insert')) {
        
                           $this->session->set_flashdata('success','Thank you....You applied Successfully Applied Succesfully!');                  
                        }else{
                            $this->session->set_flashdata('error','Fail To Added Job Details Succesfully!');
                        }
                
           
                redirect(base_url('apply-job'));
     
            
        }
  }
   
   public function getAllLists($rowno=0)
    {
        $where = $post = array(); $soryIndex = $sort ='';
       
        $rowperpage = $this->input->post('per_page')? $this->input->post('per_page') :3;
        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }
        $products=array();

        $allcount = count($this->JobpostModel->getJobData('',0,'desc',0,0,''));
        $products = $this->JobpostModel->getJobData('',0,'desc',$rowperpage,$rowno,'');

   
        // Get  records
        // Pagination Configuration
        $config['base_url'] = base_url().'career-list/';
        $config['full_tag_open'] = '<ul class="pagination justify-content-center mt-4">';
        $config['full_tag_close'] = '</ul>'; 
        $config['cur_tag_open'] = '<li class="page-item active"><a  class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open'] = '<li  class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;
        $config['attributes'] = array('class' => 'page-link');

        // Initialize
        $this->pagination->initialize($config);
        $data['job_data'] = $products;   
        $data['q'] = $this->db->last_query();
   //  echo $this->db->last_query();die;
        $data['pagination'] = $this->pagination->create_links();
        $data['row'] = $rowno;
        // print_r($products['products']);die;
        $data['html'] = $this->load->view('frontend/applyjob/job_template_card',$data,true); 
       // $data['html_right_side'] = $this->load->view(WEB.'career/side_career_list',$data,true); 
       
       
       
        echo json_encode($data,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        
    }
    
 
}

?>
