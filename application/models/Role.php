<?php

class Role extends CI_Model {


  public $name;

  public function insert_role(){
    $this->db->insert('role', $this->role);
  }

  public function view_role(){
    $query = $this->db->get('role');
    return $query->result();

  }

}
