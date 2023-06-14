<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Users</h2>
                    <ul class="breadcrumb mb-0">
                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">List</h6>
                        <ul class="header-dropdown">
                            <li><a type="button" class="btn btn-outline-secondary" href="<?= base_url('backend/createuser') ?>">Add User</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
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
                        <div class="table-responsive">
                            <div class="col-md-3 col-sm-3 float-end">
                                <input name="tblSearch" id="tblSearch" class="form-control" placeholder="Search here">
                            </div>
                            <table id="employee_List2" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Craeted Date</th>
                                        <th>Designation</th>
                                        <th>Status</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($usr_row as $row) : ?>
                                        <tr>
                                            <td>
                                                <h6 class="mb-0"><?= $row['usr_name'] ?></h6>
                                                <span><a href="#" class="__cf_email__">[<?= $row['usr_email'] ?>]</a></span>

                                            </td>
                                            <td>
                                                <?php if ($row['grp_id'] == "super_admin") : ?>
                                                    <span class="badge bg-success"><?= $row['grp_id'] ?></span>
                                                <?php elseif ($row['grp_id'] == "admin") : ?>
                                                    <span class="badge bg-warning"><?= $row['grp_id'] ?></span>
                                                <?php elseif ($row['grp_id'] == "user") : ?>
                                                    <span class="badge bg-dark"><?= $row['grp_id'] ?></span>
                                                <?php endif; ?>

                                            </td>
                                            <td><?= date("d-m-y  h:i:s a", strtotime($row['usr_created'])) ?></td>
                                            <td><?= $row['usr_designation'] ?></td>
                                            <td>

                                                <?php if ($row['usr_status'] == "1") : ?>
                                                    <span class="badge bg-success">Active</span>
                                                <?php else : ?>
                                                    <span class="badge bg-danger">Disabled</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a type="button" href="<?= base_url('backend/edit-user/' . encryptIt($row['usr_id'])) ?>" class="btn btn-sm btn-outline-primary" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a type="button" href="<?= base_url('backend/b-userp/' . encryptIt($row['usr_id'])) ?>" class="btn btn-sm btn-outline-info" title="Change Password"><i class="fa fa-key"></i></a>
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