<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function index(){
     $status = $_GET['current_status'] ?? null;
     $role =  $_GET['role'] ?? null;
     $position = $_GET['pos_id'] ?? null;



     if ($role != null){
       $query["role_id"] = $role;
     }
     if ($status != null){
       $query["current_status"] = $status;
     }
     if ($position !=null){
       $query["pos_id"] = $position;
     }
     if(count($query) > 0){
       $data['employees'] = $this->db->get_where('record', $query)->result();
     }

     else{
       $data['employees'] = $this->Resume_model->fetch('record','pos_id=1');
     }
     $title['title'] = "Astrid Technologies | New Applicant";
     $this->load->view('include/header',$title);
     $this->load->view('include/sidebar', $data);
     $this->load->view('employee/index', $data);
    }

    public function edit(){

      $this->load->helper('form');
      $id = $this->uri->segment(3);
      $data['employee_data'] = $this->db->get_where('record', ['id' => $id])->row();

      $title['title'] = "Astrid Technologies | New Applicant";
      $this->load->view('include/header',$title);
      $this->load->view('employee/edit', $data);

    }

    public function edit_data(){
      $this->load->helper('encryption');
      $id = $_POST['id'];
      $update=[
        'first_name' => clean_data($this->input->post('first_name')),
        'last_name'  => clean_data($this->input->post('last_name')),
        'middle_name' => clean_data($this->input->post('middle_name')),
        'email' => clean_data($this->input->post('email_address')),
        'phone_number' => clean_data($this->input->post('phone_number')),
        'home_address' => clean_data($this->input->post('home_address')),
        'current_status' => clean_data($this->input->post('current_status')),
      ];
      $this->Resume_model->update('record', $update, 'id='.$id);
      redirect('');
    }
}
