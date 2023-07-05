<html>

<body>
    <div class="card-body">
        <div class="row mb-3 " id="email">
            <h3 style="color:#157DED">Dear Dr. <?= $v_ordr['emp_lname']?> </h3>
            <br>
            <h4 style="color:#fd1f1f">Your Payment is Paid against this confirmation number <span style="color:rgb(43, 105, 230)"><b><?= $v_ordr['ord_ref_no'] ?></b></span></h4>
            <h5><b style="color:#fd1f1f">Payment Paid on:</b> <span style="color:rgb(43, 105, 230)"><?= date("d-m-y", strtotime($v_ordr['ord_pay_to_dr_date'])) ?></span></h5>
        </div>
    </div>

</body>

</html>