<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Backend');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


/*
 * --------------------------------------------------------------------
 * Backend Route Definitions 
 * --------------------------------------------------------------------
 */
// $routes->group('admin', ['filter' => 'b_auth'], function($routes)
// {
$routes->match(['get' , 'post'], 'admin', 'admin\backend::login' ,['filter' => 'B_noauth']);
$routes->match(['get' , 'post'], 'admin/login', 'admin\Backend::login' ,['filter' => 'B_noauth']);
$routes->match(['get' , 'post'], 'admin/dashboard', 'admin\Backend::dashboard' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/createuser', 'admin\Backend::register' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/edit-user/(:any)', 'admin\Backend::edit_user/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/employees', 'admin\Backend::employees' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/reg_emp', 'admin\Backend::reg_emp' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/emp_block/(:any)', 'admin\Backend::emp_block/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/emp_edit/(:any)', 'admin\Backend::emp_edit/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/emp_details/(:any)', 'admin\Backend::emp_details/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/block_employees', 'admin\Backend::block_employees' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/emp_unblock/(:any)', 'admin\Backend::emp_unblock/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/clients', 'admin\Backend::clients' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/reg_client', 'admin\Backend::reg_client' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/client_details/(:any)', 'admin\Backend::client_details/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/client_edit/(:any)', 'admin\Backend::client_edit/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/client_block/(:any)', 'admin\Backend::client_block/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/client_unblock/(:any)', 'admin\Backend::client_unblock/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/block_clients', 'admin\Backend::block_clients' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/orders', 'admin\Backend::orders' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/new_order', 'admin\Backend::new_order' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/order_edit/(:any)', 'admin\Backend::order_edit/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/order_view/(:any)', 'admin\Backend::order_view/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/pending_order', 'admin\Backend::pending_order' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/closed_order', 'admin\Backend::closed_order' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/ord_status/(:any)', 'admin\Backend::ord_status/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/speciality', 'admin\Backend::specialities' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/new_spec', 'admin\Backend::new_spec' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/edit_spec/(:any)', 'admin\Backend::edit_spec/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/del_spec/(:any)', 'admin\Backend::del_spec/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/grade', 'admin\Backend::grade' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/new_grade', 'admin\Backend::new_grade' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/edit_grade/(:any)', 'admin\Backend::edit_grade/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/del_grade/(:any)', 'admin\Backend::del_grade/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/cat', 'admin\Backend::cl_cat' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/new_cat', 'admin\Backend::new_cl_cat' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/edit_cat/(:any)', 'admin\Backend::edit_cl_cat/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/del_cat/(:any)', 'admin\Backend::del_cl_cat/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/users', 'admin\Backend::users' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/destroy', 'admin\Backend::logout' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/pwdupd', 'admin\Backend::pwdupd' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/b-userp/(:any)', 'admin\Backend::buser/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/pending-payment', 'admin\Backend::pending_payment' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/paid-payment', 'admin\Backend::paid_payment' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/client-pwd/(:any)', 'admin\Backend::client_pwd/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/employee-pwd/(:any)', 'admin\Backend::employee_pwd/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/expired-orders', 'admin\Backend::expired_orders' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/email-1/(:any)', 'admin\Backend::email_1/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/email-2/(:any)', 'admin\Backend::email_2/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/email-3/(:any)', 'admin\Backend::email_3/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/email-4/(:any)', 'admin\Backend::email_4/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'admin/contract/(:any)', 'admin\Backend::contract/$1',['filter' => 'B_auth']);

// });











/*
 * --------------------------------------------------------------------
 * Route Definitions 
 * --------------------------------------------------------------------
 */
// **** Employee Routes *******//

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get' , 'post'], 'employee/login', 'employee\emp::login',['filter' => 'E_noauth']);
$routes->match(['get' , 'post'],'employee/pwdupd', 'employee\emp::pwdupd',['filter' => 'E_Auth']);
$routes->get('employee/dashboard', 'employee\emp::dashboard',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/orders', 'employee\emp::contracts',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/ord-view/(:any)', 'employee\emp::order_view/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/upl-asses/(:any)', 'employee\emp::upl_asses/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/canc-ord/(:any)', 'employee\emp::canc_ord/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/timesheet/(:any)', 'employee\emp::timesheet/$1',['filter' => 'E_Auth']);
$routes->get('employee/logout', 'employee\emp::logout');


/*
 * --------------------------------------------------------------------
 * Route Definitions 
 * --------------------------------------------------------------------
 */
// **** Clients Routes *******//

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get' , 'post'], 'employee/login', 'employee\cli::login',['filter' => 'E_noauth']);
$routes->match(['get' , 'post'],'employee/pwdupd', 'employee\cli::pwdupd',['filter' => 'E_Auth']);
$routes->get('employee/dashboard', 'employee\cli::dashboard',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/orders', 'employee\cli::contracts',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/ord-view/(:any)', 'employee\cli::order_view/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/upl-asses/(:any)', 'employee\cli::upl_asses/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/canc-ord/(:any)', 'employee\cli::canc_ord/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/timesheet/(:any)', 'employee\cli::timesheet/$1',['filter' => 'E_Auth']);
$routes->get('employee/logout', 'employee\emp::logout');




// $routes->group('', ['filter' => 'auth'], function($routes)
// {
//     $routes->match(['get' , 'post'],'apply/', 'Careers::apply',['filter'=>'auth']);
// });


/*
 * --------------------------------------------------------------------
 * Route Site
 * --------------------------------------------------------------------
 */
#$routes->get('apply', 'signin::apply',['filter'=>'ACP_auth']);
#$routes->get('applypost', 'signin::applypost',['filter'=>'ACP_auth']);
#$routes->post('education', 'signin::education',['filter'=>'ACP_auth']);
#$routes->get('experience', 'signin::experience',['filter'=>'ACP_auth']);
#$routes->post('picupload', 'signin::picupload',['filter'=>'ACP_auth']);
#$routes->get('form_print', 'signin::form_print',['filter'=>'ACP_auth']);
#$routes->get('contact', 'signin::contact',['filter'=>'ACP_auth']);
#$routes->get('signup', 'signin::signup',['filter'=>'noauth']);
#$routes->post('register', 'signin::register',['filter'=>'noauth']);
#$routes->get('edit_password', 'signin::edit_password',['filter'=>'ACP_auth']);
#$routes->post('update_password', 'signin::update_password',['filter'=>'ACP_auth']);



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
