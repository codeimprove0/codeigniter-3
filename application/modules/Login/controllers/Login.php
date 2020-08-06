<?php
class Login extends MX_Controller
{
    function __construct()
    {
        parent::__construct(); 
		$this->load->model("login_model");
    }

	public  function index()
    {

		echo "yes"; die; 
    }
 


}

?>