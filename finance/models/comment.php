<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comment
 *
 * @author kaka
 */
class Comment extends CI_Model {
    //put your code here
    
    function Comment(){
        parent::__construct();
    }
    
    function save($data){      
        return $this->db->insert("comments",$data);
    }
    
    function get_all(){
        $this->db->order_by("created_at desc");
        return $this->db->get("comments")->result();
    }
    
    function all(){
        $this->db->order_by("created_at desc");
        return $this->db->get("comments",5,0)->result();
    }
    
    function show($id){
        $this->db->where(array("id" =>$id));
        return $this->db->get("comments")->result();
    }
    
    function delete($id){
        return $this->db->delete("comments",array("id" => $id));
    }
}

?>
