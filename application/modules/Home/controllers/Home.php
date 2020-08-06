<?php
class Home extends MX_Controller
{
    function __construct()
    {
        parent::__construct();  
    }

	public  function index()
    {

		 $this->load->view('home');
    }
 


}

?>