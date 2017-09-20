<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller {
    public function view_add_employee(){
      $title['title'] = "Astrid Technologies | New Applicant";
      $this->load->view('include/header',$title);
      $this->load->view('applicant/addEmployee');
    }

    public function view_employee(){

     $status = $_GET['status'] ?? null;

     $this->load->model('employee');
     if ($status != null){
       $query["status"] = $status;
       $data['employee'] = $this->db->get_where('employees', $query)->result();
     }
     else{
       $data['employee'] = $this->employee->view();
     }
     $title['title'] = "Astrid Technologies | New Applicant";
     $this->load->view('include/header',$title);
     $this->load->view('applicant/ViewEmployee', $data);
    }
}
