<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Upload single and multiple image
 */
if (!function_exists('myUpload')) {

    function myUpload($upload_path, $name, $multiple = FALSE)
    {
        $ci =& get_instance();
        $config = array(
            'file_name' => "img_" . time(),
            'allowed_types' => '*',
            'max_size' => 1000024,
            'overwrite' => FALSE,
            'upload_path' => $upload_path
        );

        $ci->upload->initialize($config);

        if (!$multiple) {
            if ($_FILES[$name]['name'] == null) {
                return array('errorf' => TRUE, 'error' => 'Please Select Image');
            }

            if (!$ci->upload->do_upload($name)) {
                return array('errorf' => TRUE, 'error' => $ci->upload->display_errors());
            } else {

                $data = $ci->upload->data();
                return array('errorf' => FALSE, 'data' => $ci->upload->data());
            }
        } else {
            $temp = array();

            if ($_FILES[$name]['name'] == null) {
                return array('errorf' => TRUE, 'error' => 'Please Select Image');
            }

            $files = $_FILES;
            $number_of_files_uploaded = count($_FILES[$name]['name']);

            for ($i = 0; $i < $number_of_files_uploaded; $i++) {

                $_FILES = array();
                $_FILES[$name]['name'] = $files[$name]['name'][$i];
                $_FILES[$name]['type'] = $files[$name]['type'][$i];
                $_FILES[$name]['tmp_name'] = $files[$name]['tmp_name'][$i];
                $_FILES[$name]['error'] = $files[$name]['error'][$i];
                $_FILES[$name]['size'] = $files[$name]['size'][$i];

                if (!$ci->upload->do_upload($name)) {
                    $temp = array('errorf' => TRUE, 'error' => $ci->upload->display_errors());
                    break;
                } else {
                    $temp[] = $data = $ci->upload->data();
                }
            }

            $_FILES = $files;
            if (isset($temp['errorf'])) {
                return $temp;
            } else {
                return array('errorf' => FALSE, 'data' => $temp);
            }
        }
    }

}

/**
 * Send mobile notification
 */
if (!function_exists('sendMobileNotification')) {

    function sendMobileNotification($tokenIds, $message, $title)
    {
        /*$fields = array(
            'registration_ids' => $tokenIds,
            'data' => array('message' => $message)
        );*/
        $fields = array(
            'registration_ids' => $tokenIds,
            'priority' => 10,
            'data' => array('title' => $title, 'body' =>  $message, 'id' => 1),
        );
        
        // $newF = json_encode($fields);
        
            // 'apns' => array('headers' => array('apns-expiration' => '10')),
            // 'android' => array("ttl" => "100s"),
            // 'webpush' => array('headers' => array('TTL' => '10'))

        $headers = array(
            'Authorization:key = ' . MOBILE_NOTIFICATION_KEY,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, MOBILE_NOTIFICATION_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($newF));
        $result = curl_exec($ch);
        //print_r($result);
        return $result;
    }
}

/**
 * Send email
 */
if (!function_exists('sendMail')) {

    function sendMail($from, $from_name, $to, $subject, $body)
    {
        $ci =& get_instance();
        $ci->load->library('email');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.wetap.in',
            'smtp_port' => 587,
            'smtp_user' => EMAIL_ID,
            'smtp_pass' => EMAIL_PASSWORD,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
        );
        // echo json_encode($config);die;
        $ci->email->initialize($config);
        $ci->email->from($from, $from_name);
        $ci->email->to($to);
        $ci->email->subject($subject);
        $ci->email->message($body);
        // $ci->email->send();
        // return $ci->email->print_debugger();
        if ($ci->email->send()) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('sendMailWithAttchment')) {

    function sendMailWithAttchment($from, $from_name, $to, $subject, $body,$attchment_path)
    {
        $ci =& get_instance();
        $ci->load->library('email');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.wetap.in',
            'smtp_port' => 587,
            'smtp_user' => EMAIL_ID,
            'smtp_pass' => EMAIL_PASSWORD,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
        );
        // echo json_encode($config);die;
        $ci->email->initialize($config);
        $ci->email->from($from, $from_name);
        $ci->email->to($to);
        $ci->email->subject($subject);
        $ci->email->message($body);
        $ci->email->attach($attchment_path);
        // $ci->email->send();
        // return $ci->email->print_debugger();
        if ($ci->email->send()) {
            return true;
        } else {
            return false;
        }
    }
}
/**
 * Send mobile message
 */
if (!function_exists('sendMobileMessage')) {

    function sendMobileMessage($message = '', $mobileNumber = 0)
    {
        $api_key = '25FA3EFD508EDC';
        $contacts = $mobileNumber;
        $from = 'YOJANA';
        $sms_text = urlencode($message);

        //Submit to server

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, "http://kutility.in/app/smsapi/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "key=".$api_key."&routeid=415&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;

    }
}

/**
 * Create random string with character and number
 */
if (!function_exists('createCharNumRandom')) {

    function createCharNumRandom()
    {
        $chars = "ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
        $i = 0;
        $pass = '';

        while ($i <= 8) {
            $num = mt_rand(0, 61);
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass;
    }
}

/**
 * Create random 6 digit number
 */
if (!function_exists('create6NumRandom')) {

    function create6NumRandom()
    {
        return mt_rand(100000, 999999);
        // return '123456';
    }
}
/**
 * Create random 4 digit number
 */
if (!function_exists('create4NumRandom')) {

    function create4NumRandom()
    {
        return mt_rand(1000, 9999);
    }
}

/**
 * Create random 6 digit number
 */
if (!function_exists('createUniqueNumber')) {

    function createUniqueNumber()
    {
        $ci =& get_instance();
        $unique = mt_rand(10000, 99999);
        $result = $ci->Welcome_model->getData('tbl_users', array('unique_number' => $unique));
        if(count($result)){
            return createUniqueNumber();
        } else {
            return "NC-".$unique;
        }
    }
}

/**
 * Check : Mobile number already exists or not
 */
if (!function_exists('checkMobileIsExists')) {

    function checkMobileIsExists($Mobile = 0)
    {
        $ci =& get_instance();
        $result = $ci->Common_model->getData(DB_REGISTER, array('register_mobile' => $Mobile));
        if(count($result)){
            return $result[0];
        } else {
            return 'false';
        }
    }
}

/**
 * Check : return diff between 2 dates
 */
if (!function_exists('dateDifference')) {

    function dateDifference($date1 = '', $date2 = '')
    {
        $date1= date_create($date1);
        $date2= date_create($date2);
        $diff=date_diff($date1,$date2);
        $days = $diff->format("%a");

        if($days != 0){
            return $days;
        }else{
            return 1;
        }
    }
}


 
 /**
 * earlyCharges
 */
if (!function_exists('earlyCharges')) {

    function earlyCharges($time,$room_charges)
    {
        $time=date('H',strtotime($time));

        if ( $time < 9) {
                $dct=$room_charges*(EARLYPER/100);
        }else{
            $dct=0;
        }
        return $dct;
    }
}

if (!function_exists('lateCheckoutCharges')) {

    function lateCheckoutCharges($room_charges)
    {
        $time=date('H');

        if ( $time < 14) {
                $dct=$room_charges*(PERBEFORE2/100);
        }else if ( $time > 15 && $time < 17  ) {
                $dct=$room_charges*(PER3TO5/100);
        }else if( $time > 17  ){
            $dct=$room_charges*(PERAFTER5/100);
        }else{
            $dct=0;
        }
        return $dct;
    }
}
 
if (!function_exists('convertNumber')) {
   function convertNumber($number){
           $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  return $result . "Rupees  " . $points . " Paise";
    }

}