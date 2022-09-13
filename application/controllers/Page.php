<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {

    public function __construct() {
        parent::__construct();
       /* if($this->session->userdata('logged_in') !== TRUE){
            redirect('login');
        }*/
        $this->load->model(array('candidate_model','vote_model','user_model'));
        $this->load->helper('general');
        $this->load->library('user_agent');
    }

    public function vote()
    {
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต';

       $data['candidates'] = $this->candidate_model->fetch_all();        

        $this->data = $data;
        $this->middle = 'front/vote0';
        $this->layout();       
    }

	public function index()
	{
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต';

        // set js and css scripts to be loaded
        //$data['css_scripts'] = array('vendor/hover-min','vendor/sweetalert2/sweetalert2.min');
        //$data['js_scripts'] = array('vendor/sweetalert2/sweetalert2.min','js_module/register','js_module/yt');
            
        if($this->session->userdata('level') == '1'){
            // $data['slides'] = $this->slide_model->get_all_slide();
            //$data['blogs'] = $this->blog_model->blog_list_limit(7);
            $this->data = $data;
            $this->middle = 'front/home';
            $this->layout();
        }else{
            echo 'Access Denied';
        }
        		
    }
    
    public function staff()
	{
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต (TCAS)';

        // set js and css scripts to be loaded
        $data['css_scripts'] = array('vendor/hover-min','vendor/sweetalert2/sweetalert2.min');
        $data['js_scripts'] = array('vendor/sweetalert2/sweetalert2.min','js_module/register','js_module/yt');
        
        if($this->session->userdata('level') == '2'){
            $this->data = $data;
            $this->middle = 'front/staff';
            $this->layout();
        }else{
            echo 'Access Denied';
        }		
    }
    
    public function author()
	{
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต (TCAS)';

        // set js and css scripts to be loaded
        $data['css_scripts'] = array('vendor/hover-min','vendor/sweetalert2/sweetalert2.min');
        $data['js_scripts'] = array('vendor/sweetalert2/sweetalert2.min','js_module/register','js_module/yt');
        
        if($this->session->userdata('level') == '3'){
            $this->data = $data;
            $this->middle = 'front/author';
            $this->layout();
        }else{
            echo 'Access Denied';
        }		
	}
}
