<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category
 *
 * @author kaka
 */
class Categories extends CI_Controller {
    //put your code here
    
    function Categories(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Category');
        $this->load->model('News');        
    }
    
    function show(){
        $id = $_GET["id"];  
        
        $data = $this->News->get_header_foot();
        $data["category"] = $this->Category->show($id);        
        $data["news"] = $this->News->get_news_by_category_id($id);
        $this->load->view("categories",$data);        
    }
}

?>
