<html><body>
    <h5 style="color:#157DED">Dear
                                
                                <?= $e_ord['emp_fname'] ?></h5>
                                <br>
                                <br>
    <h4>Your time sheet for your locum with the following details has been Approved by HR.</h4>
    <br>
    <br>
                                    <table class="table table-bordered align-middle d-inline" style="border-collapse: collapse;" width="70%"  >
      <tr>
        <th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $e_ord['cl_h_name']. ', '. $e_ord['cl_address'].' | ' . $e_ord['cl_eircode'] ?></strong></td>
      </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $e_ord['spec_name'].' '. $e_ord['grade_name']?></strong></td>
     </tr>
     <tr>
	 <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
	 <td style="border: 1px solid black;"><strong>
    <?php $pros = explode(",",$e_ord['ord_prosdatetime_detail']);
                                        foreach($pros as $var): ?>
                                       <?= $var ?> <br>
                                       <?php endforeach; ?>
</strong></td>
      </tr> 
      <tr>
        <th style="border: 1px solid black;"><strong>Rate:</strong></th>
        <td style="border: 1px solid black;"><b>Normal:</b> &euro;<?=  $e_ord['ord_normal_hrs_rt'] ?>&nbsp;<?php if($e_ord['nh_p_type'] == 1): echo "/hr"; elseif($e_ord['nh_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br>
                                            <?php if($e_ord['ord_ocall_rt'] > 0): ?>
                                            <b>OnCall:</b> &euro;<?= $e_ord['ord_ocall_rt']?>&nbsp;<?php if($e_ord['oc_p_type'] == 1): echo "/hr"; elseif($e_ord['oc_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?> <br>
                                            <?php endif; ?>
                                            <?php if($e_ord['ord_osite_rt'] > 0): ?>
                                            <b>OffSite:</b> &euro;<?= $e_ord['ord_osite_rt'] ?>&nbsp;<?php if($e_ord['os_p_type'] == 1): echo "/hr"; elseif($e_ord['os_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br>
                                            <?php endif; ?>
                                            <?php if($e_ord['ord_bhw_rt'] > 0): ?>
                                            <b>Weekend:</b> &euro;<?= $e_ord['ord_bhw_rt'] ?>&nbsp;<?php if($e_ord['bhw_p_type'] == 1): echo "/hr"; elseif($e_ord['bhw_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br></td>
                                            <?php endif; ?>
     </tr>
  </table>
  <br> <br>
  <p>This is a routine process.  You do not need to take any action. Be assured Team SRA Locum is working for you. </p>
  <br>
    <p> Here is the Timesheet Link</p><br><a target="_blank" href="<?= base_url('employee/t-view/' . encryptIt($e_ord['ord_id']))?>" style="background-color:#157DED;color:white;border: none;
			color: white;
			padding: 5px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;">Click to View</a>
			<h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter's, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p>
			</body></html>