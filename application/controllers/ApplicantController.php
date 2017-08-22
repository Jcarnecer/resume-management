<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicantController extends CI_Controller {

  private function check_session() {
    if(!$this->session->userdata('hr_logged_in')){
      redirect('');
    }
  }
  public function index() {
  //  $this->check_session();
    $role = $_GET["role"] ?? null;
    $salary = $_GET["salary"] ?? null;
    $status = $_GET["status"] ?? null;
    $this->load->model('applicant');
    $data['title'] = "Astrid Technologies | Resume Management";

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
    $this->load->view('applicant/index',$data);


  }


  public function add_applicant() {
    $data['title'] = "Astrid Technologies | New Applicant";
    $this->load->model('role');
    $data['roles'] = $this->role->view_role();

    $this->load->view('include/header',$data);
		$this->load->view('applicant/new');
	}


  public function create_applicant(){

    $config['upload_path'] = "assets/uploads";
    $config['allowed_types'] = 'doc|pdf|docx';
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

    $this->load->model('applicant');
    $this->applicant->first_name = $_POST['first_name'];
    $this->applicant->last_name = $_POST['last_name'];
    $this->applicant->middle_name = $_POST['middle_name'];
    $this->applicant->degree = $_POST['degree'];
    $this->applicant->school = $_POST['school'];
    $this->applicant->position = $_POST['position'];
    $this->applicant->application_date = date("Y-m-d", strtotime($_POST['application_date']));
    $this->applicant->salary = $_POST['salary'];
    $this->applicant->comment = $_POST['comment'];
    $this->applicant->phone_no = $_POST['phone_no'];
    $this->applicant->bdate = $_POST['bdate'];
    $this->applicant->address = $_POST['address'];
    $this->applicant->email_add = $_POST['email_add'];
    $this->applicant->file = $resume;
    $this->applicant->application_status = 1;
    $this->applicant->category = 1;
    $this->applicant->password = sha1($_POST['password']);

    $this->applicant->insert();

    redirect('/applicant');

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

    $id = $this->uri->segment(3);
    // print_r($id);die;
    $this->load->model('applicant');

    $data['applicant_data']= $this->applicant->get($id);
    $this->load->view('include/header',$data);
    $this->load->view('applicant/edit', $data);

  }

  public function edit()
  {

    $config['upload_path'] = "assets/uploads";
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size'] = 2048;

    $this->load->library('upload', $config);

    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])):
        if ($this->upload->do_upload('image')):
        $image =  $this->upload->data('file_name');
        else:
            echo  $this->upload->display_errors();
        endif;
    else:
      echo "sobrang required";
    endif;

    $this->load->model('applicant');
    $this->applicant->first_name = $_POST['first_name'];
    $this->applicant->last_name = $_POST['last_name'];
    $this->applicant->middle_name = $_POST['middle_name'];
    $this->applicant->degree = $_POST['degree'];
    $this->applicant->school = $_POST['school'];
    $this->applicant->position = $_POST['position'];
    $this->applicant->application_date = date("Y-m-d", strtotime($_POST['application_date']));
    $this->applicant->salary = $_POST['salary'];
    $this->applicant->comment = $_POST['comment'];
    $this->applicant->phone_no = $_POST['phone_no'];
    $this->applicant->bdate = $_POST['bdate'];
    $this->applicant->address = $_POST['address'];
    $this->applicant->address = $_POST['email_add'];
    $this->applicant->id  = $_POST['id'];
    $this->applicant->images  = $image;
    $this->applicant->application_status = 1;

    $this->applicant->edit();

    redirect('/applicant');
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

  public function home(){
  //  $this->check_session();
    $this->load->model('role');
    $this->load->model('applicant');
    $data['role'] = $this->role->view_role();
    $data['count'] = $this->applicant->count();
    $this->load->view('include/header');

    $this->load->view('applicant/home', $data);
  }

  public function insert_role(){

   $this->load->model('role');

   $this->role->name = $_POST['name'];
   $this->role->insert_role();

   redirect('home');
 }

 public function view_employee(){
           $this->load->model('employee');

           $data['employee']=$this->employee->view_emp();
           $this->load->view('applicant/ViewEmployee', $data);
 }

public function view_add_employee(){
   $this->load->view('applicant/addEmployee');
}

public function add_employee(){
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

   //$this->applicant->category = 0;

   $this->employee->insert_emp();

   redirect('/home');
}



}
