<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
 */

$route['default_controller'] = "home";
$route['404_override'] = 'error';

$route['index'] = 'home/index';
$route['about-us'] = 'home/about';
$route['faqs'] = 'home/faq';
$route['value-added-services'] = 'home/valueAddedServices';
$route['why-study-a-foreign-language'] = 'home/whyStudyForeignLanguage';
$route['why-us'] = 'home/whyUs';
$route['careers'] = 'home/career';
$route['Careers'] = 'home/career';
$route['apply-job'] = 'frontend/Career/apply_job';
$route['apply-job-deatils/(:num)'] = 'frontend/Career/apply_job_details/$1';


$route['reviews'] = 'home/reviews';
$route['contact'] = 'home/contact';
$route['practical-training-classes'] = 'home/practicalTrainingClasses';

$route['our-teaching-methodology'] = 'home/ourTeachingMethodology';
$route['courses'] = 'home/courses';
$route['career'] = 'home/career';
$route['course/(:any)'] = 'home/courseDetails/$1';
$route['projects'] = 'home/projects';
$route['our-mission'] = 'home/ourMission';
$route['post-query'] = 'home/postQuery';
$route['post-newsletter'] = 'home/postNewsLetter';
$route['post-booking'] = 'home/postBooking';
$route['blogs'] = 'home/blogs';
$route['blog/(:any)'] = 'home/blogDetails/$1';
$route['products/(:any)/(:any)'] = 'home/products/$1/$2';
$route['product/(:any)/(:any)/(:any)'] = 'home/productDetails/$1/$2/$3';
$route['projects'] = 'home/projects';
$route['project/(:any)'] = 'home/projectDetails/$1';
$route['industries'] = 'home/industry';
$route['industry/(:any)'] = 'home/industryDetails/$1';
$route['news-and-events'] = 'home/news';
$route['news-details/(:any)'] = 'home/newsDetails/$1';
$route['enrol-now/(:any)'] = 'home/applyonline/$1';
$route['enquire-now/(:any)'] = 'home/enquireonline/$1';
$route['colleges/(:any)/(:any)'] = 'home/colleges/$1/$2';
$route['collage-list'] = 'home/collegesList';

/*********** USER DEFINED ROUTES *******************/
$route['administrator/login'] = 'login/index';
$route['administrator/loginMe'] = 'login/loginMe';
$route['administrator/dashboard'] = 'user';
$route['administrator/logout'] = 'user/logout';

$route['administrator/blogs'] = 'administrator/blogs/index';
$route['administrator/blogs/(:num)'] = "administrator/blogs/index/$1";
$route['administrator/blogs/add-edit/(:num)'] = "administrator/blogs/addEdit/$1";
$route['administrator/blogs/delete-data/(:num)'] = "administrator/blogs/deleteData/$1";
$route['administrator/blogs/status-change/(:num)/(:any)'] = "administrator/blogs/changeStatus/$1/$2";
$route['administrator/blogs/saveUpdate'] = "administrator/blogs/saveUpdate";

$route['administrator/news'] = 'administrator/news/index';
$route['administrator/news/(:num)'] = "administrator/news/index/$1";
$route['administrator/news/add-edit/(:num)'] = "administrator/news/addEdit/$1";
$route['administrator/news/delete-data/(:num)'] = "administrator/news/deleteData/$1";
$route['administrator/news/status-change/(:num)/(:any)'] = "administrator/news/changeStatus/$1/$2";
$route['administrator/news/saveUpdate'] = "administrator/news/saveUpdate";

$route['administrator/review'] = 'administrator/review/index';
$route['administrator/review/(:num)'] = "administrator/review/index/$1";
$route['administrator/review/add-edit/(:num)'] = "administrator/review/addEdit/$1";
$route['administrator/review/delete-data/(:num)'] = "administrator/review/deleteData/$1";
$route['administrator/review/status-change/(:num)/(:any)'] = "administrator/review/changeStatus/$1/$2";
$route['administrator/review/saveUpdate'] = "administrator/review/saveUpdate";

$route['administrator/notifications'] = 'administrator/notifications/index';
$route['administrator/notifications/(:num)'] = "administrator/notifications/index/$1";
$route['administrator/notifications/add-edit/(:num)'] = "administrator/notifications/addEdit/$1";
$route['administrator/notifications/delete-data/(:num)'] = "administrator/notifications/deleteData/$1";
$route['administrator/notifications/status-change/(:num)/(:any)'] = "administrator/notifications/changeStatus/$1/$2";
$route['administrator/notifications/saveUpdate'] = "administrator/notifications/saveUpdate";

$route['administrator/services'] = 'administrator/services/index';
$route['administrator/services/(:num)'] = "administrator/services/index/$1";
$route['administrator/services/add-edit/(:num)'] = "administrator/services/addEdit/$1";
$route['administrator/services/delete-data/(:num)'] = "administrator/services/deleteData/$1";
$route['administrator/services/status-change/(:num)/(:any)'] = "administrator/services/changeStatus/$1/$2";
$route['administrator/services/saveUpdate'] = "administrator/services/saveUpdate";

$route['administrator/products'] = 'administrator/products/index';
$route['administrator/products/(:num)'] = "administrator/products/index/$1";
$route['administrator/products/add-edit/(:num)'] = "administrator/products/addEdit/$1";
$route['administrator/products/delete-data/(:num)'] = "administrator/products/deleteData/$1";
$route['administrator/products/status-change/(:num)/(:any)'] = "administrator/products/changeStatus/$1/$2";
$route['administrator/products/saveUpdate'] = "administrator/products/saveUpdate";
$route['administrator/products/gallery/(:num)'] = "administrator/products/gallery/$1";

$route['administrator/projects'] = 'administrator/projects/index';
$route['administrator/projects/(:num)'] = "administrator/projects/index/$1";
$route['administrator/projects/add-edit/(:num)'] = "administrator/projects/addEdit/$1";
$route['administrator/projects/delete-data/(:num)'] = "administrator/projects/deleteData/$1";
$route['administrator/projects/status-change/(:num)/(:any)'] = "administrator/projects/changeStatus/$1/$2";
$route['administrator/projects/saveUpdate'] = "administrator/projects/saveUpdate";

$route['administrator/room'] = 'administrator/room/index';
$route['administrator/room/(:num)'] = "administrator/room/index/$1";
$route['administrator/room/add-edit/(:num)'] = "administrator/room/addEdit/$1";
$route['administrator/room/delete-data/(:num)'] = "administrator/room/deleteData/$1";
$route['administrator/room/status-change/(:num)/(:any)'] = "administrator/room/changeStatus/$1/$2";
$route['administrator/room/saveUpdate'] = "administrator/room/saveUpdate";

$route['administrator/gallery'] = 'administrator/gallery/index';
$route['administrator/gallery/(:num)'] = "administrator/gallery/index/$1";
$route['administrator/gallery/add-edit/(:num)'] = "administrator/gallery/addEdit/$1";
$route['administrator/gallery/delete-data/(:num)'] = "administrator/gallery/deleteData/$1";
$route['administrator/gallery/status-change/(:num)/(:any)'] = "administrator/gallery/changeStatus/$1/$2";
$route['administrator/gallery/saveUpdate'] = "administrator/gallery/saveUpdate";

$route['administrator/content'] = 'administrator/content/index';
$route['administrator/content/(:num)'] = "administrator/content/index/$1";
$route['administrator/content/add-edit/(:num)'] = "administrator/content/addEdit/$1";
$route['administrator/content/delete-data/(:num)'] = "administrator/content/deleteData/$1";
$route['administrator/content/status-change/(:num)/(:any)'] = "administrator/content/changeStatus/$1/$2";
$route['administrator/content/saveUpdate'] = "administrator/content/saveUpdate";

/*Banner*/
$route['administrator/banner'] = 'administrator/banner/index';
$route['administrator/banner/(:num)'] = "administrator/banner/index/$1";
$route['administrator/banner/add-edit/(:num)'] = "administrator/banner/addEdit/$1";
$route['administrator/banner/delete-data/(:num)'] = "administrator/banner/deleteData/$1";
$route['administrator/banner/status-change/(:num)/(:any)'] = "administrator/banner/changeStatus/$1/$2";
$route['administrator/banner/saveUpdate'] = "administrator/banner/saveUpdate";

/*Querylist*/
$route['administrator/query-list'] = 'administrator/querylist/index';
$route['administrator/query-list/(:num)'] = "administrator/querylist/index/$1";
$route['administrator/query-list/delete-data/(:num)'] = "administrator/querylist/deleteData/$1";
$route['administrator/query-list/status-change/(:num)/(:any)'] = "administrator/querylist/changeStatus/$1/$2";

/*Applyonline*/
$route['administrator/applyonline'] = 'administrator/Applyonline/index';
$route['administrator/applyonline/(:num)'] = "administrator/Applyonline/index/$1";
$route['administrator/applyonline/delete-data/(:num)'] = "administrator/Applyonline/deleteData/$1";
$route['administrator/applyonline/status-change/(:num)/(:any)'] = "administrator/Applyonline/changeStatus/$1/$2";

/*Client*/
$route['administrator/client'] = 'administrator/client/index';
$route['administrator/client/(:num)'] = "administrator/client/index/$1";
$route['administrator/client/add-edit/(:num)'] = "administrator/client/addEdit/$1";
$route['administrator/client/delete-data/(:num)'] = "administrator/client/deleteData/$1";
$route['administrator/client/status-change/(:num)/(:any)'] = "administrator/client/changeStatus/$1/$2";
$route['administrator/client/saveUpdate'] = "administrator/client/saveUpdate";
/*Professional*/
$route['administrator/professional'] = 'administrator/professional/index';
$route['administrator/professional/(:num)'] = "administrator/professional/index/$1";
$route['administrator/professional/add-edit/(:num)'] = "administrator/professional/addEdit/$1";
$route['administrator/professional/delete-data/(:num)'] = "administrator/professional/deleteData/$1";
$route['administrator/professional/status-change/(:num)/(:any)'] = "administrator/professional/changeStatus/$1/$2";
$route['administrator/professional/saveUpdate'] = "administrator/professional/saveUpdate";

/*Category*/
$route['administrator/category'] = 'administrator/category/index';
$route['administrator/category/(:num)'] = "administrator/category/index/$1";
$route['administrator/category/add-edit/(:num)'] = "administrator/category/addEdit/$1";
$route['administrator/category/delete-data/(:num)'] = "administrator/category/deleteData/$1";
$route['administrator/category/status-change/(:num)/(:any)'] = "administrator/category/changeStatus/$1/$2";
$route['administrator/category/saveUpdate'] = "administrator/category/saveUpdate";

/*Sub Category*/
$route['administrator/subcategory'] = 'administrator/subcategory/index';
$route['administrator/subcategory/(:num)'] = "administrator/subcategory/index/$1";
$route['administrator/subcategory/add-edit/(:num)'] = "administrator/subcategory/addEdit/$1";
$route['administrator/subcategory/delete-data/(:num)'] = "administrator/subcategory/deleteData/$1";
$route['administrator/subcategory/status-change/(:num)/(:any)'] = "administrator/subcategory/changeStatus/$1/$2";
$route['administrator/subcategory/saveUpdate'] = "administrator/subcategory/saveUpdate";
$route['administrator/subcategory/list'] = 'administrator/subcategory/getSubCategory';

/*Model Profile*/
$route['administrator/modelprofile'] = 'administrator/modelprofile/index';
$route['administrator/modelprofile/(:num)'] = "administrator/modelprofile/index/$1";
$route['administrator/modelprofile/add-edit/(:num)'] = "administrator/modelprofile/addEdit/$1";
$route['administrator/modelprofile/delete-data/(:num)'] = "administrator/modelprofile/deleteData/$1";
$route['administrator/modelprofile/status-change/(:num)/(:any)'] = "administrator/modelprofile/changeStatus/$1/$2";
$route['administrator/modelprofile/saveUpdate'] = "administrator/modelprofile/saveUpdate";

/*Testimonial*/
$route['administrator/testimonial'] = 'administrator/testimonial/index';
$route['administrator/testimonial/(:num)'] = "administrator/testimonial/index/$1";
$route['administrator/testimonial/add-edit/(:num)'] = "administrator/testimonial/addEdit/$1";
$route['administrator/testimonial/delete-data/(:num)'] = "administrator/testimonial/deleteData/$1";
$route['administrator/testimonial/status-change/(:num)/(:any)'] = "administrator/testimonial/changeStatus/$1/$2";
$route['administrator/testimonial/saveUpdate'] = "administrator/testimonial/saveUpdate";

/*Emailtemplate*/
$route['administrator/emailtemplate'] = 'administrator/emailtemplate/index';
$route['administrator/emailtemplate/(:num)'] = "administrator/emailtemplate/index/$1";
$route['administrator/emailtemplate/add-edit/(:num)'] = "administrator/emailtemplate/addEdit/$1";
$route['administrator/emailtemplate/delete-data/(:num)'] = "administrator/emailtemplate/deleteData/$1";
$route['administrator/emailtemplate/status-change/(:num)/(:any)'] = "administrator/emailtemplate/changeStatus/$1/$2";
$route['administrator/emailtemplate/saveUpdate'] = "administrator/emailtemplate/saveUpdate";

/*Generalsetting*/
$route['administrator/generalsetting'] = 'administrator/generalsetting/addEdit';

$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";

$route['addNewUser'] = "user/addNewUser";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['administrator/loadChangePass'] = "user/loadChangePass";
$route['administrator/changePassword'] = "user/changePassword";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";

$route['administrator/forgotPassword'] = "login/forgotPassword";
$route['administrator/resetPasswordUser'] = "login/resetPasswordUser";
$route['administrator/resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

/* End of file routes.php */
/* Location: ./application/config/routes.php */