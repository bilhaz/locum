<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> <?= $title ?>  Summary</h2>
                    <ul class="breadcrumb mb-0">


                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title"><?=$title?></h6>
                        <ul class="header-dropdown">
                            <li>
                            </li>
                        </ul>
                    </div>
                    <form action="<?= base_url('backend/vop') ?>" method="post" autocomplete="off">
                        <div class="row clearfix px-2">
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
                                        <option value="<?= $crow['cl_id'] ?>" <?= set_select('cl_id',
                                         $crow['cl_id'], ($filter['cl_id'] == $crow['cl_id']) ? TRUE : FALSE );?>>
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
                                        <option value="<?= $erow['emp_id'] ?>" <?= set_select('emp_id',
                                         $erow['emp_id'], ($filter['emp_id'] == $erow['emp_id']) ? TRUE : FALSE );?>>
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
                                        <option value="<?= $srow['spec_id'] ?>"  <?= set_select('ord_speciality',
                                         $srow['spec_id'], ($filter['ord_speciality'] == $srow['spec_id']) ? TRUE : FALSE );?>>
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
                    <hr class="text-success">
                    <div class="card-body">
                        <div class="col-md-12 text-center">
                        <h4 class="text-success"> TOTAL <?= $title?></h4>
                        <h3> &euro;<?= number_format($sumry->total_sum,2) ?></h3>
                        </div>
                    </div>