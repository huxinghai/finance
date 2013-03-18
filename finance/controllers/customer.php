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
class Customer extends CI_Controller {
    
    function Customer(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model("Customers","Customer");
        $method = $this->uri->rsegment(2);
        if($method !=="create"){
            $user = $this->session->userdata('user');
            if(!$user){ redirect("admin"); }
        }
    }
    
    function create(){     
        $data["phone"] = $this->input->post("phone");
        $data["ip_address"] = $this->input->ip_address();
        $data["created_at"] = date("Y-m-d H:i:s");
        $data["city"] = "null";
        
        $this->Customer->save($data);        
        echo true;
    }
    
    function delete(){
        $id = $_GET["id"];
        $this->Customer->delete($id);
        echo true;
    }
}

?>
