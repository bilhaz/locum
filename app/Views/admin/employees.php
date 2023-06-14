<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Employee List</h2>
                    <ul class="breadcrumb mb-0">


                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title">Employee List</h6>
                        <ul class="header-dropdown">
                            <li>
                                <a type="button" href="<?= base_url('backend/reg_emp') ?>" class="btn btn-sm btn-outline-primary">Register Employee</a>
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
                    <div class="table-responsive">
                        <div class="col-md-3 col-sm-3 float-end">
                        <input name="tblSearch" id="tblSearch" class="form-control" placeholder="Search here">
                        </div>
                        <table id="employee_List2" class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>SNo.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Speciality</th>
                                    <th>IMCR</th>
                                    <th>Registration Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($emp_row as $row) : ?>
                                    <tr>
                                        <td>
                                            <?= $i++ ?>
                                        </td>


                                        <td>
                                            <h6 class="mb-0"><?= $row['emp_fname'] . ' ' . $row['emp_lname'] ?></h6>
                                        </td>
                                        <td><span><?= $row['emp_email'] ?></span></td>
                                        <td><span><?= $row['spec_name'] ?></span></td>
                                        <td><span><?= $row['emp_imcr_no'] ?></span></td>
                                        <td><?= date("d-m-y  h:i:s a", strtotime($row['emp_created'])) ?></td>
                                        <td>
                                            <?php if (!empty($row['emp_cv'])) : ?>
                                                <a type="button" href="<?= base_url('backend/emp_edit/' . encryptIt($row['emp_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                            <?php else : ?>
                                                <a type="button" href="<?= base_url('backend/emp_details/' . encryptIt($row['emp_id'])) ?>" class="btn btn-sm btn-outline-warning" title="Registration Form Pending"><i class="fa fa-wpforms"></i></a>
                                            <?php endif; ?>
                                            <?php if($row['emp_status'] == 1): ?>
                                            <a type="button" href="<?= base_url('backend/emp_block/' . encryptIt($row['emp_id'])) ?>" class="btn btn-sm btn-outline-danger js-sweetalert" title="Block" Onclick="return confirm('Are You sure?');" data-type="confirm"><i class="fa fa-ban"></i></a>
                                            <?php elseif($row['emp_status'] == 0): ?>
                                                <a type="button" href="<?= base_url('backend/emp_unblock/'.encryptIt($row['emp_id']))?>" class="btn btn-sm btn-outline-danger js-sweetalert" Onclick="return confirm('Are You sure?');" title="Unblock" data-type="confirm"><i class="fa fa-unlock"></i></a>
                                                <?php endif; ?>
                                            <?php if (session()->grp_id == 'super_admin') : ?>
                                                <a type="button" href="<?= base_url('backend/employee-pwd/' . encryptIt($row['emp_id'])) ?>" class="btn btn-sm btn-outline-info js-sweetalert" title="Change Password" Onclick="return confirm('Are You sure?');" data-type="confirm"><i class="fa fa-key"></i></a>
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