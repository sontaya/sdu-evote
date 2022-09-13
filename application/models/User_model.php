<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
   
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function add_log($data){
        $this->db->insert('tbl_logs', $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
        /*if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }*/
    }

    // Function to Delete selected record from table
    public function delete_record($id){
        $this->db->where('id', $id);
        $this->db->delete('tbl_user');

    }

    // Function to update record in table
    public function update_record($data, $id){
        $this->db->where('id_student', $id);
        if( $this->db->update('online_student',$data)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_profile($hrcode)
    {
        $this->db->where('hrcode', $hrcode);
        $query =$this->db->get('tbl_user');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }  
    }

    public function get_profile_by_card_id($card_id)
    {
        $this->db->where('card_id', $card_id);
        $query =$this->db->get('tbl_user');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }  
    }
    // check user login
    public function check_user($hrcode,$card_id){
        $this->db->where('hrcode', $hrcode);
        $this->db->where('card_id', $card_id);        
        $query = $this->db->count_all_results('tbl_user');
        
        return $query;       
    }
    
    public function get_vote_status($refcode){
        $this->db->where('user_id', $refcode);
        $query = $this->db->get('tbl_vote');
        if($query->num_rows() > 0 ){ 
            return TRUE; 
        } else { 
            return FALSE; 
        }
    }

    public function card_exists($cardid,$hrcode){
        $this->db->where('card_id', $cardid);
        $this->db->where('hrcode', $hrcode);         
        $query = $this->db->get('tbl_user');
        if($query->num_rows() > 0 ){ 
            return TRUE; 
        } else { 
            return FALSE; 
        }
    }

    /*public function get_vote_status($userid){
        $this->db->where('pcode', $userid);
        //$this->db->where('created_at', $adate);
        $query = $this->db->get('tbl_user');
        if($query->row()->status == 1 ){ 
            return TRUE; 
        } else { 
            return FALSE; 
        }
        $query = $this->db->get();
        $ret = $query->row();
        return $ret->campaign_id; 
    }*/

    public function user_exists($hrcode){
        $this->db->where('hrcode', $hrcode);
        //$this->db->where('created_at', $adate);
        $query = $this->db->get('tbl_user');
        if($query->num_rows() > 0 ){ 
            return TRUE; 
        } else { 
            return FALSE; 
        }
    }

    public function hr_exists($hrcode){
        $this->db->where('hrcode', $hrcode);
        $query = $this->db->get('tbl_user');
        if($query->num_rows() > 0 ){ 
            return TRUE; 
        } else { 
            return FALSE; 
        }
    }



    // Get Single list
    public function get_user_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    
    public function change_status($data)
    {
        $this->db->where('id', $data['id']);
        unset($data['id']);
        $this->db->update('tbl_user', $data);
    }
      
    public function get_setting_value($id)
    {
       $this->db->select('key_value');
        $this->db->from('setting');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result()[0]->key_value;
        } else {
            return false;
        }
    }
    
    public function update_duration_data($data)
    {
        //$this->db->trans_start();
        $this->db->where('id', $data['id']);
        unset($data['id']);
        $this->db->update('tbl_user', $data);
        //$this->db->trans_complete();
       
    }

}
