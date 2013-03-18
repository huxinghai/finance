<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of products
 *
 * @author kaka
 */
class products extends CI_Controller {
    //put your code here
    
    function products() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
    }
    
    function index(){
        $this->load->view("products");
    }
    
    function description(){
        $this->load->view("product_desc");
    }
    
    function setup(){
        $this->load->view("product_setup");
    }
    
    function character(){
        $this->load->view("product_character");
    }
    
    function funcational(){
        $this->load->view("product_function");
    }
    
    function version(){
        $this->load->view("product_version");
    }
    
    function remittance(){
        $this->load->view("product_remittance");
    }
}




?>
