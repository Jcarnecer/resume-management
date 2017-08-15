<?php

class Role extends CI_Model {


  public $addrole;

  public function insert_role(){
    $this->db->insert('role', $this->role);
  }

  public function view_role(){
    $query = $this->db->get('role');
    return $query->result();

  }
  public function count(){
    $query = $this->db->get('applicants');
    return $query->num_rows();
  }
  public function count_java(){
    $this->db->where('position','Java Developer');
    $query = $this->db->get('applicants');
    return $query->num_rows();
  }

  public function count_web(){
    $this->db->where('position','Web Developer');
    $query = $this->db->get('applicants');
    return $query->num_rows();
  }

}
