<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('applicant');
  }

  private function check_session() {
    if($this->session->userdata('hr_logged_in')){
      redirect('applicant');
    }
  }
  public function index(){
    $this->check_session();
    $data['title'] = "Astrid Technologies | Resume Management";
    $this->load->view('include/header',$data);
    $this->load->view('login/index');
    
  }

  public function auth() {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $where = array('email_add' => $email);
    $get_applicant = $this->applicant->fetch_tag_row('*','applicants',$where);

    if(sha1($password) == $get_applicant->password){
      $session = array(
        'firstname' => $get_applicant->first_name,
        'lastname'  => $get_applicant->last_name,
        'email'     => $get_applicant->email_add,
      );
      $this->session->set_userdata('hr_logged_in',$session);

      echo json_encode("success");
    }else{

      echo json_encode("failed");
    }
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect(''); //base_url
  }
}
