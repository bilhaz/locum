<html><body>
			<div class="card-body">
                    <div class="row mb-3 " id="email" >
                               <h5 style="color:#157DED">Dear
                                
                                <?= $v_ordr['emp_fname'].' '. $v_ordr['emp_lname']. ' ('. $v_ordr['emp_imcr_no']. ')'?></h5>
                                <br>
                                <p style="color:#157DED">Congratulations, and thank you for taking up this Locum assignment with SRA Locum with the following details:</p>
                                <table class="table table-bordered align-middle d-inline" style="border-collapse: collapse;" width="70%"  >
      <tr>
        <th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $v_ordr['cl_h_name']. ', '. $v_ordr['cl_address'].' | ' . $v_ordr['cl_eircode'] ?></strong></td>
      </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $v_ordr['spec_name'].' '. $v_ordr['grade_name']?></strong></td>
     </tr>
     <tr>
	 <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
	 <td style="border: 1px solid black;"><strong>
    <?php $pros = explode(",",$v_ordr['ord_prosdatetime_detail']);
                                        foreach($pros as $var): ?>
                                       <?= $var ?> <br>
                                       <?php endforeach; ?>
</strong></td>
      </tr> 
      <tr>
        <th style="border: 1px solid black;"><strong>Rate:</strong></th>
        <td style="border: 1px solid black;"><b>Normal:</b> &euro;<?=  $v_ordr['ord_normal_hrs_rt'] ?>&nbsp;<?php if($v_ordr['nh_p_type'] == 1): echo "/hr"; elseif($v_ordr['nh_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br>
                                            <?php if($v_ordr['ord_ocall_rt'] > 0): ?>
                                            <b>OnCall:</b> &euro;<?= $v_ordr['ord_ocall_rt']?>&nbsp;<?php if($v_ordr['oc_p_type'] == 1): echo "/hr"; elseif($v_ordr['oc_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?> <br>
                                            <?php endif; ?>
                                            <?php if($v_ordr['ord_osite_rt'] > 0): ?>
                                            <b>OffSite:</b> &euro;<?= $v_ordr['ord_osite_rt'] ?>&nbsp;<?php if($v_ordr['os_p_type'] == 1): echo "/hr"; elseif($v_ordr['os_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br>
                                            <?php endif; ?>
                                            <?php if($v_ordr['ord_bhw_rt'] > 0): ?>
                                            <b>Weekend:</b> &euro;<?= $v_ordr['ord_bhw_rt'] ?>&nbsp;<?php if($v_ordr['bhw_p_type'] == 1): echo "/hr"; elseif($v_ordr['bhw_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br></td>
                                            <?php endif; ?>
     </tr>
  </table>
  <p style="color:#157DED">You do not need to reply to this email. </p>
                                    <ol>
                                <li style="color:#157DED">To view your contract, please click here:
                                        <a type="button" target="_blank" href="<?= base_url('employee/ord-view/'.encryptIt($v_ordr['ord_id']))?>" class="btn" style="background-color:#157DED;color:white;border: none;
										color: white;
										padding: 5px 10px;
										text-align: center;
										text-decoration: none;
										display: inline-block;
										font-size: 16px;
										margin: 4px 2px;
										cursor: pointer;">Click to View Contract</a></li>
										
										<li style="color:#157DED">To view your SRA Locum Terms and Condition, please click here:
                                        <a type="button" target="_blank" href="https://sralocum.com/public/uploads/files/termsandconditions.pdf" class="btn" style="background-color:#157DED;color:white;border: none;
										color: white;
										padding: 5px 10px;
										text-align: center;
										text-decoration: none;
										display: inline-block;
										font-size: 16px;
										margin: 4px 2px;
										cursor: pointer;">Click to View Terms and Condition</a></li>
										
                                    <li style="color:#157DED">Once you have finished your locum, you will need to complete the time sheet.   Please login to your SRA Locum portal to complete your timesheet or alternatively click here to print your timesheet and send it to us after filling it.
                                        <a type="button" target="_blank" href="<?= base_url('public/uploads/SRAL-timesheet.pdf')?>" class="btn" style="background-color:#157DED;color:white;border: none;
										color: white;
										padding: 5px 10px;
										text-align: center;
										text-decoration: none;
										display: inline-block;
										font-size: 16px;
										margin: 4px 2px;
										cursor: pointer;">Click to Download Timesheet</a></li>
										
										<li style="color:#157DED">We recommend that you have your assessment form completed and signed by the consultant and email it to us at info@sralocum.com
                                        <a type="button" target="_blank" href="<?= base_url('public/uploads/Assesment_form.pdf')?>" class="btn" style="background-color:#157DED;color:white;border: none;
										color: white;
										padding: 5px 10px;
										text-align: center;
										text-decoration: none;
										display: inline-block;
										font-size: 16px;
										margin: 4px 2px;
										cursor: pointer;">Click to Download Assesment Form</a></li>
                                </ol>


   <br>
   <h5 style="color:red;">NOTE:</h5>
   <ol style="color:red;" type="a">
       <li>You remain responsible for the complete timesheet.</li>
       <li>. SRA Locum will only pay the locum doctor once the Timesheet (s) is confirmed and the ordering Client has paid Shamrock Assist Limited.</li>
       <li>We strongly recommend you have your assessment form completed as this will help us to secure locums for you.</li>
       <li>If you are unable to reach the GP/Hospital/assignment place of work on time for the agreed shifts please Contact the Hospital/Surgery on the phone (usually though GP surgery/Hospital switchboard) and by emailing SRA Locum at <a href="mailto:info@sralocum.com">info@sralocum.com</a> / or by calling 01-6854700.</li>
       <li>Unnecessary cancellation affects patient care. Please referrer to <a href="https://www.medicalcouncil.ie/">https://www.medicalcouncil.ie/</a> for additional information.</li>
       </ol>

                                </div>
                    </div>
                    <br>
                    <h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter's, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p>
			</body></html>