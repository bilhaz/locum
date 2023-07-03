<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3 d-print-none">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);"
                            class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i
                                class="fa fa-arrow-left"></i></a>Fill Time Sheet</h2>
                    <ul class="breadcrumb mb-0">

                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4 class="card-title text-center">Time Sheet <br>
                        <?= $e_ord['cl_h_name'] ?></h4>
                        <h5 class="card-title text-center"><?= $e_ord['emp_fname'].' '. $e_ord['emp_lname'] .' '.$e_ord['emp_imcr_no'] ?> </h5>
                        <h6 class="card-title text-center"><?= $e_ord['spec_name'].'-'.$e_ord['grade_name'] ?></h6>
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

                    <form action="<?= base_url('backend/timesheet_save/' . encryptIt($e_ord['ord_id'])) ?>" method="post" data-parsley-validate="" id="forma">

                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
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
                                                    <input onchange="updateCalc()" class="form-check-input col<?=$x?> onsite<?=$x?>"" onclick="handleCheck(this)" value="<?=$tmp_Startdate2.','.$i?>,1" type="checkbox"
                                                        name="status[value<?=$stsCounter?>]"
                                                        id="flexRadioDefault<?= $stsCounter ?>">
                                                    <label class="form-check-label" for="flexRadioDefault<?= $stsCounter ?>">
                                                        Onsite
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input onchange="updateCalc()" class="form-check-input col<?=$x?> offsite<?=$x?>" onclick="handleCheck(this)" value="<?=$tmp_Startdate2.','.$i?>,2" type="checkbox" name="status[value<?=$stsCounter?>]"
                                                        id="flexRadioDefault<?= $stsCounter + 1000 ?>">
                                                    <label class="form-check-label"
                                                        for="flexRadioDefault<?= $stsCounter + 2000 ?>">
                                                        Offsite
                                                    </label>
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

                                            <b>Total Onsite hours</b>
                                        </td>

                                        <?php
                                        $x=1;
                                        $tmp_Startdate2 = $start_date;
                                        while (strtotime($tmp_Startdate2) <= strtotime($end_date)) { ?>
                                            <td id="onsite<?=$x?>">
                                            </td>
                                            <?php 
                                            $tmp_Startdate2 = date("Y-m-d", strtotime("+1 days", strtotime($tmp_Startdate2))); $x++;
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        
                                        <td>

                                            <b>Total Offsite hours</b>
                                        </td>

                                        <?php
                                        $x=1;
                                        $tmp_Startdate2 = $start_date;
                                        while (strtotime($tmp_Startdate2) <= strtotime($end_date)) { ?>
                                            <td id="offsite<?=$x?>">
                                            </td>
                                            <?php 
                                            $tmp_Startdate2 = date("Y-m-d", strtotime("+1 days", strtotime($tmp_Startdate2))); $x++;
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        
                                        <td>

                                            <b>Grand Total</b>
                                        </td>

                                        <?php
                                        $x=1;
                                        $tmp_Startdate2 = $start_date;
                                        while (strtotime($tmp_Startdate2) <= strtotime($end_date)) { ?>
                                            <td id="col<?=$x?>">
                                            </td>
                                            <?php 
                                            $tmp_Startdate2 = date("Y-m-d", strtotime("+1 days", strtotime($tmp_Startdate2)));$x++;
                                        }
                                        ?>
                                    </tr>

                                <!-- end totling -->


                            </tbody>
                        </table>
                        <div class="row mb-3">
                        <div class="col-md-4">
                        <lable>Signature<small class="text-danger">&nbsp;(Click Below to Sign)</small></lable>
                        <input type="text" id="dateInput" onclick="loadServerDateTime()" class="form-control" name="ord_timesheetSign" readonly required>
                        </div>
                        </div>
                        <br>
                        <div class="float-end"> 
                                <a id="payment-button" href="<?= base_url('backend/timesheet') ?>"
                                    class="btn btn-lg btn-dark text-light btn-block">
                                    <span id="payment-button-amount">Cancel</span>
                                </a>
                                &nbsp; &nbsp;
                                <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                    <span id="payment-button-amount">Save Record</span>
                                </button>
                            </div>

                    </form>




                </div>
            </div>
        </div>
    </div>
</div>
<script>
      function handleCheck(checkbox) {
        const td = checkbox.closest("td");
        const checkboxes = td.querySelectorAll("input[type='checkbox']");
        checkboxes.forEach(cb => {
          if (cb !== checkbox) {
            cb.checked = false;
          }
        });
      }

      $(document).ready(function() {
        updateCalc();
        });
    
        function updateCalc(){
      <?php for($i=0;$i < $x; $i++){ ?>
        $("#offsite<?=$i?>").html($('input.offsite<?=$i?>:checked').length);
        $("#onsite<?=$i?>").html($('input.onsite<?=$i?>:checked').length);
        $("#col<?=$i?>").html($('input.col<?=$i?>:checked').length);

      <?php } ?>
        }
    </script>
    <script>
    function loadServerDateTime() {
    var dateInput = document.getElementById("dateInput");
    // Assuming you have stored the session username in a PHP variable called `username`
  var username = "<?php echo $_SESSION['usr_name']; ?>";
    
    $.ajax({
      url: link6,  // Replace with the actual endpoint URL on your server
      type: "GET",
      dataType: "json",
      success: function(response) {
        var serverDateTime = response.currentDateTime;
        // Concatenate the session username with the server date and time
      var dateTimeWithUsername = username + " - " + serverDateTime;

      dateInput.value = dateTimeWithUsername;
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }
</script>