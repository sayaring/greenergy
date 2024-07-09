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
class Modelprofile extends BaseController {
	/**
	 * This is default constructor of the class
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Modelprofile_model');
		$this->load->model('Category_model');
		$this->load->model('Subcategory_model');
		$this->isLoggedIn();
	}

	/**
	 * This function used to load the first screen of the user
	 */
	public function index() {
		$this->global['pageTitle'] = 'Model Profile:: Listing';
		$searchText = $this->input->post('searchText', '');
		$data['searchText'] = $searchText;
		$this->load->library('pagination');
		$count = $this->Modelprofile_model->modelProfileListCount($searchText);
		$returns = $this->paginationCompress("administrator/modelprofile/", $count, 20);
		$data['records'] = $this->Modelprofile_model->modelProfileList($searchText, $returns["page"], $returns["segment"]);
		$this->loadViews("administrator/modelprofile/index", $this->global, $data, NULL);
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
				$this->form_validation->set_rules('category', 'category', 'trim|required');
				$this->form_validation->set_rules('subCategory', 'sub category', 'trim|required|max_length[255]|xss_clean');
				$this->form_validation->set_rules('about', 'about', 'trim|required|max_length[255]|xss_clean');
				$this->form_validation->set_rules('showHome', 'Show Home', 'trim|required|max_length[255]|xss_clean');

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors());
					redirect('administrator/modelprofile/add-edit/' . $id);
				} else {
					$name = $this->input->post('name');
					$url = url_title($name, '-', TRUE);
					$category = $this->input->post('category');
					$subCategory = $this->input->post('subCategory');
					$about = $this->input->post('about');
					$showHome = $this->input->post('showHome');

					/*Image upload section*/
					if ($_FILES && $_FILES['file']['name'] !== "") {
						$rootPath = './uploads/modelprofile/';
						$newFolder = './uploads/modelprofile/thumbnail/';
						$field_name = 'file';
						$rand = rand(1, 10000) . time();
						$config['upload_path'] = $rootPath;
						$config['allowed_types'] = 'gif|jpg|png';
						$config['remove_spaces'] = true;
						$config['max_size'] = 2048;
						$config['file_name'] = $rand . $_FILES['file']['name'];

						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('file')) {
							$this->session->set_flashdata('error', $this->upload->display_errors());
							redirect('administrator/modelprofile/add-edit/' . $id);
						} else {
							$uploadedImage = $this->upload->data();
							$this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 410, 410);
						}
					}
					$saveData = array('name' => $name,
						'link' => $url,
						'subCategoryId' => $subCategory,
						'about' => $about,
						'showHome' => $showHome,
						'status' => 'Active',
						'createdBy' => $this->vendorId,
						'createdAt' => date('Y-m-d H:i:s'),
					);
					if (!empty($uploadedImage['file_name'])) {
						$saveData['image'] = $uploadedImage['file_name'];
					}
					if ($id) {
						$getData = $this->Modelprofile_model->getModelProfileList($id);
						if (!empty($getData)) {
							if (!empty($saveData['image'])) {
								@unlink('./uploads/modelprofile/' . $getData['image']);
								@unlink('./uploads/modelprofile/thumbnail/' . $getData['image']);
								@chmod('./uploads/modelprofile/' . $getData['image'], 0777);
								@chmod('./uploads/modelprofile/thumbnail/' . $getData['image'], 0777);
							}
							$result = $this->Modelprofile_model->updateData($saveData, $id);
						} else {
							$this->session->set_flashdata('error', 'Invalid operation!');
							redirect('administrator/modelprofile/add-edit/' . $id);
						}

					} else {
						$result = $this->Modelprofile_model->saveData($saveData);
					}

					if ($result > 0) {
						$this->session->set_flashdata('success', 'Data has been save successfully');
					} else {
						$this->session->set_flashdata('error', 'Failed.');
					}
					redirect('administrator/modelprofile/add-edit/' . $id);
				}
			}
		} else {
			$this->global['pageTitle'] = 'Model Profile :: Add & Edit';
			$this->global['pageHeading'] = 'Model Profile';
			if (!empty($id)) {
				$this->global['pageSection'] = 'Update :: Model Profile Details';
				$modelList = $this->Modelprofile_model->getModelProfileList($id);
				$subCategoryId = !empty($modelList['subCategoryId']) ? $modelList['subCategoryId'] : 0;
				$subCategoryList = $this->Subcategory_model->getSubCategoryList($subCategoryId);
				$categoryId = !empty($subCategoryList['categoryId']) ? $subCategoryList['categoryId'] : 0;
				$subCategoryLists = $this->Subcategory_model->subCategoryDetailsByCategoryId($categoryId);
				$data['subCategoryList'] = !empty($subCategoryLists) ? $subCategoryLists : 0;
				$data['getData'] = !empty($modelList) ? $modelList : 0;
				$data['getData']['categoryId'] = $categoryId;
				//echo "<pre/>";
				//print_r($data);exit;

			} else {
				$this->global['pageSection'] = 'Save :: Model Profile Details';
			}
			$data['categoryData'] = $this->Category_model->categoryDetails();
			$data['roles'] = $this->User_model->getUserRoles();
			$data['id'] = !empty($id) ? $id : 0;
			$this->loadViews("administrator/modelprofile/addEdit", $this->global, $data, NULL);
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
			$getData = $this->Modelprofile_model->getModelProfileList($id);
			if (!empty($getData)) {
				if (!empty($saveData['image'])) {
					@unlink('./uploads/modelprofile/' . $getData['image']);
					@unlink('./uploads/modelprofile/thumbnail/' . $getData['image']);
					@chmod('./uploads/modelprofile/' . $getData['image'], 0777);
					@chmod('./uploads/modelprofile/thumbnail/' . $getData['image'], 0777);

				}
				$result = $this->Modelprofile_model->deleteData($id);
				$this->session->set_flashdata('success', 'Data has been deleted successfully');
				redirect('administrator/modelprofile');
			} else {
				$this->session->set_flashdata('error', 'Invalid operation!');
				redirect('administrator/modelprofile');
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
			$getData = $this->Modelprofile_model->getModelProfileList($id);
			if (!empty($getData)) {
				$data = array(
					'status' => $active,
				);
				$result = $this->Modelprofile_model->updateData($data, $id);
				$this->session->set_flashdata('success', 'Status has been update');
				redirect('administrator/modelprofile');
			} else {
				$this->session->set_flashdata('error', 'Invalid operation!');
				redirect('administrator/modelprofile');
			}
		}
	}

}

?>