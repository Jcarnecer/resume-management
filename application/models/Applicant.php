<?php

class Applicant extends CI_Model {

  public $last_name;
  public $first_name;
  public $middle_name;
  public $email_add;
  public $degree;
  public $school;
  public $application_date;
  public $application_status;
  public $salary;
  public $position;
  public $comment;
  public $address;
  public $phone_no;
  public $bdate;
  public $file;
  public $images;
  public $id;
  public $category;
  public $date_hired;
  public $exam_result;
  public $interviewer;
  public $interview_result;
  public $interview_notes;

  /*public function insert_emp(){
    $this->db->insert('employees', $this->applicant);
  }*/

  public function insert(){
    $this->db->insert('applicants', $this->applicant);
  }

  public function all()
  {
    $query = $this->db->get('applicants');
    return $query->result();
  }

  public function fetch_tag_row($tag,$table,$where="",$limit="",$offset="",$order=""){
		if (!empty($where)) {
			$this->db->where($where);
		}
		if (!empty($limit)) {
			if (!empty($offset)) {
				$this->db->limit($limit, $offset);
			}else{
				$this->db->limit($limit);
			}
		}
		if (!empty($order)) {
			$this->db->order_by($order);
		}
		$this->db->select($tag);
		$this->db->from($table);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
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
    $this->db->set('first_name', $this->applicant->first_name);
    $this->db->set('middle_name', $this->applicant->middle_name);
    $this->db->set('last_name', $this->applicant->last_name);
    $this->db->set('comment', $this->applicant->comment);
    $this->db->set('phone_no', $this->applicant->phone_no);
    $this->db->set('address', $this->applicant->address);
    $this->db->set('email_add', $this->applicant->email_add);
    $this->db->set('application_status', $this->applicant->application_status);
    $this->db->where('id' ,$this->id);
    $query = $this->db->update('applicants');
  }


  public function count($position = null, $application_status = null){
    if($position == null && $application_status == null){
      $query = $this->db->get('applicants');
    }
    else{
      $query = $this->db->get_where('applicants', ['position'=> $position, 'application_status' => $application_status]);
    }

      return $query->num_rows();
  }

  public function addresult(){

    $this->db->set('exam_result', $this->applicant->exam_result);
    $this->db->set('interviewer', $this->applicant->interviewer);
    $this->db->set('interview_result', $this->applicant->interview_result);
    $this->db->set('interview_notes', $this->applicant->interview_notes);
    $this->db->where('id',$this->id);
    $query = $this->db->update('applicants');

  }

  public function delete() {
    return $this->db->delete('applicants', ['id' => $this->applicant->id]);
  }


}
