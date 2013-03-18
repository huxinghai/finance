<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reply
 *
 * @author kaka
 */
class Reply extends CI_Model {
    //put your code here
    function Reply(){
        parent::__construct();
    }
    
    function all($comment_id){
        $this->db->join("users as u","u.id = replies.user_id","left");
        $this->db->select(" replies.*,u.name ");
        $this->db->where(array("comment_id" => $comment_id));
        return $this->db->get("replies")->result();
    }
    
    function all_reply(){
        $this->db->join("users as u","u.id = replies.user_id","left");
        $this->db->select(" replies.*,u.name ");
        return $this->db->get("replies")->result();
    }
    
    function show($id){
        $this->db->where(array("id" => $id));
        return $this->db->get("replies")->result();
    }
    
    function save($data){
        return $this->db->insert("replies",$data);
    }
    
    function delete($id){
        return $this->db->delete("replies",array("id"=>$id));
    }
    
    function delete_by_comment($comment_id){
        return $this->db->delete("replies",array("comment_id"=>$comment_id));
    }
}

?>
