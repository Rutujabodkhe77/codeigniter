<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
		// echo "this is welcome controller!!";
	}
	public function test()
	{
		echo "this is test method for the view  controller!!";
	}
}
	 