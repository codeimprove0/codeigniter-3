<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();		
		$this->load->library('form_validation');
		$this->load->model('registration_model');
		$this->load->library('pagination'); 
		$this->load->library('upload');
	}

	public function index()
	{    
		 echo "call registration function";
	}
 

	public function add()
	{    
		if($this->uri->segment(3)){
			$data['pageType'] = 'Update';
			$editId = $this->uri->segment(3);
			$data['editInfo'] =  $this->registration_model->getUserInfoById($editId);
		}else{
			$data['pageType'] = 'Add';
		}
		
		if($this->input->post()){  

			$config = array(
				'file_name'=>time(),
				'overwrite'=>TRUE,
				'max_width'=>'1028',
				'max_height'=>'800',
				'max_size'=>'24000000',
				'allowed_types' => "gif|jpg|png|jpeg",
				'upload_path'=>'public/images' 
			); 
			$this->upload->initialize($config); 
			if($this->upload->do_upload('profile_pic')){
				 $imageData = $this->upload->data();
				 $data['editInfo']->profile_pic;
				$fileName = $imageData['file_name'];
				$record['profile_pic'] = $fileName; 
				unlink($_SERVER['DOCUMENT_ROOT'].'/code/public/images/'.$data['editInfo']->profile_pic);
				
			}/* else{
				echo $this->upload->display_errors();
			}  */ 
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('userName','Username','trim|required|callback_checkName');
			$this->form_validation->set_rules('emailId','Email','trim|required|valid_email');
			$this->form_validation->set_rules('phoneNo','Phone NO','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[password]');
			$this->form_validation->set_message('required', '{field} must be filled');
			$this->form_validation->set_message('valid_email', 'Valid error');
			
			if($this->form_validation->run() !== FALSE){

				$record['name'] = $this->input->post('userName');
				$record['email'] = $this->input->post('emailId');
				$record['phone_no'] = $this->input->post('phoneNo');
				$record['password'] = $this->input->post('password'); 

				
				
				if($data['pageType'] =='Update'){
					$response  = $this->registration_model->updateRecord($record,$editId);
				}else{
				   $response  = $this->registration_model->addRecord($record);
				}
				if($response){
					$messge = array('message' => $data['pageType'].' successfully','class' => 'alert alert-success');
					$this->session->set_flashdata('myMsj', $messge);
				}else{
					$messge = array('message' => 'Something went wrong','class' => 'alert alert-danger');
					$this->session->set_flashdata('myMsj',$messge );
				}
				redirect('/Registration/table');
			} 
		 
		}
		$title = $data['pageType'].' Registration';
		$this->load->view('common/header',array('title'=>$title));
		$this->load->view('reg_form',$data);
		$this->load->view('common/footer');
	}
	public function table(){ 

		$param = array();
		$start = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) : 0;
		$limit = 4;
		$config['base_url'] = base_url() . '/Registration/table';
		$config['total_rows'] = $this->registration_model->getTotalRow(); 
		$config['per_page'] = $limit;
		$config["uri_segment"] = 3;

		//////////////////////////////
		$config['num_links'] = 2;
		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;
		
		$config['full_tag_open'] = '<div class="pagination sdsds">';
		$config['full_tag_close'] = '</div>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<button class="firstlink">';
		$config['first_tag_close'] = '</button>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<button class="lastlink">';
		$config['last_tag_close'] = '</button>';
		
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<button class="nextlink">';
		$config['next_tag_close'] = '</button>';

		$config['prev_link'] = 'Prev Page';
		$config['prev_tag_open'] = '<button class="prevlink">';
		$config['prev_tag_close'] = '</button>';

		$config['cur_tag_open'] = '<button class="curlink">';
		$config['cur_tag_close'] = '</button>';

		$config['num_tag_open'] = '<button class="numlink">';
		$config['num_tag_close'] = '</button>';

		/////////////////////////////////////
		 
		$this->pagination->initialize($config);

		$param['userList'] =  $this->registration_model->getRecord($limit,$start); 
		$param['links'] = $this->pagination->create_links();

		$this->load->view('common/header');
		$this->load->view('reg_table',$param);
		$this->load->view('common/footer'); 
	} 
	public function delete($id){  
		$record = $this->registration_model->getUserInfoById($id);
		unlink($_SERVER['DOCUMENT_ROOT'].'/code/public/images/'.$record->profile_pic);
		$response =  $this->registration_model->deleteRecord($id);
		if($response){
			$messge = array('message' =>  'Deleted successfully','class' => 'alert alert-success');
			$this->session->set_flashdata('myMsj', $messge);
		}else{
			$messge = array('message' => 'Something went wrong','class' => 'alert alert-danger');
			$this->session->set_flashdata('myMsj',$messge );
		}
		redirect('/Registration/table');
	}

	public function checkName($str){ 
		if ($str == 'test')
		{
			$this->form_validation->set_message('checkName', 'The {field} field can not be the word "test"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}  
	}
  
 
		
}

