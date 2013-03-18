<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of news_image
 *
 * @author kaka
 */
class NewsImage extends CI_Model   {
    //put your code here
    function all(){
        $this->db->join("news as n","news_image.news_id=n.id","left");
        $this->db->join("uploads as u","news_image.uploads_id=u.id","left");
        $this->db->select("news_image.*, n.title, u.file_name");
        return $this->db->get("news_image")->result();
    }
    
    function save($data){
        $this->db->where(array("news_id"=> $data["news_id"]));
        $wh = $this->db->get("news_image")->result();
        if(!$wh){
            return $this->db->insert("news_image",$data);
        }
    }
    
    function delete($id){
        return $this->db->delete("news_image", array("id" => $id));
    }
}

?>
