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
class Subcategory extends BaseController {
	/**
	 * This is default constructor of the class
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('Category_model');
		$this->load->model('Subcategory_model');
		$this->isLoggedIn();
	}

	/**
	 * This function used to load the first screen of the user
	 */
	public function index() {
		$this->global['pageTitle'] = 'Sub Category:: Listing';
		$searchText = $this->input->post('searchText', '');
		$data['searchText'] = $searchText;
		$this->load->library('pagination');

		$count = $this->Subcategory_model->subCategoryListCount($searchText);
		$returns = $this->paginationCompress("administrator/subcategory/", $count, 20);
		$segment = ($this->uri->segment(3)) ? $this->uri->segment(3)*10 : 0;
		$data['records'] = $this->Subcategory_model->subCategoryList($searchText, $returns["page"],$segment);
		$this->loadViews("administrator/subcategory/index", $this->global, $data, NULL);
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
				$this->form_validation->set_rules('category', 'Category', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors());
					redirect('administrator/subcategory/add-edit/' . $id);
				} else {
					$name = $this->input->post('name');
					$url = url_title($name, '-', TRUE);
					$category = $this->input->post('category');

					/*Image upload section*/
					if ($_FILES && $_FILES['file']['name'] !== "") {
						$rootPath = './uploads/subcategory/';
						$newFolder = './uploads/subcategory/thumbnail/';
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
							redirect('administrator/subcategory/add-edit/' . $id);
						} else {
							$uploadedImage = $this->upload->data();
							$this->resizeImage($uploadedImage['file_name'], $uploadedImage['full_path'], $newFolder, 375, 348);
						}
					}
					$saveData = array('name' => $name,
						'categoryId' => $category,
						'link' => $url,
						'status' => 'Active',
						'createdBy' => $this->vendorId,
						'createdAt' => date('Y-m-d H:i:s'),
					);
					if (!empty($uploadedImage['file_name'])) {
						$saveData['image'] = $uploadedImage['file_name'];
					}
					if ($id) {
						$getData = $this->Subcategory_model->getSubCategoryList($id);
						if (!empty($getData)) {
							if (!empty($saveData['image'])) {
								@unlink('./uploads/subcategory/' . $getData['image']);
								@unlink('./uploads/subcategory/thumbnail/' . $getData['image']);
								@chmod('./uploads/subcategory/' . $getData['image'], 0777);
								@chmod('./uploads/subcategory/thumbnail/' . $getData['image'], 0777);
							}
							$result = $this->Subcategory_model->updateData($saveData, $id);
						} else {
							$this->session->set_flashdata('error', 'Invalid operation!');
							redirect('administrator/subcategory/add-edit/' . $id);
						}

					} else {
						$result = $this->Subcategory_model->saveData($saveData);
					}

					if ($result > 0) {
						$this->session->set_flashdata('success', 'Data has been save successfully');
					} else {
						$this->session->set_flashdata('error', 'Failed.');
					}
					redirect('administrator/subcategory/add-edit/' . $id);
				}
			}
		} else {
			$this->global['pageTitle'] = 'Sub Category :: Add & Edit';
			$this->global['pageHeading'] = 'Sub Category';
			if (!empty($id)) {
				$this->global['pageSection'] = 'Update :: Sub Category Details';
				$data['getData'] = $this->Subcategory_model->getSubCategoryList($id);

			} else {
				$this->global['pageSection'] = 'Save :: Sub Category Details';
			}
			$data['categoryData'] = $this->Category_model->categoryDetails();
			$data['roles'] = $this->User_model->getUserRoles();
			$data['id'] = !empty($id) ? $id : 0;
			$this->loadViews("administrator/subcategory/addEdit", $this->global, $data, NULL);
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
			$getData = $this->Subcategory_model->getSubCategoryList($id);
			if (!empty($getData)) {
				if (!empty($saveData['image'])) {
					@unlink('./uploads/subcategory/' . $getData['image']);
					@unlink('./uploads/subcategory/thumbnail/' . $getData['image']);
					@chmod('./uploads/subcategory/' . $getData['image'], 0777);
					@chmod('./uploads/subcategory/thumbnail/' . $getData['image'], 0777);

				}
				$result = $this->Subcategory_model->deleteData($id);
				$this->session->set_flashdata('success', 'Data has been deleted successfully');
				redirect('administrator/subcategory');
			} else {
				$this->session->set_flashdata('error', 'Invalid operation!');
				redirect('administrator/subcategory');
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
			$getData = $this->Subcategory_model->getSubCategoryList($id);
			if (!empty($getData)) {
				$data = array(
					'status' => $active,
				);
				$result = $this->Subcategory_model->updateData($data, $id);
				$this->session->set_flashdata('success', 'Status has been update');
				redirect('administrator/subcategory');
			} else {
				$this->session->set_flashdata('error', 'Invalid operation!');
				redirect('administrator/subcategory');
			}
		}
	}

	/**
	 * This function is used to delete the user using userId
	 * @return boolean $result : TRUE / FALSE
	 */
	function getSubCategory() {
		$categoryId = $this->input->post('categoryId');
		$getData = $this->Subcategory_model->subCategoryDetailsByCategoryId($categoryId);
		$data['subCategoryList'] = $getData;
		$this->load->view('administrator/subcategory/ajaxSubcategory', $data);

	}

}

?>