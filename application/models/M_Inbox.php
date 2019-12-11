<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Inbox extends CI_Model{
    private $table = "inbox";
    public function GetAll(){
        $data = $this->db->query("SELECT * FROM ".$this->table." WHERE status = 0");
        return $data->result_array();
    }
}
?>