<?php

class Employee extends CI_Model {

  function insert_into() {
    $q = $this->db->get('employees')->result(); // get first table
    foreach ($q as $r) { // loop over results
        $this->db->insert('employees', $r); // insert each row to another table
    }
  }


  public function view() {
    $query = $this->db->get('employees');
    return $query->result();
  }


  public function get($key, $value) {
    $query = $this->db->get_where('employees', [$key => $value]);
    return $query->result();
  }


}
