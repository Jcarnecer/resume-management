<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intern extends CI_Controller {

    public function index(){
    
      $data['interns'] = $this->Resume_model->fetch('record',['pos_id'=>2,'current_status'=>'current']);
      $title['title'] = "Astrid Technologies | New Applicant";
      $this->load->view('include/header',$title);
      $this->load->view('include/sidebar', $data);  
      $this->load->view('intern/index', $data);


    }

    public function add_intern(){

      $data['title'] = "Astrid Technologies | New Applicant";
      $this->load->view('include/header', $data);
      $this->load->view('include/sidebar', $data);
      $this->load->view('intern/new');
      $this->load->view('include/footer');
    }


    public function addRecord(){
      $this->load->model('Resume_model');   
      $config['upload_path'] = "assets/uploads";
      $config['allowed_types'] = 'doc|pdf|docx|jpg|jpeg|png';
      $config['max_size'] = 2048;

      $this->load->library('upload', $config);
      $this->load->helper('encryption');
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $middle_name = $_POST['middle_name'];
      $home_address = $_POST['home_address'];
      $email_address = $_POST['email_address'];
      $role = $_POST['role'];
      $comment = $_POST['comment'];
      $phone_number = $_POST['phone_number'];
      $birth_date = $_POST['birth_date'];
      $degree = $_POST['degree'];
      $school = $_POST['school'];
     
  
    
      $this->form_validation->set_rules('image_file','Image','callback_validate_images_file');
  
      if($this->form_validation->run()==FALSE){
        echo json_encode(validation_errors());
      }else{
        $insert_data=[
          'first_name' => clean_data(ucwords($first_name)),
          'last_name'  => clean_data(ucwords($last_name)),
          'middle_name' => clean_data(ucwords($middle_name)),
          'degree' => clean_data(ucwords($degree)) ,
          'role_id' => clean_data($this->input->post('role')), //java dev, rails dev etc.
          'pos_id' => 2,// employee, intern
          'email' => clean_data($email_address),
          'comment' => clean_data(ucwords($comment)),
          'home_address' => clean_data(ucwords($home_address)),
          'phone_number' => clean_data($phone_number),
          'birthday' => clean_data($birth_date),
          'school' => clean_data($school),
          'images'=> $this->session->image,
          'current_status' =>'Active'
          
        ];
      
          echo json_encode('success'); 
      }


    }


  }
