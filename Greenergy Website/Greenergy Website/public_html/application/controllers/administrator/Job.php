<?php
/**
 * 
 */
require APPPATH . '/libraries/BaseController.php';
class Job extends BaseController
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('administrator/JobModel');
        $this->load->model('frontend/CommonModel');
        $this->isLoggedIn();   
       
    }

    public function index()
    {
      
        $this->global['pageTitle'] = 'Job Listing';    
        $data=array();              
        $this->loadViews("administrator/job/job_list", $this->global, $data , NULL);
    }

    

    public function listjob()
    {
        $data = $_POST;
        $columns = [];
        $page = $data['draw'];
        $limit = $data['length'];
        $offset = $data['start'];
        $searchVal = $data['search']['value'];
        $sortColIndex = $data['order'][0]['column'];
        $sortBy = $data['order'][0]['dir'];

      
        $count = count($this->JobModel->getJobData($searchVal,0,0,0,0,0));
        if($count){
            $result = $this->JobModel->getJobData($searchVal, $sortColIndex, $sortBy, $limit, $offset,0);
            foreach ($result as $key => $jobs) {
            
                $row = []; 

                array_push($row, $offset+($key+1));
              
                array_push($row, $jobs['title']);
                array_push($row, $jobs['location']);
                array_push($row, $jobs['positionqa']);
              
               
                if($jobs['status']==1){
                   array_push($row,"Active"); 
                }else{
                   array_push($row, "In-Active");    
                }
                array_push($row, $jobs['no_of_applicant']);
                $confirm = "confirm('Are you sure you want to delete this job?')";

                $action = ' <a href="'.base_url().'administrator/job/view/'.$jobs['id'] .'" title="Edit" class="btn btn-primary waves-effect waves-light btn-sm " ><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="'.base_url().'administrator/job/add/'.$jobs['id'] .'" title="Edit" class="btn btn-primary waves-effect waves-light btn-sm " ><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return '.$confirm.'" href="'.base_url() .'administrator/job/delete/'.$jobs['id'].'" title="Delete" class="btn btn-danger btn-sm waves-effect waves-light" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                ';

                // <a onclick="return '.$confirm.'" href="'.base_url() .'administrator'job/delete/'.$value['id'] .'?t='.$type.'" title="Delete" class="btn btn-danger btn-sm waves-effect waves-light" ><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
                array_push($row, $action);
                
                $columns[] = $row;

            }
        }
        $response = [
            'draw' => $page,
            'data' => $columns,
            'recordsTotal' => $count,
            'recordsFiltered' => $count
        ];
        echo json_encode($response);
    }
    
    public function listJobApplicant()
    {
        $data = $_POST;
        $columns = [];
        $page = $data['draw'];
        $limit = $data['length'];
        $offset = $data['start'];
        $searchVal = $data['search']['value'];
        $sortColIndex = $data['order'][0]['column'];
        $sortBy = $data['order'][0]['dir'];

        $where=array();
        if($data['job_post_id']){
             $where['p.job_post_id']=$data['job_post_id'];
        }
               
        $count = count($this->JobModel->getJobApplicantData($searchVal,0,0,0,0,$where));
        if($count){
            $result = $this->JobModel->getJobApplicantData($searchVal, $sortColIndex, $sortBy, $limit, $offset,$where);
            foreach ($result as $key => $jobs) {
            
                $row = []; 

                array_push($row, $offset+($key+1));
              
                array_push($row, $jobs['name']);
                array_push($row, $jobs['mobile']);
                if(isset($jobs['resume_link'])){
                   
                    $link='<a href="'.base_url().'uploads/cv/'.$jobs['resume_link'].'" target="_blank">View Cv</a>';
                }else{
                    $link=$jobs['resume_link'];
                }

                array_push($row, $link);
                array_push($row, $jobs['position']);
                array_push($row, $jobs['qualification']);
                array_push($row, $jobs['stream']);
                array_push($row, $jobs['passoutyear']);
                array_push($row, $jobs['experience']);
                array_push($row, date('Y-m-d h:i a',strtotime($jobs['created_on'])));
             
                
                $columns[] = $row;

            }
        }
        $response = [
            'draw' => $page,
            'data' => $columns,
            'recordsTotal' => $count,
            'recordsFiltered' => $count
        ];
        echo json_encode($response);
    }
    
    
    public function add_insert(){
         $data['title1'] = 'Add Job Description ';
       
         $this->global['pageTitle'] = 'Add Job Description ';    
         $this->loadViews("administrator/job/add_job", $this->global, $data , NULL);
    }

    public function add($_id='')
    {
       
        $post = $this->input->post();
        // print_r($post);die;
        if ($post) {
            if ($post['id'] =='') {

                $insert=array(

                        'title'=>$this->input->post('title'),
                        'location'=>$this->input->post('location'),
                        'position'=>$this->input->post('position'),
                        'description'=>$this->input->post('description'),
                        'role_responsibilities'=>$this->input->post('role_responsibilities'),
                        'qualification_skillset'=>$this->input->post('qualification_skillset'),
                        'status'=>$this->input->post('status'),
                        'created_by'=> 1
                     
                        );
          
                if ($this->CommonModel->iudAction('job_post',$insert,'insert')) {

                   $this->session->set_flashdata('success','Post Job Added Successfully');                  
                }else{
                    $this->session->set_flashdata('error','Fail To Added Post job');
                }
            }else{

                  $update=array(
                        'id'=>$this->input->post('id'),
                        'title'=>$this->input->post('title'),
                        'location'=>$this->input->post('location'),
                        'position'=>$this->input->post('position'),
                        'description'=>$this->input->post('description'),
                        'role_responsibilities'=>$this->input->post('role_responsibilities'),
                        'qualification_skillset'=>$this->input->post('qualification_skillset'),
                        'status'=>$this->input->post('status'),
                        'updated_by'=> 1,
                        'updated_on' =>date('Y-m-d H:m:s'),
                     
                        );
          
 
                $this->CommonModel->iudAction('job_post',$update,'update', array('id' => $post['id']));
              
                $this->session->set_flashdata('success','Post Job Updated Successfully');
            }
            redirect(base_url('administrator/job'));
        }
        if ($_id) {
            $job = $this->JobModel->getJobData('',0,0,0,0,$_id);
            // print_r($job);die;
            $data = $job[0];          
            $data['title1'] = 'Edit Job Description';
            $data['position_name'] = $this->CommonModel->getData('position',array('id'=>$data['position'])); 
        }else{
            $data['position_name'] = $this->CommonModel->getData('position'); 
        }
       
       
        $this->global['pageTitle'] = 'Add Job Description ';    
        $this->loadViews("administrator/job/add_job", $this->global, $data , NULL);
    }
    public function view($_id)
    {
        $data['title'] = 'job';      
        $job = $this->JobModel->getJobData('',0,0,0,0,$_id);
        if ($job) {
            $data['job'] = $job[0];           
            $this->global['pageTitle'] = 'Job Details';    
            $this->loadViews("administrator/job/job_view", $this->global, $data , NULL);
        }else{
            redirect(base_url()."administrator/job");
        }
        
    }
    public function delete($id)
    {
        if ($id) {
            if ($this->CommonModel->iudAction('job_post',array('is_deleted'=>1,'deleted_on'=>date('Y-m-d H:m:s'),'deleted_by'=>1),'update',array('id'=>$id))){
               
                $this->session->set_flashdata('success','Post Job Deleted Successfully');
            }else{
                $this->session->set_flashdata('error','Fail to Delete Post Job');
            }
        }else{
            $this->session->set_flashdata('error',INVAILD_INPUT);
        }
        
        redirect(base_url('administrator/Job'));
       
    }
     public function rejectApplicant($_id)
    {
        $data['title'] = 'job';      
        $applicant_data= $this->CommonModel->getData('job_post_applicant_list',array('id'=>$_id),'','','row_array'); 
        if ($applicant_data['email']) {
            $data['postion']=$applicant_data['position'];
              $htmlContent =  $this->load->view(WEB.'mail_template/sample_reject_template', $data, true);
              //echo $htmlContent; die;

            $res = sendMail(EMAIL_ID, EMAIL_FROM, $applicant_data['email'] , 'Application Status Update', $htmlContent);
            if ($res ) {      
                $this->session->set_flashdata('success', 'Rejected Mail sent Successfully'); 
                  $this->CommonModel->iudAction('job_post_applicant_list',array('status'=>2,'updated_by'=>userId(),'updated_on'=>date('Y-m-d H:i:s')),'update', array('id' =>$_id));
              //  echo "ok"; 
 
            }else{
                $this->session->set_flashdata('error',"Mail Not send");
               // echo "Mail Not Send";
            }
              redirect(base_url()."administrator/job/view/".$applicant_data['job_post_id']);
        }else{
            redirect(base_url()."administrator/job");
        }
        
    }

    public function listposition($value='')
    {
        if(!isset($_GET['searchTerm'])){ 
            $json = [];
            $position=$this->JobModel->getSerch('');
        }else{
            $search = $_GET['searchTerm'];
            $position=$this->JobModel->getSerch($search);
        }
     
           foreach ($position as $key => $value) {
            
            $json[] = ['id'=>$value['id'], 'text'=>$value['name']];
            }  
        echo json_encode($json);
    }

}