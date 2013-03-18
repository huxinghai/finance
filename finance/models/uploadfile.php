<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of upload_file
 *
 * @author kaka
 */
class UploadFile extends CI_Model {
    
    function UploadFile(){
        parent::__construct();
        $this->load->helper('url');
    }
    
    function save($data){
        return $this->db->insert("uploads",$data);
    }
    
    function get_id($id){
        $this->db->where(array("id" => $id));
        return $this->db->get("uploads")->result();
    }
    
    function all_image($status){
       $this->db->where(array("status"=>$status)); 
       return $this->db->get("uploads")->result();
    }
    
    function delete($id){
        $file = $this->get_id($id);      
        unlink("uploads/".$file[0]->file_name);
        return $this->db->delete("uploads",array("id" => $id));
    }
}

?>
