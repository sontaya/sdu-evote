<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

   /* function fetch_candidate_all()
    {
        $query = $this->db->order_by('c_number','ASC')->get("tbl_candidate");
        return $query->result();
    }*/

     public function insert_vote($data){
        $this->db->insert('tbl_vote', $data);
        //$insert_id = $this->db->insert_id();
        //return  $insert_id;
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_vote_detail($data){
        $this->db->insert('tbl_vote_detail', $data);
       
       if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkDuplicatevote($hrcode) {

        $this->db->where('user_id', $hrcode);
        $query = $this->db->get('tbl_vote');

        if ($query->num_rows() > 0) {
            return TRUE;
        }
        
        return FALSE;
    }

    public function check_exists_vote($id){        
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_vote');
        if ($query->num_rows() > 0){
            return true;
        } else {
            return false; 
        }
    }

    function vote_logging($data){
        $this->db->insert('tbl_logs', $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
        /*if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }*/
    }

    public function update_score($id)
    {        
        $this->db->set("score", "score+1", FALSE);
        $this->db->where("id", $id);
        $this->db->update("tbl_candidate");
    }

    public function write_logs($pcode,$hrcode,$ck1,$ck2,$vote_group){

        $data = $pcode.','.$hrcode.','.$ck1.','.$ck2.','.$vote_group.','.date('Y-m-d H:i:s')."\r\n";
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