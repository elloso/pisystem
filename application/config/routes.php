<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Login
$route['default_controller'] = 'Login_Controller/loginPage';

// Post
$route['dashboard'] = 'Post_Controller/Dashboard';

//Stocks forms
$route['purchase'] = 'Post_Controller/PurchaseOrder';
$route['inspection'] = 'Post_Controller/InspectionAcceptance';
$route['acknowledgement'] = 'Post_Controller/PropertyAcknowledgement';
$route['custodian'] = 'Post_Controller/InventoryCustodian';
$route['propertycard'] = 'Post_Controller/PropertyCard';
$route['stockcard'] = 'Post_Controller/StockCard';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
