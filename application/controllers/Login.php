<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    
  }

  
  public function index(){
 
    $data['title'] = "Astrid Technologies | Resume Management";
    $this->load->view('include/header',$data);
    $this->load->view('login/index',$data);
    $this->load->view('include/footer');
   
    
  }

  public function auth() {
		$this->load->helper('encryption');
		if($this->form_validation->run('login_validate') == FALSE) {
			echo json_encode(validation_errors());
	} else {
			$email = clean_data($this->input->post('email'));
			$password = clean_data($this->input->post('password'));
			
			$where = array('email'=>$email);
			$get_user = $this->Resume_model->fetch_tag_row('*','users',$where);

			if(!$get_user == NULL) {
					$user_where = ['user_id' => $get_user->id];
					$get_user_detail = $this->Resume_model->fetch_tag_row('*','user_details',$user_where);
					
					$check_password = $get_user->password;
					
					if(password_verify($password,$check_password)) {

							if($get_user_detail->status == 1) {
									$user_session = [
											'id'        => $get_user->id,
											'email'     => $get_user->email,
											'firstname' => $get_user->firstname,
											'lastname'  => $get_user->lastname,
											'position' => $get_user->pos_id,
											'profile_picture'   => $get_user->profile_picture,
									];
									$sess = $this->session->set_userdata('user',$user_session);
									// parent::audittrail(
									// 		'Account Access',
									// 		'Account Login ',
									// 		$this->user->info('firstname') .' '. $this->user->info('lastname'),
									// 		$position->name,
									// 		$this->input->ip_address()
									// );
									echo json_encode("success");
							}elseif($get_user_detail->status == 0){
									echo json_encode("Your account is inactive. Contact our human resource department regarding this problem.");
							}
							
					}else {
							
							echo json_encode("Invalid Credentials");
					}
					
			}else{
					echo json_encode("Invalid Credentials");
			}
	}
 }

  
	}
