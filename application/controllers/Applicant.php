  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller {

  public function index(){
    $this->load->model('Resume_model');
    $data['title'] = "Astrid Technologies";
    $data['role'] = $this->Resume_model->fetch('role');
    $data['role_applicant'] = $this->Resume_model->fetch('role',['applicant' => 1]);
    $data['role_employee'] = $this->Resume_model->fetch('role',['pos_id' => 1]);
    $data['role_intern'] = $this->Resume_model->fetch('role',['pos_id' => 2]);
    $this->load->view('include/sidebar');
    $this->load->view('applicant/index', $data);
  }

  public function applicants() {
    $role = $_GET['role'];
    $status = $_GET['status'];
    $current_status = $_GET['current_status'];
    $data['title'] = "Astrid Technologies | Resume Management";
    $this->load->view('include/sidebar', $data);
  //$data['role'] = $this->Resume_model->fetch('role','id='.$role);

    $query = [];

    if ($role != null) {
      $query["role_id"] = $role;
    }
    if($current_status != null){
      $query["current_status"] = $current_status;
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

    $data['title'] = "Astrid Technologies | New Applicant";
    $this->load->view('include/sidebar', $data);
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

  public function validate_notes_file() {

    if (isset($_FILES['notes_file']) && !empty($_FILES['notes_file']['name'])) {
      if ($this->upload->do_upload('notes_file')) {
        $this->session->notes =  $this->upload->data('file_name');
        return true;
      } else {
        $this->form_validation->set_message('validate_notes_file', $this->upload->display_errors());
        return false;
      }
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
    $current_status = $_POST['current_status'];

    $this->form_validation->set_rules('resume_file','Resume','callback_validate_resume_file');
    $this->form_validation->set_rules('image_file','Image','callback_validate_images_file');

    if($this->form_validation->run()==FALSE){
      echo json_encode(validation_errors());
    }else{
      $insert_data=[
        'first_name' => clean_data(ucwords($first_name)),
        'last_name'  => clean_data(ucwords($last_name)),
        'middle_name' => clean_data(ucwords($middle_name)),
        'degree' => clean_data(ucwords($degree)) ,
        'role_id' => clean_data($this->input->post('role')), //java dev, rails dev etc.
        'pos_id' => clean_data($this->input->post('position')), // employee, intern
        'email' => clean_data($email_address),
        'comment' => clean_data(ucwords($comment)),
        'home_address' => clean_data(ucwords($home_address)),
        'phone_number' => clean_data($phone_number),
        'birthday' => clean_data($birth_date),
        'images'=> $this->session->image,
        'current_status' => clean_data(ucwords($this->input->post('current_status')))
      ];
      $last_inserted = $this->Resume_model->last_inserted_row('record',$insert_data);
      // print_r($last_inserted->id);die;
      if($current_status == "applicant") {
        $insert_data = [
             'application_status' => 1,
             'file' => $this->session->resume,
             'application_date' => clean_data($this->input->post('application_date')),
             'available_date' => clean_data($this->input->post('available_date')),
            //  'user_id'  => $last_inserted->id
        ];
        $where_applicant = ['id'  => $last_inserted->id];
        $this->Resume_model->update('record',$insert_data,$where_applicant);
      }else if($current_status = "current" || $current_status == "former"){
        $insert_empdata = [

             'application_status' => NULL,
             'date_hired'=> clean_data($this->input->post('date_hired')),
             'images'=> $this->session->image,
          ];

        $insert_employee=[
              'sss' => clean_data(ucwords($this->input->post('sss'))),
              'tin' => clean_data(ucwords($this->input->post('tin'))),
              'philhealth' => clean_data(ucwords($this->input->post('philhealth'))),
              'pagibig' => clean_data(ucwords($this->input->post('pagibig'))),
              'record_id' => $last_inserted->id
        ];
        // $last_inserted = $this->Resume_model->last_inserted_row('record',$insert_data);
        $where_employee = ['id'  => $last_inserted->id];
        $this->Resume_model->update('record',$insert_empdata,$where_employee);
        $this->Resume_model->insert('employees', $insert_employee);
        // print_r($insert_data);die;
      }
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
    $this->load->helper('form');
    $id = $this->uri->segment(3);
    $this->load->model('Resume_model');
    $title['title'] = "Astrid Technologies | New Applicant";
    $data['applicant_data']= $this->db->get_where('record', ['id' => $id])->row();
    $this->load->view('include/header',$title);
    $this->load->view('applicant/edit', $data);

  }

  public function edit()
  {
    $this->load->helper('encryption');
    $now = new DateTime();
    $now->setTimezone(new DateTimezone('Asia/Manila'));
    $date_now = $now->format('Y-m-d');

    $status = $_POST['status'];
    $id = $_POST['id'];
    $current_status = "current";
    $to_email = $_POST['email_address'];

    $update=[
      'first_name' => clean_data($this->input->post('first_name')),
      'last_name' => clean_data($this->input->post('last_name')),
      'middle_name' => clean_data($this->input->post('middle_name')),
      'email' => clean_data($to_email),
      'home_address' => clean_data($this->input->post('home_address')),
      'phone_number' => clean_data($this->input->post('phone_number')),
      'birthday' => clean_data($this->input->post('birthday')),
      'school' => clean_data($this->input->post('school')),
      'degree' => clean_data($this->input->post('degree')),
      'comment' =>  clean_data($this->input->post('comment')),
      'application_status' => $status,
    ];
    $this->Resume_model->update('record', $update, 'id='.$id);

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
      $update=[
        'current_status' => "current",
      ];
      $this->Resume_model->update('record', $update, 'id='.$id);

    endif;
    redirect('');
  }

  public function add_result()
  {
    $this->load->helper('encryption');
    $config['upload_path'] = "assets/uploads";
    $config['allowed_types'] = 'doc|pdf|docx|jpg|jpeg|png';
    $config['max_size'] = 2048;
    $this->load->library('upload', $config);

    $id = $_POST['id'];
    $this->form_validation->set_rules('notes_file','Notes','callback_validate_notes_file');

    if($this->form_validation->run()==FALSE){
      echo json_encode(validation_errors());
    }else{
      $insert_result=[
        'exam_result' => clean_data($this->input->post('exam_result')),
        'interview_result' => clean_data($this->input->post('interview_result')),
        'interviewer' => clean_data($this->input->post('interviewer')),
        'interview_notes' => $this->session->notes,
    ];
      $this->Resume_model->update('record', $insert_result, 'id='.$id);
    redirect('');
    }
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
  $this->Resume_model->delete('role',['role_id' => $id]);
  $this->Resume_model->delete('record',['role_id'=>$id]);
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
