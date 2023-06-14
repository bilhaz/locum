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
                        <h6 class="card-title">Confirmed Orders</h6>
                        <ul class="header-dropdown">
                            <li>
                            </li>
                        </ul>
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
                    <div class="card-body team_list">
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="daily">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Daily" aria-expanded="true" aria-controls="Daily">
                                            Today
                                        </button>
                                    </h2>
                                    <div id="Daily" class="accordion-collapse collapse show" aria-labelledby="daily" data-bs-parent="#accordionExample">
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
                                                        <th>View</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                                    foreach ($daily as $row) : ?>
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
                                                            <td><span class="badge bg-success">Confirmed</span></td>
                                                            <td>

                                                                <a type="button" href="<?= base_url('backend/order_view/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-info js-sweetalert" title="View" data-type="confirm"><i class="fa fa-eye"></i></a>

                                                            </td>

                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="monthly">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Monthly" aria-expanded="true" aria-controls="Monthly">
                                            This Month
                                        </button>
                                    </h2>
                                    <div id="Monthly" class="accordion-collapse collapse show" aria-labelledby="monthly" data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <table id="this_month" class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Hospital Name</th>
                                                        <th>Employee</th>
                                                        <th>Order Date/Time</th>
                                                        <th>Created Date</th>
                                                        <th>Status</th>
                                                        <th>View</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                                    foreach ($monthly as $mrow) : ?>
                                                        <tr>
                                                            <td>
                                                                <?= $mrow['ord_id'] ?>
                                                            </td>


                                                            <td>
                                                                <span><b><?= $mrow['cl_h_name'] ?></b></span><br>
                                                                <small><?= $mrow['spec_name'] . '-' . $mrow['grade_name'] ?></small>
                                                            </td>
                                                            <td><span><?= $mrow['emp_fname'] . ' ' . $mrow['emp_lname'] ?></span><br>
                                                                <small><?= $mrow['emp_imcr_no'] ?></small>
                                                            </td>
                                                            <td><?php $pros = explode(",", $mrow['ord_prosdatetime_detail']);
                                                                foreach ($pros as $var) : ?>
                                                                    <?= $var ?> <br>
                                                                <?php endforeach; ?></td>
                                                            </td>
                                                            <td><?= date("d-m-y  h:i:s a", strtotime($mrow['ord_created'])) ?></td>
                                                            <td><span class="badge bg-success">Confirmed</span></td>
                                                            <td>

                                                                <a type="button" href="<?= base_url('backend/order_view/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-info js-sweetalert" title="View" data-type="confirm"><i class="fa fa-eye"></i></a>

                                                            </td>

                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="yearly">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Yearly" aria-expanded="true" aria-controls="Yearly">
                                            This Year
                                        </button>
                                    </h2>
                                    <div id="Yearly" class="accordion-collapse collapse show" aria-labelledby="yearly" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="card-body">
                                                <table id="this_year" class="table table-hover table-responsive">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Hospital Name</th>
                                                            <th>Employee</th>
                                                            <th>Order Date/Time</th>
                                                            <th>Created Date</th>
                                                            <th>Status</th>
                                                            <th>View</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php

                                                        foreach ($yearly as $yrow) : ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $yrow['ord_id'] ?>
                                                                </td>


                                                                <td>
                                                                    <span><b><?= $yrow['cl_h_name'] ?></b></span><br>
                                                                    <small><?= $yrow['spec_name'] . '-' . $yrow['grade_name'] ?></small>
                                                                </td>
                                                                <td><span><?= $yrow['emp_fname'] . ' ' . $yrow['emp_lname'] ?></span><br>
                                                                    <small><?= $yrow['emp_imcr_no'] ?></small>
                                                                </td>
                                                                <td><?php $pros = explode(",", $yrow['ord_prosdatetime_detail']);
                                                                    foreach ($pros as $var) : ?>
                                                                        <?= $var ?> <br>
                                                                    <?php endforeach; ?></td>
                                                                </td>
                                                                <td><?= date("d-m-y  h:i:s a", strtotime($yrow['ord_created'])) ?></td>
                                                                <td><span class="badge bg-success">Confirmed</span></td>
                                                                <td>

                                                                    <a type="button" href="<?= base_url('backend/order_view/' . encryptIt($yrow['ord_id'])) ?>" class="btn btn-sm btn-outline-info js-sweetalert" title="View" data-type="confirm"><i class="fa fa-eye"></i></a>

                                                                </td>

                                                            </tr>
                                                        <?php endforeach; ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="all">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#All" aria-expanded="true" aria-controls="All">
                                            All
                                        </button>
                                    </h2>
                                    <div id="All" class="accordion-collapse collapse show" aria-labelledby="all" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="card-body">
                                                <table id="all_year" class="table table-hover table-responsive">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Hospital Name</th>
                                                            <th>Employee</th>
                                                            <th>Order Date/Time</th>
                                                            <th>Created Date</th>
                                                            <th>Status</th>
                                                            <th>View</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php

                                                        foreach ($ord_row as $orow) : ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $orow['ord_id'] ?>
                                                                </td>


                                                                <td>
                                                                    <span><b><?= $orow['cl_h_name'] ?></b></span><br>
                                                                    <small><?= $orow['spec_name'] . '-' . $orow['grade_name'] ?></small>
                                                                </td>
                                                                <td><span><?= $orow['emp_fname'] . ' ' . $orow['emp_lname'] ?></span><br>
                                                                    <small><?= $orow['emp_imcr_no'] ?></small>
                                                                </td>
                                                                <td><?php $pros = explode(",", $orow['ord_prosdatetime_detail']);
                                                                    foreach ($pros as $var) : ?>
                                                                        <?= $var ?> <br>
                                                                    <?php endforeach; ?></td>
                                                                </td>
                                                                <td><?= date("d-m-y  h:i:s a", strtotime($orow['ord_created'])) ?></td>
                                                                <td><span class="badge bg-success">Confirmed</span></td>
                                                                <td>

                                                                    <a type="button" href="<?= base_url('backend/order_view/' . encryptIt($orow['ord_id'])) ?>" class="btn btn-sm btn-outline-info js-sweetalert" title="View" data-type="confirm"><i class="fa fa-eye"></i></a>

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
            </div>