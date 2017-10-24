<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

    public function index(){
    $this->load->model('Resume_model'); 

        


      $data['roles'] = $this->Resume_model->get_position();    
      $data['title'] = "Astrid Technologies | Roles";
      $this->load->view('include/header',$data);
      $this->load->view('include/sidebar');
      $this->load->view('role/index', $data);
      $this->load->view('include/footer');
 
    }

    public function edit(){

      $id = $this->uri->segment(3);
      $update=[
        'name'=>$this->input->post('role_name'),
        'pos_id'=>$this->input->post('pos_id')
      ];
      $record=$this->Resume_model->update('role', $update, 'role_id='.$id);   
      echo json_encode($record);

    }



    

  }