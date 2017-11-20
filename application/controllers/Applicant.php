  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_Controller {

  public function index(){
    $this->load->model('Resume_model');
    $data['title'] = "Astrid Technologies | Resume Management";
    $data['applicants'] = $this->Resume_model->show_applicant_record();
    $this->load->view('include/header',$data);
    $this->load->view('include/sidebar', $data);
    $this->load->view('applicant/index',$data);
    $this->load->view('include/footer');
    
  }



  public function add_applicant() {

    $data['title'] = "Astrid Technologies | New Applicant";
    $this->load->view('include/header', $data);
     $this->load->view('include/sidebar', $data);
		$this->load->view('applicant/new');
    $this->load->view('include/footer');
	}

  public function get_pos_role($posid){
    $where = ['pos_id' => $posid];
    $role = $this->Resume_model->fetch('resume_role',$where);
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
    $current_status = 'Applicant';

    $this->form_validation->set_rules('resume_file','Resume','callback_validate_resume_file');
    //$this->form_validation->set_rules('image_file','Image','callback_validate_images_file');
    $this->form_validation->set_rules('email_address','Email Address','Is_unique[record.email]');
    $this->form_validation->set_rules('phone_number','Phone Number','Is_unique[record.phone_number]');
    $this->form_validation->set_rules('last_name','Last Name','required');
    $this->form_validation->set_rules('first_name','First Name','required');
    if($this->form_validation->run()==FALSE){
      echo json_encode(validation_errors());
    }else{
      $insert_data=[
        'id'=>$this->utilities->unique_id('record',8),
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
        'school' => clean_data($school),
        'images'=> $this->session->image,
        'current_status' => clean_data($current_status),
        'file' =>$this->session->resume,
        'application_date' => clean_data($this->input->post('application_date')),
        'available_date' => clean_data($this->input->post('available_date')),
        'interview_date'=>clean_data($this->input->post('interview_date'))
      ];
      $this->Resume_model->insert('resume_record',$insert_data);
      // print_r($last_inserted->id);die;


      // if($current_status == "Applicant") {
      //   $insert_data = [
      //        'current_status' => 'Applicant',
      //        'file' =>$this->session->resume,
      //        'application_date' => clean_data($this->input->post('application_date')),
      //        'available_date' => clean_data($this->input->post('available_date')),
      //       //  'user_id'  => $last_inserted->id
      //   ];
      //   $where_applicant = ['id'  => $last_inserted->id];
      //   $this->Resume_model->update('record',$insert_data,$where_applicant);
      // }
      
   
    echo json_encode('success');
       
    }

  }


  public function view($id){
    $this->load->model('Resume_model');
    // $applicant = $this->db->get_where('record', ['id' => $id])->row();
//
    $applicant = $this->Resume_model->fetch_tag_row('*','resume_record', ['id' => $id]);
    $join_where = $applicant->role_id;
    // print_r($join_where);die;  
    $applicant->name = $this->Resume_model->get_role($join_where)->name;
    $record_id = $applicant->id;
    // print_r($record_id);die;
  // $record_info = $this->Resume_model->fetch_tag_row('')
  $where = ['record_id' => $record_id];
	$result=$this->Resume_model->get_record($record_id);
	if($result){
		$record =   $this->Resume_model->join_employee_record($where);
	}
	else{
		$record = $this->db->get_where('resume_record', ['id' => $id])->row();
	}
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


  public function edit_view()
  {
    $this->load->helper('form');
    $id = $this->uri->segment(3);
    $this->load->model('Resume_model');
    $title['title'] = "Astrid Technologies | Edit Applicant";
    $data['applicant_data']= $this->db->get_where('resume_record', ['id' => $id])->row();
    $this->load->view('include/header',$title);
    $this->load->view('include/sidebar', $data);
    $this->load->view('applicant/edit', $data);
    $this->load->view('include/footer');

  }

  public function edit()
  {
    $this->load->helper('encryption');
    $now = new DateTime();
    $now->setTimezone(new DateTimezone('Asia/Manila'));
    $date_now = $now->format('Y-m-d');
    $status = $_POST['status'];
    $id = $_POST['id'];
    $to_email = $_POST['email_address'];
    $pos_id=$_POST['pos_id'];
    $update=[
      'first_name' => clean_data($this->input->post('first_name')),
      'last_name' => clean_data($this->input->post('last_name')),
      'middle_name' => clean_data($this->input->post('middle_name')),
      'email' => clean_data($to_email),
      'home_address' => clean_data($this->input->post('home_address')),
      'phone_number' => clean_data($this->input->post('phone_number')),
      'birthday' => clean_data($this->input->post('birth_date')),
      'school' => clean_data($this->input->post('school')),
      'degree' => clean_data($this->input->post('degree')),
      'comment' =>  clean_data($this->input->post('comment')),
      'current_status' => $status,
      'date_hired' => $date_now,
      'application_date'=>clean_data($this->input->post('application_date')),
      'pos_id'=>$pos_id,
      'interview_date'=>clean_data($this->input->post('interview_date'))
    ];
    
    $this->Resume_model->update('resume_record', $update,array('id'=>$id));
    // $this->email->initialize(array(
    //     'protocol' => 'mail',
    //     'smtp_user' => 'farrahdee24@gmail.com',
    //     'smtp_host' => 'localhost',
    //     'smtp_pass' => 'Chr!sBrown24',
    //     'smtp_port' => '25',
    //     'wordwrap' => TRUE,
    //     'mailtype' => 'html',
    //     'charset' => 'utf-8',
    //     'crlf' => "\r\n",
    //     'newline' => "\r\n"
    // ));

    $from_email ="farrahdee24@gmail.com";

    // $this->email->from($from_email, 'Farrah Dee');
    // $this->email->to($to_email);
    // $this->email->subject('Astrid Technologies');

    if($status == "Archived"){
      // $this->email->message('Failed!');
      // $this->email->send();
    }
    elseif($status == "Hired"){
      // $this->email->message('Passed!');
      // $this->email->send();
      $new_id=null;
      if($pos_id==1){
        $new_id=$this->utilities->unique_id('employees',8);
        $insert=[
          'record_id' => $new_id,
        ];
        $this->Resume_model->insert('resume_employees', $insert);
      }
      else if($pos_id==2){  
        $new_id=$this->utilities->unique_id('intern',8);
      }
      else if($pos_id==3){
       $new_id=$this->utilities->unique_id('freelance',8);
      }
      $update=[
        'id'=>$new_id,
        'current_status' => "Active",
      ];
     
      //$this->Resume_model->update('record', $update, 'id='.$id);
      $this->Resume_model->update('resume_record', $update,array('id'=>$id));
    }
    echo json_encode('success');
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
      $this->Resume_model->update('resume_record', $insert_result, ['id'=>$id]);
      echo json_encode('success');
    }
  }

  
  public function upload(){

    $config['upload_path'] = get_cwd()."assets/uploads";
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

     //return $data; 

  }


  public function getApplicants(){
    $result=$this->Resume_model->show_applicant_record();
    echo json_encode($result);

  }


}
