<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends MY_Controller {

    public function __construct() {
        parent::__construct();
      /*  if (!isset($this->session->userdata['logged_in'])) 
        {
            redirect('login');
        }*/
       
        $this->load->model(array('candidate_model','event_model','user_model'));
        $this->load->helper('general');
        $this->load->helper('file');
        $this->load->library('user_agent');
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต';        

        $this->data = $data;
        $this->middle = 'front/home';
        $this->layout();		
    }
    

    public function view($id)
    {
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต'; 
        $data['candidates'] = $this->candidate_model->get_candidate_by_event($id);  
        
        if(empty($data['candidates'])){
          redirect('error404');  
        }
        $data['events'] = $this->event_model->get_event_by_id($id);
        $data['title'] = $data['events']->event_name;
        $data['ccolor'] = $data['events']->ccolor;
        $data['selected'] = $data['events']->selected;
        $this->data = $data;
        $this->middle = 'front/candidate_view';
        $this->layout();        
    }

    public function check_election()
    {
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต';

        $data['profile'] = $this->user_model->get_profile($this->session->userdata['pcode']);    

        $this->data = $data;
        $this->middle = 'front/check_election';
        $this->layout();       
    }



}
