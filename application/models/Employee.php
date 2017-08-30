<?php

class Employee extends CI_Model {

  public $last_name;
  public $first_name;
  public $middle_name;
  public $email_address;
  public $home_address;
  public $phone_number;
  public $birth_date;
  public $position;
  public $date_hired;
  public $sss;
  public $tin;
  public $philhealth;
  public $pagibig;
  public $status;




  public function insert(){
    $this->db->insert('employees', $this->employee);
  }

  public function view(){
    $query = $this->db->get('employees');
    return $query->result();
  }

  public function get($key,$value){
    $query = $this->db->get_where('employees',[$key => $value]);
    return $query->result();
  }

  public function count(){
     $query = $this->db->get('employees');
     return $query->num_rows();
  }
  public function count_former(){
    $this->db->where('status', 0);
    $query = $this->db->get('employees');
    return $query->num_rows();
  }

  public function count_current(){
    $this->db->where('status', 1);
    $query = $this->db->get('employees');
    return $query->num_rows();
  }
}
