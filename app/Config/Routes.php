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
$routes->setDefaultController('careers');
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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->match(['get' , 'post'], 'employee/login', 'usersAuth::login',['filter' => 'noauth']);
//$routes->post('login', 'usersAuth::login');
$routes->match(['get' , 'post'],'create', 'usersAuth::create',['filter' => 'noauth']);
$routes->match(['get' , 'post'],'usersauth/(:segment)', 'usersauth::$1',['filter' => 'noauth']);
$routes->match(['get' , 'post'], 'usersauth/login', 'usersAuth::login',['filter' => 'noauth']);
$routes->match(['get' , 'post'],'apply', 'Careers::apply',['filter' => 'auth']);
$routes->match(['get' , 'post'],'careers', 'Careers::apply',['filter' => 'auth']);
$routes->match(['get' , 'post'],'careers/(:any)', 'careers::$1',['filter' => 'auth']);
$routes->match(['get' , 'post'],'education', 'Careers::education',['filter' => 'auth']);
$routes->match(['get' , 'post'],'experience', 'Careers::experience',['filter' => 'auth']);
$routes->match(['get' , 'post'],'picupload', 'Careers::picupload',['filter' => 'auth']);
$routes->match(['get' , 'post'],'applypost', 'Careers::applypost',['filter' => 'auth']);
$routes->match(['get' , 'post'],'viewprofile', 'Careers::viewprofile',['filter' => 'auth']);
$routes->match(['get' , 'post'],'updpwd', 'Careers::updpwd',['filter' => 'auth']);
$routes->match(['get' , 'post'],'attachments', 'Careers::attch',['filter' => 'auth']);
$routes->match(['get' , 'post'],'upd_attachments', 'Careers::upd_attachments',['filter' => 'auth']);
$routes->get('dashboard', 'careers::dashboard',['filter' => 'auth']);
$routes->get('eddelete/(:num)', 'careers::eddelete/$1',['filter' => 'auth']);
$routes->get('expdelete/(:num)', 'careers::expdelete/$1',['filter' => 'auth']);
$routes->get('apliedposts/(:num)', 'careers::apliedposts/$1',['filter' => 'auth']);
$routes->get('postdelete/(:num)', 'careers::postdelete/$1',['filter' => 'auth']);
$routes->match(['get' , 'post'],'upd_persnl', 'Careers::upd_persnl',['filter' => 'auth']);
$routes->get('logout', 'careers::logout');
$routes->get('careers_index', 'careers::careers_index');




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
