<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SRA | Flow</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sra Locum is a platform for Irelanf Medical related organidstions where an hospital can find doctors for thier Hospitals according to thier requirements.">
    <meta name="author" content="SRA Locum | www.sralocum.com">
    <link rel="icon" href="<?= base_url('public/images/sralogo-icon.ico') ?>" type="image">

    <link rel="stylesheet" href="<?= base_url('public/assets/css/dataTables.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('public/assets/css/main.css') ?>">
    <link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">

    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('public/assets/css/my.css') ?>">
    <script src="<?= base_url('public/assets/bundles/libscripts.bundle.js') ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

</head>

<body onload="fetchNotifications(); fetchNotificationscount();">
    <?php $uri = service('uri'); ?>
    <?php if (session()->get('ALoggedIn')): ?>

            <div id="layout" class="theme-green">

                <div class="page-loader-wrapper text-center">
                    <div class="loader">
                    
                        <div class="h5 fw-light mt-3">Please wait</div>
                    </div>
                </div>

                <div id="wrapper">

                    <nav class="navbar navbar-fixed-top d-print-none">
                        <div class="container-fluid">
                            <div class="navbar-btn">
                                <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="navbar-brand ps-2">
                                <a class="mr-4" href="<?= base_url('backend/') ?>">
                                    <img src="<?= base_url('public/images/sralogo-icon.png') ?>" width="40" height="40" />
                                    <span class="text-success mt-4 text-center">SRA LOCUM</span>
                                </a>

                            </div>
                            <div class="d-flex flex-grow-1 align-items-center">
                                <div class="d-flex">
                                    <ul class="nav nav-pills me-4 ms-2 d-none d-lg-block">

                                    </ul>
                                    <!-- <form id="navbar-search" class="navbar-form search-form position-relative d-none d-md-block">
    <input value="" class="form-control" placeholder="Search here..." type="text">
    <button type="button" class="btn btn-secondary"><i class="fa fa-search"></i></button>
    </form> -->
                                </div>
                                <div class="flex-grow-1">
                                    <ul class="nav navbar-nav flex-row justify-content-end align-items-center">
                                    <li class="dropdown">
                                        <a class="dropdown-toggle icon-menu" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-bell"></i>
                                        <span id="notif-count" class="badge bg-danger"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end p-0 shadow notification">
                                        <ul class="list-unstyled feeds_widget" id="notif">
                                        <li class="d-flex">
                                                <div class="feeds-body flex-grow-1">
                                                <span class="text-muted">No Notification</span>
                                                </div>
                                              </li>
                                        </ul>
                                        </div>
                                    </li>
                                        <li><a href="<?= base_url('backend/destroy') ?>" class="icon-menu text-dark">Logout &nbsp;<i class="fa fa-sign-out"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <div id="left-sidebar" class="sidebar d-print-none">
                        <div class="user-account p-3 mb-3">
                            <div class="d-flex mb-3 pb-3 border-bottom align-items-center">
                                <!-- <img src="<?php // base_url('public/images/user.png') ?>" class="avatar lg rounded me-3" alt="User Profile Picture"> -->
                                <div class="dropdown flex-grow-1 text-center fs-6">
                                    <span class="d-block">Welcome,</span>
                                    <a href="#" class="dropdown-toggle user-name" data-bs-toggle="dropdown"><strong><?= session()->get('usr_name') ?></strong></a>
                                    <ul class="dropdown-menu p-2 shadow-sm">

                                        <li><a href="<?= base_url('backend/pwdupd') ?>"><i class="fa fa-cog me-2"></i>Password</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?= base_url('backend/destroy') ?>"><i class="fa fa-power-off me-2"></i>Logout</a></li>
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
                                    <ul class="main-menu cust metismenu list-unstyled">
                                        <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/dashboard') ?>"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                                        <li class="nav-item"><a href="#" class="nav-link has-arrow"><i class="fa fa-user-md"></i>Employee</a>
                                            <ul class="list-tree lower">
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/employees') ?>"><i class="fa fa-list-ul"></i>All Employee</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/block_employees') ?>"><i class="fa fa-list-ul"></i>Blocked Employees</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><a class="nav-link has-arrow"><i class="fa fa-h-square"></i>Clients</a>
                                            <ul class="list-unstyled">
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/clients') ?>"><i class="fa fa-list-ul"></i>All Clients</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/block_clients') ?>"><i class="fa fa-list-ul"></i>Blocked Clients</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><a href="#orders" class="nav-link has-arrow"><i class="fa fa-shopping-cart"></i>Orders</a>
                                            <ul class="list-unstyled">
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/orders') ?>"><i class="fa fa-list-ul"></i>All Orders</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/pending_order') ?>"><i class="fa fa-list-ul"></i>Pending Orders</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/processed_order') ?>"><i class="fa fa-list-ul"></i>Processed Orders</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/confirm_order') ?>"><i class="fa fa-list-ul"></i>Confirmed Orders</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/ended_order') ?>"><i class="fa fa-list-ul"></i>Ended Orders</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/expired-orders') ?>"><i class="fa fa-list-ul"></i>Expired Orders</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><a href="<?= base_url('backend/timesheet') ?>"><i class="fa fa-calendar"></i>TimeSheet</a></li>
                                        <?php if (session()->grp_id == 'super_admin' || session()->grp_id == 'admin'): ?>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/speciality') ?>"><i class="fa fa-stethoscope"></i>Specialities</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/grade') ?>"><i class="fa fa-star"></i>Grades</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/cat') ?>"><i class="fa fa-th-large"></i>Client Category</a></li>
                                                <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/formula') ?>"><i class="fa fa-calculator"></i>Formulae</a></li>

                                        <?php endif; ?>
                                        <?php if (session()->grp_id == 'super_admin'): ?>
                                                    <li class="nav-item"><a class="nav-link" href="<?= base_url('backend/users') ?>"><i class="fa fa-user-plus"></i>Users</a></li>
                                        <?php endif; ?>

                                    </ul>
                                </nav>
                            </div>


                            <div class="tab-pane fade" id="setting_menu" role="tabpanel">
                                <div class="px-3">

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
            <?php else: ?>

            <?php endif; ?>