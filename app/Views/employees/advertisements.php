<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Advertisements</h2>
                    <ul class="breadcrumb mb-0">


                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title ">All Advertisements</h4>
                        <hr class="text-primary">
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
                    <?php foreach ($ord_row as $row) : ?>
                        <div class="card-body">
                            <h4 class="mb-1"><a class="text-primary" target="_blank" href="#"><?= $row['cl_h_name'] ?> </a><span><a href="<?= base_url('employee/apply-locum/'.encryptIt($row['ord_id']))?>" class="btn btn-outline-primary float-end">Apply</a></span></h4>
                            <p>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#details<?= $row['ord_id'] ?>" aria-expanded="false" aria-controls="details<?= $row['ord_id'] ?>">View details</button>
                            </p>
                            <div class="row g-3">
                                <div class="col">
                                    <div class="collapse multi-collapse" id="details<?= $row['ord_id'] ?>">
                                        <div class="card card-body">
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                        <h6>Specialty:</h6>
                                                </div>
                                                <div class="col-md-4">
                                            <span class="h5 text-primary"><?= $row['spec_name'] ?></span>
                                                </div>
                                                </div>
                                                <div class="row mb-3">
                                                <div class="col-md-4">
                                        <h6>Grade:</h6>
                                                </div>
                                                <div class="col-md-4">
                                            <span class="h5 text-primary"><?= $row['grade_name'] ?></span>
                                                </div>
                                                </div>
                                                <div class="row mb-3">
                                            <div class="col-md-4">
                                        <h6>Locum Required From:</h6>
                                            </div>
                                            <div class="col-md-4">
                                            <span class="h5 text-primary"><small><?=  date("d-m-y", strtotime($row['ord_required_from'])) ?></small></span>
                                            </div>
                                                </div>
                                                <div class="row mb-3">
                                            <div class="col-md-4">
                                        <h6>Locum Required To:</h6>
                                            </div>
                                            <div class="col-md-4">
                                        <span class="h5 text-primary"><small><?=  date("d-m-y", strtotime($row['ord_required_to'])) ?></small></span>
                                            </div>
                                                </div>
                                                <div class="row mb-3">
                                            <div class="col-md-4">
                                        <h6>Locum Date & Time Details:</h6>
                                            </div>
                                            <div class="col-md-4">
                                        <a class="h5 text-blue"><small>
                                            <?php $dt = explode(',', $row['ord_datetime_detail']);
                                            foreach($dt as $date): ?>
                                            <?= $date  ?><br>
                                            <?php endforeach; ?>
                                        </small></a>
                                            </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>