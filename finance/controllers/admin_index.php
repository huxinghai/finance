<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin_index
 *
 * @author kaka
 */
class Admin_index extends CI_Controller {
    //put your code here
    function Admin_index(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
//        
        $user = $this->session->userdata('user');
        if(!$user){ redirect("admin"); }
        
        $this->load->model('Category');
        $this->load->model('News');
        $this->load->model('UploadFile'); 
        $this->load->model('NewsImage'); 
    }
    
    function index(){
        $data["categories"] = $this->Category->get_category();
        $data["news"] = $this->News->get_news_by_category_id($data["categories"][0]->id);
        $this->load->view("admin_index",$data);
    }
    
    function get_new_by_category(){
        $category_id = $_GET["category_id"];
        $news = $this->News->get_news_by_category_id($category_id);
        echo json_encode($news);
    }
    
    function delete_upload_img(){
        $id = $_GET["id"];        
        $this->UploadFile->delete($id);  
        echo true;
    }
    
    function delete_news_imag(){
        $id = $_GET["id"];  
        echo $this->NewsImage->delete($id);
    }
    
    function delete_news(){
        $id = $_GET["id"];
        $this->News->delete($id);
        echo true;
    }
    
    function edit_news(){        
        $current_user = $this->session->userdata('user');
        
        $id = $this->input->post('id');
        $data["title"] = $this->input->post('title');
        $data["category_id"] = $this->input->post('category_id');
        $data["context"] = $this->input->post('edit_context_'.$id);
        $data["user_id"] = $current_user->id;
        $this->News->update($id, $data);
        redirect("admin_index");
    }
    
    function create_news(){
        $current_user = $this->session->userdata('user');
        $data["title"] = $this->input->post('title');
        $data["category_id"] = $this->input->post('category_id');
        $data["context"] = $this->input->post('context');
        $data["user_id"] = $current_user->id;
        $data["created_at"] = date("Y-m-d H:i:s");
        $this->News->save($data);
            
        redirect("admin_index");
    }
    
    function news_category(){
        $data["categories"] = $this->Category->get_category();        
        $this->load->view("news_category",$data);
    }
    
    function create_category(){
        $name = $this->input->post('name');
        $parent = $this->input->post('parent_type');
        $this->Category->save($name, $parent);
        redirect("admin_index/news_category");
    }
    
    function delete_category(){
        $id = $_GET["id"];
        $this->Category->delete($id);
        echo true;
    }
    
    function update_category(){
        $id = $_GET["id"];
        $name = $_GET["name"];
        $parent_type = $_GET["parent_type"];
        
        $this->Category->update($id, $name, $parent_type);
        echo true;
    }
    
    function upload_index(){           
        $this->load->view("upload_index",array("error" => ""));
    }
    
    function image_index(){
        $data["imgs"] =  $this->UploadFile->all_image(1);
        $data["news"] = $this->News->get_news();
        $data["images_news"] = $this->NewsImage->all();
        $this->load->view("image_index", $data);
    }
    
    function image_upload(){
     $config['upload_path'] = './uploads/';
     $config['allowed_types'] = 'gif|jpg|png';
     $config['file_name'] = date("YmdHis");
     $config['max_size'] = '2048';
     $config['max_width']  = '1024';
     $config['max_height']  = '768';
     
     $this->load->library('upload', $config);
     if ( ! $this->upload->do_upload()){
        $error = array('error' => $this->upload->display_errors());
        $this->load->view('upload_index', $error);
     } 
     else{
        $data = array('upload_data' => $this->upload->data());
        $updata["file_name"] = $data["upload_data"]["file_name"];
        $updata["status"] = 1;
        
        $this->UploadFile->save($updata);
        redirect("admin_index/image_index");
     }
    } 
    
    function image_news_save(){
        $data["news_id"] = $_POST["news_id"];
        $data["uploads_id"] = $_POST["uploads_id"];
        
        $this->NewsImage->save($data);
        redirect("admin_index/image_index");
    }
}

?>
