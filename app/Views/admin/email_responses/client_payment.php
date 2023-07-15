<html>

<body>
    <div class="card-body">
        <div class="row mb-3 " id="email">
            <h3 style="color:#157DED">Dear <?= $cl_cont_name?></h3>
            <br>
            <h4 style="color:#fd1f1f">Your Payment is Paid against this Invoice number <span style="color:rgb(43, 105, 230)"><b><?= $ord_invoice_id ?></b></span></h4>
            <h5><b style="color:#fd1f1f">Payment Paid on:</b> <span style="color:rgb(43, 105, 230)"><?= date("d-m-y", strtotime($ord_paymnt_rcvd_date)) ?></span></h5>
        </div>
    </div>
<h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter's, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p>
</body>

</html>