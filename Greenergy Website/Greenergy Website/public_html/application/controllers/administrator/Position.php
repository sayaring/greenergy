<?php
/**
 * 
 */
require APPPATH . '/libraries/BaseController.php';
class Position extends BaseController
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('administrator/PositionModel');
        $this->load->model('frontend/CommonModel');
        $this->isLoggedIn();   
    }

/*********************************************************************/
//  QMR

    public function index()
    {
       
        $this->global['pageTitle'] = 'Position Listing';    
        $data=array();              
        $this->loadViews("administrator/position/list_position", $this->global, $data , NULL);
    }

    public function position_list()
    {

        $data = $_POST;
        $columns = [];
        $page = $data['draw'];
        $limit = $data['length'];
        $offset = $data['start'];
        $searchVal = $data['search']['value'];
        $sortColIndex = $data['order'][0]['column'];
         $sortBy = $data['order'][0]['dir'];

        $count = count($this->PositionModel->getPositionData($searchVal,0,0,0,0));
        if($count){
            $positionData = $this->PositionModel->getPositionData($searchVal, $sortColIndex, $sortBy, $limit, $offset);

            foreach ($positionData as $key => $pstdata) {
                     $row = []; 
            
                array_push($row, $offset+($key + 1));   

                
              
                array_push($row, $pstdata['name']);  
            
                   if ($pstdata['is_active']==1) {
                    $status = '<span class="badge badge-success _active" onclick="changeis_active('.$pstdata['id'] .',0)" id="active_'.$pstdata['id'].'" title="In-Active">Active</span>';
                    }else{
                        $status = '<span class="badge badge-danger _active" onclick="changeis_active('.$pstdata['id'] .',1)" id="active_'.$pstdata['id'].'" title="Active">In-Active</span>';
                    }
                  
                     array_push($row, $status);
             

                $confirm = "confirm('Do you want to delete this record?');";
                $action = '

                <a href="javascript:void(0);" title="Edit" class="btn btn-primary waves-effect waves-light btn-sm positionModel" onclick="positionModel('.$pstdata['id'] .')" data-id="'.$pstdata['id'] .'" ><i class="fa fa-pencil" aria-hidden="true"></i></a>

                   <a onclick="return '.$confirm.'" href="'.base_url() .'administrator/Position/delete/'.$pstdata['id'].'" title="Delete" class="btn btn-danger btn-sm waves-effect waves-light" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                ';
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
    public function positionModel()
    {
        $id = $this->input->post('id');
        $data['sub_title'] = 'Add position';
        $data['positions'] = $data['position'] = array();
        if ($id) {
            $position = $this->PositionModel->getPositionData('',0,0,0,0,$id);
            $data['sub_title'] = 'Edit position';
            $data['positions'] = $position[0];
            
        }
// echo "<pre>";print_r($data);die;
        $html = $this->load->view('administrator/position/modal_position', $data,true);
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


    public function add()
    {
        $post = $this->input->post();
        // print_r($post);
    


        if ($post) {

            if($post){

        
            if (empty($post['id'])) {
             

                if ($this->CommonModel->iudAction('position',$post,'insert')) {
                    $this->session->set_flashdata('success', 'Position Added Succesfully!');
                }else{
                    $this->session->set_flashdata('error','Fail To Add Position!');
                }
            }else{
             
                if ($this->CommonModel->iudAction('position',$post,'update',array('id'=> $post['id']))) {
                    $this->session->set_flashdata('success','Position Updated Succesfully!');
                }else{
                    $this->session->set_flashdata('error','Fail To Update Position!');
                }
            }

        }else{
            $this->session->set_flashdata('error','Something went to wrong!');
        }

        redirect(base_url('administrator/Position'));
    }
}



public function delete($id)
    {
        // print_r($id);die;
        if ($id) {
            if ($this->CommonModel->iudAction('position',array('is_active'=>0),'update',array('id'=>$id))){
               
                $this->session->set_flashdata('success','Position Deleted Successfully');
            }else{
                $this->session->set_flashdata('error','Fail to Delete Position');
            }
        }else{
            $this->session->set_flashdata('error',INVAILD_INPUT);
        }
        
         redirect(base_url('administrator/Position'));
    }

    public function changeis_active()
    {
        $get = $this->input->get();
        
        if($this->CommonModel->iudAction('position',$get,'update',array('id' => $get['id']))){
            $response['result'] = TRUE;
            $response['is_actives'] = 'is_active Updated Successfully';

        }else{
            
            $response['result'] = FALSE;
            $response['is_actives'] = 'is_active Not Update!';
        }
        echo json_encode($response);
    }        
}