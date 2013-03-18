<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin extends CI_Controller{
    
    function Admin(){
        parent::__construct();
        $this->load->helper('url');         
        $this->load->helper('form');
        $this->load->model('Users');
        $this->load->model('Category');
        $this->load->model('News');
        $method = $this->uri->rsegment(2);        
        if($method != 'logout'){
            $user = $this->session->userdata("user");
            if($user) redirect("admin_index");
        }

    }
    
    function logout(){
         $this->session->sess_destroy();
         redirect("admin");
    }


    function index(){
//        echo md5("fdsafdsa");
        
        $data = $this->News->get_header_foot();   
       if(isset($_GET['error'])){
           $data['error'] = $_GET['error'];
       }else{
           $data['error'] = "";
       }          
         
       $this->load->view('login', $data);
    }
    
    function login(){
        $data = $this->News->get_header_foot();
       $dt['login'] = $this->input->post('login');
       $dt['password'] = md5($this->input->post('password'));
       
       if($dt['login'] && $dt['password']){
            $user = $this->Users->get_user_by_login($dt['login']);            
            if($user){   
               $user = $user[0];
               if($user->password == $dt['password']){
                    $this->session->set_userdata('user',$user);
                    redirect(site_url("admin_index"));
                    return;
               }else{
                   $data['error'] = "用户或者密码无效!";                   
               }
               
            }else{
                $data['error'] = "用户或者密码无效!";
            }
       }else{
           $data['error'] = "用户与密码不能为空!";
       }
//       $this->load->view('login',$data);   
        redirect(site_url("admin?error=".$data['error']));
    }
    
    private function query($my_c_id){
        if($my_c_id){
            $my_c_id = $this->News->get_news_by_category_id_first($my_c_id[0]->id,1,0);
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
