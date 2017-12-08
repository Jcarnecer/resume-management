<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function index(){
     $this->load->model('Resume_model'); 
     $data['employees'] = $this->Resume_model->show_record(['resume_record.pos_id'=>1]);
     $result=$this->Resume_model->show_record(['resume_record.pos_id'=>1]);
     $title['title'] = "Astrid Technologies | Employee";
     $this->load->view('include/header',$title);
     $this->load->view('include/sidebar', $data); 
     $this->load->view('employee/index', $data);
     $this->load->view('include/footer');
    }

    public function add_employee(){
      $data['title'] = "Astrid Technologies | New Employee";
      $this->load->view('include/header', $data);
      $this->load->view('include/sidebar', $data);
      $this->load->view('employee/new');
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
     $current_status=$_POST['current_status'];
  
    
      $this->form_validation->set_rules('image_file','Image','callback_validate_images_file');
      $this->form_validation->set_rules('email_address','Email Address','Is_unique[record.email]');
      $this->form_validation->set_rules('phone_number','Phone Number','Is_unique[record.phone_number]');
      $this->form_validation->set_rules('last_name','Last Name','required');
      $this->form_validation->set_rules('first_name','First Name','required');
    
      $this->form_validation->set_rules('sss','SSS Number','Is_unique[record.email]');
      $this->form_validation->set_rules('tin','TIN Number','Is_unique[record.phone_number]');
      $this->form_validation->set_rules('philhealth','PhilHealth Number','required');
      $this->form_validation->set_rules('pagibig','Pagibig Number','required');

      if($this->form_validation->run()==FALSE){
        echo json_encode(validation_errors());
      }else{
        $insert_data=[
          'id'=>$this->utilities->unique_id('employees',8),
          'first_name' => clean_data(ucwords($first_name)),
          'last_name'  => clean_data(ucwords($last_name)),
          'middle_name' => clean_data(ucwords($middle_name)),
          'degree' => clean_data(ucwords($degree)) ,
          'role_id' => clean_data($this->input->post('role')), //java dev, rails dev etc.
          'pos_id' => 1,// employee, intern
          'email' => clean_data($email_address),
          'comment' => clean_data(ucwords($comment)),
          'home_address' => clean_data(ucwords($home_address)),
          'phone_number' => clean_data($phone_number),
          'birthday' => clean_data($birth_date),
          'school' => clean_data($school),
          'images'=> $this->session->image,
          'current_status' =>clean_data($current_status)
          
        ];
        $this->Resume_model->insert('resume_record',$insert_data);
        $last_inserted=$this->Resume_model->get_last_row();
        
        // print_r($last_inserted->id);die;
           $insert_empdata = [
  
                //  'application_status' => NULL,
                'date_hired'=> clean_data($this->input->post('date_hired')),
                'images'=> $this->session->image,
           ];

           
           $where_employee = ['id'  => $last_inserted->id];
           $this->Resume_model->update('resume_record',$insert_empdata,$where_employee); 
           
           $insert_employee=[
                 'sss' => clean_data(ucwords($this->input->post('sss'))),
                 'tin' => clean_data(ucwords($this->input->post('tin'))),
                 'philhealth' => clean_data(ucwords($this->input->post('philhealth'))),
                 'pagibig' => clean_data(ucwords($this->input->post('pagibig'))),
                 'record_id' => $last_inserted->id
           ];
          
          
           $this->Resume_model->insert('resume_employees', $insert_employee);
           // print_r($insert_data);die;
           echo json_encode('success'); 
      }
     
    }

    public function validate_images_file(){
      if (isset($_FILES['image_file']) && !empty($_FILES['image_file']['name'])) {
        if ($this->upload->do_upload('image_file')) {
          $this->session->image =  $this->upload->data('file_name');
          return true;
        } else {
          $this->form_validation->set_message('validate_images_file', $this->upload->display_errors());
          return false;
        }
      }
    }
    


    public function edit(){

      $this->load->helper('form');
      $id = secret_url('decrypt',$this->uri->segment(3));
      $data['employee_data'] = $this->Resume_model->fetch_tag_row('*','resume_record', ['id' => $id]);
      $join_where = ['resume_employees.record_id' => $id];
      $data['employee'] = $this->Resume_model->join_employee_record($join_where);
      $title['title'] = "Astrid Technologies | Edit Employee  ";
      $this->load->view('include/header',$title);
      $this->load->view('include/sidebar',$data);
      $this->load->view('employee/edit', $data);
      $this->load->view('include/footer');
     
     
    }

    public function edit_data(){
      $this->load->helper('encryption');
      $id = secret_url('decrypt',$_POST['id']);
      $current_status=$_POST['current_status'];
      $update=[
        'first_name' => clean_data($this->input->post('first_name')),
        'last_name'  => clean_data($this->input->post('last_name')),
        'middle_name' => clean_data($this->input->post('middle_name')),
        'email' => clean_data($this->input->post('email_address')),
        'phone_number' => clean_data($this->input->post('phone_number')),
        'home_address' => clean_data($this->input->post('home_address')),
        'current_status' => clean_data($current_status),
        'birthday' => clean_data($this->input->post('birth_date')),
        'degree' => clean_data($this->input->post('degree')),
      ];
      //$this->Resume_model->update('record', $update, 'id='.$id);
      $this->Resume_model->update('resume_record', $update,array('id'=>$id));
      $update_employees=[
        'sss' => clean_data($this->input->post('sss')),
        'tin' => clean_data($this->input->post('tin')),
        'philhealth' => clean_data($this->input->post('philhealth')),
        'pagibig' => clean_data($this->input->post('pagibig')),
      ];
      $this->Resume_model->update('resume_employees',$update_employees,array('record_id'=>$id));
      echo json_encode('success');
    }


    public function view($id){

      $this->load->model('Resume_model');
      $id=secret_url('decrypt',$id);
      $applicant = $this->Resume_model->fetch_tag_row('*','resume_record', ['id' => $id]);
      $join_where = $applicant->role_id;
    
      $applicant->name = $this->Resume_model->get_role($join_where)->name;
      $record_id = $applicant->id;
      $where = ['record_id' => $record_id];
      $record =   $this->Resume_model->join_employee_record($where);
      $record->name =  $this->Resume_model->get_role($join_where)->name;
    
      header('Content-Type: application/json');
      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: GET');
  
      http_response_code(200);
      $json = [
        'fname' => $record->first_name,
        'role_name' => $applicant->name
      ];
      echo json_encode($record);//$applicant);

    }

}
