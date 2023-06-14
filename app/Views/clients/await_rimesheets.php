<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Timesheet</h2>
                    <ul class="breadcrumb mb-0">


                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title">Awaiting Timesheets to Approve</h6>

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
                                        <th>Employee</th>
                                        <th>Order Date/Time</th>
                                        <th>Timesheet Status</th>
                                        <th>View Timesheet</th>
                                        <th>Action</th>
                                        <th>Created Date</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $i = 1;
                                    foreach ($t_order as $row) : ?>
                                        <tr>
                                            <td>
                                                <?= $row['ord_id'] ?>
                                            </td>


                                            <td>
                                                <span><b><?= $row['cl_h_name'] ?></b></span><br>
                                                <small><?= $row['spec_name'] . '-' . $row['grade_name'] ?></small>

                                            </td>
                                            <td>
                                                <span><?= $row['emp_fname'] . ' ' . $row['emp_lname'] ?></span><br>
                                                <small><?= $row['emp_imcr_no'] ?></small>
                                            </td>
                                            <td><?php $pros = explode(",", $row['ord_prosdatetime_detail']);
                                                foreach ($pros as $var) : ?>
                                                    <?= $var ?> <br>
                                                <?php endforeach; ?></td>
                                            </td>


                                            <td><?php if ($row['ord_time_sheet_approved'] == "Due") : ?> <span class="badge chart-color123">Due</span> <?php elseif ($row['ord_time_sheet_approved'] == "Received") : ?><span class="badge chart-color122">Received</span><?php elseif ($row['ord_time_sheet_approved'] == "Sent_for_verification") : ?><span class="badge bg-warning text-dark">Sent for verification</span><?php elseif ($row['ord_time_sheet_approved'] == "Approved") : ?><span class="badge bg-success">Approved</span><?php endif; ?></td>
                                            <td>
                                                <a type="button" href="<?= base_url('client/timesheet/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-info" title="TimeSheet"><i class="fa fa-eye"></i> View</a>
                                            </td>
                                            <td>
                                                <?php if ($row['ord_time_sheet_approved'] <> "Approved") : ?>
                                                    <a type="button" href="<?= base_url('client/timesheet-approve/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-primary">Approve Sheet</a>
                                                <?php else : ?>
                                                    <span class="badge h3 chart-color122">Timesheet is Approved</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= date("d-m-y  h:i:s a", strtotime($row['ord_created'])) ?></td>

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