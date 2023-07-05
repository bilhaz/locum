<html>

<body>
    <div class="card-body">
        <div class="row mb-3 " id="email">
            <h3>Dear Dr.
            <?= $v_ordr['emp_fname'] . ' ' . $v_ordr['emp_lname'] . ' ('. $v_ordr['emp_imcr_no'] .')' ?>
                </h3>
            <br>
            <p>YOU ARE NOW BEEN CONFIRMED FOR THE <?= $v_ordr['spec_name'] ?> &nbsp; <?= $v_ordr['grade_name'] ?> &nbsp; At <strong><?= $v_ordr['cl_h_name'] ?></strong></p>
            <p>Locum Dates:
            <?php $pros = explode(",",$v_ordr['ord_prosdatetime_detail']);
                                        foreach($pros as $var): ?>
                                       <?= $var ?> <br>
                                       <?php endforeach; ?>
            </p>
            <h5 style="color:#157DED">THE CONFIRMATION CONTRACT AND EMAIL WILL SEND TO YOU SHORTLY.</h5>
            </div>
            <br>
        </div>
    </div>
</body>

</html>