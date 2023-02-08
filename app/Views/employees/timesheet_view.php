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

                    <form action="<?= base_url('employee/timesheet_save/' . encryptIt($e_ord['ord_id'])) ?>" method="post">

                        <table class="table table-striped table-bordered border-primary" style="border: solid green;">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <?php $days = 1;
                                    $tmp_Startdate = $start_date;
                                    while (strtotime($tmp_Startdate) <= strtotime($end_date)) {
                                        echo '<th>' . date('d-m-Y', strtotime($tmp_Startdate)) . '</th>';
                                        $tmp_Startdate = date("Y-m-d", strtotime("+1 days", strtotime($tmp_Startdate)));
                                        $days++;
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $stsCounter = 1;
                                for ($i = 0; $i < 24; $i++): ?>

                                    <tr>
                                        
                                        <td>

                                            <?=($i) . '.00 to ' . ($i + 1) ?>.00hr
                                        </td>
                                        <?php
                                        $x = 1;
                                        $tmp_Startdate2 = $start_date;
                                        while (strtotime($tmp_Startdate2) <= strtotime($end_date)) { ?>
                                            <td>
                                                <div class="form-check">
                                                    
                                                    <?php foreach($t_view as $r): ?>
                                                   <?php if($r['dutyTime'] == $i && date('Y-m-d',strtotime($tmp_Startdate2)) == $r['dutyDate']):
                                                   
                                                     if($r['siteStatus'] == "1"): ?>
                                                        <b>OnSite</b> 
                                                        <?php elseif($r['siteStatus'] == "2"): ?>
                                                            <b>OffSite</b>
                                                            <?php else: ?>
                                                                <b>-</b>
                                                                
                                                                <?php endif;
                                                                endif; 
                                                              endforeach; ?>
                                                            

                                                </div>
                                                
                                            </td>
                                            <?php 
                                            $tmp_Startdate2 = date("Y-m-d", strtotime("+1 days", strtotime($tmp_Startdate2)));
                                            $stsCounter++;
                                            $x++;
                                        }
                                        ?>
                                    </tr>
                                <?php endfor; ?>



                            </tbody>
                        </table>
                        <br>
                        

                    </form>




                </div>
            </div>
        </div>
    </div>
</div>