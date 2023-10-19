<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Login
$route['default_controller'] = 'Login_Controller/loginPage';
$route['login'] = 'Login_Controller/loginPage';
$route['logout-page'] = 'Login_Controller/logoutPage';
// account
$route['update-password'] = 'Login_Controller/updatePassword';
$route['change-password'] = 'Post_Controller/changePassword';
$route['save-user'] = 'Login_Controller/saveUser';
$route['login-user'] = 'Login_Controller/loginUser';
// Post
$route['dashboard'] = 'Post_Controller/Dashboard';
//Stocks forms
$route['purchase'] = 'Post_Controller/PurchaseOrder';
$route['inspection'] = 'Post_Controller/InspectionAcceptance';
$route['acknowledgement'] = 'Post_Controller/PropertyAcknowledgement';
$route['custodian'] = 'Post_Controller/InventoryCustodian';
$route['propertycard'] = 'Post_Controller/PropertyCard';
$route['stockcard'] = 'Post_Controller/StockCard';

// account/maintenance
$route['account-list'] = 'Post_Controller/accountList';





$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
