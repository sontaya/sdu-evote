<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/admin_model');
        $this->load->library('user_agent');
        $this->load->helper('general');
    }
    
    public function index()
	{
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต';

        $this->data = $data;

        //$this->load->view('front/login',$data); //test
        $this->load->view('admin/admin_login',$data);
       		
    }
    
    public function signin()
	{
		$data['title'] = 'มหาวิทยาลัยสวนดุสิต';
    	$user = $this->input->post('username');
    	$pwd = $this->input->post('password');
    
    	if ($this->ldap_admin_login($user,$pwd)){
        	redirect('admin/home');

    	}else{
            $this->session->set_flashdata('error_message',$this->session->userdata['message']);        	
        	redirect('admin/login');    
        }        
        
	}

	function ldap_admin_login($user, $pwd){
        $ldapconfig['host'] = "sdu-ldap.dusit.ac.th";
	    $ldapconfig['port'] = "389";
	    $ldapconfig['auth_user'] = '';
	    $ldapconfig['auth_password'] = '';
	    
	    $auth_conn = @ldap_connect($ldapconfig['host']) or die("Could not connect to LDAP server.");
	    if($auth_conn){
            if(@ldap_bind($auth_conn, $ldapconfig['auth_user'], $ldapconfig['auth_password'])){
                $search = @ldap_search($auth_conn, 'dc=dusit,dc=ac,dc=th', 'uid=' . $user);
                if ($search) {
                    $result = @ldap_get_entries($auth_conn, $search);
                    if ($result['count'] != 0) {
                        if (@ldap_bind($auth_conn, $result[0]['dn'], $pwd)) {
                            $NameArray = explode(" ", $result[0]["displayname"][0]);
	                        //$BODArray = explode("-", $result[0]["birthdate"][0]);
	                        //$BOD = (intval($BODArray[2]) - 543) . "-" . $BODArray[1] . "-" . $BODArray[0];
	                        $firstName = $NameArray[0];
	                        $lastName = $NameArray[1];
							$uidnumber = $result[0]["uidnumber"][0];
							$idcardno = $result[0]["idcardno"][0];
                            $idcode = $result[0]["idcode"][0];
                            $Mail = $result[0]["mail"][0];

                              //check user from db
                              if ($this->admin_model->user_admin_exists($idcode)) {
                                //is true get profile
                                $profile = $this->admin_model->get_profile($idcode);

                                $sess_prof = array(
                                    'uid' => $profile->id,
                                    'pcode' => $profile->pcode,
                                    'fullname' => $profile->fullname,
                                    'user_level' => $profile->user_level,
                                    'email' => $Mail,
                                    'logged_admin'    => TRUE
                                );
                                $this->session->set_userdata($sess_prof);
                                $this->session->set_userdata('message', "login sucess.");
                                return true;
                            } else {
                                $this->session->set_userdata('message', "คุณไม่มีสิทธิเข้าใช้งานระบบ");
                                return false;
                            }
                             
                           
                        }else{ 	                       
	                        $this->session->set_userdata('message',"รหัสผู้ใช้งานหรือรหัสผ่านไม่ถูกต้องyy"); 
	                        return false;  //return "Failed to password bind..." . ldap_error($auth_conn);	                       
	                    } //if bind password
                    }else{                         
	                    $this->session->set_userdata('message',"รหัสผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง"); //ldap_error($auth_conn)
	                    return false;
                    } //if result
                } else { 	                
	                $this->session->set_userdata('message',"รหัสผู้ใช้งานหรือรหัสผ่านไม่ถูกต้องxx");
	                return null;
	            } //if search
            }else{ 	           
	            $this->session->set_userdata('message',"รหัสผู้ใช้งานหรือรหัสผ่านไม่ถูกต้องvv");	          
	            return null; //"Failed to bind..." . ldap_error($auth_conn);
	        } //if bind
        }else{ 	        
	        $this->session->set_userdata('message',"รหัสผู้ใช้งานไม่ถูกต้อง");
            return null; //"Failed to connect ..." . ldap_error($auth_conn);
        } //if conn
    }
      
    
    function auth(){
        $uname    = $this->input->post('username',TRUE);
        $pwd = $this->input->post('password',TRUE);
        //$card_id = md5($this->input->post('password',TRUE));
        $validate = $this->admin_model->validate(strtolower($uname),$pwd);
        if($validate->num_rows() > 0){
            $data  = $validate->row_array();
            $pcode  = $data['pcode'];
            $name  = $data['fullname'];
            //$email = $data['user_email'];
            $level = $data['user_level'];
            $sesdata = array(
                'pcode' =>$pcode,
                'username'  => $name,                
                'user_level'     => $level,
                'logged_admin' => TRUE
            );
            $this->session->set_userdata($sesdata);
            // access login for admin
            if($level === '4'){
                //redirect('admin/home');
                redirect('admin/report');
            // access login for staff
            }elseif($level === '1'){
                redirect('admin/home');
            }elseif($level === '3'){
                redirect('admin/report/election_report');
            }else{
                redirect('admin/login');
            }
        }else{
            $this->session->set_flashdata('error_message','Username or Password ไม่ถูกต้อง.');
            redirect('admin/login');
        }
    }
 
    function logout(){
        foreach (array_keys($this->session->userdata) as $key) {   $this->session->unset_userdata($key); }
        $this->session->sess_destroy();
        redirect('admin/login');
    }
    
}
