<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of captcha
 *
 * @author kaka
 */
class Captchat extends CI_Model {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper('captcha');
    }
    
    function save($data){
        return $this->db->insert("captcha", $data);
    }
}

?>
