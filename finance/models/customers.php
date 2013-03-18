<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customer
 *
 * @author kaka
 */
class Customers extends CI_Model {
     function Customers(){
         parent::__construct();
     }
     
     function get_customer(){
         $this->db->order_by("created_at desc");
         return $this->db->get("customer")->result();
     }
     
     function get_customer_phone($phone){
         $this->db->where(array("phone" => $phone));
         return $this->db->get("customer")->result();
     }
     
     function save($data){
         $this->db->insert("customer", $data);
     }   
     
     function delete($id){
         $this->db->delete("customer",array("id"=>$id));
     }
    
}

?>
