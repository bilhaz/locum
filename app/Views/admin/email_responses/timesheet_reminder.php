<html><body>
			<div class="card-body">
                    <div class="row mb-3 " id="email" >
                               <h3 style="color:#157DED">Dear Employee</h3>
                                <br>
                                
                                <h4 style="color:#0000ff">We are Here to remind you, that you have not submitted the TimeSheet Against this Locum Confirmation Number# <?= $v_ordr['ord_ref_no'] ?> Kindly submit your TimeSheet.</h4>
                                <h3>Here is the link below to fill your TimeSheet</h3>
                                <a href="<?= base_url('employee/timesheet/'. encryptIt($v_ordr['ord_id'])) ?>" target="_blank" class="btn" style="background-color:#157DED;color:white;border: none;
										color: white;
										padding: 5px 10px;
										text-align: center;
										text-decoration: none;
										display: inline-block;
										font-size: 16px;
										margin: 4px 2px;
										cursor: pointer;">Click to View</a>
                                </div>
                    </div>
			</body></html>