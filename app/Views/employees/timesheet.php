<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3 d-print-none">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);"
                            class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a>Fill Time Sheet</h2>
                    <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a target="_blank" href="https://www.sralocum.com">SRA Locum</a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title text-center">Time Sheet</h4>

                    </div>
                    <?php if (isset($validation)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->get('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->get('success') ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->get('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->get('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('employee/timesheet/' . encryptIt($e_ord['ord_id'])) ?>" method="post">

                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Date</th>
                                    <?php $days = 1;
                                    while (strtotime($start_date) <= strtotime($end_date)) {
                                        echo '<th>' . date('d-m-Y', strtotime($start_date)) . '</th>';
                                        $start_date = date("Y-m-d", strtotime("+1 days", strtotime($start_date)));
                                        $days++;
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $stsCounter = 1; for ($i = 0; $i < 24; $i++): ?>
                                    <tr>
                                        <td>
                                            
                                            <?= ($i).'00to'.($i + 1) ?>.00hr
                                        </td>

                                        <?php
                                        
                                        for ($x = 1; $x < $days; $x++): ?>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status<?=$stsCounter?>"
                                                        id="flexRadioDefault<?=$stsCounter?>">
                                                    <label class="form-check-label" for="flexRadioDefault<?=$stsCounter?>">
                                                        Onsite
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="status<?=$stsCounter?>"
                                                        id="flexRadioDefault<?=$stsCounter+1000?>">
                                                    <label class="form-check-label" for="flexRadioDefault<?=$stsCounter+2000?>">
                                                        Offsite
                                                    </label>
                                                </div>
                                            </td>
                                        <?php $stsCounter++; endfor; ?>
                                    </tr>
                                <?php endfor; ?>



                            </tbody>
                        </table>
                        <br>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                <span id="payment-button-amount">Save Data</span>
                            </button>
                        </div>

                    </form>




                </div>
            </div>
        </div>
    </div>
</div>