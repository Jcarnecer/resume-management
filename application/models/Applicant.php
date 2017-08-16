<?php

class Applicant extends CI_Model {

//Kailangan parehas yung variable at name ng nasa db
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
  public $password;
  public $id;
  public $category;

  public $date_hired;
  public $sss;
  public $tin;
  public $philhealth;
  public $pagibig;



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
    $this->db->where('id',$this->id);
    $query = $this->db->update('applicants', $this->applicant);
  }

  public function count($position = null){
    if($position == null){
      $query = $this->db->get('applicants');
    }else{
      $query = $this->db->get_where('applicants', ['position'=> $position]);
    }
      return $query->num_rows();

  }


/*  public function update_status($application_status, $id)
  {
    $this->db->set('application_status',$application_status);
    $this->db->where('id', $id)
    $this->db->update('applicants');
  } */

}
