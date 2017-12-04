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
  public function count_applicant(){
    $status=array('Active','Inactive');
    $this->db->select('resume_record.id,resume_record.images,resume_record.last_name,resume_record.first_name,resume_role.name,resume_position.name as pos_name,resume_record.current_status,resume_record.file');
    $this->db->from('resume_record');
    $this->db->join('resume_role', 'resume_record.role_id = resume_role.role_id','inner');
    $this->db->join('resume_position', 'resume_record.pos_id =resume_position.id','inner');
    $this->db->where_not_in('resume_record.current_status',$status); 
    $result = $this->db->get();
    return $result->num_rows();  
}
public function count_record($data){
      $status=array('Active','Inactive');
      $this->db->select('resume_record.id,resume_record.images,resume_record.last_name,resume_record.first_name,resume_role.name,resume_record.current_status');
      $this->db->from('resume_record');
      $this->db->where($data);
      $this->db->where_in('resume_record.current_status',$status);
      $this->db->join('resume_role','resume_record.role_id = resume_role.role_id','inner'); 
      $result = $this->db->get();
      return $result->num_rows();  
  }
  public function fetch($table, $where=""){
		if (!empty($where)) {
      $this->db->where($where);
      $this->db->order_by("created_at","desc");
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
    $query = $this->db->get_where('resume_employees', ["record_id" => $id]);
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
    $this->db->from('resume_position');
    // $this->db->join('employees', 'record.id = employees.record_id','inner');
    // $this->db->join('role', 'record.role_id = role.role_id','inner');
    $this->db->where('id', $where);
    $query = $this->db->get();
    return $query->row();
  }
  public function get_role_position(){
    $this->db->select('resume_role.role_id,resume_role.name,resume_position.name as pos_name,resume_role.status,resume_position.id as pos_id');
    $this->db->from('resume_role');
    $this->db->join('resume_position', 'resume_role.pos_id = resume_position.id','inner'); 
    // $this->db->join('role', 'record.role_id = role.role_id','inner');
    $query = $this->db->get();
    return $query->result();
  }
  public function get_role($where){
      $this->db->select('name');
      $this->db->from('resume_role');
      // $this->db->join('employees', 'record.id = employees.record_id','inner');
      // $this->db->join('role', 'record.role_id = role.role_id','inner');
      $this->db->where('resume_role.role_id', $where);
      $query = $this->db->get();
      return $query->row();
  }
  
  public function join_employee_record($where){
    $this->db->select('resume_employees.*,resume_record.*');
    $this->db->from('resume_record');
    $this->db->where($where);
    $this->db->join('resume_employees', 'resume_record.id = resume_employees.record_id','inner');
    // $this->db->join('role', 'record.role_id = role.role_id','inner');
    $query = $this->db->get();
    return $query->row();
    }
    
  public function show_record($where){
        $status=array('Active','Inactive');
       $this->db->select('resume_record.id,resume_record.images,resume_record.last_name,resume_record.first_name,resume_role.name,resume_record.current_status');
        $this->db->from('resume_record');
        $this->db->where($where);
        $this->db->where_in('resume_record.current_status',$status);
        $this->db->join('resume_role','resume_record.role_id = resume_role.role_id','inner'); 
        $query = $this->db->get();
        return $query->result();
    }
    public function show_applicant_record(){
      $status=array('Active','Inactive');
      $this->db->select('resume_record.id,resume_record.images,resume_record.last_name,resume_record.first_name,resume_role.name,resume_position.name as pos_name,resume_record.current_status,resume_record.file');
      $this->db->from('resume_record');
      $this->db->join('resume_role', 'resume_record.role_id = resume_role.role_id','inner');
      $this->db->join('resume_position', 'resume_record.pos_id = resume_position.id','inner');
      $this->db->where_not_in('resume_record.current_status',$status); 
      $query = $this->db->get();
      return $query->result();
    }
  
  
  public function last_inserted_row($table,$data){
    $this->db->insert($table, $data);
    $last_id = $this->db->insert_id();
    $query = $this->db->get_where($table,array('id'=>$last_id));
    return $query->row();
  }
  
  public function get_last_row(){
    $result=$this->db->query('select id from resume_record WHERE created_at=(SELECT Max(created_at) FROM resume_record where pos_id=1)');
    return $result->row();
  }
}
