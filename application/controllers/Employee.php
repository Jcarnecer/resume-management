<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function index(){

     $status = $_GET['status'] ?? null;


     if ($status != null){
       $query["status"] = $status;
       $data['employee'] = $this->db->get_where('employees', $query)->result();
     }
     else{
       $data['employee'] = $this->Resume_model->fetch('employees','');
     }
     $title['title'] = "Astrid Technologies | New Applicant";
     $this->load->view('include/header',$title);
     $this->load->view('applicant/ViewEmployee', $data);
    }





}
