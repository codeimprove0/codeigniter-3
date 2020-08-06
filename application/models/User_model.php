<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
  
	public function getRecord()
	{    
		$this->db->select('id,name');
		$this->db->from($this->db->dbprefix('al_user'));
		$query = $this->db->get()->result();  
		return $query;
	}
	 //  Active Record or Query Builder
	public function runQuery()
	{ 
		//----------- insert single-----------------------------
	/* 	$data = array(
				'name' =>  'third',
				'email' => 'second@gmail.com',
				'phone_no' => '8989676781',
				'password' => '12345'
		);
		$this->db->insert('student',$data);
			echo $this->db->insert_id();
		*/

		//   ----------multiple insert ------------
		/* $data = array(
			array(
					'name' =>  'first',
					'email' => 'first@gmail.com',
					'phone_no' => '8989676781',
					'password' => '12345'
			),
			array(
					'name' =>  'second',
					'email' => 'second@gmail.com',
					'phone_no' => '8989676781',
					'password' => '12345'
			)
		); 
	   $this->db->insert_batch('student', $data);
 */

		//---------- update---------------- 
		
		/* $data = array(
					'name' =>  'LAST',
					'email' => 'second@gmail.com',
					'phone_no' => '8989676781',
					'password' => '12345'
			); 
		$this->db->where('id', 2);
		$this->db->update('student', $data); */ 

		//--------- DELETE ------------------  
			/* $this->db->where('id', '2');
			$this->db->delete('student');
		  */

		  //------------ SELECT -----------------
		/*   $arrayId = array(1,2,3,4);
			$this->db->select('*');
			$this->db->from('student');
			$this->db->join('subject','subject.student_id=student.id','INNER');
			$this->db->where('student.id', '2');
			$this->db->where('student.id !=', '3');
			$this->db->or_where('student.id !=', '4');

			$this->db->where_in('student.id ', $arrayId);
			$this->db->or_where_in('student.id ', $arrayId);
			$this->db->where_not_in('student.id ', $arrayId);
			$this->db->or_where_not_in('student.id ', $arrayId);

			$this->db->like('student.name', 'test'); 
			$this->db->or_like('student.name', 'test');
			$this->db->not_like('student.name', 'test');
			$this->db->or_not_like('student.name', 'test');
			//$this->db->group_by('student.id');
			$this->db->group_by( array('student.id','student.name'));

			$this->db->order_by('student.id','ASC');
			$this->db->order_by('student.name','DESC');
			$this->db->limit(10,1); */

			//-------- set or inside and condition ------------
			/* $this->db->select('*')->from('student')
				->group_start()
						->where('name', 'test')
						->or_group_start()
								->where('id', '2')
								->where('name', 'my')
						->group_end()
				->group_end()
				->where('email', 'test@gmail.com')
				->get();  */
		//	echo "<pre>"; print_r($query); die; 

			echo $this->db->last_query(); die;
	}
}
