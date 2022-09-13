<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

     function fetch_all()
     {
        $this->db->where('status', '1');
        $query = $this->db->get("tbl_event");
        return $query->result();
     }

    public function get_event_by_id($id){
         $query = $this->db->get_where('tbl_event',array('id'=>$id));
         if($query->num_rows()>0){
            return $query->row();
         }
         
    }

    public function get_event_by_group($group_id){
        $this->db->where('status', '1');
        $this->db->where('gid', $group_id);
        $query = $this->db->get("tbl_event");
        return $query->result();
    }
}