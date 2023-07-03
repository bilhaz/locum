<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Inbox</h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">

                    <div class="mail-inbox">

                        <div class="mail-right">
                            <div class="p-2 p-sm-3 d-flex justify-content-between align-items-center">
                                <h6 class="card-title">Email List</h6>

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
                                <div class="float-end ms-auto">
                                    <div class="pagination-email d-flex">
                                        <p><?= ($startIndex + 1) ?>-<?= ($startIndex + count($emails)) ?>/<?= $totalEmails ?></p>
                                        <div class="btn-group ms-2" role="group" aria-label="Basic outlined example">
                                            <?php if ($currentPage > 1) : ?>
                                                <a href="<?= base_url('emails/inbox?page=' . ($currentPage - 1) . '&perPage=' . $perPage) ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-angle-left"></i></a>
                                            <?php else : ?>
                                                <button type="button" class="btn btn-outline-secondary btn-sm" disabled><i class="fa fa-angle-left"></i></button>
                                            <?php endif; ?>

                                            <?php if ($currentPage < $totalPages) : ?>
                                                <a href="<?= base_url('emails/inbox?page=' . ($currentPage + 1) . '&perPage=' . $perPage) ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-angle-right"></i></a>
                                            <?php else : ?>
                                                <button type="button" class="btn btn-outline-secondary btn-sm" disabled><i class="fa fa-angle-right"></i></button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div id="update_data">
                            <div class="mail-list">

                                <ul class="list-unstyled mb-0">
                                    <div id="emailData">
                                    <?php $i = 1;
                                    foreach ($emails as $row) : ?>
                                        <li class="clearfix <?php if ($row['seen'] != "1") echo "unread"; ?>" onclick="window.open('<?= base_url('emails/view_email/' . encryptIt($row['id'])) ?>')">
                                            <div class="mail-detail-left float-start">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7" disabled>
                                                    <label class="form-check-label" for="flexCheckDefault7"></label>
                                                </div>
                                            </div>
                                            <div class="mail-detail-right float-start">
                                                <h6 class="sub">
                                                    <a href="<?= base_url('emails/view_email/' .encryptIt($row['id'])) ?>" target="_blank" class="mail-detail-expand" data-index="<?= $i ?>"><?= isset($row['subject'])&&!empty($row['subject']) ? $row['subject'] : 'No-Subject' ?>&nbsp;<?php if($row['hasAttachment'] == "1"): echo '<i class="fa fa-paperclip"></i>'; endif;?></a>
                                                    <?php if ($row['seen'] != "1") : ?>
                                                        &nbsp;<span class="badge bg-success mb-0">New</span>
                                                    <?php else : ?>
                                                        
                                                    <?php endif; ?>
                                                </h6>
                                                <p class="dep">
                                                    <span class=""><?= $row['from'] ?></span>
                                                </p>
                                                <span class="time "><?= date("d-m-Y H:m A", strtotime($row['date'])) ?></span>
                                            </div>
                                        </li>
                                    <?php $i++;
                                    endforeach; ?>
                                    </div>
                                </ul>
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
<script>
    $(document).ready(function() {
        $(".mail-detail-expand").click(function() {
            var index = $(this).data('index');
            $("#mail-detail-open-" + index).toggle();
        });

        $(".mail-back").click(function() {
            var index = $(this).data('index');
            $(this).closest(".mail-detail-full").toggle();
        });
    });
</script>
<!-- updating emails -->
<script>
    $(document).ready(function() {
        function updateEmailData() {
            // Perform AJAX request
            $.ajax({
                url: '<?= base_url('emails/inboxUpdate_data')?>',
                type: 'GET',
                success: function(response) {
                    // Replace the updated data with the old data
                    $('#emailData').html(response);
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    console.error(error);
                }
            });
        }

        // Set interval to call the updateEmailData function every 30 seconds
        setInterval(updateEmailData, 80000);
    });
</script>

