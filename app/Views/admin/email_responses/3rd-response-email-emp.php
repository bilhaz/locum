<html>
<body>
		<div class="card-body">
                    <div class="row mb-3 " id="email">
                               <h3>Dear <?= $v_ordr['emp_fname'] ?> </h3>
                                <p>we are pleased to inform you that you have secured a locum with the following details.</p>
                                
                                <div class="table-responsive">
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
</div>

<p>We will send you the contract, terms and conditions and other information in the next email.</p>

   <br>
   <h3 class="text-danger" style="color:#28a745;">Congratulations</h3>

                                </div>
                                <br>
                                <h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter's, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p>
                    </div>
		</body></html>