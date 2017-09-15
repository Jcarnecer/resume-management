<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicantController extends CI_Controller {

 /*  private function check_session() {
    if(!$this->session->userdata('hr_logged_in')){
      redirect('');
    }
  } */

  public function index(){

      $this->load->model('role');
      $this->load->model('applicant');
      $this->load->model('employee');
      $data['title'] = "Astrid Technologies";
      $data['role'] = $this->role->view_role();
      $data['count'] = $this->applicant->count();
      $data['countemployee'] = $this->employee->count();
      $data['countempformer'] = $this->employee->count_former_employees();
      $data['countempcurrent'] = $this->employee->count_current_employees();
      $data['countinternformer'] = $this->employee->count_former_intern();
      $data['countinterncurrentemp'] = $this->employee->count_current_intern();

      $this->load->view('applicant/index', $data);
  }
  public function applicant() {
  //  $this->check_session();
    $role = $_GET["role"] ?? null;
    $salary = $_GET["salary"] ?? null;
    $status = $_GET["status"] ?? null;
    $this->load->model('applicant');
    $this->load->model('role');
    $data['title'] = "Astrid Technologies | Resume Management";
    $data['role'] = $this->role->view_role();

    $query = [];

    if ($role != null) {
      $query["position"] = $role;
    }

    if ($status != null) {
      $query["application_status"] = $status;
    }

     if ($salary != null) {
       $data['applicants'] = $this->applicant->sort_by("salary", $salary);
     } else if (count($query) > 0) {
       $data['applicants'] = $this->db->get_where('applicants', $query)->result();
     } else {
      $data['applicants'] = $this->applicant->all();
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


  public function create_applicant(){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $middle_name = $_POST['middle_name'];
    $home_address = $_POST['address'];
    $email_address = $_POST['email_add'];
    $degree = $_POST['degree'];
    $school = $_POST['school'];
    $position = $_POST['position'];
    $role = $_POST['employment_type'];
    $application_date = date("Y-m-d", strtotime($_POST['application_date']));
    $salary = $_POST['salary'];
    $comment = $_POST['comment'];
    $phone_no = $_POST['phone_no'];
    $bdate = $_POST['bdate'];
    $status = $_POST['status'];
    $date_hired = $_POST['date_hired'];
    $sss = $_POST['sss'];
    $tin = $_POST['tin'];
    $pagibig = $_POST['pagibig'];
    $philhealth = $_POST['philhealth'];
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
      echo "sobrang required";
    endif;

    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])):
      if ($this->upload->do_upload('image')):
        $image = $this->upload->data('file_name');
      else:
        echo $this->upload->display_errors();
      endif;
    else:
        echo "Nope";
    endif;

    if($role == 1){
      $this->load->model('applicant');
      $this->applicant->first_name = $first_name;
      $this->applicant->last_name = $last_name;
      $this->applicant->middle_name = $middle_name;
      $this->applicant->degree = $degree;
      $this->applicant->school = $school;
      $this->applicant->position = $position;
      $this->applicant->application_date = $application_date;
      $this->applicant->salary = $salary;
      $this->applicant->comment = $comment;
      $this->applicant->phone_no = $_POST['phone_no'];
      $this->applicant->bdate = $_POST['bdate'];
      $this->applicant->address = $_POST['address'];
      $this->applicant->email_add = $email_address;
      $this->applicant->images = $image;
      $this->applicant->file = $resume;
      $this->applicant->interview_notes = $notes;
      $this->applicant->application_status = 1;
      $this->applicant->category = 0;
      $this->applicant->insert();
    }
    elseif ($role == 2){
      $this->load->model('employee');
      $this->employee->first_name = $first_name;
      $this->employee->last_name = $last_name;
      $this->employee->middle_name = $middle_name;
      $this->employee->home_address = $home_address;
      $this->employee->email_address = $email_address;
      $this->employee->phone_number = $phone_no;
      $this->employee->birth_date = $bdate;
      $this->employee->position = $position;
      $this->employee->date_hired = $date_hired;
      $this->employee->sss = $sss;
      $this->employee->tin = $tin;
      $this->employee->philhealth = $philhealth;
      $this->employee->status = $status;
      $this->employee->employment_type = 2;
      $this->employee->insert();
    }
    elseif ($role == 3){
        $this->load->model('employee');
        $this->employee->first_name = $first_name;
        $this->employee->last_name = $last_name;
        $this->employee->middle_name = $middle_name;
        $this->employee->home_address = $home_address;
        $this->employee->email_address = $email_address;
        $this->employee->phone_number = $phone_no;
        $this->employee->birth_date = $bdate;
        $this->employee->position = $position;
        $this->employee->date_hired = $date_hired;
        $this->employee->sss = $sss;
        $this->employee->tin = $tin;
        $this->employee->philhealth = $philhealth;
        $this->employee->status = $status;
        $this->employee->employment_type = 3;
        $this->employee->insert();
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
    //  $this->employee->insert();
      $this->email->message('HAHAHA Yaaaay!!! Pasok ka na!');
      $this->email->send();
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
