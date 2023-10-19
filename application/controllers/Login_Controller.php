<?php

class Login_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Login_Model');
		$this->load->library('form_validation');
	}

	public function loginPage()
	{
		$this->load->view('auth/login');
	}
	// KD$8j02_
	public function saveUser()
	{
		$rfirst_name = $this->input->post('rfirst_name');
		$rLast_name = $this->input->post('rLast_name');
		$rEmail = $this->input->post('rEmail');
		$rUser_type = $this->input->post('rEmail');

		if (empty($rfirst_name) || empty($rLast_name) || empty($rEmail) || empty($rUser_type)) {
			$this->session->set_flashdata('login-error', 'All fields must be filled out');
			redirect('account-list');
		} else {
			$existing_user = $this->Login_Model->getUserByUserIdOrEmail($rEmail);
			if ($existing_user) {
				$this->session->set_flashdata('error', 'User ID or email already exists');
				redirect('account-list');
			}
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&_";
			$password = substr(str_shuffle($chars), 0, 8);
			$hash_password = password_hash($password, PASSWORD_DEFAULT);
			$inserted = $this->Login_Model->insertUserData($rEmail, $hash_password, $rfirst_name, $rLast_name, $rUser_type);
			if ($inserted) {
				$_SESSION['plain_password'] = $password;
				$this->session->set_flashdata('success', 'User Password is: ' . $password);
				redirect('account-list');
			} else {
				$this->session->set_flashdata('error', 'Failed to add account');
				redirect('account-list');
			}
		}
	}
	public function loginUser()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if (empty($email) && empty($password)) {
			$this->session->set_flashdata('login-error', 'Email and password must be filled out!');
			redirect(base_url('login'));
		} else {
			$this->load->model('Login_Model');
			$is_authenticated = $this->Login_Model->Authenticate($email, $password);
			if ($is_authenticated) {
				$user_data = array(
					'is_login' => TRUE,
					'email' => $is_authenticated->email,
					'password' => $password,
				);
				$this->session->set_userdata($user_data);
				if ($is_authenticated->user_type == 'Admin') {
					redirect(base_url('dashboard'));
				} else if ($is_authenticated->user_type == 'User') {
					redirect(base_url('dashboard'));
				}
			} else {
				$this->session->set_flashdata('login-error', 'Invalid email or password.');
				redirect(base_url('login'));
			}
		}
	}
	public function updatePassword()
	{
		$email = $this->input->post('email');
		$newPassword = $this->input->post('newPassword');
		$confirmPassword = $this->input->post('confirmPassword');
	}
	public function logoutPage()
	{
		$this->load->library('session');
		$this->session->unset_userdata('email');
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
