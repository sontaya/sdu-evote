<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('login_model');
        $this->load->library('user_agent');
        $this->load->helper('general');
    }

	public function index()
	{
        $row = $this->login_model->get_setting();
        $today = date("Y-m-d H:i:s");

        $sdate = $row->start_time;
        $expire = $row->end_time;

        $today_dt = new DateTime($today);
        $start_dt = new DateTime($sdate);
        $expire_dt = new DateTime($expire);
    if ($start_dt <= $today_dt && $today_dt <= $expire_dt) { 
        $data['title'] = 'SDU Election 2022';
        $data['myip'] = get_myclient_ip();
        $this->data = $data;
        $this->middle = 'front/login';
        $this->layout();
 
   }else{
        redirect(base_url());     
    }  
       

       //$this->load->view('login',$data);
    }
    
    public function signin()
	{
    	//$user = $this->input->post('username');
    	//$pwd = $this->input->post('password');
    
    	//if ($this->ldap_login($user,$pwd)){
        if ($this->auth()){
            //redirect($this->session->userdata('referrer')); //login and redirect to current url
            if($this->session->userdata['vote_group']==1){
                $this->session->set_flashdata('in',1);
                redirect('vote/start_in1');
            }elseif($this->session->userdata['vote_group']==2){
                $this->session->set_flashdata('in',2);
                redirect('vote/start_in2');
            }else{
                redirect('login/signout');
            }

    	}else{
            $this->session->set_flashdata('error_message',$this->session->userdata['message']);        	
        	redirect('login');    
        }        
        
	}

    public function user_exists($pcode) 
    {
        if ($this->user_model->user_exists($pcode) == TRUE) {
            //echo json_encode(FALSE);
            return FALSE;
        } else {
            return TRUE;
            //echo json_encode(TRUE);
        }
    }

    function verify_account()
    {
        $pcode = $this->input->post('username');
        $card_id = $this->input->post('password');

        
        if($this->user_model->check_user($pcode,$card_id)==1){
            return true;
        } else {
            return false;
        }

    }

    function auth(){
        $username    = $this->input->post('username',TRUE);
        $card_id = $this->input->post('password',TRUE);
        //$card_id = md5($this->input->post('password',TRUE));
        $validate = $this->login_model->user_validate($username,$card_id);
        if($validate->num_rows() > 0){
            $data  = $validate->row_array();
            $refid = $data['id'];
            $uid  = $data['uid'];
            $hrcode  = $data['hrcode'];
            //$card_id = $data['card_id'];
            $fullname  = $data['fullname'];            
            $level = $data['vote_group'];

            $user_data = $this->user_model->hr_exists($hrcode);
            if($user_data){
                //check current login

                //check user vote
                if($this->user_model->get_vote_status($refid)==TRUE){
                    $this->session->set_userdata('message',"ไม่สามารถเข้าระบบได้ คุณใช้สิทธิลงคะแนนเลือกตั้งแล้ว");
                    return false;
                }else{
                                    //is true get profile
                $profile = $this->user_model->get_profile($hrcode);
                $sess_prof = array(
                    'refid' =>$refid,
                    'uid' => $uid,
                    'hrcode'=>$hrcode,                    
                    'fullname' => $fullname,                    
                    'vote_group' => $level,                  
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($sess_prof);

                //add logging
               $data = array(
                    'pid'=>$uid, 
                    'hrcode'=>$hrcode,                                    
                    //'card_id'=>$card_id,
                    'displayname' =>$fullname,                                       
                    'login_time' =>date('H:i:s'),
                    'device' => $this->agent->platform(),
                    'ip_address' => get_myclient_ip(), 
                    'browser' => $this->agent->browser() . ' - ' .$this->agent->version(),
                    'mac_address' => GetClientMac(),
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->user_model->add_log($data);


                //$this->session->set_userdata('message',"login");
                 return true;
                 }
                                
            }else{
               $this->session->set_userdata('message',"คุณไม่มีสิทธิ์ลงคะแนนเลือกตั้ง");
              return false;
            }
           
        }else{
            $this->session->set_flashdata('error_message','Username or Password ไม่ถูกต้อง.');
            redirect('login');
        }
    }

    function signout(){
        foreach (array_keys($this->session->userdata) as $key) {   $this->session->unset_userdata($key); }
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function loginSubmit(){
        $username = $this->input->post('txtusername');

        if($this->session->userdata('is_logged_in')==true){
            $sessiondata =$this->session->all_userdata();
            $userid = $sessiondata['userid'];
            redirect('dashboard');
        }else{
            $this->load->library('form_validation');
            $this->form_validation->set_rules('txtusername','User name','required|trim|callback_verify_user');
            $this->form_validation->set_rules('txtpassword','Password','required|trim');
            if($this->form_validation->run()){
                $userid = $this->input->post('txtusername');
                $u_data=array(
                    'userid'=>$userid,
                    'is_logged_in'=>true
                );
                //create session of current user
                $this->session->set_userdata($u_data);
                //fetch new session
                $sessionid = session_id();
                //Map new session
                $this->login_model->setsession($userid,$sessionid);
                redirect('dashboard');
            }else{
                //validate fail
                //$this->loadLogin();
            }
        }
    }
    
}
