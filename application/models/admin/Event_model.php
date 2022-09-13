<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event_model extends CI_Model
{
    public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_event($id=null)
    {
        if($id){
            $this->db->where('id',$id);
            $this->db->order_by('id', 'ASC');
            $query = $this->db->get("tbl_event");
            return $query->result();
        }else{
            $query = $this->db->order_by('id', 'ASC')->get("tbl_event");
            return $query->result();
        }
        
    }

    public function save($data){
       if ($this->db->insert("tbl_event", $data)) { 
            return true; 
        } 
    }
 
    public function update($data, $id)
    {
        $this->db->set($data); 
        $this->db->where("id", $id); 
        $this->db->update("tbl_event", $data);        
    }
 
    public function delete($id)
    {
        if ($this->db->delete("tbl_event", "id = ".$id)) { 
            return true; 
        } 
    } 

    public function get_candidate_by_group($group_id){
        $this->db->where('group_id', $group_id);
        $query = $this->db->get('tbl_event');
        return $query->result();
    }
}
