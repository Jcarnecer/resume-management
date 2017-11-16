<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index(){
        $this->load->model('Resume_model');
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Manila'));
        $date_now = $now->format('Y-m-d');
        $data['title'] = "Astrid Technologies";
        $data['role'] = $this->Resume_model->fetch('role');
        $data['role_employee'] = $this->Resume_model->fetch('role',['pos_id' => 1,'status'=>1]);
        $data['role_intern'] = $this->Resume_model->fetch('role',['pos_id' => 2,'status'=>1]);
        $data['role_freelance'] = $this->Resume_model->fetch('role',['pos_id' => 3,'status'=>1]);
         
        $data['interview_employee']=$this->Resume_model->count('record',['interview_date'=>$date_now,'pos_id'=>1]);
        $data['interview_intern']=$this->Resume_model->count('record',['interview_date'=>$date_now,'pos_id'=>2]);
        $data['interview_freelance']=$this->Resume_model->count('record',['interview_date'=>$date_now,'pos_id'=>3]); 
        $title['title'] = "Astrid Technologies | Resume Management";
         $this->load->view('include/header',$title);
        $this->load->view('include/sidebar', $data);  
        $this->load->view('Home/index', $data);
        $this->load->view('include/footer');
       
    }

  }
