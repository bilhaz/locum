<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3 d-print-none">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>View Time Sheet</h2>
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

                    <form action="<?= base_url('employee/timesheet_save/' . encryptIt($e_ord['ord_id'])) ?>" method="post">

                        <table class="table table-striped table-bordered border-primary" style="border: 1px #28a745;">
                            <thead>
                                <tr>
                                    <th style="border: solid #28a745;">Date</th>
                                    <?php $days = 1;
                                    $tmp_Startdate = $start_date;
                                    while (strtotime($tmp_Startdate) <= strtotime($end_date)) {
                                        echo '<th style="border: solid #28a745;">' . date('d-m-Y', strtotime($tmp_Startdate)) . '</th>';
                                        $tmp_Startdate = date("Y-m-d", strtotime("+1 days", strtotime($tmp_Startdate)));
                                        $days++;
                                    } ?>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $count = [];
                                $stsCounter = 1;
                                for ($i = 0; $i < 24; $i++) : ?>

                                    <tr>

                                        <td>

                                            <?= ($i) . '.00 to ' . ($i + 1) ?>.00hr
                                        </td>
                                        <?php
                                        $x = 1;
                                        $tmp_Startdate2 = $start_date;

                                        while (strtotime($tmp_Startdate2) <= strtotime($end_date)) { ?>
                                            <td>
                                                <div class="form-check">

                                                    <?php

                                                    $count[$tmp_Startdate2][$i] = 0;
                                                    foreach ($t_view as $r) : ?>
                                                        <?php if ($r['dutyTime'] == $i && date('Y-m-d', strtotime($tmp_Startdate2)) == $r['dutyDate']) :
                                                            $count[$tmp_Startdate2][$i]++;
                                                            if ($r['siteStatus'] == "1") : ?>
                                                                <b class="col<?= $x ?> onsite<?= $x ?>">OnSite</b>
                                                            <?php elseif ($r['siteStatus'] == "2") : ?>
                                                                <b class="col<?= $x ?> offsite<?= $x ?>">OffSite</b>

                                                    <?php endif;
                                                        endif;
                                                    endforeach;
                                                    ?>


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

                                <!-- totling -->

                                <tr>

                                    <td>

                                        <b>OnSite</b>
                                    </td>

                                    <?php
                                    $x = 1;
                                    $tmp_Startdate2 = $start_date;
                                    while (strtotime($tmp_Startdate2) <= strtotime($end_date)) { ?>
                                        <td id="onsite<?= $x ?>">
                                        </td>
                                    <?php
                                        $tmp_Startdate2 = date("Y-m-d", strtotime("+1 days", strtotime($tmp_Startdate2)));
                                        $x++;
                                    }
                                    ?>
                                </tr>
                                <tr>

                                    <td>

                                        <b>OffSite</b>
                                    </td>

                                    <?php
                                    $x = 1;
                                    $tmp_Startdate2 = $start_date;
                                    while (strtotime($tmp_Startdate2) <= strtotime($end_date)) { ?>
                                        <td id="offsite<?= $x ?>">
                                        </td>
                                    <?php
                                        $tmp_Startdate2 = date("Y-m-d", strtotime("+1 days", strtotime($tmp_Startdate2)));
                                        $x++;
                                    }
                                    ?>
                                </tr>
                                <tr>

                                    <td>

                                        <b>Total</b>
                                    </td>

                                    <?php
                                    $x = 1;
                                    $tmp_Startdate2 = $start_date;
                                    while (strtotime($tmp_Startdate2) <= strtotime($end_date)) { ?>
                                        <td id="col<?= $x ?>">
                                        </td>
                                    <?php
                                        $tmp_Startdate2 = date("Y-m-d", strtotime("+1 days", strtotime($tmp_Startdate2)));
                                        $x++;
                                    }
                                    ?>
                                </tr>

                                <!-- end totling -->





                            </tbody>
                        </table>
                        <br>


                    </form>




                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        updateCalc();
    });

    function updateCalc() {
        <?php for ($i = 0; $i < $x; $i++) { ?>
            $("#offsite<?= $i ?>").html($('.offsite<?= $i ?>').length);
            $("#onsite<?= $i ?>").html($('.onsite<?= $i ?>').length);
            $("#col<?= $i ?>").html($('.col<?= $i ?>').length);

        <?php } ?>
    }
</script>