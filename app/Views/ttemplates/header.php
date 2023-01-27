<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>:: SRA | Flow</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Lucid HR & Project Admin Dashboard Template with Bootstrap 5x">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="<?= base_url('public/assets/css/dataTables.min.css')?>">

<link rel="stylesheet" href="<?= base_url('public/assets/css/main.css')?>">
<link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
    <?php  $uri = service('uri'); ?>
    <?php  if (session()->get('ALoggedIn')):?>
   
<div id="layout" class="theme-orange">

<div class="page-loader-wrapper text-center">
<div class="loader">
<svg class="p-3 bg-light rounded" width="120px" viewBox="0 0 85 25">
<path d="M12.3,7.2l1.5-3.7l8.1,19.4H19l-2.4-5.7H8.2l1.1-2.5h6.1L12.3,7.2z M14.8,20.2l1,2.7H0L9.5,0h3.1L4.3,20.2H14.8
                z M29,18.5v-14h1.6v12.6h6.2v1.5H29V18.5z M49.6,4.5v9.1c0,1.6-0.5,2.9-1.5,3.8s-2.3,1.4-4,1.4s-3-0.5-3.9-1.4s-1.4-2.2-1.4-3.8V4.5
                h1.6v9.1c0,1.2,0.3,2.1,1,2.7c0.6,0.6,1.6,0.9,2.8,0.9s2.1-0.3,2.7-0.9c0.6-0.6,1-1.5,1-2.7V4.5H49.6z M59.4,5.7
                c-1.5,0-2.8,0.5-3.7,1.5s-1.3,2.4-1.3,4.2s0.4,3.3,1.3,4.3c0.9,1,2.1,1.5,3.7,1.5c1,0,2.1-0.2,3.4-0.5v1.4c-1,0.4-2.2,0.5-3.6,0.5
                c-2.1,0-3.7-0.6-4.8-1.9s-1.7-3-1.7-5.4c0-1.4,0.3-2.7,0.8-3.8c0.5-0.9,1.3-1.8,2.3-2.4s2.2-0.9,3.6-0.9c1.5,0,2.8,0.3,3.9,0.8
                l-0.7,1.4C61.5,6,60.4,5.7,59.4,5.7z M65.8,18.5v-14h1.6v14.1h-1.6V18.5z M82.5,11.3c0,2.3-0.6,4.1-1.9,5.3s-3.1,1.8-5.4,1.8h-3.9
                V4.5h4.3c2.2,0,3.9,0.6,5.1,1.8S82.5,9.2,82.5,11.3z M80.8,11.4c0-1.8-0.5-3.2-1.4-4.1s-2.3-1.4-4.1-1.4h-2.4v11.2h2
                c1.9,0,3.4-0.5,4.4-1.4S80.8,13.3,80.8,11.4z" />
</svg>
<div class="h5 fw-light mt-3">Please wait</div>
</div>
</div>

<div id="wrapper">

<nav class="navbar navbar-fixed-top">
<div class="container-fluid">
<div class="navbar-btn">
<button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
</div>
<div class="navbar-brand ps-2">
<a href="index.html">
<svg width="85px" viewBox="0 0 85 25">
<path class="fill-primary" d="M12.3,7.2l1.5-3.7l8.1,19.4H19l-2.4-5.7H8.2l1.1-2.5h6.1L12.3,7.2z M14.8,20.2l1,2.7H0L9.5,0h3.1L4.3,20.2H14.8
                            z M29,18.5v-14h1.6v12.6h6.2v1.5H29V18.5z M49.6,4.5v9.1c0,1.6-0.5,2.9-1.5,3.8s-2.3,1.4-4,1.4s-3-0.5-3.9-1.4s-1.4-2.2-1.4-3.8V4.5
                            h1.6v9.1c0,1.2,0.3,2.1,1,2.7c0.6,0.6,1.6,0.9,2.8,0.9s2.1-0.3,2.7-0.9c0.6-0.6,1-1.5,1-2.7V4.5H49.6z M59.4,5.7
                            c-1.5,0-2.8,0.5-3.7,1.5s-1.3,2.4-1.3,4.2s0.4,3.3,1.3,4.3c0.9,1,2.1,1.5,3.7,1.5c1,0,2.1-0.2,3.4-0.5v1.4c-1,0.4-2.2,0.5-3.6,0.5
                            c-2.1,0-3.7-0.6-4.8-1.9s-1.7-3-1.7-5.4c0-1.4,0.3-2.7,0.8-3.8c0.5-0.9,1.3-1.8,2.3-2.4s2.2-0.9,3.6-0.9c1.5,0,2.8,0.3,3.9,0.8
                            l-0.7,1.4C61.5,6,60.4,5.7,59.4,5.7z M65.8,18.5v-14h1.6v14.1h-1.6V18.5z M82.5,11.3c0,2.3-0.6,4.1-1.9,5.3s-3.1,1.8-5.4,1.8h-3.9
                            V4.5h4.3c2.2,0,3.9,0.6,5.1,1.8S82.5,9.2,82.5,11.3z M80.8,11.4c0-1.8-0.5-3.2-1.4-4.1s-2.3-1.4-4.1-1.4h-2.4v11.2h2
                            c1.9,0,3.4-0.5,4.4-1.4S80.8,13.3,80.8,11.4z" />
</svg>
</a>
</div>
<div class="d-flex flex-grow-1 align-items-center">
<div class="d-flex">
<ul class="nav nav-pills me-4 ms-2 d-none d-lg-block">
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Wraptheme Info</a>
 <ul class="dropdown-menu shadow-sm">
<li><a class="dropdown-item" href="#">Action</a></li>
<li><a class="dropdown-item" href="#">Another action</a></li>
<li><a class="dropdown-item" href="#">Something else here</a></li>
<li><hr class="dropdown-divider"></li>
<li><a class="dropdown-item" href="#">Separated link</a></li>
</ul>
</li>
</ul>
<form id="navbar-search" class="navbar-form search-form position-relative d-none d-md-block">
<input value="" class="form-control" placeholder="Search here..." type="text">
<button type="button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
</form>
</div>
<div class="flex-grow-1">
<ul class="nav navbar-nav flex-row justify-content-end align-items-center">
<li class="d-none d-sm-block"><a href="app-events.html" class="icon-menu"><i class="fa fa-calendar"></i></a></li>
<li class="d-none d-sm-block"><a href="app-chat.html" class="icon-menu"><i class="fa fa-comments"></i></a></li>
<li><a href="app-inbox.html" class="icon-menu"><i class="fa fa-envelope"></i><span class="notification-dot"></span></a></li>
<li class="dropdown">
<a class="dropdown-toggle icon-menu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa fa-bell"></i>
<span class="notification-dot"></span>
</a>
<div class="dropdown-menu dropdown-menu-end p-0 shadow notification">
<ul class="list-unstyled feeds_widget">
<li class="d-flex">
<div class="feeds-left"><i class="fa fa-thumbs-o-up"></i></div>
<div class="feeds-body flex-grow-1">
<h6 class="mb-1">7 New Feedback <small class="float-end text-muted small">Today</small></h6>
<span class="text-muted">It will give a smart finishing to your site</span>
</div>
</li>
<li class="d-flex">
<div class="feeds-left"><i class="fa fa-user"></i></div>
<div class="feeds-body flex-grow-1">
<h6 class="mb-1">New User <small class="float-end text-muted small">10:45</small></h6>
<span class="text-muted">I feel great! Thanks team</span>
</div>
</li>
<li class="d-flex">
<div class="feeds-left"><i class="fa fa-question-circle"></i></div>
<div class="feeds-body flex-grow-1">
<h6 class="mb-1 text-warning">Server Warning <small class="float-end text-muted small">10:50</small></h6>
<span class="text-muted">Your connection is not private</span>
</div>
</li>
<li class="d-flex">
<div class="feeds-left"><i class="fa fa-check"></i></div>
<div class="feeds-body flex-grow-1">
<h6 class="mb-1 text-danger">Issue Fixed <small class="float-end text-muted small">11:05</small></h6>
<span class="text-muted">WE have fix all Design bug with Responsive</span>
</div>
</li>
<li class="d-flex">
<div class="feeds-left"><i class="fa fa-shopping-basket"></i></div>
<div class="feeds-body flex-grow-1">
<h6 class="mb-1">7 New Orders <small class="float-end text-muted small">11:35</small></h6>
<span class="text-muted">You received a new oder from Tina.</span>
</div>
</li>
</ul>
</div>
</li>
<li class="dropdown">
<a class="dropdown-toggle icon-menu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-sliders"></i></a>
<ul class="dropdown-menu dropdown-menu-end p-2 shadow">
<li><a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-pencil-square-o"></i> <span>Basic</span></a></li>
<li><a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-sliders fa-rotate-90"></i> <span>Preferences</span></a></li>
<li><a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-lock"></i> <span>Privacy</span></a></li>
<li><a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-bell"></i> <span>Notifications</span></a></li>
<li><hr class="dropdown-divider"></li>
<li><a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-credit-card"></i> <span>Payments</span></a></li>
<li><a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-print"></i> <span>Invoices</span></a></li>
<li><a class="dropdown-item" href="javascript:void(0);"><i class="fa fa-refresh"></i> <span>Renewals</span></a></li>
</ul>
</li>
<li><a href="page-login.html" class="icon-menu"><i class="fa fa-sign-out"></i></a></li>
</ul>
</div>
</div>
</div>
</nav>

<div id="left-sidebar" class="sidebar">
<div class="user-account p-3 mb-3">
<div class="d-flex mb-3 pb-3 border-bottom align-items-center">
<img src="assets/images/user.png" class="avatar lg rounded me-3" alt="User Profile Picture">
<div class="dropdown flex-grow-1">
<span class="d-block">Welcome,</span>
<a href="#" class="dropdown-toggle user-name" data-bs-toggle="dropdown"><strong><?= session()->get(usr_name)?>></strong></a>
<ul class="dropdown-menu p-2 shadow-sm">
<li><a href="page-profile2.html"><i class="fa fa-user me-2"></i>My Profile</a></li>
<li><a href="app-inbox.html"><i class="fa fa-envelope-open me-2"></i>Messages</a></li>
<li><a href="javascript:void(0);"><i class="fa fa-cog me-2"></i>Settings</a></li>
<li class="divider"></li>
<li><a href="page-login.html"><i class="fa fa-power-off me-2"></i>Logout</a></li>
 </ul>
</div>
</div>

</div>

<ul class="nav nav-tabs text-center mb-2" role="tablist">
<li class="nav-item flex-fill"><a class="nav-link active" data-bs-toggle="tab" href="#hr_menu" role="tab">SRA Admin</a></li>
<li class="nav-item flex-fill"><a class="nav-link" data-bs-toggle="tab" href="#setting_menu" role="tab"><i class="fa fa-cog"></i></a></li>
</ul>

<div class="tab-content px-0">
<div class="tab-pane fade show active" id="hr_menu" role="tabpanel">
<nav class="sidebar-nav">
<ul class="metismenu list-unstyled">
<li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
<li><a href="#employees" class="has-arrow"><i class="fa fa-users"></i>Employee</a>
<ul class="list-unstyled">
<li><a href="<?= base_url('admin/employees') ?>"><i class="fa fa-list-ul"></i>All Employee</a></li>
<li><a href="<?= base_url('admin/block_employees') ?>"><i class="fa fa-list-ul"></i>Block Employees</a></li>
</ul>
</li>
<li><a href="#clients" class="has-arrow"><i class="fa fa-users"></i>Clients</a>
<ul class="list-unstyled">
<li><a href="<?= base_url('admin/clients') ?>"><i class="fa fa-list-ul"></i>All Clients</a></li>
<li><a href="<?= base_url('admin/block_clients') ?>"><i class="fa fa-list-ul"></i>Block Clients</a></li>
</ul>
</li>
<li><a href="app-events.html"><i class="fa fa-calendar"></i>Events</a></li>
<li><a href="app-activities.html"><i class="fa fa-file-text-o"></i>Activities</a></li>
<li><a href="app-social.html"><i class="fa fa-globe"></i>HR Social</a></li>
<li>
<a href="#Employees" class="has-arrow"><i class="fa fa-users"></i><span>Employees</span></a>
<ul class="list-unstyled">
<li><a href="emp-all.html">All Employees</a></li>
<li><a href="emp-leave.html">Leave Requests</a></li>
<li><a href="emp-attendance.html">Attendance</a></li>
<li><a href="emp-departments.html">Departments</a></li>
</ul>
</li>
<li>
<a href="#Accounts" class="has-arrow"><i class="fa fa-briefcase"></i><span>Accounts</span></a>
<ul class="list-unstyled">
<li><a href="acc-payments.html">Payments</a></li>
<li><a href="acc-expenses.html">Expenses</a></li>
<li><a href="acc-invoices.html">Invoices</a></li>
</ul>
</li>
<li>
<a href="#Payroll" class="has-arrow"><i class="fa fa-credit-card"></i><span>Payroll</span></a>
<ul class="list-unstyled">
<li><a href="payroll-payslip.html">Payslip</a></li>
<li><a href="payroll-salary.html">Employee Salary</a></li>
</ul>
</li>
<li>
<a href="#Report" class="has-arrow"><i class="fa fa-bar-chart"></i><span>Report</span></a>
<ul class="list-unstyled">
<li><a href="report-expense.html">Expense Report</a></li>
<li><a href="report-invoice.html">Invoice Report</a></li>
</ul>
</li>
<li><a href="app-users.html"><i class="fa fa-user"></i>Users</a></li>
<li>
<a href="#Authentication" class="has-arrow"><i class="fa fa-lock"></i><span>Authentication</span></a>
<ul class="list-unstyled">
<li><a href="page-login.html">Login</a></li>
<li><a href="page-register.html">Register</a></li>
<li><a href="page-lockscreen.html">Lockscreen</a></li>
<li><a href="page-forgot-password.html">Forgot Password</a></li>
<li><a href="page-404.html">Page 404</a></li>
<li><a href="page-403.html">Page 403</a></li>
<li><a href="page-500.html">Page 500</a></li>
<li><a href="page-503.html">Page 503</a></li>
</ul>
</li>
</ul>
</nav>
</div>


<div class="tab-pane fade" id="setting_menu" role="tabpanel">
<div class="px-3">
<h6>Choose Skin</h6>
<ul class="choose-skin list-unstyled">
<li data-theme="purple" class="mb-2"><div class="purple"></div><span>Purple</span></li>
<li data-theme="blue" class="mb-2"><div class="blue"></div><span>Blue</span></li>
<li data-theme="cyan" class="mb-2"><div class="cyan"></div><span>Cyan</span></li>
<li data-theme="green" class="mb-2"><div class="green"></div><span>Green</span></li>
<li data-theme="orange" class="active mb-2"><div class="orange"></div><span>Orange</span></li>
<li data-theme="blush" class="mb-2"><div class="blush"></div><span>Blush</span></li>
</ul>
<hr>
<h6>Theme Option</h6>
<ul class="list-unstyled">
<li class="d-flex align-items-center mb-1">
<div class="form-check form-switch theme-switch">
<input class="form-check-input" type="checkbox" id="theme-switch">
<label class="form-check-label" for="theme-switch">Enable Dark Mode!</label>
</div>
</li>
<li class="d-flex align-items-center mb-1">
<div class="form-check form-switch theme-high-contrast">
<input class="form-check-input" type="checkbox" id="theme-high-contrast">
<label class="form-check-label" for="theme-high-contrast">Enable High Contrast</label>
</div>
</li>
<li class="d-flex align-items-center mb-1">
<div class="form-check form-switch theme-rtl">
<input class="form-check-input" type="checkbox" id="theme-rtl">
<label class="form-check-label" for="theme-rtl">Enable RTL Mode!</label>
</div>
</li>
</ul>

</div>
</div>
</div>
</div>
<?php else:?>

<?php endif; ?>
