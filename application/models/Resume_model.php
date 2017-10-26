<?php

class Resume_model extends CI_Model {

  public function __construct()
    {
        parent::__construct();
        $this->db->reconnect();
    }

  public function insert($table,$data){
		$result = $this->db->insert($table,$data);
		if ($result) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

  public function get_insert_id(){
    return $this->db->insert_id();
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
	public function get_record($id)
  {
    $query = $this->db->get_where('employees', ["record_id" => $id]);
    return $query->row();
  }

  
  public function get_where($key, $value)
  {
    $query = $this->db->get_where('applicants', [$key => $value]);
    return $query->num_rows();
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
  public function get_pos_name($where){
    $this->db->select('name');
    $this->db->from('position');
    // $this->db->join('employees', 'record.id = employees.record_id','inner');
    // $this->db->join('role', 'record.role_id = role.role_id','inner');
    $this->db->where('id', $where);
    $query = $this->db->get();
    return $query->row();
  }


  public function get_role_position(){
    $this->db->select('role.role_id,role.name,position.name as pos_name,role.status,position.id as pos_id');
    $this->db->from('role');
    $this->db->join('position', 'role.pos_id = position.id','inner'); 
    // $this->db->join('role', 'record.role_id = role.role_id','inner');
    $query = $this->db->get();
    return $query->result();
  }

  public function get_role($where){
      $this->db->select('name');
      $this->db->from('role');
      // $this->db->join('employees', 'record.id = employees.record_id','inner');
      // $this->db->join('role', 'record.role_id = role.role_id','inner');
      $this->db->where('role_id', $where);
      $query = $this->db->get();
      return $query->row();
  }

  

  public function join_employee_record($where){
    $this->db->select('employees.*,record.*');
    $this->db->from('record');
    $this->db->where($where);
    $this->db->join('employees', 'record.id = employees.record_id','inner');
    // $this->db->join('role', 'record.role_id = role.role_id','inner');
    $query = $this->db->get();
    return $query->row();
    }

    
  public function show_record($where){
        $this->db->select('record.id,record.images,record.last_name,record.first_name,role.name,record.current_status');
        $this->db->from('record');
        $this->db->where($where);
        $this->db->join('role','record.role_id = role.role_id','inner'); 
        $query = $this->db->get();
        return $query->result();
    }

    public function show_applicant_record($where){
      $this->db->select('record.id,record.images,record.last_name,record.first_name,role.name,position.name as pos_name,record.current_status,record.file');
      $this->db->from('record');
      $this->db->where($where);
      $this->db->join('role', 'record.role_id = role.role_id','inner');
      $this->db->join('position', 'record.pos_id = position.id','inner');  

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


