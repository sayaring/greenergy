<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Category extends BaseController {
	/**
	 * This is default constructor of the class
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Category_model');
		$this->isLoggedIn();
	}

	/**
	 * This function used to load the first screen of the user
	 */
	public function index() {
		$this->global['pageTitle'] = 'Room Category:: Listing';
		// echo "hi";exit;
		$searchText = $this->input->post('searchText', '');
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->Category_model->categoryListCount($searchText);
		$returns = $this->paginationCompress("administrator/category/", $count, 20);
		$data['records'] = $this->Category_model->categoryList($searchText, $returns["page"], $returns["segment"]);
		$this->loadViews("administrator/category/index", $this->global, $data, NULL);
	}

	/**
	 * This function used to load the first screen of the user
	 */
	public function addEdit($id) {
		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			if ($this->isAdmin() == TRUE) {
				$this->loadThis();
			} else {

				$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[255]|xss_clean');

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors());
					redirect('administrator/category/add-edit/' . $id);
				} else {
					$name = $this->input->post('name');
					$url = url_title($name, '-', TRUE);
					$metaTitle = $this->input->post('meta_title');
                    $metaDescription = $this->input->post('meta_description');
                    $metaKeywords = $this->input->post('meta_keywords');
					/*Image upload section*/
					if ($_FILES && $_FILES['file']['name'] !== "") {
						$rootPath = './uploads/category/';
						$newFolder = './uploads/category/thumbnail/';
						$field_name = 'file';
						$rand = rand(1, 10000);
						$config['upload_path'] = $rootPath;
						$config['allowed_types'] = 'gif|jpg|png';
						$config['remove_spaces'] = true;
						$config['max_size'] = 2048;
						$config['file_name'] = $rand . $_FILES['file']['name'];

						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('file')) {
							$this->session->set_flashdata('error', $this->upload->display_errors());
							redirect('administrator/category/add-edit/' . $id);
						} else {
							$uploadedImage = $this->upload->data();
							$this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 375, 348);
						}
					}
					$saveData = array('name' => $name,
						'link' => $url,
						'metaTitle'=>$metaTitle,
                        'metaKeywords'=>$metaKeywords, 
                        'metaDescription'=> $metaDescription,
                        'status'=>'Active', 
						'createdBy' => $this->vendorId,
						'createdAt' => date('Y-m-d H:i:s'),
					);
					if (!empty($uploadedImage['file_name'])) {
						$saveData['image'] = $uploadedImage['file_name'];
					}
					if ($id) {
						$getData = $this->Category_model->getCategoryList($id);
						if (!empty($getData)) {
							if (!empty($saveData['image'])) {
								@unlink('./uploads/category/' . $getData['image']);
								@unlink('./uploads/category/thumbnail/' . $getData['image']);
								@chmod('./uploads/category/' . $getData['image'], 0777);
								@chmod('./uploads/category/thumbnail/' . $getData['image'], 0777);
							}
							$result = $this->Category_model->updateData($saveData, $id);
						} else {
							$this->session->set_flashdata('error', 'Invalid operation!');
							redirect('administrator/category/add-edit/' . $id);
						}

					} else {
						$result = $this->Category_model->saveData($saveData);
					}

					if ($result > 0) {
						$this->session->set_flashdata('success', 'Data has been save successfully');
					} else {
						$this->session->set_flashdata('error', 'Failed.');
					}
					redirect('administrator/category/add-edit/' . $id);
				}
			}
		} else {
			$this->global['pageTitle'] = 'Room Category :: Add & Edit';
			$this->global['pageHeading'] = 'Room Category';
			if (!empty($id)) {
				$this->global['pageSection'] = 'Update :: Room Category Details';
				$data['getData'] = $this->Category_model->getCategoryList($id);

			} else {
				$this->global['pageSection'] = 'Save :: Room Category Details';
			}

			$data['roles'] = $this->User_model->getUserRoles();
			$data['id'] = !empty($id) ? $id : 0;
			$this->loadViews("administrator/category/addEdit", $this->global, $data, NULL);
		}

	}

	/**
	 * This function is used to delete the user using userId
	 * @return boolean $result : TRUE / FALSE
	 */
	function deleteData($id) {
		if ($this->isAdmin() == TRUE) {
			echo (json_encode(array('status' => 'access')));
		} else {
			$getData = $this->Category_model->getCategoryList($id);
			if (!empty($getData)) {
				if (!empty($saveData['image'])) {
					@unlink('./uploads/category/' . $getData['image']);
					@unlink('./uploads/category/thumbnail/' . $getData['image']);
					@chmod('./uploads/category/' . $getData['image'], 0777);
					@chmod('./uploads/category/thumbnail/' . $getData['image'], 0777);

				}
				$result = $this->Category_model->deleteData($id);
				$this->session->set_flashdata('success', 'Data has been deleted successfully');
				redirect('administrator/category');
			} else {
				$this->session->set_flashdata('error', 'Invalid operation!');
				redirect('administrator/category');
			}
		}
	}

	/**
	 * This function is used to delete the user using userId
	 * @return boolean $result : TRUE / FALSE
	 */
	function changeStatus($id, $active) {
		if ($this->isAdmin() == TRUE) {
			echo (json_encode(array('status' => 'access')));
		} else {
			$getData = $this->Category_model->getCategoryList($id);
			if (!empty($getData)) {
				$data = array(
					'status' => $active,
				);
				$result = $this->Category_model->updateData($data, $id);
				$this->session->set_flashdata('success', 'Status has been update');
				redirect('administrator/category');
			} else {
				$this->session->set_flashdata('error', 'Invalid operation!');
				redirect('administrator/category');
			}
		}
	}

}

?>