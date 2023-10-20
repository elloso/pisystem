<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Model extends CI_Model
{
    public function getUserByUserIdOrEmail($rEmail)
    {
        $this->db->select('*');
        $this->db->from('tbluser');
        $this->db->where('email', $rEmail);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    public function insertUserData($rEmail, $password, $rfirst_name, $rLast_name, $rUser_type)
    {
        $rfirst_name = strip_tags($rfirst_name);
        $rLast_name = strip_tags($rLast_name);
        $rEmail = strip_tags($rEmail);
        $rUser_type = strip_tags($rUser_type);

        $data = array(
            'first_name' => $rfirst_name,
            'last_name' => $rLast_name,
            'email' => $rEmail,
            'password' => $password,
            'user_type' => $rUser_type

        );
        return $this->db->insert('tbluser', $data);
    }
    public function Authenticate($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('tbluser');
        if ($query->num_rows() === 0) {
            return false;
        }
        $user = $query->row();
        if (password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }
    public function update_password($id, $new_password)
    {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $data = array(
            'password' => $hashed_password
        );
        $this->db->where('id', $id);
        $this->db->update('tbluser', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
