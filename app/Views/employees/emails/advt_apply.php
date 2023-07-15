<html><body>
			<div class="card-body">
                    <div class="row mb-3 " id="email" >
                               <h3 style="color:#157DED"><?= Session()->emp_fname .' '. session()->emp_lname ?> Successfully Applied for the order of <?= $ord_row['cl_h_name'] ?></h3>
                                <br>
                                <h4 style="color:#fd1f1f">Here are the Details of Locum</h4>
                                <p><b style="color:#157DED">Hospital:</b> <?= $ord_row['cl_h_name']?></p>
                                <p><b style="color:#157DED">Speciality:</b> <?= $ord_row['spec_name']?></p>
                                <p><b style="color:#157DED">Grade:</b> <?= $ord_row['grade_name']?></p>
                                <p><b style="color:#157DED">Locum Date & Time Details:</b> <?php $pros = explode(",",$ord_row['ord_datetime_detail']);
                                        foreach($pros as $var): ?>
                                       <?= $var ?> <br>
                                       <?php endforeach; ?></p>


   <br>
                                                <div class="col-md-6">
                                                <a target="_blank" href="<?= base_url('backend/order_view/'.encryptIt($ord_row['ord_id'])) ?>" class="btn btn-success" style="background-color:#1554c0e8;color:white;border: none;
                                                padding: 5px 10px;
                                                text-align: center;
                                                text-decoration: none;
                                                display: inline-block;
                                                font-size: 16px;
                                                margin: 4px 2px;
                                                cursor: pointer;">Click Here to View Orders</a>
                                                </div>
                                </div>
                    </div>
                    <h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter's, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p>
			</body></html>