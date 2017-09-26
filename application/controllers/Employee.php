<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function index(){

     $status = $_GET['current_status'] ?? null;
     $role =  $_GET['role'] ?? null;
     $position = $_GET['position'] ?? null;


     if ($status != null){
       $query["current_status"] = $status;
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

      $update=[

      ];
    }
}
