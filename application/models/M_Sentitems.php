<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sentitems extends CI_Model{
    private $table = "sentitems";
    public function GetAll($condition,$limit, $offset){
       
        $query = $this->db->get_where($this->table, $condition,$limit, $offset);
           
        return $query->result_array();
  
    }
}
?>