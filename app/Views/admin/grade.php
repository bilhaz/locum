<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Grade List</h2>
                    <ul class="breadcrumb mb-0">

                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title">All Grades</h6>
                        <ul class="header-dropdown">
                            <li>
                                <a type="button" href="<?= base_url('backend/new_grade') ?>" class="btn btn-sm btn-outline-primary">Add New</a>
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
                                        <th>Grade</th>
                                        <th>Craeted Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $i = 1;
                                    foreach ($grade as $row) : ?>
                                        <tr>
                                            <td>
                                                <?= $i++ ?>
                                            </td>


                                            <td>
                                                <h6 class="mb-0"><?= $row['grade_name'] ?></h6>
                                            </td>
                                            <td><span><?= date("d-m-y  h:i:s a", strtotime($row['grade_created'])) ?></span></td>
                                            <td>

                                                <a type="button" href="<?= base_url('backend/edit_grade/' . encryptIt($row['grade_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit"><i class="fa fa-edit"></i></a>
                                                <?php if (session()->grp_id == 'super_admin') : ?>
                                                    <a type="button" href="<?= base_url('backend/del_grade/' . encryptIt($row['grade_id'])) ?>" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" Onclick="return confirm('Are You sure?');" data-type="confirm"><i class="fa fa-trash"></i></a>
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