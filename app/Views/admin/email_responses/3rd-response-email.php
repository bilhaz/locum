<html>
<body>
		<div class="card-body">
                    <div class="row mb-3 " id="email">
                        <h5 style="color:red;">LOCUM CONFIRMATION</h5>
                               <h3>Dear 
                               <?php $lname = explode(' ',$v_ordr['cl_cont_name']) ?>
                                <?php if(!empty($lname[0])): echo $lname[0]; endif; ?> </h3>
                                <br> 
                                <p>At SRA Locum Service we are pleased to confirm you the following doctor.</p>
                                <p><strong>Your Order Details are;</strong></p>
                                <div class="table-responsive">
  <table class="table table-bordered align-middle d-inline" style="border-collapse: collapse;" width="70%"  >
      <tr>
        <th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $v_ordr['cl_h_name']. ', '. $v_ordr['cl_address'].' | ' . $v_ordr['cl_eircode'] ?></strong></td>
      </tr>
      <tr>
        <th style="border: 1px solid black;"><strong>Client Contact Name:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $v_ordr['cl_cont_name']?></strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
        <td style="border: 1px solid black;"><strong><?= $v_ordr['spec_name'].' '. $v_ordr['grade_name']?></strong></td>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Offered Doctor (s):</strong></th>
        <td style="border: 1px solid black;"><strong>Dr.<?= $v_ordr['emp_fname']. ' ' .$v_ordr['emp_lname'] .'( '. $v_ordr['emp_imcr_no'].')'?></strong></td>
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
        <td style="border: 1px solid black;"><b>Normal:</b> &euro;<?=  $v_ordr['ord_Hnormal_hrs_rt'] ?>&nbsp;<?php if($v_ordr['nh_p_type'] == 1): echo "/hr"; elseif($v_ordr['nh_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br>
                                            <?php if($v_ordr['ord_Hocall_rt'] > 0): ?>
                                            <b>OnCall:</b> &euro;<?= $v_ordr['ord_Hocall_rt']?>&nbsp;<?php if($v_ordr['oc_p_type'] == 1): echo "/hr"; elseif($v_ordr['oc_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?> <br>
                                            <?php endif; ?>
                                            <?php if($v_ordr['ord_Hosite_rt'] > 0): ?>
                                            <b>OffSite:</b> &euro;<?= $v_ordr['ord_Hosite_rt'] ?>&nbsp;<?php if($v_ordr['os_p_type'] == 1): echo "/hr"; elseif($v_ordr['os_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br>
                                            <?php endif; ?>
                                            <?php if($v_ordr['ord_Hbhw_rt'] > 0): ?>
                                            <b>Weekend:</b> &euro;<?= $v_ordr['ord_Hbhw_rt'] ?>&nbsp;<?php if($v_ordr['bhw_p_type'] == 1): echo "/hr"; elseif($v_ordr['bhw_p_type'] == 2): echo "/day"; else: echo "/halfday"; endif; ?><br></td>
                                            <?php endif; ?>
     </tr>
     <tr>
        <th style="border: 1px solid black;"><strong>Admin Charges:</strong></th>
        <td class="text-danger" style="border: 1px solid black;color:red;"><strong><?= $v_ordr['ord_admin_charges']?>%</strong></td>
     </tr>  
  </table>
</div>

<p><strong>“SRA Locum”: Shamrock Assist, incorporated in Ireland under registration number 599436, Registered office is at 2nd Floor, 13 Upper Baggot St, Dublin 4 .</strong></p>

   <br>
   <h3 class="text-danger" style="color:red;">SRA Locum standard <a href="https://sralocum.com/public/uploads/files/termsandconditions.pdf" target="_blank">terms and conditions</a> are applicable to the above assignment. For the avoidance of doubt,</h3>
<ol type="a" class="text-danger" style="color:red;">
    <li>The Client acknowledges that they are being provided locum doctor through the SRA Locum,</li>
    <li>That all payments will be made to SRA Locum, under no circumstances the client will pay the locum doctor directly. </li>
    <li>Client acknowledges to us that their services are supplied by us as an independent locum.</li>
    <li>Any placed personnel will be under the supervision, direction, and control of the client.</li>
    <li>Where a locum is hired directly by the client within the period of six months of the initial introduction, a one recruitment fee of 7% of the year pay will be payable by the client.</li>
    <li>The credit limit for your every ordering client shall not exceed 1000 euro unless previous dues are paid.</li>
</ol>
   <br>
<hr class="primary">
<p><strong>Order status:</strong>
<ol>
   <li style="opacity:0.5;"><b>Order confirmation.</b></li>
   <li style="opacity:0.5;"><b>Order processing initiated.</b></li>
   <li style="opacity:0.5;"><b>Proposal of locum to you.</b></li>
   <li style="opacity:0.5;"><b>Acceptance or declining a locum.</b></li>
   <li><b>Locum Confirmation.</b></li>
</ol>
</p>
                                </div>
                    </div>
                    <br>
                    <h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter's, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p>
		</body></html>