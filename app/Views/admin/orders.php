<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Orders List</h2>
                    <ul class="breadcrumb mb-0">


                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title">All Orders</h6>
                        <ul class="header-dropdown">
                            <li>
                                <a type="button" href="<?= base_url('backend/new-order') ?>" class="btn btn-sm btn-outline-primary">New Order</a>
                            </li>
                        </ul>
                    </div>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <i class="fa fa-times-circle"></i> <?= $validation->listErrors() ?>                            
                        </div>
                    <?php endif; ?>
                    <?php if (session()->get('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <i class="fa fa-check-circle"></i> <?= session()->get('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->get('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <i class="fa fa-times-circle"></i> <?= session()->get('error') ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <table id="employee_List" class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Hospital Name</th>
                                    <th>Employee</th>
                                    <th>Order Date/Time</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Invoice ID</th>
                                    <th>Emails</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                foreach ($ord_row as $row) : ?>
                                    <tr>
                                        <td>
                                            <?= $row['ord_id'] ?>
                                        </td>


                                        <td>
                                            <span><b><?= $row['cl_h_name'] ?></b></span><br>
                                            <small><?= $row['spec_name'].'-'. $row['grade_name'] ?></small>
                                        </td>
                                        <td><span><?= $row['emp_fname'] . ' ' . $row['emp_lname'] ?></span><br>
                                        <small><?= $row['emp_imcr_no'] ?></small></td>
                                        <td><?php $pros = explode(",",$row['ord_prosdatetime_detail']);
                                        foreach($pros as $var): ?>
                                       <?= $var ?> <br>
                                       <?php endforeach; ?></td>
                                        </td>
                                        <td><?= date("d-m-y  h:i:s a", strtotime($row['ord_created'])) ?></td>
                                        <td>
                                        <?php if($row['ord_cancel_bcl'] == 1): ?>
                                                <span class="badge bg-danger">Cancelled By Client</span><br>
                                                <span class="badge bg-warning text-dark"><?= $row['ord_cl_cremarks']?></span>
                                                <?php else: ?>
                                        <?php if($row['ord_cancel_bdr'] == 1): ?>
                                                <span class="badge bg-danger">Cancelled By Dr.</span><br>
                                                <span class="badge bg-warning text-dark"><?= $row['ord_dr_cremarks']?></span>
                                                <?php else: ?>
                                            <?php if ($row['ord_status'] == "1") : ?>
                                                <span class="badge chart-color123">Pending</span>
                                            <?php elseif ($row['ord_status'] == "2") : ?>
                                                <span class="badge chart-color122">Processed</span>
                                            <?php elseif ($row['ord_status'] == "3") : ?>
                                                <span class="badge bg-success">Confirmed</span>
                                            <?php else : ?>
                                                <span class="badge chart-color120">Ended</span>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            </td>
                                            <td>
                                                <?= $row['ord_invoice_id'] ?>
                                            </td>
                                        <td>
                                                
                                        
<ul class="nav nav-pills">
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Emails</a>
 <ul class="dropdown-menu shadow-sm">
<li><a class="dropdown-item" target="_blank" href="<?= base_url('backend/email-1/'.encryptIt($row['ord_id'])) ?>">First Response</a></li>
<li><a class="dropdown-item" target="_blank" href="<?= base_url('backend/email-2/'.encryptIt($row['ord_id'])) ?>">Locum Process</a></li>
<li><a class="dropdown-item" target="_blank" href="<?= base_url('backend/email-3/'.encryptIt($row['ord_id'])) ?>">Client Confirmation</a></li>
<li><a class="dropdown-item" target="_blank" href="<?= base_url('backend/email-4/'.encryptIt($row['ord_id'])) ?>">Dr. Confirmation</a></li>
<li><hr class="dropdown-divider"></li>
<li><a class="dropdown-item" target="_blank" href="<?= base_url('backend/contract/'.encryptIt($row['ord_id'])) ?>">Contract</a></li>
</ul>
</li>
</ul>
                                        </td>

                                            <td>
                                                <?php if (session()->grp_id == 'user' && $row['ord_case_status'] <>"Closed"): ?>
                                            <a type="button" href="<?= base_url('backend/order_edit/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                            <?php elseif(session()->grp_id == 'admin' && $row['ord_status'] <>"Closed"):?>
                                            <a type="button" href="<?= base_url('backend/order_edit/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                            <?php elseif(session()->grp_id == 'super_admin'):?>
                                            <a type="button" href="<?= base_url('backend/order_edit/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                            <?php endif; ?>
                                            <a type="button" href="<?= base_url('backend/order_view/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-info js-sweetalert" title="View" data-type="confirm"><i class="fa fa-eye"></i></a>
                                            <?php if($row['ord_advrtise'] == '0'): ?>
                                            <a type="button" href="<?= base_url('backend/order-publish/' . encryptIt($row['ord_id'])) ?>" target="_blank" class="btn btn-sm btn-outline-warning js-sweetalert" Onclick="return confirm('Are You sure? You want to advertise this?');" title="Advertise" data-type="confirm"><i class="fa fa-bullhorn"></i></a>
                                            <?php else: ?>
                                            <a type="button" href="<?= base_url('backend/order-unpublish/' . encryptIt($row['ord_id'])) ?>" target="_blank" class="btn btn-sm btn-outline-danger js-sweetalert" Onclick="return confirm('Are You sure? You want to Unpublish this?');" title="Unpublish" data-type="confirm"><i class="fa  fa-bullhorn"></i></a>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>