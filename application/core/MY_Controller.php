<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
//set the class variable.
    var $fronttemplate = array();    
    var $admintemplate = array();
    var $counciltemplate = array(); 
    var $data = array();

    public function __construct() {
        parent::__construct();
        
    }

    public function load_admin_info(){
        $query =$this->db->select('exec_process')->where('id',1)->get('sitesettings');
            
        $this->data = array('c_exec' => $query->row()->exec_process);

    }

    public function load_admin_global(){
            //Check login or redirect to logout
            if($this->session->userdata('logged_admin')!=true){ redirect(base_url().'admin/logout','refresh');    }
            $this->load_admin_info();

      }

    public function load_info(){
                       

        $query =$this->db->select('site_name,version,start_time,end_time')->where('id',1)->get('sitesettings');
            //date_default_timezone_set(trim($query->row()->timezone));
            //$time_format = (trim($query->row()->time_format)=='24') ? date("h:i:s") : date("h:i:s a");
            //$date_view_format = trim($query->row()->date_format);
            //$this->session->set_userdata(array('view_date'  => $date_view_format));
            //$this->session->set_userdata(array('view_time'  => $query->row()->time_format));

        $this->data = array('base_url'      => base_url(),
                            'SITE_TITLE'    => $query->row()->site_name,
                            'VERSION'       => $query->row()->version,
                            'start_time'       => $query->row()->start_time,
                            'end_time' => $query->row()->end_time,                                
                            'CUR_DATE'      => date("Y-m-d"),                              
                            'CUR_USERNAME'  => $this->session->userdata('inv_username'),
                            'CUR_USERID'    => $this->session->userdata('inv_userid'),
                            );
      }
      
      public function load_global(){
            //Check login or redirect to logout
            if($this->session->userdata('logged_in')!=true){ redirect(base_url().'logout','refresh');    }
            $this->load_info();
      }

    //Load layout
    public function layout() {
        // making temlate and send data to view.
        $this->fronttemplate['header'] = $this->load->view('front/layout/header', $this->data, true);
        //$this->fronttemplate['sidebar']   = $this->load->view('front/layout/sidebar', $this->data, true);
        $this->fronttemplate['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->fronttemplate['footer'] = $this->load->view('front/layout/footer', $this->data, true);
        $this->load->view('front/layout/template', $this->fronttemplate);
    }

    public function admin() {
       // $this->load_admin_global();
        // making temlate and send data to view.
        $this->admintemplate['header'] = $this->load->view('admin/layout/header', $this->data, true);
        $this->admintemplate['sidebar']   = $this->load->view('admin/layout/sidebar', $this->data, true);
        $this->admintemplate['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->admintemplate['footer'] = $this->load->view('admin/layout/footer', $this->data, true);
        $this->load->view('admin/layout/template', $this->admintemplate);       
    }

    /*public function council() {
        // making temlate and send data to view.
        $this->counciltemplate['header'] = $this->load->view('council/layout/header', $this->data, true);
        $this->counciltemplate['sidebar']   = $this->load->view('council/layout/sidebar', $this->data, true);
        $this->counciltemplate['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->counciltemplate['footer'] = $this->load->view('council/layout/footer', $this->data, true);
        $this->load->view('council/layout/template', $this->counciltemplate);       
    }*/

}
