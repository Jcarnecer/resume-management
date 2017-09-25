<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller {

  public function index(){

    $this->load->model('Resume_model');
    $this->load->model('employee');
    $data['title'] = "Astrid Technologies";
    $data['role'] = $this->Resume_model->fetch('role');
    $data['role_applicant'] = $this->Resume_model->fetch('role',['applicant' => 1]);
    $data['role_employee'] = $this->Resume_model->fetch('role','pos_id=1');
    $data['role_intern'] = $this->Resume_model->fetch('role','pos_id=2');
    $this->load->view('applicant/index', $data);
  }

  public function applicants() {
    $this->load->model('Resume_model');
    $role = $_GET['role'];
    $status = $_GET['status'];
    $data['title'] = "Astrid Technologies | Resume Management";
  //$data['role'] = $this->Resume_model->fetch('role','id='.$role);

    $query = [];

    if ($role != null) {
      $query["role_id"] = $role;
    }

    if ($status != null) {
      $query["application_status"] = $status;
    }
    if (count($query) > 0) {
       $data['applicants'] = $this->db->get_where('record', $query)->result();
     } else {
      $data['applicants'] = $this->Resume_model->fetch('record','');
     }
    $this->load->view('include/header',$data);
    $this->load->view('applicant/applicants',$data);
  }


  public function add_applicant() {
    // $where = [ 'type' => '1', '2', '3'];
    $employment_type = $this->input->post('employment_type');
    echo $employment_type;
    $data['title'] = "Astrid Technologies | New Applicant";
    // $data['roles'] = $this->Resume_model->fetch('role', $where);
    $this->load->view('include/header', $data);
		$this->load->view('applicant/new');
	}

  public function get_pos_role($posid){
    $where = ['pos_id' => $posid];
    $role = $this->Resume_model->fetch('role',$where);
    // print_r($role);die;
    foreach($role as $row){
      $r_name = $row->name;
      $r_id = $row->role_id;

      $roles[] = [
          'id'  => $r_id,
          'name'  => $r_name
      ];
    }
    echo json_encode($roles);
  }

  public function validate_resume_file() {


    if (isset($_FILES['resume_file']) && !empty($_FILES['resume_file']['name'])) {
      if ($this->upload->do_upload('resume_file')) {
        $this->session->resume =  $this->upload->data('file_name');
        return true;
      } else {
        $this->form_validation->set_message('validate_resume_file', $this->upload->display_errors());
        return false;
      }
    } else {
      $this->form_validation->set_message('validate_resume_file', "You must upload an image!");
        return false;
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
    } else {
      $this->form_validation->set_message('validate_images_file', "You must upload an image!");
        return false;
    }
  }

  public function addRecord() {
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
    $position = $_POST['position'];
    $role = $_POST['role'];
    $comment = $_POST['comment'];
    $phone_number = $_POST['phone_number'];
    $birth_date = $_POST['birth_date'];
    $degree = $_POST['degree'];
    $school = $_POST['school'];
    $date_hired = $_POST['date_hired'];
    $current_status = $_POST['current_status'];


    $this->form_validation->set_rules('resume_file','Resume','callback_validate_resume_file');
    $this->form_validation->set_rules('image_file','Image','callback_validate_images_file');

    if($this->form_validation->run()==FALSE){
      echo json_encode(validation_errors());
    }
    elseif ($current_status == "applicant") {
      $insert_data = [
           'first_name' => clean_data(ucwords($first_name)),
           'last_name'  => clean_data(ucwords($last_name)),
           'middle_name' => clean_data(ucwords($middle_name)),
           'degree' => clean_data(ucwords($degree)) ,
           'application_status' => 1,
           'role_id' => clean_data($this->input->post('role')), //java dev, rails dev etc.
           'pos_id' => clean_data($this->input->post('position')), // employee, intern
           'email' => clean_data($email_address),
           'comment' => clean_data(ucwords($comment)),
           'home_address' => clean_data(ucwords($home_address)),
           'phone_number' => clean_data($phone_number),
           'birthday' => clean_data($birth_date),
           'date_hired'=> clean_data($this->input->post('date_hired')),
           'file' =>$this->session->resume,
           'images'=> $this->session->image,
           'application_date' => clean_data($this->input->post('application_date')),
           'available_date' => clean_data($this->input->post('available_date')),
           'current_status' => clean_data(ucwords($this->input->post('current_status'))) //applicant, former, current
      ];

      // print_r($insert_data);die;
      $this->Resume_model->insert('record',$insert_data);
      // print_r($insert_data);die;
      echo json_encode('success');
    }
    else if($current_status = "current" || $current_status == "former"){
      $insert_data = [
           'first_name' => clean_data(ucwords($first_name)),
           'last_name'  => clean_data(ucwords($last_name)),
           'middle_name' => clean_data(ucwords($middle_name)),
           'degree' => clean_data(ucwords($degree)) ,
           'application_status' => NULL,
           'role_id' => clean_data($this->input->post('role')), //java dev, rails dev etc.
           'pos_id' => clean_data($this->input->post('position')), // employee, intern
           'email' => clean_data($email_address),
           'comment' => clean_data(ucwords($comment)),
           'home_address' => clean_data(ucwords($home_address)),
           'phone_number' => clean_data($phone_number),
           'birthday' => clean_data($birth_date),
           'date_hired'=> clean_data($this->input->post('date_hired')),
           'file' =>$this->session->resume,
           'images'=> $this->session->image,
           'application_date' => clean_data($this->input->post('application_date')),
           'available_date' => clean_data($this->input->post('available_date')),
           'current_status' => clean_data(ucwords($this->input->post('current_status'))), //applicant, former, current
      ];
    /*  $insert_employee=[
            'sss' => clean_data(ucwords($this->input->post('sss'))),
            'tin' => clean_data(ucwords($this->input->post('tin'))),

      ]; */


      // print_r($insert_data);die;
      $this->Resume_model->insert('record',$insert_data);
      // print_r($insert_data);die;
      echo json_encode('success');
    }

  }


  public function view($id){
    $this->load->model('Resume_model');
    $applicant = $this->db->get_where('record', ['id' => $id])->row();

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET');

    http_response_code(200);
    print json_encode($applicant);
  }


  public function edit_view()
  {

    //segment1 = controller name;
    //segment2 = method name
    //segment3 = id
    $this->load->helper('form');
    $id = $this->uri->segment(3);
    // print_r($id);die;
    $this->load->model('Resume_model');
    $title['title'] = "Astrid Technologies | New Applicant";
    $data['applicant_data']= $this->db->get_where('record', ['id' => $id])->row();
    $this->load->view('include/header',$title);
    $this->load->view('applicant/edit', $data);

  }

  public function edit()
  {
    $now = new DateTime();
    $now->setTimezone(new DateTimezone('Asia/Manila'));
    $date_now = $now->format('Y-m-d');
    $to_email = $_POST['email_address'];
    $status = $_POST['status'];
    $first_name= $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $phone_number = $_POST['phone_number'];
    $home_address = $_POST['home_address'];
    $birth_date = $_POST['birth_date'];
    $school = $_POST['school'];
    $degree = $_POST['degree'];
    $position = $_POST['position'];
    $id = $_POST['id'];
    $current_status = "current";

    $this->Resume_model->first_name = $first_name;
    $this->Resume_model->last_name = $last_name;
    $this->Resume_model->middle_name = $middle_name;
    $this->Resume_model->email_address = $to_email;
    $this->Resume_model->phone_number = $phone_number;
    $this->Resume_model->home_address = $home_address;
    $this->Resume_model->id  = $id;
    $this->Resume_model->application_status = $status;
    $this->Resume_model->current_status = $current_status;
    $this->Resume_model->edit();

    $this->email->initialize(array(
        'protocol' => 'mail',
        'smtp_user' => 'farrahdee24@gmail.com',
        'smtp_host' => 'localhost',
        'smtp_pass' => 'Chr!sBrown24',
        'smtp_port' => '25',
        'wordwrap' => TRUE,
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'crlf' => "\r\n",
        'newline' => "\r\n"
    ));

    $from_email ="farrahdee24@gmail.com";

    $this->email->from($from_email, 'Farrah Dee');
    $this->email->to($to_email);
    $this->email->subject('Astrid Technologies');

    if($status == "4"):
      $this->email->message('Failed!');
      $this->email->send();

    elseif($status == 5):
      $this->email->message('Passed!');
      $this->email->send();

    endif;
    redirect('');
  }

  public function insert_role(){
  $this->load->helper('encryption');
   $insert=[
     'name' => clean_data(ucwords($this->input->post('role'))),
     'pos_id' => $this->input->post('pos_id'),
     'applicant' => $this->input->post('applicant'),
   ];
   $this->Resume_model->insert('role', $insert);
   echo json_encode('success');

 }

 public function delete_role() {
  $this->load->model('Resume_model');
  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $this->Resume_model->delete('role',array('role_id' => $id));
  redirect('');
 }

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

  public function add_result()
  {

    $config['upload_path'] = "assets/uploads";
    $config['allowed_types'] = 'doc|pdf|docx|jpg|jpeg|png';
    $config['max_size'] = 2048;

    $this->load->library('upload', $config);

    if (isset($_FILES['notes']) && !empty($_FILES['notes']['name'])):
      if ($this->upload->do_upload('notes')):
        $notes = $this->upload->data('file_name');
      else:
        echo $this->upload->display_errors();
      endif;
    else:
        echo "Nope!";
    endif;
    $this->load->model('Resume_model');
    $this->Resume_model->exam_result = $_POST['exam_result'];
    $this->Resume_model->interviewer = $_POST['interviewer'];
    $this->Resume_model->interview_result = $_POST['interview_result'];
    $this->Resume_model->id  = $_POST['id'];
    $this->Resume_model->interview_notes = $notes;
    $this->Resume_model->addresult();
    redirect('');
  }

  public function upload(){

    $config['upload_path'] = "assets/uploads";
    $config['allowed_types'] = 'doc|pdf';
    $config['max_size'] = 200;

    $this->load->library('upload', $config);

    if(! $this->upload->do_upload('resume'))
    {
          $error = array('error' => $this->upload->display_errors());
          $this->load->view('index', $error);
    }
    else
    {
          $data = array('upload_data' =>$this->upload->data());
          $this->load->view('index', $data);
    }

  }


}
