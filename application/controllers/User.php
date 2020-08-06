<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();		 
		$this->load->model('user_model');
	}
  
	public function index()
	{   
		$this->load->helper('message');
		

		$this->load->library('codeimprove');
	    $this->codeimprove->dataprint(12); 
		//$this->load->model('user_model','test');
		$userInfo = $this->user_model->getRecord();  

		$data = array();
		$data['title'] = "Code Improve";
		$data['list'] = array('Ram','Mahesh','Rahul');
		$data['user_info'] = $userInfo;
		$this->load->view('user',$data);
	}

	public function add()
	{ 
		$this->load->view('user_add');
	}

	public function setdata(){
		$this->load->view('set_data');
	}
	
	public function setsession(){ 
		 $value = array('USER_NAME'=>$this->input->post('username'));
		 $this->session->set_userdata($value);
		 redirect('/user/userwelcome');
	}
	
	public function sessionout(){
		$this->session->sess_destroy(); 
		//~$this->session->sess_userdata('USER_NAME'); 
		redirect('/user/userwelcome');
	}

	public function userwelcome(){
		$this->load->view('userwelcome');
    }

	public function codeData()
	{ 
	  
		  echo $this->uri->segment(3); echo "<br/>";
		  echo $this->uri->segment(4); echo "<br/>";
		  echo "yes";
	}
 
	public function query()
	{ 
		$this->user_model->runQuery();  
	}
}

