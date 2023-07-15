<html><body>
    <h5 style="color:#157DED">Dr.
                                
                                <?= $e_ord['emp_fname'].' '. $e_ord['emp_lname'].'\'s ('.$e_ord['emp_imcr_no'].') |'.$e_ord['spec_name'].'|'.$e_ord['grade_name']?>, timesheet has been submitted to us.</h5>
                                
    <h5 style="color:#157DED">Can we request you to review/approve this.</h5>
    
    <h5 style="color:#157DED">You need to log in to your SRA locum portal to approve this.</h5>
    <h5 style="color:#157DED">Alternatively, you can reply to this email letting us know.</h5>
  
    <a target="_blank" href="<?= base_url('client/timesheet/' . encryptIt($e_ord['ord_id']))?>" style="background-color:#157DED;color:white;border: none;
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