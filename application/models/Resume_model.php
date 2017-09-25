<?php

class Resume_model extends CI_Model {

  public function insert($table,$data){
		$result = $this->db->insert($table,$data);
		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

  public function count($table,$data){

    if(empty($data)){
       $result=$this->db->get($table);

    }

    else{
      $result=$this->db->get_where($table,$data);
    }
       return $result->num_rows();

  }


  public function fetch($table, $where=""){
		if (!empty($where)) {
			$this->db->where($where);
		}
    $query = $this->db->get($table);
    if ($query->num_rows() > 0) {
      return $query->result();
    }else{
      return FALSE;
    }

  }

  public function delete($table,$where=""){
    if($where!=""){
      $this->db->where($where);
    }
    $result = $this->db->delete($table);
    if ($result) {
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function get($id)
  {
    $query = $this->db->get_where('applicants', ["id" => $id]);
    return $query->row();
  }


  public function get_where($key, $value)
  {
    $query = $this->db->get_where('applicants', [$key => $value]);
    return $query->result();
  }

  public function sort_by($key, $value)
  {
    $this->db->order_by($key, $value);
    $this->db->from('applicants');
    $query = $this->db->get();
    return $query->result();
  }

  public function edit()
  {
    $this->db->set('phone_number', $this->Resume_model->phone_number);
    $this->db->set('home_address', $this->Resume_model->home_address);
    $this->db->set('email_address', $this->Resume_model->email_address);
    $this->db->set('first_name', $this->Resume_model->first_name);
    $this->db->set('last_name', $this->Resume_model->last_name);
    $this->db->set('middle_name', $this->Resume_model->middle_name);
    $this->db->set('degree', $this->Resume_model->degree);
    $this->db->set('school', $this->Resume_model->school);
    $this->db->set('application_date', $this->Resume_model->application_date);
    $this->db->set('birth_date', $this->Resume_model->birth_date);
    $this->db->set('comment', $this->Resume_model->comment);
    $this->db->set('phone_number', $this->Resume_model->phone_number);
    $this->db->set('application_status', $this->Resume_model->application_status);
    $this->db->where('id' ,$this->id);
    $query = $this->db->update('applicants');
  }


  public function count_applicant($position = null, $application_status = null){
    if($position == null && $application_status == null){
      $query = $this->db->get('applicants');
    }
    else{
      $query = $this->db->get_where('applicants', ['position'=> $position, 'application_status' => $application_status]);
    }

      return $query->num_rows();
  }

  public function count_employee($position = null, $status = null){
    if($position == null && $status == null){
      $query = $this->db->get('employees');
    }
    else{
      $query = $this->db->get_where('employees', ['position'=> $position, 'status' => $status]);
    }
      return $query->num_rows();
  }

  public function addresult(){
    $this->db->set('exam_result', $this->Resume_model->exam_result);
    $this->db->set('interviewer', $this->Resume_model->interviewer);
    $this->db->set('interview_result', $this->Resume_model->interview_result);
    $this->db->set('interview_notes', $this->Resume_model->interview_notens);
    $this->db->where('id',$this->id);
    $query = $this->db->update('applicants');
  }

  public function join_applicants_roles(){
      $this->db->select('*');
      $this->db->from('applicants');
      $this->db->join('roles', 'roles.role_id = applicant.roles_id','inner');
      $query = $this->db->get();
      return $query->result();
  }
}
