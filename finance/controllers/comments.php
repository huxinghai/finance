<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comments
 *
 * @author kaka
 */
date_default_timezone_set('Asia/Shanghai');
class Comments extends CI_Controller {
    //put your code here
    function Comments(){
         parent::__construct();
        
         $this->load->helper('url');
         $this->load->helper('form');
         $this->load->model('Category');
         $this->load->model('News');
         $this->load->model('Comment');
         $this->load->model('Reply');
         
    }
    
    function index(){
        $data = $this->News->get_header_foot();
        $data["comments"] = $this->Comment->all();
        $data["replies"] = $this->Reply->all_reply();
        
        $this->load->view("comment",$data);
    }   
    
    
    function create(){
        $data["context"] = $this->input->post("context");
        $data["name"] = $this->input->post("name");
        $data["phone"] = $this->input->post("phone");
        $data["created_at"] = date("Y-m-d H:i:s");
        $data["user_id"] = 0;
        if($data["name"]  && $data["phone"] && $data["context"]){             
             $this->Comment->save($data);
        }        
//        redirect("comments");
    }   
    
    
    private function query($my_c_id){
        if($my_c_id){
            $my_c_id = $this->News->get_news_by_category_id_first($my_c_id[0]->id,1,0);
            if($my_c_id){
                $my_c_id = $my_c_id[0]->id;
             }else{ $my_c_id = 0; }
        }else{
            $my_c_id = 0;
        }
        
        return $my_c_id;
    }
}

?>
