<html>

<body>
    <div class="card-body">
        <div class="row mb-3 " id="email">
            <h3 style="color:#157DED">Dear Client</h3>
            <br>
            <h4 style="color:#fd1f1f">Your Payment is Paid against this Invoice number <span style="color:rgb(43, 105, 230)"><b><?= $v_ordr['ord_invoice_id'] ?></b></span></h4>
            <h5><b style="color:#fd1f1f">Payment Paid on:</b> <?= $v_ordr['ord_paymnt_rcvd_date'] ?></h5>
        </div>
    </div>

</body>

</html>