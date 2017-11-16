<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    
    public function _construct() {

		parent::_construct();
		
	
	}


        public function index(){
        
           $data['title'] = "Astrid Technologies | Resume Management";
           $this->load->view('include/header',$data);
           $this->load->view('login/index',$data);
           $this->load->view('include/footer');
          
           
         }
       
         public function login() {
               $this->authenticate->is_guest();
            
               $error = null;
       
               if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                   $email_address = $_POST['email_address'];
                   $password = $_POST['password'];
       
                   if ($this->user->authenticate_user($email_address, $password)) {
                       return redirect('/');
                   }
                   
                   $error = 'Invalid login credentials';
               }
               return $this->load->view('login/index', ['error' => $error]);
           }
       
}