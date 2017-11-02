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
          'name'=>$this->input->post('role_name')
        ];
        $record=$this->Resume_model->update('role', $update, 'role_id='.$id);   
        echo json_encode('success');
        
    }


    public function update_status() {
      $this->load->model('Resume_model');
      $check=[  
        'role_id' =>$this->input->post('id'),
        'pos_id' => $this->input->post('pos_id'),
      ];
      $result=$this->Resume_model->count('record', $check);
        if($result>0){
            echo json_encode('Role cannot be Updated');
        }   
      else{
          $role_id =$this->input->post('id');
          $status=$this->input->post('status');

          $status_id=null;
          if($status=="Deactivate"){
              $status_id=0;

          }   
          else if($status=="Activate"){
              $status_id=1;
          }
          $record=$this->Resume_model->update('role',['status'=>$status_id],['role_id' => $role_id]);
          echo json_encode('success');
        }
     }


     public function get_roles(){
       $this->load->model('Resume_model');
       $roles=$this->Resume_model->get_role_position();
       echo json_encode($roles);
     }


     public function insert_role(){ 
      $this->load->helper('encryption');
      $this->form_validation->set_rules('role_name','Role Name','callback_check_role');
      if($this->form_validation->run()==FALSE){
        echo json_encode(validation_errors());
      }
      else{

          $insert=[
            'name' => clean_data(ucwords($this->input->post('role_name'))),
            'pos_id' => $this->input->post('pos_id'),
            'status'=>'1',
          ];
          $result=$this->Resume_model->insert('role', $insert);
          echo json_encode('success');
        }
    }


     public function check_role(){
        $check=[
          'name' => clean_data(ucwords($this->input->post('role_name'))),
          'pos_id' => $this->input->post('pos_id'),
        ];

       $result=$this->Resume_model->count('role', $check);
       if($result>0){
        $this->form_validation->set_message('Role', 'Role Already exists.');
        return FALSE;
        
       } 
       else{
        return TRUE;
       }   
     }

     public function check_role_status(){      
      $id=$this->uri->segment(3);
      $check=[  
        'role_id' => $id,
        'pos_id' => $this->input->post('pos_id'),
      ];
      $result=$this->Resume_model->count('record', $check);
        if($result>0){
          $this->form_validation->set_message('Role', 'Role Already exists.');
          return FALSE;
        } 
        else{
          return TRUE;
        }  
      
     }
    

  }