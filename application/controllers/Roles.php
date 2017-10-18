<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

    public function index(){
    $this->load->model('Resume_model'); 

        


      $data['roles'] = $this->Resume_model->get_role_position();    
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


    public function update_status() {
      $this->load->model('Resume_model');
      $role_id =$this->input->post('id');
      $status=$this->input->post('status');
      if($status=="Deactivate"){
          $status_id=0;

      }   
      else if($status=="Activate"){
          $status_id=1;
      }
      $record=$this->Resume_model->update('role',['status'=>$status_id],['role_id' => $role_id]);
      echo json_encode($record);
      
     }


     public function get_roles(){
       $this->load->model('Resume_model');
       $roles=$this->Resume_model->get_role_position();
       echo json_encode($roles);
     }


     public function insert_role(){ 
      $this->load->helper('encryption');
       $insert=[
         'name' => clean_data(ucwords($this->input->post('role_name'))),
         'pos_id' => $this->input->post('pos_id'),
         'status'=>'1',
       ];
       $result=$this->Resume_model->insert('role', $insert);
        echo json_encode($result);
     }



    

  }