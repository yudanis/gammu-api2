<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Outbox extends CI_Model{
    private $table = "outbox";
    public function GetAll(){
        $role = $this->session->userdata('role'); 
        $id = $this->session->userdata('id'); 
        if($role == 'admin')
            $data = $this->db->query("SELECT * FROM ".$this->table);
        else
            $data = $this->db->query("SELECT * FROM ".$this->table." WHERE CreatorID = '".$id."'");
            
        return $data->result_array();
    }
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
}
?>