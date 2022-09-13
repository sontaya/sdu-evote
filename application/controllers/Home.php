<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('user_model','candidate_model','event_model'));
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('general_helper');
    }

	public function index()
	{
        $data['title'] = 'SDU Election 2022';
        $data['events'] = $this->event_model->fetch_all();

        $this->data = $data;
        $this->middle = 'front/home';
        $this->layout();		
    }
    
    public function candidate1(){

        $data['title'] = 'SDU Election 2022';
        //$data['cangp1'] = $this->candidate_model->get_candidate_by_group(1);
       
        $this->data = $data;
        $this->middle = 'front/candidate1';
        $this->layout();
    }

    public function candidate2(){
        $data['title'] = 'SDU Election 2022';       
        //$data['cangp2'] = $this->candidate_model->get_candidate_by_group(2);

        $this->data = $data;
        $this->middle = 'front/candidate2';
        $this->layout();
    }

    public function candidate3(){
        $data['title'] = 'SDU Election 2022';       
        //$data['cangp2'] = $this->candidate_model->get_candidate_by_group(2);

        $this->data = $data;
        $this->middle = 'front/candidate3';
        $this->layout();
    }

    public function check_election()
	{
        $data['title'] = 'SDU Election 2022';

        $this->data = $data;
        $this->middle = 'front/check_election';
        $this->layout();
    }

    public function view()
	{
        if($this->session->userdata['logged_in']==true && isset($this->session->userdata['vote_group'])){
        $data['title'] = 'SDU Election 2022';       
        $data['cangp'] = $this->candidate_model->get_candidate_by_group($this->session->userdata['vote_group']);
        $this->data = $data;
        $this->middle = 'front/view';
        $this->layout();
        }else{
            redirect('login');
        }
    }

    public function vote1()
    {
        if($this->session->userdata['logged_in']==true && $this->session->userdata['vote_group']==1){
            $data['title'] = 'SDU Election 2022';

            $data['candidates'] = $this->candidate_model->get_candidate_by_group(1);
            $this->data = $data;
            $this->middle = 'front/vote1';
            $this->layout();
        }else{
            redirect('login');
        }
    }

    public function vote2()
    {
        if($this->session->userdata['logged_in']==true && $this->session->userdata['vote_group']==2){
            $data['title'] = 'SDU Election 2022';

            $data['candidates'] = $this->candidate_model->get_candidate_by_group(2);
            $this->data = $data;
            $this->middle = 'front/vote2';
            $this->layout();
        }else{
            redirect('login');
        }
    }

    public function election_check()
    {
        $data['title'] = 'SDU Election 2022';

        $this->load->view('election_check');

    }

    public function get_profile()
    {
        $cardid =$this->input->post('cardid');
        $profile = $this->user_model->get_profile_by_card_id($cardid);   
        if($profile){
            $data = array(
                'status' => true,
                'profile' =>$profile,
                'message'=> 'Success'
            ); 
        }else{
            $data = array(
                'status' => false,
                'message'=> 'Not Found'
            ); 
        }
        
        echo json_encode($data);
    }

    public function ajax_search(){
        $cardid =$this->input->post('cardid');
        $profile = $this->user_model->get_profile_by_card_id($cardid);
        if($profile){
            if($profile->vote_group=="1"){
                $v_type = "1. สภาคณาจารย์และพนักงาน<br>2.กรรมการสภามหาวิทยาลัย จากคณาจารย์ประจำ";
            }else{
                $v_type = "1. สภาคณาจารย์และพนักงาน<br>2.กรรมการสภามหาวิทยาลัย จากพนักงานมหาวิทยาลัย สายสนับสนุน";
            }
           
            $msg= "<div class='alert alert-info'><p>";
            //$msg .="<strong>ลำดับที่ในบัญชีรายชื่อ :</strong> ". $profile->n_order ."<br>";
            $msg .="<strong>ชื่อ-สกุล :</strong> ". $profile->fullname ."<br>";
            $msg .="<strong>สิทธิการเลือกตั้ง :</strong> <br>". $v_type ."<br>";
            $msg .="<strong>สถานที่เลือกตั้ง :</strong> เลือกตั้งผ่านระบบออนไลน์ <br>";
            $msg .="<strong>วันที่เลือกตั้ง :</strong> 5 กรกฎาคม พ.ศ. 2565 เวลา 09.00 - 15.00 น.";
            $msg .= "</p></div>";
            $status = true;
            $data =$msg;
            $message = 'Success';
        }else{
            $status = false;
            $data ="";
            $message = 'Not Found';
        }
        $data_p = array(
            'status' => $status,
            'data' => $data,
            'message'=> $message
        );

        echo json_encode($data_p);
    }
    
}
