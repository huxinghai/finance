<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Home extends CI_Controller{
    
    function Home(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Category');
        $this->load->model("NewsImage");
        $this->load->model("News");
    }
    
    function index(){               
        $data = $this->News->get_category_news(); 
        $data["news_images"] = $this->NewsImage->all();          
        $this->load->view("index", $data);        
    }
    
    function team(){
        $data = $this->home_query();        
        $data["daban_news_id"] = $this->Category->get_category_by_name("大盘综述");
        $data["daban_news"] = $this->News->get_news_by_category_id_limit($data["daban_news_id"]->id, 6, 0); 
        
        $this->load->view('team', $data);
    }
    
}   

?>
