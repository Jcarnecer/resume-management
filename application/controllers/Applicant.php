<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller {

  public function index(){

    $this->load->model('Resume_model');
    $this->load->model('employee');
    $data['title'] = "Astrid Technologies";
    $data['role_applicant'] = $this->Resume_model->fetch('role','type=1');
    $data['role_employee'] = $this->Resume_model->fetch('role','type=2');
    $data['role_intern'] = $this->Resume_model->fetch('role','type=3');
    $data['count'] = $this->Resume_model->count_applicant();
    $data['countemployee'] = $this->employee->count();
    $this->load->view('applicant/index', $data);

  }

  public function applicants() {
    $this->load->model('Resume_model');
  //  $role = $_GET['role'];
  //  $status = $_GET['status'];
    $data['title'] = "Astrid Technologies | Resume Management";
  //  $data['role'] = $this->Resume_model->fetch('role','id='.$role);

    $query = [];

  /*  if ($role != null) {
      $query["position"] = $role;
    }

    if ($status != null) {
      $query["application_status"] = $status;
    } */
    if (count($query) > 0) {
       $data['applicants'] = $this->db->get_where('applicants', $query)->result();
     } else {
      $data['applicants'] = $this->Resume_model->fetch('applicants','');
     }
    $this->load->view('include/header',$data);
    $this->load->view('applicant/applicants',$data);
  }


  public function add_applicant() {
    $data['title'] = "Astrid Technologies | New Applicant";
    $this->load->model('Resume_model');
    $data['roles'] = $this->Resume_model->fetch('role','');

    $this->load->view('include/header', $data);
		$this->load->view('applicant/new');
	}

  public function addRecord(){
    $this->load->helper('encryption');
    $this->load->model('Resume_model');
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $home_address = $_POST['home_address'];
    $email_address = $_POST['email_address'];
    $position = $_POST['position'];
    $role = $_POST['employment_type'];
    $comment = $_POST['comment'];
    $phone_number = $_POST['phone_number'];
    $birth_date = $_POST['birth_date'];
    $degree = $_POST['degree'];
    $school = $_POST['school'];
    $status = $_POST['status'];
    $date_hired = $_POST['date_hired'];
    $employment_type = $_POST['employment_type'];



    $config['upload_path'] = "assets/uploads";
    $config['allowed_types'] = 'doc|pdf|docx|jpg|jpeg|png';
    $config['max_size'] = 2048;

    $this->load->library('upload', $config);

    if (isset($_FILES['resume']) && !empty($_FILES['resume']['name'])):
        if ($this->upload->do_upload('resume')):
        $resume =  $this->upload->data('file_name');
        else:
            echo  $this->upload->display_errors();
        endif;
    else:
      echo "Required";
    endif;

    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])):
      if ($this->upload->do_upload('image')):
        $image = $this->upload->data('file_name');
      else:
        echo $this->upload->display_errors();
      endif;
    else:
        echo "Error";
    endif;

    if($role == 1){
      $insert =[
        'first_name' => clean_data(ucwords($first_name)),
        'last_name' => clean_data(ucwords($last_name)),
        'middle_name' => clean_data(ucwords($middle_name)),
        'degree' => clean_data(ucwords($degree)),
        'school' => clean_data(ucwords($school)),
        'application_status' => clean_data(ucwords($this->input->post('application_status'))),
        'application_date' => clean_data(ucwords($this->input->post('application_date'))),
        'expected_salary' => clean_data(ucwords($this->input->post('expected_salary'))),
        'position' => clean_data(ucwords($position)),
        'comment' => clean_data(ucwords($this->input->post('comment'))),
        'home_address' => clean_data(ucwords($home_address)),
        'phone_number' => clean_data(ucwords($phone_number)),
        'birth_date' => clean_data(ucwords($birth_date)),
        'email_address' => clean_data(ucwords($email_address)),
        'application_status' => 1,
        'file' => $resume,
        'images' => $image,
      ];
        $this->Resume_model->insert('applicants',$insert);
    }
    elseif ($role == 2){
      $insert=[
        'first_name' => clean_data(ucwords($first_name)),
        'last_name' => clean_data(ucwords($last_name)),
        'middle_name' => clean_data(ucwords($middle_name)),
        'home_address' => clean_data(ucwords($home_address)),
        'email_address' => clean_data(ucwords($email_address)),
        'phone_number' => clean_data(ucwords($phone_number)),
        'birth_date' => clean_data(ucwords($birth_date)),
        'position' => clean_data(ucwords($position)),
        'date_hired' => clean_data(ucwords($date_hired)),
        'sss' => clean_data(ucwords($this->input->post('sss'))),
        'tin' => clean_data(ucwords($this->input->post('tin'))),
        'philhealth' => clean_data(ucwords($this->input->post('philhealth'))),
        'pagibig' => clean_data(ucwords($this->input->post('pagibig'))),
        'status' => clean_data(ucwords($this->input->post('status'))),
        'employment_type' => 2,
        'degree' => clean_data(ucwords($degree)),
        'school' => clean_data(ucwords($school)),
      ]; $this->Resume_model->insert('employees',$insert);
    }
    elseif ($role == 3){
      $insert=[
        'first_name' => clean_data(ucwords($first_name)),
        'last_name' => clean_data(ucwords($last_name)),
        'middle_name' => clean_data(ucwords($middle_name)),
        'home_address' => clean_data(ucwords($home_address)),
        'email_address' => clean_data(ucwords($email_address)),
        'phone_number' => clean_data(ucwords($phone_number)),
        'birth_date' => clean_data(ucwords($birth_date)),
        'position' => clean_data(ucwords($position)),
        'date_hired' => clean_data(ucwords($date_hired)),
        'status' => clean_data(ucwords($this->input->post('status'))),
        'employment_type' => 3,
        'degree' => clean_data(ucwords($degree)),
        'school' => clean_data(ucwords($school)),
        ];
        $this->Resume_model->insert('employees',$insert);
    }
        redirect('');
  }
  public function view($id){
    $this->load->model('Resume_model');
    $applicant = $this->Resume_model->get($id);

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
    $data['applicant_data']= $this->Resume_model->get($id);
    $this->load->view('include/header',$title);
    $this->load->view('applicant/edit', $data);

  }

  public function edit()
  {
    $to_email = $_POST['email_address'];
    $status = $_POST['status'];
    $first_name= $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $phone_number = $_POST['phone_number'];
    $home_address = $_POST['home_address'];
    $id = $_POST['id'];

    $this->Resume_model->first_name = $first_name;
    $this->Resume_model->last_name = $last_name;
    $this->Resume_model->middle_name = $middle_name;
    $this->Resume_model->email_address = $to_email;
    $this->Resume_model->phone_number = $phone_number;
    $this->Resume_model->home_address = $home_address;
    $this->Resume_model->id  = $id;
    $this->Resume_model->application_status = $status;
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
      $insert=[
        'last_name' => $last_name,
        'first_name' => $first_name,
        'middle_name' => $middle_name,
        'email_address' => $to_email,
        'home_address' => $home_address,
        'phone_number' => $phone_number,
        'employment_type' => 2,
      ];
      $this->Resume_model->insert('employees', $insert);
      $this->Resume_model->delete('applicants','id='.$id);
      redirect('');
    endif;
  }

  public function insert_role(){

   $this->load->helper('encryption');
   $insert=[
     'name' => clean_data(ucwords($this->input->post('role'))),
     'type' => $this->input->post('type'),
   ];

   $this->load->model('Resume_model');
   $this->Resume_model->insert('role',$insert);

   redirect('');
 }

 public function delete_role() {
  $this->load->model('Resume_model');
  $id = (isset($_GET['id']) ? $_GET['id'] : '');
  $this->Resume_model->delete('role',array('id' => $id));
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
