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

  public function update($table,$data,$where=""){
    if($where!="") {
        $this->db->where($where);
    }

    $result = $this->db->update($table,$data);
    if ($result) {
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function join_applicants_roles(){
      $this->db->select('*');
      $this->db->from('applicants');
      $this->db->join('roles', 'roles.role_id = applicant.roles_id','inner');
      $query = $this->db->get();
      return $query->result();
  }

  public function last_inserted_row($table,$data){
    $this->db->insert($table, $data);
    $last_id = $this->db->insert_id();
    $query = $this->db->get_where($table,array('id'=>$last_id));
    return $query->row();
  }
}
