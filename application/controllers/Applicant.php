<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller {

 /*  private function check_session() {
    if(!$this->session->userdata('hr_logged_in')){
      redirect('');
    }
  } */

  // Function to Delete selected record from database.


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
    //  $this->check_session();
    $this->load->model('Resume_model');
    $role = $_GET['role'];
    $status = $_GET['status'];
    $data['title'] = "Astrid Technologies | Resume Management";
    $data['role'] = $this->Resume_model->fetch('role','id='.$role);

    $query = [];

    if ($role != null) {
      $query["position"] = $role;
    }

    if ($status != null) {
      $query["application_status"] = $status;
    }
     else if (count($query) > 0) {
       $data['applicants'] = $this->db->get_where('applicants', $query)->result();
     } else {
      $data['applicants'] = $this->Resume_model->fetch('applicants','');
     }
    $this->load->view('include/header',$data);
    $this->load->view('applicant/applicants',$data);
  }


  public function add_applicant() {
    $data['title'] = "Astrid Technologies | New Applicant";
    $this->load->model('role');
    $data['roles'] = $this->role->view_role();

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
    $this->load->model('applicant');
    $applicant = $this->applicant->get($id);

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
    $this->load->model('applicant');
    $title['title'] = "Astrid Technologies | New Applicant";
    $data['applicant_data']= $this->applicant->get($id);
    $this->load->view('include/header',$title);
    $this->load->view('applicant/edit', $data);

  }

  public function edit()
  {
    $to_email = $_POST['email_add'];
    $status = $_POST['status'];

    $this->load->model('applicant');
    $this->applicant->email_add = $to_email;
    $this->applicant->phone_no = $_POST['phone_no'];
    $this->applicant->address = $_POST['address'];
    $this->applicant->id  = $_POST['id'];
    $this->applicant->application_status = $status;
    $this->applicant->edit();
    redirect('');

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

    $this->load->model('employee');
    $this->employee->last_name = $_POST['last_name'];
    $this->employee->first_name = $_POST['first_name'];
    $this->employee->middle_name = $_POST['middle_name'];
    $this->employee->home_address = $_POST['address'];

    if($status == 4):
      $this->email->message('HAHAHA failed!!! Stupid ass nigg*!');
      $this->email->send();
    elseif($status == 5):
      $this->email->message('HAHAHA Yaaaay!!! Pasok ka na!');
      $this->email->send();
      $this->employee->insert();
            $this->load->model('employee','',TRUE);
            $this->employee->insert_into();

    else:
      show_error($this->email->print_debugger());

    endif;
            redirect('');
    die;
    // $this->session->set_flashdata("email_sent","Error in sending Email.");
    // $this->load->view('applicant/edit');


  }

  public function insert_role(){
   $this->load->model('role');
   $this->role->name = $_POST['name'];
   $this->role->insert_role();

   redirect('');
 }

 public function delete_role() {
   $this->load->model('role');
   $id = (isset($_GET['id']) ? $_GET['id'] : '');
   $this->role->delete_role($id);
   redirect('');

 }

  public function view_add_employee(){
    $title['title'] = "Astrid Technologies | New Applicant";
    $this->load->view('include/header',$title);
    $this->load->view('applicant/addEmployee');
  }

/*  public function add_employee(){
  $this->load->model('employee');

   $this->employee->last_name = $_POST['last_name'];
   $this->employee->first_name = $_POST['first_name'];
   $this->employee->middle_name = $_POST['middle_name'];
   $this->employee->email_address = $_POST['email_address'];
   $this->employee->phone_number = $_POST['phone_number'];
   $this->employee->home_address = $_POST['home_address'];
   $this->employee->birth_date = $_POST['birth_date'];
   $this->employee->position = $_POST['position'];
   $this->employee->date_hired = date("Y-m-d", strtotime($_POST['date_hired']));
   $this->employee->sss = $_POST['sss'];
   $this->employee->tin = $_POST['tin'];
   $this->employee->philhealth = $_POST['philhealth'];
   $this->employee->pagibig = $_POST['pagibig'];
   $this->employee->status = $_POST['status'];
   $this->employee->category = 1;
   $this->employee->insert();
   redirect('/home');
 } */

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
    $this->load->model('applicant');
    $this->applicant->exam_result = $_POST['exam_result'];
    $this->applicant->interviewer = $_POST['interviewer'];
    $this->applicant->interview_result = $_POST['interview_result'];
    $this->applicant->id  = $_POST['id'];
    $this->applicant->interview_notes = $notes;
    $this->applicant->addresult();
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
