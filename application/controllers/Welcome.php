<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function demo()
	{ 
		$this->load->view('welcome_message');
	}
}


/* $this->db->select('*')
				  ->from('student')
				  ->join('subject', 'subject.student_id = student.id','Left')
				  ->where(['subject.id'=>1])
				  ->limit('1')
				  ->group_by('subject.id')
				  ->order_by('subject.id','DESC');
		$query = $this->db->get()->result();  
	//	echo "<pre>"; print_r($query); die;
		echo $this->db->last_query(); die;
	///	echo "<pre>";  print_r($query); die;



    	$this->db->select('*')
				  ->from('student')
				  ->join('subject', 'subject.student_id = student.id','Left')
				  ->where(['subject.id'=>1])
				  ->group_start()
					->where('student_id','Tove')
					->or_where('subject.name','Ola')
					->or_where('email','M') 
				->group_end()
				  ->limit('1')
				  ->group_by('subject.id')
				  ->order_by('subject.id','DESC');
		$query = $this->db->get()->result();  
	//	echo "<pre>"; print_r($query); die;
		echo $this->db->last_query(); die;
	///	echo "<pre>";  print_r($query); die; */