<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of news
 *
 * @author kaka
 */
class News extends CI_Model {
    //put your code here
    
    function News(){
        parent::__construct();
        $this->load->model("Category");
    }
    
    function get_category_news(){
        $data["day_id"] = $this->Category->get_category_by_name("每日金股");        
        $day_stock = $this->get_news_by_category_id_limit($data["day_id"]->id, 15, 0);
        $data["day_stock_first"] = array_shift($day_stock);
        $data["day_stock"] = $this->format($day_stock);
        
        $data["tread_id"] = $this->Category->get_category_by_name("行业");
        $data["tread_news"] = $this->get_news_by_category_id_limit($data["tread_id"]->id, 11, 0);        
        
        $data["day_news_id"] = $this->Category->get_category_by_name("要闻");
        $data["day_news"] = $this->get_news_by_category_id_limit($data["day_news_id"]->id, 11, 0); 
        
        $data["watch_news_id"] = $this->Category->get_category_by_name("盘中直击");
        $data["watch_news"] = $this->get_news_by_category_id_limit($data["watch_news_id"]->id, 11, 0);   
        
        $my_server_id = $this->Category->get_category_by_name("我们的服务");
        $data["my_server_id"] = $this->get_new_id($my_server_id);        
        
        $my_use_id = $this->Category->get_category_by_name("我们的优势");
        $data["my_use_id"] = $this->get_new_id($my_use_id);
        
        $header_foot = $this->get_header_foot();
        $data = $data + $header_foot;
        return $data;
    }
    
    function get_header_foot(){
        $data = $this->Category->get_show();
        
        $data["daban_news_id"] = $this->Category->get_category_by_name("大盘综述");
        $data["daban_news"] = $this->get_news_by_category_id_limit($data["daban_news_id"]->id, 6, 0);
        
        $nx_id = $this->Category->get_category_by_name("联系我们");
        $data["nx_id"] = $this->get_new_id($nx_id); 
        
        $gy_id = $this->Category->get_category_by_name("关于我们");
        $data["gy_id"] = $this->get_new_id($gy_id);

        $kh_id = $this->Category->get_category_by_name("公司证书");
        $data["kh_id"] = $this->get_new_id($kh_id);; 

        $zs_id = $this->Category->get_category_by_name("招商加盟");
        $data["zs_id"] = $this->get_new_id($zs_id); 

        $fl_id = $this->Category->get_category_by_name("法律声明");
        $data["fl_id"] = $this->get_new_id($fl_id);
        
        return $data;
    }   
    
    
    function get_news_by_category_id($category_id){
        $this->db->join("users u","news.user_id=u.id","left");
        $this->db->join("category c","news.category_id=c.id","left");
        $this->db->select("news.*, u.name as user_name, c.name as category_name");    
        $this->db->order_by("news.created_at desc");
        $this->db->where(array("news.category_id"=>$category_id));
        return $this->db->get("news")->result();
    }
    
    function get_news_by_category_id_limit($category_id, $end, $start){
        $this->db->join("users u","news.user_id=u.id","left");
        $this->db->join("category c","news.category_id=c.id","left");
        $this->db->select("news.*, u.name as user_name, c.name as category_name");    
        $this->db->order_by("news.created_at desc");
        $this->db->where(array("news.category_id"=>$category_id));
        $result = $this->db->get("news", $end, $start)->result();
        return $result;
    }
    
//    function get_news_by_category_id_first($category_id, $end, $start){
//        $this->db->where(array("category_id"=>$category_id));
//        $this->db->order_by("created_at desc");
//        return $this->db->get("news",$end,$start)->result();
//    }
    
    function update_ctr($id,$ctr){
        $this->db->where(array("id"=>$id));
        $this->db->update("news",array("ctr"=>$ctr));
    }
    
    function get_news_by_title($title){
        $this->db->where(array("title"=>$title));
        return $this->db->get("news")->result();
    }
    
    function show($id){
       $this->db->where(array("news.id" => $id));
//       $this->db->join("users u","news.user_id=u.id","left");
//       $this->db->join("category c","news.category_id=c.id","left");
//       $this->db->select("news.*, u.name as user_name, c.name as category_name");    
//       $this->db->order_by("news.created_at desc");
       return  $this->db->get("news")->result();
    }
    
    function get_news(){       
       $this->db->join("users u","news.user_id=u.id","left");
       $this->db->join("category c","news.category_id=c.id","left");
       $this->db->select("news.*, u.name as user_name, c.name as category_name");    
       $this->db->order_by("news.created_at desc");       
       return  $this->db->get("news")->result();
    }
    
    function delete($id){
        $this->db->delete("news",array("id"=>$id));
    }
    
    function update($id, $data){
        $this->db->where(array("id"=>$id));
        $this->db->update("news",$data);
    }
    
    function save($data){
        $title = $data["title"];
        $this->db->where(array("title"=>$title));
        $new = $this->db->get("news")->result();
        if(!$new){
            $this->db->insert("news",$data);
        }
    }
    
    private function format($day_stock){
        $c_day_stock = array();        
        $incor = array();
        $count = count($day_stock);
        foreach($day_stock as $ds){
            array_push($incor, $ds);
            if(count($incor) >= 2 || $day_stock[$count-1]->id == $ds->id ){
                array_push($c_day_stock, $incor);
                $incor = array();
            }            
        }
        return $c_day_stock;
    }
    
   private function get_new_id($my_c_id){
        if($my_c_id){            
            $my_c_id = $this->get_news_by_category_id_limit($my_c_id->id, 1, 0);
            if($my_c_id){
                $my_c_id = $my_c_id[0]->id;
             }else{ $my_c_id = 0; }
        }else{
            $my_c_id = 0;
        }
        
        return $my_c_id;
    }
}

?>
