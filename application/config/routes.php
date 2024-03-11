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
$route['update-IAR-Details'] = 'Function_Controller/edit_IARDetails';
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
$route['sepc-assignee/(:any)/(:any)'] = 'Post_Controller/editsepcDetails/$1/$2';
$route['ppepc-assignee/(:any)/(:any)'] = 'Post_Controller/editppepcDetails/$1/$2';

$route['submit-SPECAssignee'] = 'Function_Controller/insertSEPCData';
$route['submit-PPEPCAssignee'] = 'Function_Controller/insertPPEPCData';


$route['deletepo-data/(:any)'] = 'Function_Controller/deleteData_po_id/$1';

//Print Forms
$route['print-iarform/(:any)'] = 'PrintForms_Controller/IARfpdf_Controller/IARform/$1';
$route['print-icsform/(:any)'] = 'PrintForms_Controller/ICSfpdf_Controller/ICSform/$1';
$route['print-parform/(:any)'] = 'PrintForms_Controller/PARfpdf_Controller/PARform/$1';
$route['print-scform'] = 'PrintForms_Controller/SCpdf_Controller/SCform';
$route['print-pcform/(:any)/(:any)'] = 'PrintForms_Controller/SEPCpdf_Controller/PCform/$1/$2';
$route['print-ppepcform/(:any)/(:any)'] = 'PrintForms_Controller/PPEPCpdf_Controller/PPEPCform/$1/$2';
$route['print-rsepiform'] = 'PrintForms_Controller/RSEPIpdf_Controller/RSEPIform';
$route['print-ptrform/(:any)/(:any)'] = 'PrintForms_Controller/PTRpdf_Controller/PTRform/$1/$2';
$route['print-rsepiparform'] = 'PrintForms_Controller/RSEPIPARpdf_Controller/RSEPIPARform';
$route['print-ptrparform/(:any)/(:any)'] = 'PrintForms_Controller/PTRPARpdf_Controller/PTRPARform/$1/$2';

// Post
$route['dashboard'] = 'Post_Controller/Dashboard';
// forms
$route['purchase'] = 'Post_Controller/PurchaseOrder';
$route['inspection'] = 'Post_Controller/InspectionAcceptance';
$route['acknowledgement'] = 'Post_Controller/PropertyAcknowledgement';
$route['custodian'] = 'Post_Controller/InventoryCustodian';
$route['propertycard'] = 'Post_Controller/PropertyCard';
$route['propertycardpar'] = 'Post_Controller/PropertyCardPar';
$route['stockcard'] = 'Post_Controller/StockCard';
$route['suppliesledger'] = 'Post_Controller/SuppliesLedgerCard';
$route['countinventories'] = 'Post_Controller/ReportPhysicalCountInventories';
//Forms2
$route['respi'] = 'Post_Controller/viewRSEPI';
$route['respi-returned'] = 'Function_Controller/updateItem_return';
$route['respi-reissue'] = 'Function_Controller/updateItem_reissued';
$route['respi-dispose'] = 'Function_Controller/updateItem_disposed';
$route['respi-par'] = 'Post_Controller/viewRSEPI_PAR';
$route['respi-returnedPAR'] = 'Function_Controller/updateItem_returnPAR';
$route['respi-reissuePAR'] = 'Function_Controller/updateItem_reissuedPAR';
$route['respi-disposePAR'] = 'Function_Controller/updateItem_disposedPAR';




// account/maintenance
$route['account-list'] = 'Post_Controller/accountList';
// ajax
$route['checkPo-number'] = 'Function_Controller/checkPoNumber';
$route['checkPr-number'] = 'Function_Controller/checkPrNumber';
$route['checkIAR-number'] = 'Function_Controller/checkIARNumber';
$route['checkInvoice-number'] = 'Function_Controller/checkInvoiceNumber';
$route['checkICS-number'] = 'Function_Controller/checkICSNumber';
$route['checkPAR-number'] = 'Function_Controller/checkPARNumber';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
