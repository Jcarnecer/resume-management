<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intern extends CI_Controller {

    public function index(){
      $status = $_GET['current_status'] ?? null;
      $role =  $_GET['role'] ?? null;
      $position = $_GET['position'] ?? null;

      if($role != null){
        $query["role_id"] = $role;
      }
      if ($status != null){
        $query["current_status"] = $status;
      }
      if ($position !=null){
        $query["pos_id"] = $position;
      }
      if(count($query) > 0){
        $data['interns'] = $this->db->get_where('record', $query)->result();
      }
      else{
        $data['interns'] = $this->Resume_model->fetch('record','pos_id=2');
      }
      $title['title'] = "Astrid Technologies | New Applicant";
      $this->load->view('include/header',$title);
      $this->load->view('intern/index', $data);
    }

  }
