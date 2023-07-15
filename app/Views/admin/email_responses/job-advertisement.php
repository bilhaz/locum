<html>

<body>
        <div class="card-body">
                <div class="row mb-3 " id="email">
                        <h3 style="color:#157DED">Dear <?= $emp_fname ?></h3>
                        <br>
                        <p style="color:#000000">We are pleased to inform you that we have a new Locum as you mentioned in your profile's Speciality.</p>
                        <h4 style="color:#fd1f1f">Here are the Details of Locum</h4>
                        <p><b style="color:#157DED">Hospital:</b> <?= $ord['cl_h_name'] ?></p>
                        <p><b style="color:#157DED">Speciality:</b> <?= $ord['spec_name'] ?></p>
                        <p><b style="color:#157DED">Grade:</b> <?= $ord['grade_name'] ?></p>
                        
                        <p><b style="color:#157DED">Locum Date & Time Details:</b> <?php $pros = explode(",", $ord['ord_datetime_detail']);
                                                                                        foreach ($pros as $var) : ?>
                                        <?= $var ?> <br>
                                <?php endforeach; ?></p>
                        <br>
                        <h4 style="color:#fd1f1f">If you want to Apply for this Locum Kindly click the Apply Button below</h4>
                        <div class="col-md-6">
                            
                                <a target="_blank" href="<?= base_url('employee/advt_apply/' . encryptIt($ord['ord_id'])) ?>" class="btn btn-success" style="background-color:#28a745;color:white;border: none;
                                                border-radius: 15%;
                                                padding: 5px 10px;
                                                text-align: center;
                                                text-decoration: none;
                                                display: inline-block;
                                                font-size: 16px;
                                                margin: 4px 2px;
                                                cursor: pointer;">Apply</a>
                        </div>
                        <br>
                                    <h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter's, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p>
                </div>
        </div>
</body>

</html>