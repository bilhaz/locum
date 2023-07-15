<html><body>
		<div class="card-body">
		<div class="row mb-3 " id="email">
				   <h3>Dear 
                   <?php $lname = explode(' ',$v_ordr['cl_cont_name']) ?>
                                <?php if(!empty($lname[0])): echo $lname[0]; endif; ?> </h3>
					<p>Thank you for requesting a doctor through SRA Locum Service. We can confirm receiving your locum order. Process of sourcing a locum Doctor for you has already been initiated.</p>
					<p class="text-danger">If the order details are correct, you do not need to reply to this email.</p>
					<p><strong>Your Order Details are;</strong></p>
<table class="table align-middle table-responsive table-hover d-inline" style="border-collapse: collapse;" width="70%">
<tr>
<th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
<td style="border: 1px solid black;"><strong><?= $v_ordr['cl_h_name']. ', '. $v_ordr['cl_address'].' | ' . $v_ordr['cl_eircode']?></strong></td>
</tr>
<tr>
<th style="border: 1px solid black;"><strong>Client Contact Name:</strong></th>
<td style="border: 1px solid black;"><strong><?= $v_ordr['cl_cont_name']?></strong></td>
</tr>
<tr>
<th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
<td style="border: 1px solid black;"><strong><?= $v_ordr['spec_name'].' - '. $v_ordr['grade_name']?></strong></td>
</tr>
<tr>
<tr>
  <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
  <td style="border: 1px solid black;"><strong><?php $pros = explode(",",$v_ordr['ord_datetime_detail']);
                                        foreach($pros as $var): ?>
                                       <?= $var ?> <br>
                                       <?php endforeach; ?>
</strong></td>
</tr>    
</table>
<p><strong>Order status:</strong>
<ol>
<li><b>Order confirmation.</b></li>
<li><b>Order processing initiated.</b></li>
<li style="opacity:0.5;">Proposal of locum to you.</li>
<li style="opacity:0.5;">Acceptance or declining a locum.</li>
<li style="opacity:0.5;">Locum Confirmation.</li>
</ol>
</p>
					
					</div>
					<h5 style="color:#157DED">Regards with Thanks</h5>
                                    <h6 style="color:#157DED">SRA Locum</h6>
                                    <p style="color:#157DED">2nd Floor, 13 Baggot St Upper</p>
                                    <p style="color:#157DED">Saint Peter's, Dublin 4 D04 W7K5</p>
                                    <p style="color:#157DED"><a href="mailto:info@sralocum.com">info@sralocum.com</a> | 01 685 4700 | 01 699 4321</p>
					
		</div></body></html>