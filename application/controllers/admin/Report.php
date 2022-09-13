<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_admin'])) 
        {
            redirect('admin/login');
        }
        $this->load_admin_global();
        $this->load->model(array('admin/admin_model'));
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->helper('general_helper');
    }

	 public function index()
    {
        $data1=$this->data;
        $data2['title'] = 'ประมวลผลการเลือกตั้ง';
        $data=array_merge($data1,$data2);
        //$data['results'] = $this->admin_model->get_election_process();
        
        $this->data = $data;

        $this->middle = 'admin/election_process2';
        $this->admin();
    }

    public function election_vote()
    {
        
        $data['title'] = 'ผลการเลือกตั้ง';
        
        $data['result1s'] = $this->admin_model->get_election_group1();
        $data['result2s'] = $this->admin_model->get_election_group2();
        
        $this->data = $data;

        $this->load->view('admin/election_vote',$data);
      
    }

    public function election_vote_score1()
    {
        
        $data['title'] = 'ผลการเลือกตั้ง';
        
        $data['results'] = $this->admin_model->get_score_group1();
        
        $this->data = $data;

        $this->load->view('admin/election_vote',$data);
      
    }

        public function election_vote_score2()
    {
        
        $data['title'] = 'ผลการเลือกตั้ง';
        
        $data['results'] = $this->admin_model->get_score_group2();
        
        $this->data = $data;

        $this->load->view('admin/election_vote',$data);
      
    }

        public function election_vote_score3()
    {
        
        $data['title'] = 'ผลการเลือกตั้ง';
        
        $data['results'] = $this->admin_model->get_score_group3();
        
        $this->data = $data;

        $this->load->view('admin/election_vote',$data);
      
    }

    public function election_process1()
    {
        
        $data['title'] = 'ประมวลผลการเลือกตั้ง';
        //$data['results'] = $this->admin_model->get_election_process();
        //$data['result1s'] = $this->admin_model->get_election_group1();
        //$data['result2s'] = $this->admin_model->get_election_group2();
        
        $this->data = $data;

        $this->middle = 'admin/election_process1';
        $this->admin();
    }

     public function election_process2()
    {
        
        $data['title'] = 'ประมวลผลการเลือกตั้ง';
        //$data['results'] = $this->admin_model->get_election_process();
        //$data['result1s'] = $this->admin_model->get_election_group1();
        //$data['result2s'] = $this->admin_model->get_election_group2();
        
        $this->data = $data;

        $this->middle = 'admin/election_process2';
        $this->admin();
    }

     public function election_process3()
    {
        
        $data['title'] = 'ประมวลผลการเลือกตั้ง';
        //$data['results'] = $this->admin_model->get_election_process();
        //$data['result1s'] = $this->admin_model->get_election_group1();
        //$data['result2s'] = $this->admin_model->get_election_group2();
        
        $this->data = $data;

        $this->middle = 'admin/election_process3';
        $this->admin();
    }

    public function election_rept1()
    {
        
        $data['title'] = 'ประมวลผลการเลือกตั้ง';
        $data['score1'] = $this->admin_model->get_data_t11();
        $data['score2'] = $this->admin_model->get_data_t12();
        
        $this->data = $data;

        $this->middle = 'admin/result1';
        $this->admin();
    }

    public function election_rept2()
    {
        
        $data['title'] = 'ประมวลผลการเลือกตั้ง';
        $data['score1'] = $this->admin_model->get_data_t2();
      
        $this->data = $data;

        $this->middle = 'admin/result2';
        $this->admin();
    }

 public function election_rept3()
    {
        
        $data['title'] = 'ประมวลผลการเลือกตั้ง';
        $data['score1'] = $this->admin_model->get_data_t3();
      
        $this->data = $data;

        $this->middle = 'admin/result3';
        $this->admin();
    }

    public function election_report()
    {
        $data1=$this->data;
        $data2['title'] = 'รายงานจำนวนผู้มาใช้สิทธิ';
        $data2['orgs'] = $this->admin_model->get_election_report();
        $data2['currents'] = $this->admin_model->get_current_election_report();
        $data=array_merge($data1,$data2);
        $this->data = $data;
        $this->middle = 'admin/election_report';
        $this->admin();
    }

    public function election_result1()
    {
        
        $data['title'] = 'ผลการเลือกตั้ง';
        $data['score11'] = $this->admin_model->get_election_score11();
        $data['score12'] = $this->admin_model->get_election_score12();
     
        $this->data = $data;
        $this->middle = 'admin/election_result1';
        $this->admin();
    }

     public function election_result2()
    {
        $data['title'] = 'ผลการเลือกตั้ง';
        $data['score21'] = $this->admin_model->get_election_score21();
        $data['score22'] = $this->admin_model->get_election_score22();
     
        $this->data = $data;
        $this->middle = 'admin/election_result2';
        $this->admin();
    }

    public function process_score()
    {
        $results =array();
        $results = $this->admin_model->get_election_process();
        //if($results){
            //$this->admin_model->set_process();
        //}
        echo json_encode($results);
    }

    public function process_score11()
    {
        $results =array();
        $results = $this->admin_model->get_score_group11();
        //if($results){
            //$this->admin_model->set_process();
        //}
        echo json_encode($results);
    }

    public function process_score12()
    {
        $results =array();
        $results = $this->admin_model->get_score_group12();
        //if($results){
            //$this->admin_model->set_process();
        //}
        echo json_encode($results);
    }

    public function process_score2()
    {
        $results =array();
        $results = $this->admin_model->get_score_group2();
        //if($results){
            //$this->admin_model->set_process();
        //}
        echo json_encode($results);
    }

    public function process_score3()
    {
        $results =array();
        $results = $this->admin_model->get_score_group3();
        //if($results){
            //$this->admin_model->set_process();
        //}
        echo json_encode($results);
    }

     function fetch_chart()
     {      
       $chart_data = $this->admin_model->fetch_chart_data();
       
       foreach($chart_data->result_array() as $row)
       {
        $output[] = array(
         'c_number'  => $row["c_number"],
         'profit' => floatval($row["total"])
        );
       }
       echo json_encode($output);
      
     }

    public function vote_list()
    {
        $data1=$this->data;
        $data2['title'] = 'รายชื่อผู้ลงคะแนนเลือกตั้ง';       
        $data2['votelist'] = $this->admin_model->vote_list();
        $data=array_merge($data1,$data2);
        $this->data = $data;
        $this->middle = 'admin/vote_list';
        $this->admin();
    }

    public function print11()
    {
        $data['title'] = 'พิมพ์ผลการเลือกตั้ง';
        $data['allvote'] = $this->admin_model->get_election_total(1) ;
        $data['vote'] = $this->admin_model->group_vote(1);
        $data['unvote'] = $this->admin_model->unvote(1);
        $data['novote'] = $this->admin_model->novote(1);
        $data['userscore'] = $this->admin_model->get_election_process11();
        
        $this->data = $data;
        //$this->load->view('admin/print',$data);
        $this->middle = 'admin/print11';
        $this->admin();

    }

    public function print12()
    {
        $data['title'] = 'พิมพ์ผลการเลือกตั้ง';
        $data['allvote'] = $this->admin_model->get_election_total(1) ;
        $data['vote'] = $this->admin_model->group_vote(1);
        $data['unvote'] = $this->admin_model->unvote(1);
        $data['novote'] = $this->admin_model->novote(1);
        $data['userscore'] = $this->admin_model->get_election_process12();
     
        $this->data = $data;
        //$this->load->view('admin/print',$data);
        $this->middle = 'admin/print12';
        $this->admin();

    }

     public function print21()
    {
        $data['title'] = 'พิมพ์ผลการเลือกตั้ง';
        $data['allvote'] = $this->admin_model->get_election_total(2) ;
        $data['vote'] = $this->admin_model->group_vote(2);
        $data['unvote'] = $this->admin_model->unvote(2);
        $data['novote'] = $this->admin_model->novote(2);
        $data['userscore'] = $this->admin_model->get_election_process21();
        $this->data = $data;
        //$this->load->view('admin/print',$data);
        $this->middle = 'admin/print21';
        $this->admin();

    }

    public function print22()
    {
        $data['title'] = 'พิมพ์ผลการเลือกตั้ง';
        $data['allvote'] = $this->admin_model->get_election_total(2) ;
        $data['vote'] = $this->admin_model->group_vote(2);
        $data['unvote'] = $this->admin_model->unvote(2);
        $data['novote'] = $this->admin_model->novote(2);
        $data['userscore'] = $this->admin_model->get_election_process22();
        $this->data = $data;
        //$this->load->view('admin/print',$data);
        $this->middle = 'admin/print22';
        $this->admin();

    }
    
}
