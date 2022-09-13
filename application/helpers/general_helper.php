<?php

defined('BASEPATH') or exit('No direct script access allowed');
//header('Content-Type: text/html; charset=utf-8');

if (!function_exists('ldap_auth')) {

    function ldap_auth($user, $password) {
        $ci = get_instance();

        $ldapconfig['host'] = "sdu-ldap.dusit.ac.th";
        $ldapconfig['port'] = "389";
        $ldapconfig['auth_user'] = '';
        $ldapconfig['auth_password'] = '';

        $auth_conn = @ldap_connect($ldapconfig['host']) or die("Could not connect to LDAP server.");
        if($auth_conn){

            if(@ldap_bind($auth_conn, $ldapconfig['auth_user'], $ldapconfig['auth_password'])){
        //--[Auth Success]

                $r = @ldap_search($auth_conn, 'dc=dusit,dc=ac,dc=th', 'uid=' . $user);
                if ($r) { 
                    $result = @ldap_get_entries($auth_conn, $r);
                    if ($result[0]) {

                        if (@ldap_bind($auth_conn, $result[0]['dn'], $pwd)) {
                    //return $result[0];

                            $NameArray = explode(" ", $result[0]["displayname"][0]);
                            $BODArray = explode("-", $result[0]["birthdate"][0]);
                            $BOD = (intval($BODArray[2]) - 543) . "-" . $BODArray[1] . "-" . $BODArray[0];
                            $firstName = $NameArray[0];
                            $lastName = $NameArray[1];
                            $UserID = $result[0]["idcode"][0];
                            $UserType = $result[0]["employeetype"][0];
                    //$Phone = $result[0]["telephonenumber"][0];
                            $Mail = $result[0]["mail"][0];

                            echo json_encode(array(
                                'status' =>'success',
                                'uid'=>$UserID,
                                'displayname' =>$firstName . ' '.$lastName,
                                'firstName' =>$firstName,
                                'lastName' => $lastName,
                            ),JSON_UNESCAPED_UNICODE);

                        }else{
                            $error  = array(
                                'status' => 'error5',
                                'message' => ldap_error($auth_conn)
                            );
                            echo json_encode($error);
                   //return "Failed to password bind..." . ldap_error($auth_conn);
                        }

                    }else{
                        $error  = array(
                                'status' => 'error4',
                                'message' => ldap_error($auth_conn)
                            );
                            echo json_encode($error);
                    }
                } else {
                     $error  = array(
                                'status' => 'error3',
                                'message' => ldap_error($auth_conn)
                            );
                            echo json_encode($error);
                }
            }else{

                 $error  = array(
                                'status' => 'error2',
                                'message' => ldap_error($auth_conn)
                            );
                            echo json_encode($error);
                //return "Failed to bind..." . ldap_error($auth_conn);
            }
        }else{

             $error  = array(
                                'status' => 'error1',
                                'message' => ldap_error($auth_conn)
                            );
                            echo json_encode($error);
                            //return "Failed to connect ..." . ldap_error($auth_conn);
        }
    }

}

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function get_ip_address() {
    // check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_X_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLIENT_IP'])) {
        return $_SERVER['HTTP_X_CLIENT_IP'];
    }

    if (!empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    // check for IPs passing through proxies
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check if multiple ips exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) {
                if (validate_ip($ip))
                    return $ip;
            }
        } else {
            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
    if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
        return $_SERVER['HTTP_FORWARDED_FOR'];
    if (!empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
        return $_SERVER['HTTP_FORWARDED'];

    // return unreliable ip since all else failed
    return $_SERVER['REMOTE_ADDR'];
    //return $_SERVER['HTTP_X_CLIENT_IP'];
}

/**
 * Ensures an ip address is both a valid IP and does not fall within
 * a private network range.
 */
function validate_ip($ip) {
    if (strtolower($ip) === 'unknown')
        return false;

    // generate ipv4 network address
    $ip = ip2long($ip);

    // if the ip is set and not equivalent to 255.255.255.255
    if ($ip !== false && $ip !== -1) {
        // make sure to get unsigned long representation of ip
        // due to discrepancies between 32 and 64 bit OSes and
        // signed numbers (ints default to signed in PHP)
        $ip = sprintf('%u', $ip);
        // do private network range checking
        if ($ip >= 0 && $ip <= 50331647) return false;
        if ($ip >= 167772160 && $ip <= 184549375) return false;
        if ($ip >= 2130706432 && $ip <= 2147483647) return false;
        if ($ip >= 2851995648 && $ip <= 2852061183) return false;
        if ($ip >= 2886729728 && $ip <= 2887778303) return false;
        if ($ip >= 3221225984 && $ip <= 3221226239) return false;
        if ($ip >= 3232235520 && $ip <= 3232301055) return false;
        if ($ip >= 4294967040) return false;
    }
    return true;
}
      
function get_client_ip() {
     $ipaddress = '';
        if ($_SERVER['HTTP_CLIENT_IP'])
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if($_SERVER['HTTP_X_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if($_SERVER['HTTP_X_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if($_SERVER['HTTP_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if($_SERVER['HTTP_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if($_SERVER['REMOTE_ADDR'])
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        echo $ipaddress ;
} 


function sendmail($em,$name) {
    $ci = get_instance();
    $ci->load->config('email');
    $ci->load->library('email');
    
    $from = $ci->config->item('smtp_user');
    $to = $em;
    $subject = "การลงคะแนนเลือกตั้ง";
    
    $htmlcontent = array(
        'title' => 'การลงคะแนนเลือกตั้ง',
        'name' => $name,
        
    );

    $body = $ci->load->view('council/content.php',  $htmlcontent,TRUE);

    $ci->email->set_newline("\r\n");
    $ci->email->from($from);
    $ci->email->to($to);
    $ci->email->subject($subject);
    $ci->email->message($body);

    if ($ci->email->send()) {
        //echo 'Your Email has successfully been sent.';
        return true;
    } else {
        //show_error($ci->email->print_debugger());
        return false;
        //exit();
    }
}

function get_myclient_ip(){
    $clientIP = $_SERVER['HTTP_CLIENT_IP'] 
    ?? $_SERVER["HTTP_CF_CONNECTING_IP"] # when behind cloudflare
    ?? $_SERVER['HTTP_X_FORWARDED'] 
    ?? $_SERVER['HTTP_X_FORWARDED_FOR'] 
    ?? $_SERVER['HTTP_FORWARDED'] 
    ?? $_SERVER['HTTP_FORWARDED_FOR'] 
    ?? $_SERVER['REMOTE_ADDR'] 
    ?? '0.0.0.0';

    # Earlier than PHP7
    $clientIP = '0.0.0.0';

    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $clientIP = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        # when behind cloudflare
        $clientIP = $_SERVER['HTTP_CF_CONNECTING_IP']; 
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $clientIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $clientIP = $_SERVER['HTTP_X_FORWARDED'];
    } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $clientIP = $_SERVER['HTTP_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
        $clientIP = $_SERVER['HTTP_FORWARDED'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $clientIP = $_SERVER['REMOTE_ADDR'];
    }

    return $clientIP;
}

function GetClientMac(){
    ob_start();
    system('getmac');
    $Content = ob_get_contents();
    ob_clean();
    return substr($Content, strpos($Content,'\\')-20, 17);
}

if (!function_exists('check_on_date')) {
    function check_on_date($stdate,$expire){
        $today = date("Y-m-d H:i:s");
        //$sdate = '2022-02-20 08:00:00';
        //$expire = '2022-03-31 16:00:00';
        //echo $today . '<br>';
        //echo $expire;
        $today_dt = new DateTime($today);
        $start_dt = new DateTime($stdate);
        $expire_dt = new DateTime($expire);

        if ($start_dt <= $today_dt && $today_dt <= $expire_dt) {
            return true;
        }else{
            return false;
        }
    }

}

if (!function_exists('get_candidate_number')) {     
    function get_candidate_number($id)
    {
        $CI =& get_instance();
        $result = $CI->db->select('c_number')->where('id',$id)->get('tbl_candidate');

        if($result->num_rows() > 0 ){
            $data= $result->row()->c_number;
        }else{
            $data= 0;
        }        
        return $data;
    }

}