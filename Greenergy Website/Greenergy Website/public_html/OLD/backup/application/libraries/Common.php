<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Common {

  		
	    
    public function setGlobalSettingsData()
    {	      
    	$instance =& get_instance();
        $instance->db->select('*');
        $instance->db->from('tbl_general_setting');
        $instance->db->where("id", 99);
        $instance->db->limit(1);
        $query = $instance->db->get();
        $resultData = $query->result_array(); 
        
        if (!empty($resultData) && count($resultData) > 0) {
            $count = 0;
            foreach ($resultData as $row) {
                foreach ($row as $key => $val) {
                    define(strtoupper($key), self::outputEscapeString($val, 'TEXTAREA'));
                }
            }
        }
    }
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    public function tableCount($table)
    {
        $instance =& get_instance();
        $instance->db->select('*');
        $instance->db->from($table);        
        $query = $instance->db->get();        
        return count($query->result());
    }

    public function serviceDetails()
    {
        $instance =& get_instance();
        $instance->db->select('*');
        $instance->db->from('tbl_services');
        $instance->db->where('status','Active');
        $instance->db->order_by('id', 'asc');
        $query = $instance->db->get();
        $result = $query->result();        
        return $result;
    }
    public function gallaryImages($limit=0)
    {
        $instance =& get_instance();
        $instance->db->select('*');
        $instance->db->from('tbl_gallery');
        $instance->db->where('status','Active');
        $instance->db->order_by('id', 'desc');
        $instance->db->limit($limit);
        $query = $instance->db->get();
        $result = $query->result();        
        return $result;
    } 
    public function blogDetails()
    {
        $instance =& get_instance();
        $instance->db->select('*');
        $instance->db->from('tbl_blogs');
        $instance->db->where('status','Active');
        $instance->db->order_by('id', 'desc');
        $instance->db->limit(3);
        $query = $instance->db->get();
        $result = $query->result();        
        return $result;
    }    
    public function categoryDetails()
    {
        $instance =& get_instance();
        $instance->db->select('*');
        $instance->db->from('tbl_category');
        $instance->db->where('status','Active');
        $instance->db->order_by('name', 'asc');
        $query = $instance->db->get();
        $result = $query->result();        
        return $result;
    }

    public function subCategoryDetails($categoryId)
    {
        $instance =& get_instance();
        $instance->db->select('*');
        $instance->db->from('tbl_sub_category');
        $instance->db->where('status','Active');
        $instance->db->where('categoryId',$categoryId);
        $instance->db->order_by('id', 'asc');
        $query = $instance->db->get();
        $result = $query->result();        
        return $result;
    }
    /**
     * Method used to wrap content
     * @param string $string
     * @param integer $limit
     * @param string $break
     * @param string $pad
     * @return string
     */
    public function wordWraps($string, $limit, $break = ".", $pad = "...")
    {
        // return with no change if string is shorter than $limit
        if (strlen($string) <= $limit)
            return $string;

        // is $break present between $limit and the end of the string?
        if (false !== ($breakpoint = strpos($string, $break, $limit))) {
            if ($breakpoint < strlen($string) - 1) {
                $string = substr($string, 0, $breakpoint) . $pad;
            }
        }

        return $string;
    }
    public function footerContentWhereInDetails($array)
    {
        $instance =& get_instance();
        $instance->db->select('*');
        $instance->db->from('tbl_contents');
        $instance->db->where_in("id", $array);
        $instance->db->where('status','Active');
        $query = $instance->db->get();
        $result = $query->result();    
        $contectData=array();
          if(!empty($result)){
            foreach ($result as $content) {
              $id = !empty($content->id) ? $content->id : 0;
              $contectData[$id] = $content;
            }
          }    
        return $contectData;
    }

	 /**
     * Function used to fetch template data
     * @param integer $template_id
     * @return array
     */
    public function templateData($templateCode)
    {
        if (empty($templateCode))
            return false;

        $data = array();
        $instance =& get_instance();
        $instance->db->select('*');
        $instance->db->from('tbl_email_templates');
        $instance->db->where("code", $templateCode);
        $instance->db->limit(1);
        $query = $instance->db->get();
        $resultData = $query->result_array(); 
        if (!empty($resultData)) {
            foreach ($resultData as $key => $val) {
                $data[$key] = $val;
            }
        }
        return $data;
    }
    /**
     * Method used to get email template
     * @param string $toEmail
     * @param array $templateArray
     * @param array $searchText
     * @param array $replaceText
     */
    public function emailTemplate($templateCode = '', $searchText = array(), $replaceText = array())
    {
        $emailBody = array();
        if (!empty($templateCode)) {
            $data = self::templateData($templateCode);
            
            $emailSubject = (!empty($data[0]['subject']) && $data[0]['subject'] <> 'New Notification From Web') ? $data[0]['subject'] : '';
            
            if (count($searchText) > 0) {
                $subject = str_replace($searchText, $replaceText, $emailSubject);                
                $body = self::getMailTemplate(str_replace($searchText, $replaceText, $data[0]['description']));
            } else {
                $subject = $emailSubject;
                $body = self::getMailTemplate($data[0]['description']);
            }
            $emailBody = array('body' => $body, 'subject' => $subject);
        } else {
            return false;
        }
        return $emailBody;
    }
	public function getMailTemplate($emailBody = '')
    {
    	//self::setGlobalSettingsData();
        $string = '<table width="600" cellspacing="0" cellpadding="0" border="0" align="center">
                    <tbody>
                        <tr>
                            <td style="padding:20px;background:#4795DB;text-align:center;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#ffffff;"></td>
                        </tr>
                        <tr>
                            <td style="padding-top:0;padding-right:20px;padding-bottom:20px;padding-left:20px;background:#4795DB;text-align:center;font-family:Arial,Helvetica,sans-serif"><table width="100%" cellspacing="0" cellpadding="0" border="0" style="background:#ffffff;border-radius:10px;">
                                    <tbody>
                                        <tr>
                                            <td><table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td  width="100%" align="center" style="padding:20px;"></td>
                                                        </tr>
                                                    </tbody>
                                                </table></td>
                                        </tr>
                                        <tr>
                                            <td style="padding:10px;font-size:25px;font-weight:bold;line-height:20px;color:#a2a1a1;font-family:Arial,Helvetica,sans-serif;" align="center">' . NAME . '</td>
                                        </tr>
                                        <tr>
                                            <td style="color:#333333;" align="center">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td valign="top" align="left" style="color:#6f6f6f;font-size:14px;border-left:1px solid #dfdfdf;border-right:1px solid #dfdfdf;line-height:150%; padding-top:20px; padding-bottom:20px; padding-left:20px; padding-right:20px;font-family:Arial,Helvetica,sans-serif;border-top:solid 1px #4795DB;"> ' . $emailBody . '</td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" align="left" style="padding:10px;font-size:12px;line-height:20px;color:#a2a1a1;font-family:Arial,Helvetica,sans-serif; border-top:solid 1px #4795DB;">If you have an urgent query please call us on: '.PHONE.' or send an email at <a href="mailto:' . EMAIL . '" style="color:#ffd16e; text-decoration:none;">' . EMAIL . ' </a> </td>
                                        </tr>
                                        <tr>
                                            <td valign="middle" align="center" style="padding:10px;font-size:14px;line-height:20px;font-weight:bold;color:#a2a1a1;font-family:Arial,Helvetica,sans-serif;">' . NAME . ' &copy; copyright</td>
                                        </tr>
                                    </tbody>
                                </table></td>
                        </tr>
                    </tbody>
                    </table>';
        return $string;
    }

	    /**
     * Method used to format output value of string
     * @param array $str
     * @param string $Type
     * @param boolean $htmlEntitiesDecode
     * @return array
     */
    public static function outputEscapeString($str, $Type = 'INPUT', $htmlEntitiesDecode = true)
    {
        /*if (get_magic_quotes_runtime()) {
            $str = stripslashes($str);
        }*/
        $str = html_entity_decode($str);

        if ($Type == 'INPUT') {
            $str = $str;
        } elseif ($Type == 'TEXTAREA') {
            $str = $str;
        } elseif ($Type == 'HTML') {
            $str = nl2br($str);
        } else {
            $str = htmlspecialchars($str);
        }

        $str = trim($str);

        return $str;
    }
		/*public function compress_string($str,$m) {
			$s=strip_tags($str);
			for ( $x = 0; $x < strlen($s); $x++ ) 
			{
				$o = ($m+$x >= strlen($s)? $s : ($s{$m+$x} == " "?
				substr($s,0,$m+$x) . "..." : ""));
				if ( $o!= "" ) { return $o; }
			}
		}*/
		 public static function arrayFlatten($array, $return = array())
    {

        if (empty($array))
            return false;

        foreach ($array as $key => $value) {
            if (@is_array($value)) {
                $return = self::arrayFlatten($value, $return);
            } elseif (@$value) {
                $return[$key] = $value;
            }
        }
        return $return;
    }

    public static function generateTimeRangeString($fromDate, $toDate)
    {
        if (empty($fromDate) && empty($toDate))
            return false;

        $timeStr = "";

        $diff = abs(strtotime($fromDate) - strtotime($toDate));
        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        if (!empty($years)) {
            if ($years > 1)
                $timeStr .= '&nbsp;' . $years . ' years';
            else
                $timeStr .= '&nbsp;' . $years . ' year';
        }

        if (!empty($months)) {
            if ($months > 1)
                $timeStr .= '&nbsp;' . $months . ' months';
            else
                $timeStr .= '&nbsp;' . $months . ' month';
        }

        if (empty($years) && empty($months)) {
            if ($days > 1)
                $timeStr .= '&nbsp;' . $days . ' days';
            else
                $timeStr .= '&nbsp;' . $days . ' day';
        }

        return $timeStr;
    }

    public static function addhttp($url)
    {
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "http://" . $url;
        }
        return $url;
    }
		public function url_encode($data){
			$data=urlencode($data);
			$data=urldecode($data);			
			return $data;
		}
		public function time_elapsed_string($datetime, $full = false) {
				$today = time();    
				 $createdday= strtotime($datetime); 
				 $datediff = abs($today - $createdday);  
				 $difftext="";  
				 $years = floor($datediff / (365*60*60*24));  
				 $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));  
				 $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));  
				 $hours= floor($datediff/3600);  
				 $minutes= floor($datediff/60);  
				 $seconds= floor($datediff);  
				 //year checker  
				 if($difftext=="") {  
				   if($years>1)  
					$difftext=$years." years ago";  
				   elseif($years==1)  
					$difftext=$years." year ago";  
				 }  
				 //month checker  
				 if($difftext=="") {  
					if($months>1)  
					$difftext=$months." months ago";  
					elseif($months==1)  
					$difftext=$months." month ago";  
				 }  
				 //month checker  
				 if($difftext=="")  
				 {  
					if($days>1)  
					$difftext=$days." days ago";  
					elseif($days==1)  
					$difftext=$days." day ago";  
				 }  
				 //hour checker  
				 if($difftext=="")  
				 {  
					if($hours>1)  
					$difftext=$hours." hours ago";  
					elseif($hours==1)  
					$difftext=$hours." hour ago";  
				 }  
				 //minutes checker  
				 if($difftext=="")  
				 {  
					if($minutes>1)  
					$difftext=$minutes." minutes ago";  
					elseif($minutes==1)  
					$difftext=$minutes." minute ago";  
				 }  
				 //seconds checker  
				 if($difftext=="")  
				 {  
					if($seconds>1)  
					$difftext=$seconds." seconds ago";  
					elseif($seconds==1)  
					$difftext=$seconds." second ago";  
				 }  
				 return $difftext;  
		}
		
		
		
}