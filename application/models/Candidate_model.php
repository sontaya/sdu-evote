<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

     function fetch_all()
     {
         $query = $this->db->get("tbl_candidate");
        return $query->result();
     }

     public function get_candidate_by_group($group_id){
         $this->db->where('event_id', $group_id);
         $query = $this->db->get('tbl_candidate');
         return $query->result();
     }


     public function get_candidate_by_event($id){
         $this->db->where('event_id', $id);
         $query = $this->db->get('tbl_candidate');
         return $query->result();
     }
}