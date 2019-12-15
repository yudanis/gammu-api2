<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Inbox extends CI_Model{
    private $table = "inbox";
    public function GetAll($recipientIDs,$limit, $offset){
        $this->db->where_in('RecipientID', $recipientIDs);
        $query = $this->db->get($this->table);
           
        return $query->result_array();
  
    }
}
?>