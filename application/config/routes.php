<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Login
$route['default_controller'] = 'Login_Controller/loginPage';
$route['login'] = 'Login_Controller/loginPage';
$route['logout-page'] = 'Login_Controller/logoutPage';
// account
$route['change-password'] = 'Post_Controller/changePassword';
$route['my-account'] = 'Post_Controller/myAccount';
$route['update-password'] = 'Login_Controller/updatePassword';
$route['save-user'] = 'Login_Controller/saveUser';
$route['login-user'] = 'Login_Controller/loginUser';
$route['update-account'] = 'Function_Controller/updateAccount';
$route['delete-user/(:any)'] = 'Function_Controller/deleteUser/$1';
$route['generate-password/(:any)'] = 'Function_Controller/generatePassword/$1';

// submit(save) form
$route['submit-po'] = 'Function_Controller/submitPo';
$route['deletepo-item/(:any)'] = 'Function_Controller/deletepoItem/$1';
$route['submit-iar'] = 'Function_Controller/updateData_IAR';
$route['update-ics'] = 'Function_Controller/updatetIcs';
$route['updatepo-details'] = 'Function_Controller/updatepoDetails';
$route['updatepoTotal-details'] = 'Function_Controller/updatepoTotalDetails';

$route['updateics-details'] = 'Function_Controller/updateicsDetails';
$route['submit-PAR-Details'] = 'Function_Controller/updateData_PAR';
$route['edit-PAR-Details'] = 'Function_Controller/editData_PAR';
$route['editpo-details/(:any)/(:any)'] = 'Post_Controller/editpoDetails/$1/$2';
$route['editItem-details'] = 'Function_Controller/editItemDetails';
$route['editiar-details/(:any)/(:any)'] = 'Post_Controller/editiarDetails/$1/$2';
$route['editics-details/(:any)/(:any)'] = 'Post_Controller/editicsDetails/$1/$2';
$route['editpar-details/(:any)/(:any)'] = 'Post_Controller/editparDetails/$1/$2';

//Forms
$route['print-iarform/(:any)'] = 'Fpdf_Controller/IARform/$1';











// Post
$route['dashboard'] = 'Post_Controller/Dashboard';
// forms
$route['purchase'] = 'Post_Controller/PurchaseOrder';
$route['inspection'] = 'Post_Controller/InspectionAcceptance';
$route['acknowledgement'] = 'Post_Controller/PropertyAcknowledgement';
$route['custodian'] = 'Post_Controller/InventoryCustodian';
$route['propertycard'] = 'Post_Controller/PropertyCard';
$route['stockcard'] = 'Post_Controller/StockCard';
$route['suppliesledger'] = 'Post_Controller/SuppliesLedgerCard';
$route['countinventories'] = 'Post_Controller/ReportPhysicalCountInventories';
// account/maintenance
$route['account-list'] = 'Post_Controller/accountList';
// ajax
$route['checkPo-number'] = 'Function_Controller/checkPoNumber';
$route['checkPr-number'] = 'Function_Controller/checkPrNumber';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
