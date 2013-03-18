<?php

class Users extends CI_Model {
    
    
    function __construct(){
        parent::__construct();
    }
    
    function get_user_by_login($login){
        $this->db->where(array("login" => $login));
        return $this->db->get("users")->result();
    }
    
}
?>