<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
   
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function validate($pcode,$pwd){
        $this->db->where('pcode', $pcode);
        $this->db->where('password', $pwd);
        $result = $this->db->get('tbl_admin',1);
        return $result;
    }

    public function get_applicant_total(){        
        return $this->db->count_all('tbl_candidate');
    }

    public function get_election_total2(){         
        return $this->db->count_all('tbl_user');
    }

    public function get_election_total($id){ 
        $this->db->where('vote_group',$id);
        $this->db->from("tbl_user");
        return $this->db->count_all_results();        
        
    }

    public function allvote(){   

        return $this->db->count_all('tbl_vote');
    }
     public function group_vote($id){ 
        $this->db->where('group_id',$id);
        $this->db->from("tbl_vote");
        return $this->db->count_all_results();
     }

    public function unvote($id){      
        $sql = "SELECT * FROM tbl_user WHERE NOT EXISTS (SELECT * FROM tbl_vote WHERE tbl_vote.hrcode = tbl_user.hrcode) AND vote_group=".$id;
        $query = $this->db->query($sql);        
        $result = $query->num_rows(); 

        return $result;
    }

    public function novote($id){      
        $sql = "SELECT * FROM tbl_vote WHERE candidate_id =0 AND group_id=".$id;
        $query = $this->db->query($sql);        
        $result = $query->num_rows(); 

        return $result;
    }

    public function get_election_group1(){      
 
        $query = $this->db->get('vw_score11');

        return $query->result();
    }
    public function get_election_group2(){
     
        $query = $this->db->get('vw_score21');

        return $query->result();
    }

    public function get_score_group11(){
    $this->db->where('position_type',1);
     $this->db->order_by('score','DESC');
        $query = $this->db->get('tbl_score01');

        return $query->result();
    }

    public function get_score_group12(){
    $this->db->where('position_type',2);
     $this->db->order_by('score','DESC');
        $query = $this->db->get('tbl_score01');

        return $query->result();
    }
    
   
    public function get_score_group2(){
        $this->db->order_by('score','DESC');
        $query = $this->db->get('tbl_score02');

        return $query->result();
    }
    
    public function get_score_group3(){
     $this->db->order_by('score','DESC');
        $query = $this->db->get('tbl_score03');

        return $query->result();
    }

    public function get_data_t11(){
         $this->db->where('status',1);
          $this->db->where('position_type',1);
        $this->db->order_by('score','DESC'); 
        $query = $this->db->get('tbl_score01');

        return $query->result();
    }

    public function get_data_t12(){
         $this->db->where('status',1);
          $this->db->where('position_type',2);
        $this->db->order_by('score','DESC'); 
        $query = $this->db->get('tbl_score01');

        return $query->result();
    }

     public function get_data_t2(){

        $this->db->where('status',1);
        $this->db->order_by('score','DESC'); 
        $query = $this->db->get('tbl_score02');

        return $query->result();
               

    }

     public function get_data_t3(){
 $this->db->where('status',1);
        $this->db->order_by('score','DESC'); 
        $query = $this->db->get('tbl_score03');

        return $query->result();
    }

    public function get_election_process(){
       /* $this->db->select('c.id,c.c_number, c.pid, c.candidate_name,COUNT(v.hrcode) AS total');
        $this->db->from('tbl_vote_demo v');    
        $this->db->join('tbl_candidate c','v.candidate_id = c.id');
        $this->db->group_by('v.candidate_id'); 
        $this->db->order_by('COUNT(v.hrcode) DESC,c.c_number ASC');  */       
 
        $query = $this->db->get('vw_score11');

        return $query->result();
    }

    public function get_election_process11(){    
        $query = $this->db->get('vw_score11');
        return $query->result();
    }

    public function get_election_process12(){
        $query = $this->db->get('vw_score12');
        return $query->result();
    }

public function get_election_process21(){    
        $query = $this->db->get('vw_score21');
        return $query->result();
    }

    public function get_election_process22(){
        $query = $this->db->get('vw_score22');
        return $query->result();
    }

     public function get_election_process2(){
       /* $this->db->select('c.id,c.c_number, c.pid, c.candidate_name,COUNT(v.hrcode) AS total');
        $this->db->from('tbl_vote_demo v');    
        $this->db->join('tbl_candidate c','v.candidate_id = c.id');
        $this->db->group_by('v.candidate_id'); 
        $this->db->order_by('COUNT(v.hrcode) DESC,c.c_number ASC');  */       
        $this->db->order_by('c_number ASC');   
        $query = $this->db->get('vw_score');

        return $query->result();
    }

    /*public function get_election_report(){
        $this->db->select('faculty_id,faculty_name,count(id) as total');
        $this->db->from('tbl_user');
        $this->db->group_by('faculty_id');
        $this->db->group_by('faculty_name');
        $this->db->order_by('faculty_id');
        $query = $this->db->get();

        return $query->result();
    }*/

     public function get_election_report(){
        $this->db->select('u.department,u.position_level,count(u.id) as total,count(rh.hrcode) as total2');
        $this->db->from('tbl_user u');
        $this->db->join('tbl_vote rh','rh.hrcode = u.hrcode','left');
        $this->db->group_by('u.position_level');
        $this->db->group_by('u.department');
        $this->db->order_by('u.department');
        $query = $this->db->get();

        return $query->result();
    }

     public function get_current_election_report(){
        $this->db->select('u.department, u.position_level, COUNT(u.id) as total');
        $this->db->from('tbl_user u');    
        $this->db->join('tbl_vote v','u.hrcode = v.hrcode');
        //$this->db->group_by('u.faculty_id');
        $this->db->group_by('u.department');
        $this->db->order_by('u.department');    
        
        $query = $this->db->get();

        return $query->result();
     }

    public function get_election_score11(){
       /* $this->db->select('c.id,c.c_number, c.pid, c.fullname, COUNT(v.hrcode) AS total');
        $this->db->from('tbl_vote v');    
        $this->db->join('tbl_candidate c','v.candidate_id = c.id');
        $this->db->group_by('v.candidate_id');        
        $this->db->order_by('c.c_number'); */   
        
        $query = $this->db->get('vw_score11');

        return $query->result();
    }

    public function get_election_score12(){
      /*  $this->db->select('c.id,c.c_number, c.pid, c.fullname, COUNT(v.hrcode) AS total');
        $this->db->from('tbl_vote v');    
        $this->db->join('tbl_candidate c','v.candidate_id = c.id');
        $this->db->group_by('v.candidate_id');        
        $this->db->order_by('c.c_number'); */   
        
        $query = $this->db->get('vw_score12');

        return $query->result();
    }

    public function get_election_score21(){
      /*  $this->db->select('c.id,c.c_number, c.pid, c.fullname, COUNT(v.hrcode) AS total');
        $this->db->from('tbl_vote v');    
        $this->db->join('tbl_candidate c','v.candidate_id = c.id');
        $this->db->group_by('v.candidate_id');        
        $this->db->order_by('COUNT(v.hrcode) DESC'); */   
        
        $query = $this->db->get('vw_score21');

        return $query->result();
    }

     public function get_election_score22(){
       /* $this->db->select('c.id,c.c_number, c.pid, c.fullname, COUNT(v.hrcode) AS total');
        $this->db->from('tbl_vote v');    
        $this->db->join('tbl_candidate c','v.candidate_id = c.id');
        $this->db->group_by('v.candidate_id');        
        $this->db->order_by('COUNT(v.hrcode) DESC');  */  
        
        $query = $this->db->get('vw_score22');

        return $query->result();
    }

    public function user_admin_exists($userid){
        $this->db->where('pcode', $userid);        
        $query = $this->db->get('tbl_admin');
        if($query->num_rows() > 0 ){ 
            return TRUE; 
        } else { 
            return FALSE; 
        }
    }

    public function get_profile($pcode)
    {
        $this->db->where('pcode', $pcode);
        $query =$this->db->get('tbl_admin');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }  
    }

    function fetch_chart_data($vgroup)
     {
        $this->db->select('c.id,c.c_number,COUNT(v.hrcode) AS total');
        $this->db->from('tbl_vote v');    
        $this->db->join('tbl_candidate c','v.candidate_id = c.id');
        $this->db->where('v.vote_group',$vgroup); 
        $this->db->group_by('v.candidate_id');        
        $this->db->order_by('c.c_number');    
        
        $query = $this->db->get();

        return $query;

      /*$this->db->where('year', $year);
      $this->db->order_by('year', 'ASC');
      return $this->db->get('chart_data');*/
     }

     public function get_alluser(){     
        $query = $this->db->order_by('n_order','ASC')->get("tbl_user");
        return $query->result();
 
     }

     public function card_exists($cardid,$pcode){
        $this->db->where('card_id', $cardid);
        $this->db->where('pcode', $pcode);         
        $query = $this->db->get('tbl_admin');
        if($query->num_rows() > 0 ){ 
            return TRUE; 
        } else { 
            return FALSE; 
        }
    }

    public function set_process(){
        $data = array(
            'exec_process' => '1',
        );
        $this->db->where('id', 1);
        $this->db->update('sitesettings', $data);
    }

    public function vote_list(){
       $query = $this->db->get('vw_vote');

        return $query->result();
    }

}
