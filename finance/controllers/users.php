<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author kaka
 */
class Users extends CI_Controller {
    //put your code here
    function Users(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model("Customers","Customer");
        $this->load->model("Comment");
        
        $user = $this->session->userdata('user');
        if(!$user){ redirect("admin"); }
    }
    
    function index(){
        $data["customers"] = $this->Customer->get_customer();
        $data["comments"] = $this->Comment->get_all();
        
        $this->load->view("user",$data);

    }
}

?>
