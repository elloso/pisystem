<?php

class Login_Controller extends CI_Controller
{

	public function loginPage()
	{
		$this->load->view('auth/login');
	}
}
