<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_admin'])) 
        {
            redirect('admin/login');
        }
        $this->load_admin_global();
        $this->load->model(array('admin/candidate_model'));
        $this->load->helper('form');
        $this->load->library('form_validation');
        //$this->load->helper('general_helper');
    }

	public function index()
    {
        $data1=$this->data;
        $data2['title'] = 'รายชื่อผู้สมัคร';
        $data2['candidates'] = $this->candidate_model->fetch_all();
        $data=array_merge($data1,$data2);
        $this->data = $data;
        $this->middle = 'admin/candidate';
        $this->admin();
    }

    public function save()
    {
        $data['title'] = 'รายชื่อผู้สมัคร';
        $save= array(
            'c_number' => $this->input->post('c_number'), 
            'pid' => $this->input->post('pid'), 
            'candidate_name'        => $this->input->post('candidate_name'),
            'department'       => $this->input->post('department'),            
        );
        $this->candidate_model->save($save);
        
        $data['candidates'] = $this->candidate_model->fetch_all();
        $this->data = $data;
        $this->middle = 'admin/candidate';
        $this->admin();
    }

    public function update()
    {
        $data['title'] = 'รายชื่อผู้สมัคร';
        $id = $this->input->post('id');
        $save= array(
            'c_number' => $this->input->post('c_number'), 
            'pid' => $this->input->post('pid'), 
            'candidate_name'        => $this->input->post('candidate_name'),
            'department'       => $this->input->post('department'),            
        );
        $this->candidate_model->update($save,$id);
        $data['candidates'] = $this->candidate_model->fetch_all();
        $this->data = $data;
        $this->middle = 'admin/candidate';
        $this->admin();
    }

    public function delete()
    {
        $data['title'] = 'รายชื่อผู้สมัคร';
        $id = $this->input->post('id');
        $this->candidate_model->delete($id);
        $data['candidates'] = $this->candidate_model->fetch_all();
        $this->data = $data;
        $this->middle = 'admin/candidate';
        $this->admin();
    }

    
    
}
