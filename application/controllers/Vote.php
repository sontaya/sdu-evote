<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['logged_in'])) 
        {
            $this->session->set_userdata("referrer", current_url());
            redirect('login');
        }
       
        $this->load->model(array('candidate_model','vote_model','user_model','event_model'));
        $this->load->helper('general');
        $this->load->helper('file');
        $this->load->library('user_agent');
    }

	public function index()
	{
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต'; 

        $data['mymac'] = GetClientMac();

        $this->data = $data;
        $this->middle = 'front/home';
        $this->layout();		
    }
    
    public function view($id)
    {
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต'; 
        $data['candidates'] = $this->candidate_model->get_candidate_by_event($id);  
        
        if(empty($data['candidates'])){
          redirect('login/signout');  
        }

        $data['events'] = $this->event_model->get_event_by_id($id);
        $data['title'] = $data['events']->event_name;
        $data['ccolor'] = $data['events']->ccolor;
        $data['selected'] = $data['events']->selected;
        $this->data = $data;
        $this->middle = 'front/vote_view';
        $this->layout();        
    }

    public function start_in1()
    {
        if($this->session->userdata['logged_in']==true && $this->session->userdata['vote_group']=="1"){
        $data['title'] = 'SDU Election 2022';
        
        $this->data = $data;
        $this->middle = 'front/start_in1';
        $this->layout();  
         }else{
            redirect('login');
        }      
    }

    public function start_in2()
    {
         if($this->session->userdata['logged_in']==true && $this->session->userdata['vote_group']=="2"){
        $data['title'] = 'SDU Election 2022';
        
        $this->data = $data;
        $this->middle = 'front/start_in2';
        $this->layout();  
         }else{
            redirect('login');
        }      
    }

    public function vote11()
    {
        if($this->session->userdata['logged_in']==true && $this->session->userdata['vote_group']=="1"){
        $data['title'] = 'SDU Election 2022';       
        $data['candidate1'] = $this->candidate_model->get_candidate_by_event(1);
        $data['candidate2'] = $this->candidate_model->get_candidate_by_event(2);
        $this->data = $data;
        $this->middle = 'front/vote/vote_ref11';
        $this->layout();
        }else{
            redirect('login');
        }
    }

    public function vote12()
    {
        if($this->session->userdata['logged_in']==true && $this->session->userdata['vote_group']=="1"){
        $data['title'] = 'SDU Election 2022';       
        $data['candidate1'] = $this->candidate_model->get_candidate_by_event(1);
        $data['candidate2'] = $this->candidate_model->get_candidate_by_event(2);
        $this->data = $data;
        $this->middle = 'front/vote/vote_ref12';
        $this->layout();
        }else{
            redirect('login');
        }
    }

    public function vote21()
    {
        if($this->session->userdata['logged_in']==true && $this->session->userdata['vote_group']=="2"){
        $data['title'] = 'SDU Election 2022';       
        $data['candidate1'] = $this->candidate_model->get_candidate_by_event(1);
        $data['candidate3'] = $this->candidate_model->get_candidate_by_event(3);
        $this->data = $data;
        $this->middle = 'front/vote/vote_ref21';
        $this->layout();
        }else{
            redirect('login');
        }
    }

    public function vote22()
    {
        if($this->session->userdata['logged_in']==true && $this->session->userdata['vote_group']=="2"){
        $data['title'] = 'SDU Election 2022';       
        $data['candidate1'] = $this->candidate_model->get_candidate_by_event(1);
        $data['candidate3'] = $this->candidate_model->get_candidate_by_event(3);
        $this->data = $data;
        $this->middle = 'front/vote/vote_ref22';
        $this->layout();
        }else{
            redirect('login');
        }
    }

     /*public function vote_in()
    {
        if($this->session->userdata['logged_in']==true && isset($this->session->userdata['vote_group'])){
        $data['title'] = 'SDU Election 2022';       
        $data['cangp'] = $this->candidate_model->get_candidate_by_group($this->session->userdata['vote_group']);
        $this->data = $data;
        $this->middle = 'front/view_in';
        $this->layout();
        }else{
            redirect('login');
        }
    }*/

    /*public function vote_in()
    {
        if($this->session->userdata['logged_in']==true && isset($this->session->userdata['vote_group'])){
        $data['title'] = 'SDU Election 2022';       
        $data['cangp'] = $this->candidate_model->get_candidate_by_group($this->session->userdata['vote_group']);
        $this->data = $data;
        $this->middle = 'front/view_in';
        $this->layout();
        }else{
            redirect('login');
        }
    }*/

    public function candidate()
    {
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต';

        $data['candidates'] = $this->candidate_model->fetch_all();    

        $this->data = $data;
        $this->middle = 'front/candidate';
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

    public function vote()
    {
        $data['title'] = 'มหาวิทยาลัยสวนดุสิต';

       $data['candidates'] = $this->candidate_model->fetch_all();        

        $this->data = $data;
        $this->middle = 'front/vote';
        $this->layout();       
    }

 public function add_vote()
    {
        if($this->input->post('checkbox_value'))
        {
            $pizza = $this->input->post('checkbox_value');
            $refid = $this->input->post('refid'); 
            $hrcode = $this->input->post('hrcode');           
            //$vdata = $this->input->post('v_data');
            //$vcount = $this->input->post('v_count');
            $ip =$this->input->ip_address();

             $xdata =array(
                'user_id' =>$refid, 
                'pcode' =>$hrcode,             
                'ip_address' =>$ip ,
                'device' => $this->agent->platform(),
                'browser' => $this->agent->browser() . ' - ' .$this->agent->version(),                   
                'created_at' => date('Y-m-d H:i:s'),
            );

            $results = $this->vote_model->checkDuplicatevote($refid);
            if ($results === TRUE) {
                 echo false;
            }else{
                    $idx = $this->vote_model->insert_vote($xdata);
                    if($idx){
                        for($i = 0; $i < count($pizza); $i++)
                        {
                            $pieces = explode(":", $pizza[$i]);
                            $data =array(                                
                                'user_id' =>$refid, 
                                'pcode' =>$hrcode,
                                'candidate_id' =>$pieces[0],
                                'event_id' => $pieces[1],
                                'a_num' => $pizza[$i],                      
                                'c_num' => get_candidate_number($pieces[0]),                            
                                'created_at' => date('Y-m-d H:i:s'),
                            );
                           $this->vote_model->insert_vote_detail($data); 
                         $this->write_logs($refid,$hrcode,$pizza[$i],get_candidate_number($pieces[0]),$pieces[1]);
                        } 
                   
                    }else{
                        echo false; 
                     //sendmail($this->session->userdata['email'],$this->session->userdata['fullname']);
                    }
                    echo true; 
            }

        }
    }

    public function user_exists() {
        if ($this->user_model->user_exists($this->input->post('card_id')) == TRUE) {
            //echo json_encode(FALSE);
            return FALSE;
        } else {
            return TRUE;
            //echo json_encode(TRUE);
        }
    }

    public function card_exists() {
        $cardid =$this->input->post('cardid');
        //$hrcode =$this->input->post('hrcode');
        $hrcode = $this->session->userdata['hrcode'];
  
        if ($this->user_model->card_exists($cardid,$hrcode) == TRUE) {
           $data = array("status" => "ok", "message"=> "Sucess");            
            echo json_encode($data);
            //return FALSE;
        } else {
            $data = array("status" => "error", "message"=> "Not Found.");           
            echo json_encode($data);
             //return TRUE;
        }        
    }

    public function success() {
        //clear session data        
        foreach (array_keys($this->session->userdata) as $key) {   $this->session->unset_userdata($key); }
        $this->session->sess_destroy();
        //redirect
        $data['title'] = 'SDU Election 2022';

        $this->data = $data;
        $this->middle = 'front/success';
        $this->layout();

        //$this->load->view('front/success');
    }

    function check_session(){
        echo isset($this->session->userdata['logged_in']);   
    }

    public function write_logs($refid,$pcode,$a_num,$c_num,$vgroup){

        $data = date('Y-m-d H:i:s') .','.$refid .','.$pcode.','.$a_num.','.$c_num.','.$vgroup."\r\n";
        $todate=date("Y-m-d");       

        $file_path = FCPATH . "/logs/log_".$todate.".txt";
        if(file_exists($file_path))
        {
            write_file($file_path,$data , 'a+');
        }
        else
        {
            write_file($file_path,$data,'wb');
        }       

    }

}
