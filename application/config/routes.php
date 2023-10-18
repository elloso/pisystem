<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Login
$route['default_controller'] = 'Login_Controller/loginPage';

// Post
$route['dashboard'] = 'Post_Controller/Dashboard';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
