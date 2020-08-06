<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model {
  
	public function addRecord($data){  
		$this->db->insert('student',$data); 
		return $this->db->insert_id(); 
	}
	public function getRecord($limit,$start)
	{    
		$this->db->select('*');
		$this->db->from('student');
		$this->db->limit($limit, $start);
		$query = $this->db->get()->result();   
		return $query;
	}
	
	public function getUserInfoById($id)
	{    
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('id', $id);
		$query = $this->db->get()->row();    
		return $query;
	}
	public function updateRecord($data,$id)
	{ 
		$this->db->where('id', $id);
		$this->db->update('student',$data);
		return true;
	}
	public function deleteRecord($id)
	{ 
		$this->db->where('id', $id);
		$this->db->delete('student');
		return true;
	}
	public function getTotalRow()
	{ 
		return $this->db->count_all("student");
	}
	 
 
 
}
