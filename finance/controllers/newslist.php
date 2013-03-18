<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of news_list
 *
 * @author kaka
 */
class NewsList extends CI_Controller {
    //put your code here
    function NewsList(){
        parent::__construct();
         $this->load->helper('url');
         $this->load->model('Category');
         $this->load->model('News');
    }
    
    function show(){
        $id = $_GET["id"];  
        $data = $this->check_new($id);      
        $this->load->view("news",$data);
    }
    
    function other(){
        $id = $_GET["id"];  
        $data = $this->check_new($id);
        $this->load->view("other",$data);
    }
    
    private function check_new($id){
        $data = $this->News->get_header_foot();
        $data["new"] = $this->News->show($id);
        if($data["new"]){
           $this->News->update_ctr($id, $data["new"][0]->ctr+1); 
           $data["category"] = $this->Category->show($data["new"][0]->category_id); 
        } 
        return $data;
    }
}

?>
