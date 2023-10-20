<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Function_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Login_Model');
        $this->load->model('Function_Model');
    }
    public function generatePassword($genpas)
    {
        if (!$genpas) {
            $this->session->set_flashdata('error', 'User ID does not exist');
            redirect(base_url('account-list'));
            return;
        }
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&_";
        $password = substr(str_shuffle($chars), 0, 8);
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $result = $this->Function_Model->generate_password($genpas, $hash_password);
        if ($result) {
            $_SESSION['new_generated_password'] = $password;
            $this->session->set_flashdata('success', 'User new Password is: ' . $password);
            redirect(base_url('account-list'));
        } else {
            $this->session->set_flashdata('error', 'Generate password failed!');
            redirect(base_url('account-list'));
        }
    }
    public function deleteUser($rmvuser)
    {
        if (!$rmvuser) {
            $this->session->set_flashdata('error', 'User ID does not exist');
            redirect(base_url('account-list'));
            return;
        }
        $result = $this->Function_Model->remove_userModel($rmvuser);
        if ($result) {
            $this->session->set_flashdata('success', 'Remove user successful!');
            redirect('account-list');
        } else {
            $this->session->set_flashdata('error', 'Remove user failed!');
            redirect('account-list');
        }
    }
    public function updateAccount()
    {
        $id = $this->input->post('id');
        $first_name = $this->input->post('name');
        $last_name = $this->input->post('last_name');
        $result = $this->Function_Model->update_user_details($id, $first_name, $last_name);
        if ($result) {
            $this->session->set_flashdata('success', 'Profile updated successfully.');
            redirect(base_url('my-account'));
        } else {
            $this->session->set_flashdata('error', 'Profile update failed.');
            redirect(base_url('my-account'));
        }
    }
}
