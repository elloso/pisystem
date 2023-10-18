<?php

class Post_Controller extends CI_Controller{

    public function Dashboard(){
        $this->load->view('template/header');
        $this->load->view('dashboard');
        $this->load->view('template/footer');
    }

} // End Bracket
