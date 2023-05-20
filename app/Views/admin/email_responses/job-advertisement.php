<html><body>
			<div class="card-body">
                    <div class="row mb-3 " id="email" >
                               <h3 style="color:#157DED">Dear Employee</h3>
                                <br>
                                <p style="color:#000000">We are pleased to inform you that we have a new Locum as you mentioned in your profile's Speciality.</p>
                                <h4 style="color:#fd1f1f">Here are the Details of Locum</h4>
                                <p><b style="color:#157DED">Hospital:</b> <?=$ord['cl_h_name']?></p>
                                <p><b style="color:#157DED">Speciality:</b> <?=$ord['spec_name']?></p>
                                <p><b style="color:#157DED">Grade:</b> <?=$ord['grade_name']?></p>
                                <p><b style="color:#157DED">Required From-To:</b> <?=$ord['ord_required_from']. ' - '. $ord['ord_required_to']?></p>
                                <p><b style="color:#157DED">Locum Date & Time Details:</b> <?php $pros = explode(",",$ord['ord_datetime_detail']);
                                        foreach($pros as $var): ?>
                                       <?= $var ?> <br>
                                       <?php endforeach; ?></p>


   <br>
                                                <h4 style="color:#fd1f1f">If you want to Apply for this Locum Kindly click the Apply Button below</h4>
                                                <div class="col-md-6">
                                                <a target="_blank" href="<?= base_url('employee/advt_apply/'.encryptIt($ord['ord_id'])) ?>" class="btn btn-success" style="background-color:#29cb29e8;color:white;border: none;
                                                border-radius: 15%;
                                                padding: 5px 10px;
                                                text-align: center;
                                                text-decoration: none;
                                                display: inline-block;
                                                font-size: 16px;
                                                margin: 4px 2px;
                                                cursor: pointer;">Apply</a>
                                                </div>
                                </div>
                    </div>
			</body></html>