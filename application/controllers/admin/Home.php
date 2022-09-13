<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_admin'])) 
        {
            redirect('admin/login');
        }
        $this->load_admin_global();
        $this->load->model(array('admin/candidate_model','admin/admin_model'));
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->helper('general_helper');
    }

	public function index()
    {
        $data['title'] = 'SDU eVote';
        //$data1=$this->data;

        //$data['applicant_total'] = $this->admin_model->get_applicant_total();
        //$data['election_total1'] = $this->admin_model->get_election_total(1);
        //$data['election_total2'] = $this->admin_model->get_election_total(2);   
        //$data['candidate1'] = $this->candidate_model->get_candidate_by_event(1);
        //$data['candidate2'] = $this->candidate_model->get_candidate_by_event(2);
        //$data['allvote'] = $this->admin_model->allvote();
        //$data2['unvote'] = $this->admin_model->unvote();
        //$data2['score2'] = $this->admin_model->get_election_process();
        //$data=array_merge($data1,$data2);

        $this->data = $data;
        //$this->middle = 'admin/home2';
        $this->middle = 'admin/election_process1';
        $this->admin();
    }

    public function user()
    {
        $data1=$this->data;
        $data2['title'] = 'SDU eVote';

        $data2['users'] = $this->admin_model->get_alluser();
        $data=array_merge($data1,$data2);
        $this->data = $data;
        $this->middle = 'admin/user';
        $this->admin();
    }
    /*public function candidate()
    {
        $data['title'] = 'รายชื่อผู้สมัคร';
        $data['candidates'] = $this->candidate_model->fetch_all();
        $this->data = $data;
        $this->middle = 'admin/candidate';
        $this->admin();
    }*/
    public function card_exists() {
        $cardid =$this->input->post('cardid');
        $pcode =$this->input->post('pcode');
        //$hrcode = $this->session->userdata['hrcode'];
  
        if ($this->admin_model->card_exists($cardid,$pcode) == TRUE) {
           $data = array("status" => "ok", "message"=> "Sucess");            
            echo json_encode($data);
            //return FALSE;
        } else {
            $data = array("status" => "error", "message"=> "Not Found.");           
            echo json_encode($data);
             //return TRUE;
        }        
    }
        
}
