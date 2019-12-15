<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Inbox extends CI_Model{
    private $table = "inbox";
    public function GetAll($recipientIDs,$limit, $offset){
        if(sizeof($recipientIDs) > 0)
            $this->db->where_in('RecipientID', $recipientIDs);
        
        $this->db->where('status', 0);
        $query = $this->db->get($this->table);
           
        return $query->result_array();
  
    }
}
?>