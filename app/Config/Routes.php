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
$routes->match(['get' , 'post'], 'backend', 'admin\Backend::dashboard' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/login', 'admin\Backend::login' ,['filter' => 'B_noauth']);
$routes->match(['get' , 'post'], 'backend/forbidden', 'admin\Backend::forbidden');
$routes->match(['get' , 'post'], 'backend/dashboard', 'admin\Backend::dashboard' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/createuser', 'admin\Backend::register' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/edit-user/(:any)', 'admin\Backend::edit_user/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/employees', 'admin\Backend::employees' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/reg_emp', 'admin\Backend::reg_emp' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/emp_block/(:any)', 'admin\Backend::emp_block/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/emp_edit/(:any)', 'admin\Backend::emp_edit/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/emp_details/(:any)', 'admin\Backend::emp_details/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/block_employees', 'admin\Backend::block_employees' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/emp_unblock/(:any)', 'admin\Backend::emp_unblock/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/clients', 'admin\Backend::clients' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/reg_client', 'admin\Backend::reg_client' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/client_details/(:any)', 'admin\Backend::client_details/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/client_edit/(:any)', 'admin\Backend::client_edit/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/client_block/(:any)', 'admin\Backend::client_block/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/client_unblock/(:any)', 'admin\Backend::client_unblock/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/block_clients', 'admin\Backend::block_clients' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/orders', 'admin\Backend::orders' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/new_order', 'admin\Backend::new_order_old' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/new-order', 'admin\Backend::new_order' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/order-s1/(:any)', 'admin\Backend::order_s1/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/sFirstR/(:any)', 'admin\Backend::sFirstR/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/sSecondR/(:any)', 'admin\Backend::sSecondR/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/order-s2/(:any)', 'admin\Backend::order_s2/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/order-s3/(:any)', 'admin\Backend::order_s3/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/sThirdR/(:any)', 'admin\Backend::sThirdR/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/order-s4/(:any)', 'admin\Backend::order_s4/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/sFourthR/(:any)', 'admin\Backend::sFourthR/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/locum-ctrack', 'admin\Backend::Locum_confirmation_track' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/locum-intrack', 'admin\Backend::Locum_invoice_track' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/locum-sagtrack', 'admin\Backend::Locum_sage_track' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/order-publish/(:any)', 'admin\Backend::order_publish/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/order_edit/(:any)', 'admin\Backend::order_edit/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/order_view/(:any)', 'admin\Backend::order_view/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/pending_order', 'admin\Backend::pending_order' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/processed_order', 'admin\Backend::processed_order' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/cancelled_order', 'admin\Backend::cancelled_order' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/closed_order', 'admin\Backend::closed_order' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/ord_status/(:any)', 'admin\Backend::ord_status/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/speciality', 'admin\Backend::specialities' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/new_spec', 'admin\Backend::new_spec' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/edit_spec/(:any)', 'admin\Backend::edit_spec/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/del_spec/(:any)', 'admin\Backend::del_spec/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/grade', 'admin\Backend::grade' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/new_grade', 'admin\Backend::new_grade' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/edit_grade/(:any)', 'admin\Backend::edit_grade/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/del_grade/(:any)', 'admin\Backend::del_grade/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/cat', 'admin\Backend::cl_cat' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/formula', 'admin\Backend::formula' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/edit-formula/(:any)', 'admin\Backend::edit_formula/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/new_cat', 'admin\Backend::new_cl_cat' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/edit_cat/(:any)', 'admin\Backend::edit_cl_cat/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/del_cat/(:any)', 'admin\Backend::del_cl_cat/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/users', 'admin\Backend::users' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/destroy', 'admin\Backend::logout' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/pwdupd', 'admin\Backend::pwdupd' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/b-userp/(:any)', 'admin\Backend::buser/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/ended_order', 'admin\Backend::ended_order' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/confirm_order', 'admin\Backend::confirm_order' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/client-pwd/(:any)', 'admin\Backend::client_pwd/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/employee-pwd/(:any)', 'admin\Backend::employee_pwd/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/expired-orders', 'admin\Backend::expired_orders' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/timesheet', 'admin\Backend::timesheet' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/t-fill/(:any)', 'admin\Backend::fill_timesheet/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/timesheet_save/(:any)', 'admin\Backend::timesheet_save/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/t-edit/(:any)', 'admin\Backend::edit_timesheet/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/t-upd/(:any)', 'admin\Backend::upd_timesheet/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/t-view/(:any)', 'admin\Backend::timesheet_view/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/timesheet-approve/(:any)', 'admin\Backend::timesheet_approve/$1',['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/email-1/(:any)', 'admin\Backend::email_1/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/email-2/(:any)', 'admin\Backend::email_2/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/email-3/(:any)', 'admin\Backend::email_3/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/email-4/(:any)', 'admin\Backend::email_4/$1' ,['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/contract/(:any)', 'admin\Backend::contract/$1',['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/change_doctor_cancelled_order/(:any)/(:any)', 'admin\Backend::change_doctor_cancelled_order/$1/$2',['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/notif-get', 'admin\Backend::get_notif',/*['filter' => 'B_auth']*/);
$routes->match(['get' , 'post'], 'backend/notif-seen', 'admin\Backend::notif_seen',['filter' => 'B_auth']);
$routes->match(['get' , 'post'], 'backend/notif-count', 'admin\Backend::get_notifcount',/*['filter' => 'B_auth']*/);

// });


/*
 * --------------------------------------------------------------------
 * Route Definitions 
 * --------------------------------------------------------------------
 */
// **** Employee Routes *******//

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get' , 'post'], 'employee', 'employee\emp::dashboard',['filter' => 'E_Auth']);

$routes->match(['get' , 'post'], 'employee/login', 'employee\emp::login',['filter' => 'E_noauth']);
$routes->match(['get' , 'post'],'employee/pwdupd', 'employee\emp::pwdupd',['filter' => 'E_Auth']);
$routes->get('employee/dashboard', 'employee\emp::dashboard',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/orders', 'employee\emp::contracts',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/profile', 'employee\emp::profile',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/ord-view/(:any)', 'employee\emp::order_view/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/upl-asses/(:any)', 'employee\emp::upl_asses/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/canc-ord/(:any)', 'employee\emp::canc_ord/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/timesheet/(:any)', 'employee\emp::timesheet/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/t-edit/(:any)', 'employee\emp::edit_timesheet/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/t-upd/(:any)', 'employee\emp::timesheet_upd/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/t-view/(:any)', 'employee\emp::timesheet_view/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/timesheet_save/(:any)', 'employee\emp::timesheet_save/$1',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/Pending-assignments', 'employee\emp::pending_assign',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/processed-assignments', 'employee\emp::processed_assign',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/confirmed-assignments', 'employee\emp::confirmed_assign',['filter' => 'E_Auth']);
$routes->match(['get' , 'post'], 'employee/completed-assignments', 'employee\emp::completed_assign',['filter' => 'E_Auth']);
$routes->get('employee/logout', 'employee\emp::logout');


/*
 * --------------------------------------------------------------------
 * Route Definitions 
 * --------------------------------------------------------------------
 */
// **** Clients Routes *******//

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get' , 'post'],'client', 'client\cli::dashboard',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/new-order', 'client\cli::new_order',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/edit-order/(:any)', 'client\cli::order_edit/$1',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/login', 'client\cli::login',['filter' => 'C_noauth']);
$routes->match(['get' , 'post'],'client/pwdupd', 'client\cli::pwdupd',['filter' => 'C_Auth']);
$routes->get('client/dashboard', 'client\cli::dashboard',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/profile', 'client\cli::profile',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/orders', 'client\cli::contracts',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/ord-view/(:any)', 'client\cli::order_view/$1',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/canc-ord/(:any)', 'client\cli::canc_ord/$1',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/timesheet/(:any)', 'client\cli::timesheet/$1',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/timesheet-approve/(:any)', 'client\cli::timesheet_approve/$1',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/ord-status/(:any)', 'client\cli::order_status/$1',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/ord-confirm/(:any)', 'client\cli::order_confirm/$1',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/new-orders', 'client\cli::pending_order',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/cur-processed', 'client\cli::cur_processed',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/confirm-orders', 'client\cli::confirmed_orders',['filter' => 'C_Auth']);
$routes->match(['get' , 'post'], 'client/completed-orders', 'client\cli::completed_order',['filter' => 'C_Auth']);
$routes->get('client/logout', 'client\cli::logout');




// $routes->group('', ['filter' => 'auth'], function($routes)
// {
//     $routes->match(['get' , 'post'],'apply/', 'Careers::apply',['filter'=>'auth']);
// });





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
