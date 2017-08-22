<?php

class Employee extends CI_Model {

  public $last_name;
  public $first_name;
  public $middle_name;
  public $email_address;
  public $phone_number;
  public $birth_date;
  public $position;
  public $date_hired;
  public $sss;
  public $tin;
  public $philhealth;
  public $pagibig;


  public function insert_emp(){
    $this->db->insert('employees', $this->employee);
  }

  public function view_emp(){
    $query = $this->db->get('employees');
    return $query->result();
  }

}
