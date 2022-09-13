<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_admin'])) 
        {
            redirect('admin/login');
        }
        $this->load_admin_global();
        $this->load->model(array('admin/event_model','admin/admin_model'));
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->helper('general_helper');
    }

	public function index()
    {
        $data2['title'] = 'SDU eVote';
        $data1=$this->data;

        $data2['events'] = $this->event_model->get_event();
       
        $data=array_merge($data1,$data2);

        $this->data = $data;
        $this->middle = 'admin/event/home';
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
    
        
}
