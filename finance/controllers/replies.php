<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of replies
 *
 * @author kaka
 */
class Replies extends CI_Controller {
    //put your code here
    function Replies(){
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model("Comment");
        $this->load->model("Reply");
        $user = $this->session->userdata('user');
        if(!$user){ redirect("admin"); }
    }
    
    function show(){
        $id = $_GET["id"];
        $data["comment"] = $this->Comment->show($id);
        $data["replies"] = $this->Reply->all($id);
        
        $this->load->view("show_comment",$data);
    }
    
    function create(){
        $data["rep_context"] = $this->input->post("rep_context");
        $data["comment_id"] = $this->input->post("comment_id");
        $user = $this->session->userdata('user');
        $data["user_id"] = $user->id;
        $data["created_at"] = date("Y-m-d H:i:s");
        
        $this->Reply->save($data);
        redirect("replies/show?id=".$data["comment_id"]);
    }
    
    function delete(){
        $id = $this->input->get("id");
        $data = $this->Reply->show($id);
        if(count($data)>0){
            $this->Reply->delete($id);
            redirect("replies/show?id=".$data[0]->comment_id);
        }        
    }
    
    function delete_comments(){
        $id = $this->input->get("id");
        $this->Comment->delete($id);
        $this->Reply->delete_by_comment($id);
        redirect("users");
    }
}

?>
