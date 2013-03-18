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
class Category extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function get_category(){
        $this->db->order_by("parent_type");
        return $this->db->get('category')->result();
    }
    
    function show($id){
        $this->db->where(array("id"=>$id));
        return $this->db->get('category')->result();
    }
    
    function get_parent_type_category($parent_type, $start, $limit){        
        $this->db->where(array('parent_type'=>$parent_type));
        $temp = $this->db->get('category',$start,$limit)->result();
        return $temp;
    }
    
    function get_show(){
        $data["stock_categories"] = $this->get_parent_type_category("股票",16,0);
        $data["characteristic_categories"] = $this->get_parent_type_category("特色",6,0);
        $data["finance_categories"] = $this->get_parent_type_category("财经",8,0);
        
        $data["day_one_stock_id"] = $this->get_category_by_name("每周一股");
        $data["h_m_id"] = $this->get_category_by_name("大黑马");
        $data["j_d_id"] = $this->get_category_by_name("经典战绩");
        $data["g_s_id"] = $this->get_category_by_name("实盘问答");
        
        return $data;
    }
    
    function get_category_by_name($name){              
        $this->db->where(array("name" => $name));          
        $results = $this->db->get('category')->result();
        if(count($results) > 0){
            return $results[0];
        }else{
            return $results;
        }        
    }
    
    function delete($id){
        $wh = array("id" => $id);
        $this->db->delete("category", $wh);
    }
    
    function save($name, $parent_type){
        $wh = array('name' => $name,'parent_type'=> $parent_type);
        $this->db->where($wh);
        $category = $this->db->get("category")->result();        
        if(!$category){
           $this->db->insert('category', $wh); 
        }       
        
    }
    
    function update($id, $name, $parent_type){
        $this->db->update("category",array("name"=>$name,'parent_type'=>$parent_type), array("id" => $id));
    }
    
}

?>
