<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> View Email</h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">

                    <div class="mail-inbox">

                        <div class="mail-right">
                            <div class="p-2 p-sm-3 d-flex justify-content-between align-items-center">
                                <h6 class="card-title">Email View</h6>

                            </div>
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
                            <div class="mail-action clearfix">
                                <div class="float-start mb-2">

                                    <div class="btn-group" role="group" aria-label="Basic outlined example">

                                    </div>
                                </div>



                            </div>
                            <div id="update_data">

                                <div class="mail-detail-full" id="mail-detail-open">
                                    <div class="mail-action clearfix">
                                        <div class="float-start">
                                            <div class="d-inline-block">
                                                <a href="<?= base_url('emails/inbox') ?>" class="mail-back btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i>Inbox</a>
                                            </div>
                                            <div class="btn-group" role="group" aria-label="Basic outlined example">

                                            </div>
                                        </div>
                                        <!-- <div class="float-end ms-auto">
                                            <a href="<?php // base_url('emails/reply_email/' . encryptIt($emails['id'])) ?>" target="_blank" class="mail-back btn btn-primary btn-sm">Reply &nbsp;<i class="fa fa-mail-reply"></i></a>
                                        </div> -->
                                    </div>
                                    <div class="detail-header" style="background-color:white;">
                                        <div class="media d-flex mb-3">
                                            <div class="float-start me-3">

                                            </div>
                                            <div class="media-body w-100">
                                                <p class="mb-0">
                                                    <strong class="text-muted me-1">To:</strong><?php $to = implode(',', $emails['to']);
                                                                                                echo $to;  ?><small class="text-muted float-end"><i class="zmdi zmdi-attachment me-1"></i></small>
                                                </p>
                                                <p class="mb-0">
                                                    <strong class="text-muted me-1">From:</strong>
                                                    <a class="text-default" href="javascript:void(0);"><span class="__cf_email__"><?= $emails['from'] ?></span></a>
                                                    <span class="text-muted text-sm float-end"><?= date("d-m-Y H:i:s A", strtotime($emails['date'])) ?></span>
                                                </p>
                                                <p class="mb-0">
                                                    <strong class="text-muted me-1">CC:</strong>
                                                    <a class="text-default" href="javascript:void(0);"><span class="__cf_email__"><?php $cc = implode(',', $emails['cc']);
                                                                                                                                    echo $cc; ?></span></a>
                                                </p>
                                            </div>
                                        </div>
                                        <h5 class="mb-0">
                                            <strong class="text-muted me-1">Subject:</strong>
                                            <a class="text-default" href="javascript:void(0);"><span class="__cf_email__"><?= isset($emails['subject']) && !empty($emails['subject']) ? $emails['subject'] : 'No-Subject' ?></span></a>
                                        </h5>
                                        <hr>
                                        <?php if (isset($emails['attachments'])) : ?><label class="h6 text-muted">Attachments</label><?php endif; ?>
                                        <strong><?= $emails['attachments'] ?></strong>
                                    </div>

                                    <div class="mail-cnt" style="background-color:white;">
                                        <iframe width="100%" height="300px" srcdoc="<?php echo htmlspecialchars($emails['body']); ?>"></iframe>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>