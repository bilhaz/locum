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
                    <form action="<?= base_url('backend/orders') ?>" method="post" autocomplete="off">
                        <div class="row clearfix px-2 mb-1">
                            <div class="form-group col-md-2 ">
                                <label for="from">From</label>
                                <input id="from" name="from" class="form-control" type="date" value="<?= esc($filter['from'] ?? '') ?>">
                            </div>
                            <div class="form-group col-md-2 ">
                                <label for="to">To</label>
                                <input id="to" name="to" class="form-control" type="date" value="<?= esc($filter['to'] ?? '') ?>">
                            </div>
                            <div class="form-group col-md-2 ">
                                <label for="cl_id">Hospital</label>
                                <select id="cl_id" name="cl_id" class="select2 form-control" data-parsley-trigger="change">
                                    <option value="0">All</option>
                                    <?php foreach ($c_det as $crow) : ?>
                                        <option value="<?= $crow['cl_id'] ?>" <?= set_select(
                                                                                    'cl_id',
                                                                                    $crow['cl_id'],
                                                                                    ($filter['cl_id'] == $crow['cl_id']) ? TRUE : FALSE
                                                                                ); ?>>
                                            <?= $crow['cl_h_name'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2 ">
                                <label for="emp_id">Employee</label>
                                <select id="emp_id" name="emp_id" class="form-control select2" data-parsley-trigger="change">
                                    <option value="0">All</option>
                                    <?php foreach ($emp_row as $erow) : ?>
                                        <option value="<?= $erow['emp_id'] ?>" <?= set_select(
                                                                                    'emp_id',
                                                                                    $erow['emp_id'],
                                                                                    ($filter['emp_id'] == $erow['emp_id']) ? TRUE : FALSE
                                                                                ); ?>>
                                            <?= $erow['emp_fname'] . ' ' . $erow['emp_lname'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2 ">
                                <label for="ord_speciality">Speciality</label>
                                <select id="ord_speciality" name="ord_speciality" class="form-control select2" data-parsley-trigger="change">
                                    <option value="0">All</option>
                                    <?php foreach ($sp_row as $srow) : ?>
                                        <option value="<?= $srow['spec_id'] ?>" <?= set_select(
                                                                                    'ord_speciality',
                                                                                    $srow['spec_id'],
                                                                                    ($filter['ord_speciality'] == $srow['spec_id']) ? TRUE : FALSE
                                                                                ); ?>>
                                            <?= $srow['spec_name'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2 mt-4">
                                <button class="btn btn-primary btn-small" type="submit">Get</button>
                            </div>
                        </div>
                    </form>
                    <?php if (isset($validation)) : ?>
                        <div class=" alert alert-danger alert-dismissible fade show" role="alert">
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
                        <div class="table-responsive">
                            <div class="col-md-3 col-sm-3 float-end">
                                <input name="tblSearch" id="tblSearch" class="form-control" placeholder="Search here">
                            </div>
                            <table id="employee_List2" class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Hospital Name</th>
                                        <th>Employee</th>
                                        <th>Order Date/Time</th>
                                        <th>Created Date</th>
                                        <th>Status</th>
                                        <th>Invoice ID</th>
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
                                                <small><?= $row['spec_name'] . '-' . $row['grade_name'] ?></small>
                                            </td>
                                            <td><span><?= $row['emp_fname'] . ' ' . $row['emp_lname'] ?></span><br>
                                                <small><?= $row['emp_imcr_no'] ?></small>
                                            </td>
                                            <td><?php $pros = explode(",", $row['ord_prosdatetime_detail']);
                                                foreach ($pros as $var) : ?>
                                                    <?= $var ?> <br>
                                                <?php endforeach; ?></td>
                                            </td>
                                            <td><?= date("d-m-y  h:i:s a", strtotime($row['ord_created'])) ?></td>
                                            <td>
                                                <?php if ($row['ord_cancel_bcl'] == 1) : ?>
                                                    <span class="badge bg-danger">Cancelled By Client</span><br>
                                                    <span class="badge bg-warning text-dark"><?= $row['ord_cl_cremarks'] ?></span>
                                                <?php else : ?>
                                                    <?php if ($row['ord_cancel_bdr'] == 1) : ?>
                                                        <span class="badge bg-danger">Cancelled By Dr.</span><br>
                                                        <span class="badge bg-warning text-dark"><?= $row['ord_dr_cremarks'] ?></span>
                                                    <?php else : ?>
                                                        <?php if ($row['ord_status'] == "1") : ?>
                                                            <span class="badge chart-color123">Pending</span>
                                                        <?php elseif ($row['ord_status'] == "2") : ?>
                                                            <span class="badge chart-color122">Processed</span>
                                                        <?php elseif ($row['ord_status'] == "3") : ?>
                                                            <span class="badge bg-success">Confirmed</span><br>
                                                            <span><a href="<?= base_url("backend/contract/" . encryptIt($row['ord_id'])) ?>" target="_blank"><?= $row['ord_ref_no'] ?></a></span>
                                                        <?php elseif ($row['ord_status'] == "4") : ?>
                                                            <span class="badge chart-color120">Ended</span><br>
                                                            <span><a href="<?= base_url("backend/contract/" . encryptIt($row['ord_id'])) ?>" target="_blank"><?= $row['ord_ref_no'] ?></a></span>
                                                        <?php else : ?>
                                                            <span class="badge chart-color135">Paid</span><br>
                                                            <span><a href="<?= base_url("backend/contract/" . encryptIt($row['ord_id'])) ?>" target="_blank"><?= $row['ord_ref_no'] ?></a></span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?= $row['ord_invoice_id'] ?><br>
                                                <?= $row['ord_sage_refer_no'] ?>
                                            </td>


                                            <td>
                                                <?php if (session()->grp_id == 'user' || session()->grp_id == 'admin' && $row['ord_status'] <> "5") : ?>
                                                    <?php if ($row['ord_status'] == 1) : ?>
                                                        <a type="button" href="<?= base_url('backend/order-s2/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <?php elseif ($row['ord_status'] == 2) : ?>
                                                        <a type="button" href="<?= base_url('backend/order-s3/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <?php elseif ($row['ord_status'] == 3) : ?>
                                                        <a type="button" href="<?= base_url('backend/order-s4/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <?php elseif ($row['ord_status'] == NULL) : ?>
                                                        <a type="button" href="<?= base_url('backend/order-s1/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <?php endif; ?>
                                                <?php elseif (session()->grp_id == 'super_admin') : ?>
                                                    <?php if ($row['ord_status'] == 1) : ?>
                                                        <a type="button" href="<?= base_url('backend/order-s2/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <?php elseif ($row['ord_status'] == 2) : ?>
                                                        <a type="button" href="<?= base_url('backend/order-s3/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <?php elseif ($row['ord_status'] == 3) : ?>
                                                        <a type="button" href="<?= base_url('backend/order-s4/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <?php elseif ($row['ord_status'] == 4) : ?>
                                                        <a type="button" href="<?= base_url('backend/order-s5/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <?php elseif ($row['ord_status'] == 5) : ?>
                                                        <a type="button" href="<?= base_url('backend/order-s5/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <?php elseif ($row['ord_status'] == NULL) : ?>
                                                        <a type="button" href="<?= base_url('backend/order-s1/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <?php endif; ?> <?php endif; ?>
                                                <a type="button" href="<?= base_url('backend/order_view/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-info js-sweetalert" title="View" data-type="confirm"><i class="fa fa-eye"></i></a>
                                                <?php if ($row['ord_advrtise'] == '0') : ?>
                                                    <a type="button" href="<?= base_url('backend/order-publish/' . encryptIt($row['ord_id'])) ?>" target="_blank" class="btn btn-sm btn-outline-warning js-sweetalert" Onclick="return confirm('Are You sure? You want to advertise this?');" title="Advertise" data-type="confirm"><i class="fa fa-bullhorn"></i></a>
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
</div>