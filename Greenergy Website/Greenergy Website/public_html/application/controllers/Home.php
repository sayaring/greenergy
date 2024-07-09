<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Home extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->model('Banner_model');  
        $this->load->model('Product_model');
        $this->load->model('Client_model');
        $this->load->model('Category_model');
        $this->load->model('Subcategory_model');
        $this->load->model('Gallery_model');
        $this->load->model('Review_model');
        $this->load->model('Project_model');
        $this->load->model('Review_model');
        $this->load->model('Blog_model');
        $this->load->model('Querylist_model');
        $this->load->model('Notifications_model');
        $this->common->setGlobalSettingsData();
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
    
      $this->global['pageTitle'] = NAME;
      $this->global['metaTitle'] =  METATITLE;
      $this->global['metaDescription'] = METADESCRIPTION;
      $this->global['metaKeywords'] = METAKEYWORDS;

      $bannerDetails = $this->Banner_model->bannerDetails();
      $blogDetails = $this->Blog_model->getBlogDetails(9);

      $homeProductList = $this->Product_model->homeProductsList();
      $data['homeProductList'] = !empty($homeProductList) ?  $homeProductList : '';

      $clientLists = $this->Client_model->getHomeClientList('Professional');
      $data['clientLists'] = !empty($clientLists) ?  $clientLists : '';

      $clientLogoLists = $this->Client_model->getHomeClientList('Client');
      $data['clientLogoLists'] = !empty($clientLogoLists) ?  $clientLogoLists : '';

      $notificationLists = $this->Blog_model->getBlogDetails(15);
      $data['blogDetails'] = !empty($blogDetails) ?  $blogDetails : '';

      $getReviewLists = $this->Review_model->getBlogRecent(15);
      $data['getReviewLists'] = !empty($getReviewLists) ?  $getReviewLists : '';

      $projectWithGallaryDetails =  $this->Project_model->projectWithGallaryDetails("Project",6);       
      $data['projectWithGallaryDetails'] = !empty($projectWithGallaryDetails) ?  $projectWithGallaryDetails : '';

      $data['bannerDetails'] = !empty($bannerDetails) ?  $bannerDetails : '';
      $data['notificationLists'] = !empty($notificationLists) ?  $notificationLists : '';
      $this->webLoadViews("frontend/index", $this->global,$data , NULL);
    }
    public function courses()
    { 
      $contentIdListFooter = [6];
      $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
      
      $this->global['pageTitle'] = NAME.': '.'Courses';
      $this->global['metaTitle'] =  METATITLE.': '.'Courses';
      $this->global['metaDescription'] = METADESCRIPTION.': '.'Courses';
      $this->global['metaKeywords'] = METAKEYWORDS.': '.'Courses';
      
      $courseList = $this->Course_model->courseDetails();      
      $data['courseList'] = !empty($courseList) ?  $courseList : '';
      $this->webLoadViews("frontend/courses", $this->global, $data , NULL);
    }

    public function courseDetails($url)
    {
      
      if(!empty($url)){
       
        $link = $this->security->xss_clean($url);
        $serviceDetails = $this->Course_model->getCoursesDetailsByUrl($link);

        if(!empty($serviceDetails)) { 
          //echo $serviceDetails['id'];exit;
          $galleryDetails = $this->Gallery_model->getGalleryListByCourse($serviceDetails['id']);
          $data['serviceDetails'] = !empty($serviceDetails) ?  $serviceDetails : '';
         $data['galleryDetails']= !empty($galleryDetails) ?  $galleryDetails : '';
          $this->global['pageTitle'] = !empty($serviceDetails['metaTitle']) ? NAME. ": ".$serviceDetails['metaTitle'] : '';
       $this->global['metaTitle'] =  !empty($serviceDetails['metaTitle']) ?  $serviceDetails['metaTitle'] : '';
      $this->global['metaDescription'] = !empty($serviceDetails['metaDescription']) ?  $serviceDetails['metaDescription'] : '';
      $this->global['metaKeywords'] = !empty($serviceDetails['metaKeywords']) ?  $serviceDetails['metaKeywords'] : '';
          $this->webLoadViews("frontend/coursedetails", $this->global, $data , NULL);
        } else {
          redirect('/');
        }        
      } else {
        redirect('/');
      }
    }
	public function reviews()
    { 
      $contentIdListFooter = [30];
      $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
      
      $this->global['pageTitle'] = !empty($contectData[30]->title) ? NAME.": ".$contectData[30]->title:'';
      $this->global['metaTitle'] =   !empty($contectData[30]->metaTitle) ? $contectData[30]->metaTitle:'';
      $this->global['metaDescription'] =  !empty($contectData[30]->metaKeywords) ? $contectData[30]->metaKeywords:'';
      $this->global['metaKeywords'] =  !empty($contectData[30]->metaDescription) ? $contectData[30]->metaDescription:'';
      $data['contectData'] = !empty($contectData[30]) ? $contectData[30]:'';
	     $reviewLists = $this->Review_model->getBlogDetails();
      $data['reviewLists'] = !empty($reviewLists) ?  $reviewLists : '';
      $this->webLoadViews("frontend/reviews", $this->global, $data , NULL);
    }
    
    public function career()
    { 
        
    $data=array();    
      $contentIdListFooter = [11];
      $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
      
      $this->global['pageTitle'] = NAME.": Career";
      $this->global['metaTitle'] =   "Career: ".!empty($contectData[11]->metaTitle) ? $contectData[11]->metaTitle:'';
      $this->global['metaDescription'] =  !empty($contectData[11]->metaKeywords) ? $contectData[11]->metaKeywords:'';
      $this->global['metaKeywords'] =  !empty($contectData[11]->metaDescription) ? $contectData[11]->metaDescription:'';
      //$data['contectData'] = !empty($contectData[11]) ? $contectData[11]:'';
      
      $this->webLoadViews("frontend/career", $this->global, $data , NULL);
    }

    public function about()
    { 
      $contentIdListFooter = [6];
      $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
      
      $this->global['pageTitle'] = NAME.": About Us";
      $this->global['metaTitle'] =   "About Us: ".!empty($contectData[6]->metaTitle) ? $contectData[6]->metaTitle:'';
      $this->global['metaDescription'] =  "About Us: ".!empty($contectData[6]->metaKeywords) ? $contectData[6]->metaKeywords:'';
      $this->global['metaKeywords'] =  "About Us: ".!empty($contectData[6]->metaDescription) ? $contectData[6]->metaDescription:'';
      $data['contectData'] = !empty($contectData[6]) ? $contectData[6]:'';
      
      $this->webLoadViews("frontend/about", $this->global, $data , NULL);
    }
    public function faq()
    { 
      $contentIdListFooter = [17];
      $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
      
      $this->global['pageTitle'] = NAME.': FAQ';
      $this->global['metaTitle'] =   !empty($contectData[17]->metaTitle) ? $contectData[17]->metaTitle:'';
      $this->global['metaDescription'] =  !empty($contectData[17]->metaKeywords) ? $contectData[17]->metaKeywords:'';
      $this->global['metaKeywords'] =  !empty($contectData[17]->metaDescription) ? $contectData[17]->metaDescription:'';
      $data['contectData'] = !empty($contectData[17]) ? $contectData[17]:'';
      
      $this->webLoadViews("frontend/faq", $this->global, $data , NULL);
    }
    public function whyUs()
    { 
      $contentIdListFooter = [23];
      $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
      
      $this->global['pageTitle'] = !empty($contectData[23]->metaTitle) ?  NAME.": ".$contectData[23]->metaTitle:'';
      $this->global['metaTitle'] =   !empty($contectData[23]->metaTitle) ? $contectData[23]->metaTitle:'';
      $this->global['metaDescription'] =  !empty($contectData[23]->metaKeywords) ? $contectData[23]->metaKeywords:'';
      $this->global['metaKeywords'] =  !empty($contectData[23]->metaDescription) ? $contectData[23]->metaDescription:'';
      $data['contectData'] = !empty($contectData[23]) ? $contectData[23]:'';
      
      $this->webLoadViews("frontend/why-us", $this->global, $data , NULL);
    }

    public function valueAddedServices()
    { 
      $contentIdListFooter = [21];
      $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
      
      $this->global['pageTitle'] = !empty($contectData[21]->metaTitle) ?  NAME.": ".$contectData[21]->metaTitle:'';
      $this->global['metaTitle'] =   !empty($contectData[21]->metaTitle) ? $contectData[21]->metaTitle:'';
      $this->global['metaDescription'] =  !empty($contectData[21]->metaKeywords) ? $contectData[21]->metaKeywords:'';
      $this->global['metaKeywords'] =  !empty($contectData[21]->metaDescription) ? $contectData[21]->metaDescription:'';
      $data['contectData'] = !empty($contectData[21]) ? $contectData[21]:'';
      
      $this->webLoadViews("frontend/value-added-services", $this->global, $data , NULL);
    }
   
   public function colleges($categoryUrl,$subCategoryUrl)
    {

      if(!empty($categoryUrl) && !empty($subCategoryUrl)){

        $categoryData = $this->Category_model->categoryDetailsByLink($categoryUrl);
        if(!empty($categoryData)){
          $data['categoryData'] =  $categoryData;          
          $data['subLink'] =  $subCategoryUrl;
          $categoryId = !empty($categoryData['id']) ?  $categoryData['id'] : '';
          $this->global['pageTitle'] = !empty($categoryData['metaTitle']) ?  "Colleges: ".$categoryData['metaTitle'] : '';
          $this->global['metaTitle'] =  !empty($categoryData['metaTitle']) ?  $categoryData['metaTitle'] : '';
          $this->global['metaDescription'] = !empty($categoryData['metaDescription']) ?  $categoryData['metaDescription'] : '';
          $this->global['metaKeywords'] = !empty($categoryData['metaKeywords']) ?  $categoryData['metaKeywords'] : '';
          $getData = $this->Subcategory_model->subCategoryWithCategoryList($categoryId);
          $data['subCategoryList'] = $getData;
          $subCategorySelected = $this->Subcategory_model->subCategoryDetailsByLink($subCategoryUrl);
          $selectedSubCatId = !empty($subCategorySelected->id) ? $subCategorySelected->id: '';
          $array = [$selectedSubCatId];
          $collegeDetails = $this->College_model->collegeListByArrayId($array);

          $data['collegeDetails'] = $collegeDetails;
          $this->webLoadViews("frontend/colleges", $this->global, $data , NULL);
        } else {
          redirect('/');
        }        
      } else {
        redirect('/');
      }      
    }

    public function collegesList()
    {
      $subcategorylist= $this->input->post('subcategorylist');
      if(empty($subcategorylist)) {
        $data['massage'] ='Invalid Operation!';
        }
        $subcategoryLinks = array();
        foreach ($subcategorylist as $subcategory) {
          $subcategoryLinks[]= xss_clean(trim($subcategory));
        }
       
        $subCategoryDetails = $this->Subcategory_model->subCategoryDetailsByArrayLink($subcategoryLinks);
        $subCategoryId = array();
        if(!empty($subCategoryDetails)){
            foreach ($subCategoryDetails as $subCategory) {
              $subCategoryId[] =  !empty($subCategory->id) ? $subCategory->id :0;
            }
        }
        $collegeDetails = $this->College_model->collageDetails($subCategoryId);
        
        $data['collegeDetails'] = $collegeDetails;
        $this->load->view('frontend/colleges-ajax', $data);
              
    }

   public function news() {      
      $newsLists = $this->News_model->getBlogDetails();
      $data['newsLists'] = !empty($newsLists) ?  $newsLists : '';
      

      $this->global['pageTitle'] = NAME.' | News';
      $this->global['metaTitle'] =  METATITLE;
      $this->global['metaDescription'] = METADESCRIPTION;
      $this->global['metaKeywords'] = METAKEYWORDS;
      $this->webLoadViews("frontend/news", $this->global, $data , NULL);                
        
    }
    public function newsDetails($url)
    {
      if(!empty($url)){
       
        $link = $this->security->xss_clean($url);
        $serviceDetails = $this->News_model->getBlogDetailsByUrl($link);
        if(!empty($serviceDetails)) {
          $this->global['pageTitle'] = !empty($serviceDetails['title']) ? $serviceDetails['title'] : '';     
          $data['serviceDetails'] = !empty($serviceDetails) ?  $serviceDetails : '';
         
          $this->global['pageTitle'] = !empty($serviceDetails['metaTitle']) ?  $serviceDetails['metaTitle'] : '';
       $this->global['metaTitle'] =  !empty($serviceDetails['metaTitle']) ?  $serviceDetails['metaTitle'] : '';
      $this->global['metaDescription'] = !empty($serviceDetails['metaDescription']) ?  $serviceDetails['metaDescription'] : '';
      $this->global['metaKeywords'] = !empty($serviceDetails['metaKeywords']) ?  $serviceDetails['metaKeywords'] : '';
          $this->webLoadViews("frontend/newsdetails", $this->global, $data , NULL);
        } else {
          redirect('/');
        }        
      } else {
        redirect('/');
      }
    }

    public function products($category,$subCategory) {
      if(!empty($category) && !empty($subCategory)){   
        //echo $category.'-'.$subCategory;exit;
          $productDetails = $this->Product_model->productDetailsBySubCategoryLink($category,$subCategory);
          //if(!empty($productDetails) && count($productDetails)>0) {
            $data['productDetails'] = !empty($productDetails) ?  $productDetails : '';
            
            $this->global['pageTitle'] = NAME.' | Product';
            $this->global['metaTitle'] =  METATITLE;
            $this->global['metaDescription'] = METADESCRIPTION;
            $this->global['metaKeywords'] = METAKEYWORDS;
            $this->webLoadViews("frontend/products", $this->global, $data , NULL);                
          //   } else {
          //   redirect('/');
          // }
        } else {
          redirect('/');
        }
    }
    public function productDetails($cat,$subCat,$url)
    {
      if(!empty($url)){       
        $link = $this->security->xss_clean($url);
        $serviceDetails = $this->Product_model->productDetailsByLink($link);
        if(!empty($serviceDetails)) {
          $this->global['pageTitle'] = !empty($serviceDetails['title']) ? $serviceDetails['title'] : '';     
          $data['serviceDetails'] = !empty($serviceDetails) ?  $serviceDetails : '';
          $subCategoryLink = $this->Subcategory_model->subCategoryWithCategoryLislByLink($cat);
          $data['subCategoryLink'] = !empty($subCategoryLink) ?  $subCategoryLink : '';
          $this->global['pageTitle'] = !empty($serviceDetails['metaTitle']) ?  $serviceDetails['metaTitle'] : '';
           $this->global['metaTitle'] =  !empty($serviceDetails['metaTitle']) ?  $serviceDetails['metaTitle'] : '';
          $this->global['metaDescription'] = !empty($serviceDetails['metaDescription']) ?  $serviceDetails['metaDescription'] : '';
          $this->global['metaKeywords'] = !empty($serviceDetails['metaKeywords']) ?  $serviceDetails['metaKeywords'] : '';
       
          $this->webLoadViews("frontend/productDetails", $this->global, $data , NULL);
        } else {
          redirect('/');
        }        
      } else {
        redirect('/');
      }
    }
     public function projects() {
         
      $projectDetails = $this->Project_model->getprojectLists('Project');
      $data['projectDetails'] = !empty($projectDetails) ?  $projectDetails : '';
      
      $this->global['pageTitle'] = NAME.' | Project';
      $this->global['metaTitle'] =  METATITLE;
      $this->global['metaDescription'] = METADESCRIPTION;
      $this->global['metaKeywords'] = METAKEYWORDS;
      $this->webLoadViews("frontend/projects", $this->global, $data , NULL);                
        
    }
     public function projectDetails($url)
    {
      if(!empty($url)){
       
        $link = $this->security->xss_clean($url);
        $serviceDetails = $this->Project_model->getprojectsDetailsByUrl("Project",$link);
        if(!empty($serviceDetails)) {
          $this->global['pageTitle'] = !empty($serviceDetails['title']) ? $serviceDetails['title'] : '';     
          $data['serviceDetails'] = !empty($serviceDetails) ?  $serviceDetails : '';
          $serviceDetailsMore = $this->Project_model->projectDetailsMore("Project",$link);
          $data['serviceDetailsMore'] = !empty($serviceDetailsMore) ?  $serviceDetailsMore : '';
          $this->global['pageTitle'] = !empty($serviceDetails['metaTitle']) ?  $serviceDetails['metaTitle'] : '';
           $this->global['metaTitle'] =  !empty($serviceDetails['metaTitle']) ?  $serviceDetails['metaTitle'] : '';
          $this->global['metaDescription'] = !empty($serviceDetails['metaDescription']) ?  $serviceDetails['metaDescription'] : '';
          $this->global['metaKeywords'] = !empty($serviceDetails['metaKeywords']) ?  $serviceDetails['metaKeywords'] : '';
          $this->webLoadViews("frontend/projectdetails", $this->global, $data , NULL);
        } else {
          redirect('/');
        }        
      } else {
        redirect('/');
      }
    }
    
    public function industry() {
         
      $projectDetails = $this->Project_model->getprojectLists('Industry');
      $data['projectDetails'] = !empty($projectDetails) ?  $projectDetails : '';
      
      $this->global['pageTitle'] = NAME.' | Industry';
      $this->global['metaTitle'] =  METATITLE;
      $this->global['metaDescription'] = METADESCRIPTION;
      $this->global['metaKeywords'] = METAKEYWORDS;
      $this->webLoadViews("frontend/industry", $this->global, $data , NULL);                
        
    }
     public function industryDetails($url)
    {
      if(!empty($url)){
       
        $link = $this->security->xss_clean($url);
        $serviceDetails = $this->Project_model->getprojectsDetailsByUrl("Industry",$link);
        if(!empty($serviceDetails)) {
          $this->global['pageTitle'] = !empty($serviceDetails['title']) ? $serviceDetails['title'] : '';     
          $data['serviceDetails'] = !empty($serviceDetails) ?  $serviceDetails : '';
          $serviceDetailsMore = $this->Project_model->projectDetailsMore("Industry",$link);
          $data['serviceDetailsMore'] = !empty($serviceDetailsMore) ?  $serviceDetailsMore : '';
          $this->global['pageTitle'] = !empty($serviceDetails['metaTitle']) ?  $serviceDetails['metaTitle'] : '';
           $this->global['metaTitle'] =  !empty($serviceDetails['metaTitle']) ?  $serviceDetails['metaTitle'] : '';
          $this->global['metaDescription'] = !empty($serviceDetails['metaDescription']) ?  $serviceDetails['metaDescription'] : '';
          $this->global['metaKeywords'] = !empty($serviceDetails['metaKeywords']) ?  $serviceDetails['metaKeywords'] : '';
          $this->webLoadViews("frontend/industrydetails", $this->global, $data , NULL);
        } else {
          redirect('/');
        }        
      } else {
        redirect('/');
      }
    }
    public function blogs() {
         
      $blogDetails = $this->Blog_model->getBlogDetails();
      $data['blogDetails'] = !empty($blogDetails) ?  $blogDetails : '';
      $serviceDetailsMore = $this->Blog_model->getBlogRecent();
      $data['serviceDetailsMore'] = !empty($serviceDetailsMore) ?  $serviceDetailsMore : '';

      $this->global['pageTitle'] = NAME.' | Blogs';
      $this->global['metaTitle'] =  METATITLE;
      $this->global['metaDescription'] = METADESCRIPTION;
      $this->global['metaKeywords'] = METAKEYWORDS;
      $this->webLoadViews("frontend/blogs", $this->global, $data , NULL);                
        
    }

     public function blogDetails($url)
    {
      if(!empty($url)){
       
        $link = $this->security->xss_clean($url);
        $serviceDetails = $this->Blog_model->getBlogDetailsByUrl($link);
        if(!empty($serviceDetails)) {
          $this->global['pageTitle'] = !empty($serviceDetails['title']) ? $serviceDetails['title'] : '';     
          $data['serviceDetails'] = !empty($serviceDetails) ?  $serviceDetails : '';
          $serviceDetailsMore = $this->Blog_model->blogDetailsMore($link);

          $data['serviceDetailsMore'] = !empty($serviceDetailsMore) ?  $serviceDetailsMore : '';
          $this->global['pageTitle'] = !empty($serviceDetails['metaTitle']) ?  $serviceDetails['metaTitle'] : '';
       $this->global['metaTitle'] =  !empty($serviceDetails['metaTitle']) ?  $serviceDetails['metaTitle'] : '';
      $this->global['metaDescription'] = !empty($serviceDetails['metaDescription']) ?  $serviceDetails['metaDescription'] : '';
      $this->global['metaKeywords'] = !empty($serviceDetails['metaKeywords']) ?  $serviceDetails['metaKeywords'] : '';
          $this->webLoadViews("frontend/blogdetails", $this->global, $data , NULL);
        } else {
          redirect('/');
        }        
      } else {
        redirect('/');
      }
    }

    
   public function contact()
    {
     
      $contentIdList = [16];
      $contentDetails =$this->Content_model->contentWhereInDetails($contentIdList);
      $contectData=array();
      if(!empty($contentDetails)){
        foreach ($contentDetails as $content) {
          $id = !empty($content->id) ? $content->id : 0;
          $contectData[$id] = $content;
        }
      }
       $this->global['pageTitle'] = !empty($contectData[16]->metaTitle) ?  $contectData[16]->metaTitle : '';
       $this->global['metaTitle'] =  !empty($contectData[16]->metaTitle) ?  $contectData[16]->metaTitle : '';
      $this->global['metaDescription'] = !empty($contectData[16]->metaDescription) ?  $contectData[16]->metaDescription : '';
      $this->global['metaKeywords'] = !empty($contectData[16]->metaKeywords) ?  $contectData[16]->metaKeywords : '';
      
      $data['galleryDetails'] = '';
      $this->webLoadViews("frontend/contact", $this->global, $data , NULL);
    }

    public function postQuery()
    {
      $this->form_validation->set_rules('name','Name','trim|required|max_length[255]|xss_clean');
      $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[255]|xss_clean');
      $this->form_validation->set_rules('phone','Mobile number','trim|required|min_length[8]|max_length[12]|xss_clean');
      $this->form_validation->set_rules('message','Message','trim|required|max_length[255]|xss_clean');
      
      
      if($this->form_validation->run() == FALSE)
      {                  
        $response = array(
                  'status'=>201,
                  'message'=>validation_errors()
        ); 
        echo $this->response($response);
        exit;
          
      }else {
                    $name = $this->input->post('name','');
                    $email = $this->input->post('email','');
                    $contact = $this->input->post('phone','');
                    $message = $this->input->post('message','');
                    $subject = $this->input->post('subject','');
                    $address = $this->input->post('address','');
                    $section = $this->input->post('section','');
                    $createdAt = date('Y-m-d H:i:s');
                    $saveData = array('name'=>$name, 
                            'email'=>$email,
                            'section'=>$section, 
                            'phone'=>$contact, 
                            'message'=> $message,
                            'subject'=>!empty($subject) ? $subject : '',
                            'address'=>$address,
                            'status'=>'Inactive', 
                            'createdAt'=> $createdAt
                    );
                    $result= $this->Querylist_model->saveData($saveData);
                    if(!empty($result)){
                     
                      /*ADMIN EMAIL*/
                      $searchArr = array('[NAME]','[CUSTOMERNAME]','[EMAIL]','[PHONE]','[SUBJECT]','[MESSAGE]','[SECTION]','[DATE]');
                      $replaceArr = array(NAME,$name,$email,$contact,$subject,$message,$section,$createdAt);
                      $emailData = $this->common->emailTemplate('1', $searchArr, $replaceArr);
                      $adminEmail = EMAIL;
                      $config = Array(
                        'protocol'  => 'smtp',
                        'smtp_host' => SMTPSERVER,
                        'smtp_port' => SMTPPORT,
                        'smtp_user' => SMTPUSERNAME,
                        'smtp_pass' => SMTPPASSWORD,
                        'protocol' => 'sendmail',
                        'mailtype' => 'html', 
                        'charset' => 'utf-8',
                        'newline'   => "\r\n",
                        'wordwrap' => TRUE
                      );
                      
                      $this->load->library('email', $config);           
                      $this->email->from(EMAIL, NAME);
                        if($adminEmail){
                          $subject = !empty($emailData['subject']) ? NAME.' :: '.$emailData['subject'] : '';
                           $body = !empty($emailData['body']) ? $emailData['body'] : '';
                          $this->email->to(EMAIL, NAME);
                          $this->email->subject($subject);
                          $this->email->set_mailtype("html");
                          $this->email->message($body);  
                          $this->email->send();
                        }

                       /*USER EMAIL*/ 
                      $searchArr = array('[NAME]');
                      $replaceArr = array( $name);
                      $emailData = $this->common->emailTemplate('2', $searchArr, $replaceArr);
                      $adminEmail = EMAIL;
                      
                      $config = Array(
                        'protocol'  => 'smtp',
                        'smtp_host' => SMTPSERVER,
                        'smtp_port' => SMTPPORT,
                        'smtp_user' => SMTPUSERNAME,
                        'smtp_pass' => SMTPPASSWORD,
                        'protocol' => 'sendmail',
                        'mailtype' => 'html', 
                        'charset' => 'utf-8',
                        'newline'   => "\r\n",
                        'wordwrap' => TRUE
                      );
                      
                      $this->load->library('email', $config);           
                      $this->email->from(EMAIL, NAME);  

                        if($email){
                          $subject = !empty($emailData['subject']) ? NAME.' :: '.$emailData['subject'] : '';
                           $body = !empty($emailData['body']) ? $emailData['body'] : '';
                          $this->email->to($email, $name);
                          $this->email->subject($subject);
                          $this->email->set_mailtype("html");
                          $this->email->message($body);  
                          $this->email->send();
                        }
                        $response = array(
                          'status'=>200,
                          'message'=>'Your query has been submitted successfully, thank you!'
                      ); 
                    }else {

                        $response = array(
                          'status'=>201,
                          'message'=>'Something unexpected happened. Try again later.'
                      ); 
                    }
                  
        echo $this->response($response);
        exit;
      }
    }
    public function postNewsLetter()
    {
      $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[255]|xss_clean');
      if($this->form_validation->run() == FALSE)
      {                  
        $response = array(
                  'status'=>201,
                  'message'=>validation_errors()
        ); 
        echo $this->response($response);
        exit;
          
      }else {
                    
                    $email = $this->input->post('email');                    
                    $section = $this->input->post('section');
                    $createdAt = date('Y-m-d H:i:s');
                    $saveData = array('name'=>' ', 
                            'email'=>$email,
                            'section'=>$section, 
                            'phone'=>'N/A', 
                            'message'=> ' ',
                            'subject'=> '',
                            'address'=>'',
                            'status'=>'Inactive', 
                            'createdAt'=> $createdAt
                    );
                    $result= $this->Querylist_model->saveData($saveData);
                    if(!empty($result)){
                     
                      

                       /*USER EMAIL*/ 
                      $searchArr = array('[NAME]');
                      $replaceArr = array($email);
                      $emailData = $this->common->emailTemplate('2', $searchArr, $replaceArr);
                      $adminEmail = EMAIL;
                      
                      $config = Array(
                        'protocol'  => 'smtp',
                        'smtp_host' => SMTPSERVER,
                        'smtp_port' => SMTPPORT,
                        'smtp_user' => SMTPUSERNAME,
                        'smtp_pass' => SMTPPASSWORD,
                        'protocol' => 'sendmail',
                        'mailtype' => 'html', 
                        'charset' => 'utf-8',
                        'newline'   => "\r\n",
                        'wordwrap' => TRUE
                      );
                      
                      $this->load->library('email', $config);           
                      $this->email->from(EMAIL, NAME);  

                        if($email){
                          $subject = !empty($emailData['subject']) ? NAME.' :: Newsletter ' : '';
                           $body = !empty($emailData['body']) ? $emailData['body'] : '';
                          $this->email->to($email, $email);
                          $this->email->subject($subject);
                          $this->email->set_mailtype("html");
                          $this->email->message($body);  
                          $this->email->send();
                        }
                        $response = array(
                          'status'=>200,
                          'message'=>'Your request has been submitted successfully, thank you!'
                      ); 
                    }else {

                        $response = array(
                          'status'=>201,
                          'message'=>'Something unexpected happened. Try again later.'
                      ); 
                    }
                  
        echo $this->response($response);
        exit;
      }
    }
    public function postBooking()
    {
      $this->form_validation->set_rules('name','Name','trim|required|max_length[255]|xss_clean');
     // $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[255]|xss_clean');
      $this->form_validation->set_rules('phone','Phone number','trim|required|min_length[8]|max_length[12]|xss_clean');
      //$this->form_validation->set_rules('address','Mobile number','trim|required|max_length[255]|xss_clean');
      //$this->form_validation->set_rules('course','Course','trim|required|max_length[255]|xss_clean');
      
      if($this->form_validation->run() == FALSE)
      {                  
        $response = array(
                  'status'=>201,
                  'message'=>validation_errors()
        ); 
        echo $this->response($response);
        exit;
          
      }else {
                    $name = $this->input->post('name','');
                    $email = $this->input->post('email'.'');
                    $contact = $this->input->post('phone');
                    $address = $this->input->post('address','');
                    $course = $this->input->post('course','');
                    $online = $this->input->post('online');
                    $classroom = $this->input->post('classroom');
                    $preferredClass='';
                   /* if(!empty($online)){
                      $preferredClass = $online.', ';
                    }
                    if(!empty($classroom)){
                      $preferredClass .= $classroom;
                    }*/
                    $preferredClass = 'Online';
                    $createdAt = date('Y-m-d H:i:s');
                    $saveData = array('name'=>$name, 
                            'email'=> $email,
                            'phone'=> $contact, 
                            'address'=> $address,
                            'course'=> !empty($course) ? $course : '',
                            'preferredClass'=> $preferredClass,
                            'status'=>'Inactive', 
                            'createdAt'=> $createdAt
                    );
                    $result= $this->Applyonline_model->saveData($saveData);
                    if(!empty($result)){
                     
                      /*ADMIN EMAIL*/
                      $searchArr = array('[NAME]','[PHONE]','[EMAIL]','[ADDRESS]','[INTERESTED]','[MODE]','[DATE]');
                      $replaceArr = array(NAME,$contact,$email,$address,$course,$preferredClass,$createdAt);
                      $emailData = $this->common->emailTemplate('3', $searchArr, $replaceArr);
                      $adminEmail = EMAIL;
                      $config = Array(
                        'protocol'  => 'smtp',
                        'smtp_host' => SMTPSERVER,
                        'smtp_port' => SMTPPORT,
                        'smtp_user' => SMTPUSERNAME,
                        'smtp_pass' => SMTPPASSWORD,
                        'protocol' => 'sendmail',
                        'mailtype' => 'html', 
                        'charset' => 'utf-8',
                        'newline'   => "\r\n",
                        'wordwrap' => TRUE
                      );
                      
                      $this->load->library('email', $config);           
                      $this->email->from(EMAIL, NAME);
                        if($adminEmail){
                          $subject = !empty($emailData['subject']) ? NAME.' :: '.$emailData['subject'] : '';
                           $body = !empty($emailData['body']) ? $emailData['body'] : '';
                          $this->email->to(EMAIL, NAME);
                          $this->email->subject($subject);
                          $this->email->set_mailtype("html");
                          $this->email->message($body);  
                          $this->email->send();
                        }

                       /*USER EMAIL*/ 
                      /*$searchArr = array('[NAME]');
                      $replaceArr = array( $name);
                      $emailData = $this->common->emailTemplate('4', $searchArr, $replaceArr);
                      $adminEmail = EMAIL;
                      
                      $config = Array(
                        'protocol'  => 'smtp',
                        'smtp_host' => SMTPSERVER,
                        'smtp_port' => SMTPPORT,
                        'smtp_user' => SMTPUSERNAME,
                        'smtp_pass' => SMTPPASSWORD,
                        'protocol' => 'sendmail',
                        'mailtype' => 'html', 
                        'charset' => 'utf-8',
                        'newline'   => "\r\n",
                        'wordwrap' => TRUE
                      );
                      
                      $this->load->library('email', $config);           
                      $this->email->from(SMTPUSERNAME, NAME);  

                        if($email){
                          $subject = !empty($emailData['subject']) ? NAME.' :: '.$emailData['subject'] : '';
                           $body = !empty($emailData['body']) ? $emailData['body'] : '';
                          $this->email->to($email, $name);
                          $this->email->subject($subject);
                          $this->email->set_mailtype("html");
                          $this->email->message($body);  
                          $this->email->send();
                        }*/
                        $response = array(
                          'status'=>200,
                          'message'=>'Your apply online request has been submitted successfully, we will get back to you soon, thank you!'
                      ); 
                    }else {
                        $response = array(
                          'status'=>201,
                          'message'=>'Something unexpected happened. Try again later.'
                      ); 
                    }
                  
        echo $this->response($response);
        exit;
      }
    }
}

?>