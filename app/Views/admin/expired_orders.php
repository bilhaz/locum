<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Orders List</h2>
                    <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a target="_blank" href="<?= base_url('backend/dashboard') ?>">SRA Locum</a></li>

                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title">Expired Orders</h6>
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
                    <div class="card-body">
                        <table id="employee_List" class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Hospital Name</th>
                                    <th>Employee</th>
                                    <th>Required till</th>
                                    <th>Craeted Date</th>
                                    <th>Status</th>
                                    <th>View</th>
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
                                            <h6 class="mb-0"><?= $row['cl_h_name'] ?></h6>
                                        </td>
                                        <td><span><?= $row['emp_fname'] . ' ' . $row['emp_lname'] ?></span></td>
                                        <td><?= date("y-m-d", strtotime($row['ord_required_to'])) ?></td>
                                        <td><?= $row['ord_created'] ?></td>
                                        <td>
                                        <?php if ($row['ord_status'] == "1") : ?>
                                                <span class="badge badge chart-color123">Pending</span>
                                            <?php elseif ($row['ord_status'] == "2") : ?>
                                                <span class="badge bg-warning text-dark">Processed</span>
                                            <?php elseif ($row['ord_status'] == "3") : ?>
                                                <span class="badge bg-success">Confirmed</span>
                                            <?php else : ?>
                                                <span class="badge bg-dark">Ended</span>
                                            <?php endif; ?>
                                    </td>
                                        <td>
                                        <a type="button" href="<?= base_url('backend/order_edit/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a type="button" href="<?= base_url('backend/order_view/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-info js-sweetalert" title="View" data-type="confirm"><i class="fa fa-eye"></i></a>

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