    <?php if (!empty($e_doc['emp_fname'] && $e_doc['emp_lname'])) { ?>

        <div id="main-content">
            <div class="container-fluid">
                <div class="block-header py-lg-4 py-3">
                    <div class="row g-3">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Assignment List</h2>
                            <ul class="breadcrumb mb-0">


                            </ul>
                        </div>

                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="card-title">All Assignments</h6>
                                <p class="mb-0 text-danger">For Filling Timesheet and uploading Assesment go to Order view and do the required.</p>
                            </div>
                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->get('success')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->get('success') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->get('error')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->get('error') ?>
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
                                                <th>Timesheet Status</th>
                                                <th>Order Date/Time</th>
                                                <th>Created Date</th>
                                                <th>Status</th>
                                                <th>Payemnt</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $i = 1;
                                            foreach ($order as $row) : ?>
                                                <tr>
                                                    <td>
                                                        <?= $i++ ?>
                                                    </td>


                                                    <td>
                                                        <span><b><?= $row['cl_h_name'] ?></b></span><br>
                                                        <small><?= $row['spec_name'] . '-' . $row['grade_name'] ?></small>
                                                    </td>
                                                    <td><?php if ($row['ord_time_sheet_approved'] == "Due") : ?> <span class="badge chart-color123">Due</span> <?php elseif ($row['ord_time_sheet_approved'] == "Received") : ?><span class="badge chart-color122">Received</span><?php elseif ($row['ord_time_sheet_approved'] == "Sent_for_verification") : ?><span class="badge bg-warning text-dark">Sent for verification</span><?php elseif ($row['ord_time_sheet_approved'] == "Approved") : ?><span class="badge bg-success">Approved</span><?php else : ?><span class="badge chart-color123">Due</span><?php endif; ?></td>

                                                    <td><?php $pros = explode(",", $row['ord_prosdatetime_detail']);
                                                        foreach ($pros as $var) : ?>
                                                            <?= $var ?> <br>
                                                        <?php endforeach; ?>
                                                    </td>

                                                    <td><?= date("d-m-y H:m:s a", strtotime($row['ord_created'])) ?></td>

                                                    <td><?php if ($row['ord_cancel_bdr'] == 1) : ?>
                                                            <span class="badge bg-danger">Dr. Cancelled</span>
                                                        <?php else : ?>
                                                            <?php if ($row['ord_cancel_bcl'] == 1) : ?>
                                                                <span class="badge bg-danger">Client Cancelled</span>
                                                            <?php else : ?>
                                                                <?php if ($row['ord_status'] == "1" || $row['ord_status'] == NULL) : ?>
                                                                    <span class="badge chart-color123">Pending</span>
                                                                <?php elseif ($row['ord_status'] == "2") : ?>
                                                                    <span class="badge chart-color122">Processed</span>
                                                                <?php elseif ($row['ord_status'] == "3") : ?>
                                                                    <span class="badge bg-success">Confirmed</span><br>
                                                                    <span><a href="<?= base_url("employee/ord-view/" . encryptIt($row['ord_id'])) ?>" target="_blank"><?= $row['ord_ref_no'] ?></a></span>
                                                                <?php elseif ($row['ord_status'] == "4") : ?>
                                                                    <span class="badge chart-color120">Ended</span><br>
                                                                    <span><a href="<?= base_url("employee/ord-view/" . encryptIt($row['ord_id'])) ?>" target="_blank"><?= $row['ord_ref_no'] ?></a></span>
                                                                <?php else : ?>
                                                                    <span class="badge bg-success">Paid</span><br>
                                                                    <span><a href="<?= base_url("employee/ord-view/" . encryptIt($row['ord_id'])) ?>" target="_blank"><?= $row['ord_ref_no'] ?></a></span>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                    <td>
                                                        <?php if ($row['ord_emp_pay_status'] == "Paid") : ?>
                                                            <span class="badge bg-success">Paid</span>
                                                        <?php else : ?>
                                                            <span class="badge bg-warning text-dark">Not Processed</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($row['ord_status'] >= '3'): ?>
                                                        <a type="button" href="<?= base_url('employee/ord-view/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-info js-sweetalert" title="View" data-type="confirm"><i class="fa fa-eye"></i></a>
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









    <?php } else {
        header("Location: profile");
        $session = session();
        $session->setFlashdata('error', 'First Complete your Profile');
        exit();
        exit();
    } ?>