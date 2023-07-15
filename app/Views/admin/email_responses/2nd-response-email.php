<html>

<body>
  <div class="card-body">
    <div class="row mb-3 " id="email">
      <h3>Dear
        <?php $lname = explode(' ', $v_ordr['cl_cont_name']) ?>
        <?php if (!empty($lname[0])) : echo $lname[0];
        endif; ?> </h3>
      <br>
      <p>At SRA Locum Service we are pleased to offer you the following doctor. Please review and reply.</p>
      <p><strong>Your Order Details are;</strong></p>
      <div class="table-responsive">
        <table class="table table-bordered align-middle d-inline" style="border-collapse: collapse;" width="70%">
          <tr>
            <th style="border: 1px solid black;"><strong>Hospital Name & Address:</strong></th>
            <td style="border: 1px solid black;"><strong><?= $v_ordr['cl_h_name'] . ', ' . $v_ordr['cl_address'] . ' | ' . $v_ordr['cl_eircode'] ?></strong></td>
          </tr>
          <tr>
            <th style="border: 1px solid black;"><strong>Client Contact Name:</strong></th>
            <td style="border: 1px solid black;"><strong><?= $v_ordr['cl_cont_name'] ?></strong></td>
          </tr>
          <tr>
            <th style="border: 1px solid black;"><strong>Covering Specialty:</strong></th>
            <td style="border: 1px solid black;"><strong><?= $v_ordr['spec_name'] . ' ' . $v_ordr['grade_name'] ?></strong></td>
          </tr>
          <tr>
            <th style="border: 1px solid black;"><strong>Offered Doctor (s):</strong></th>
            <td style="border: 1px solid black;"><strong>Dr.<?= $v_ordr['emp_fname'] . ' ' . $v_ordr['emp_lname'] . '( ' . $v_ordr['emp_imcr_no'] . ')' ?></strong></td>
          </tr>
          <tr>
            <th style="border: 1px solid black;"><strong>Covering Date & Time:</strong></th>
            <td style="border: 1px solid black;"><strong>
                <?php $pros = explode(",", $v_ordr['ord_prosdatetime_detail']);
                foreach ($pros as $var) : ?>
                  <?= $var ?> <br>
                <?php endforeach; ?>
              </strong></td>
          </tr>
          <tr>
            <th style="border: 1px solid black;"><strong>Rate:</strong></th>
            <td style="border: 1px solid black;"><b>Normal:</b> &euro;<?= $v_ordr['ord_Hnormal_hrs_rt'] ?>&nbsp;<?php if ($v_ordr['nh_p_type'] == 1) : echo "/hr";
                                                                                                                  elseif ($v_ordr['nh_p_type'] == 2) : echo "/day";
                                                                                                                  else : echo "/halfday";
                                                                                                                  endif; ?><br>
              <?php if ($v_ordr['ord_Hocall_rt'] > 0) : ?>
                <b>OnCall:</b> &euro;<?= $v_ordr['ord_Hocall_rt'] ?>&nbsp;<?php if ($v_ordr['oc_p_type'] == 1) : echo "/hr";
                                                                          elseif ($v_ordr['oc_p_type'] == 2) : echo "/day";
                                                                          else : echo "/halfday";
                                                                          endif; ?> <br>
              <?php endif; ?>
              <?php if ($v_ordr['ord_Hosite_rt'] > 0) : ?>
                <b>OffSite:</b> &euro;<?= $v_ordr['ord_Hosite_rt'] ?>&nbsp;<?php if ($v_ordr['os_p_type'] == 1) : echo "/hr";
                                                                            elseif ($v_ordr['os_p_type'] == 2) : echo "/day";
                                                                            else : echo "/halfday";
                                                                            endif; ?><br>
              <?php endif; ?>
              <?php if ($v_ordr['ord_Hbhw_rt'] > 0) : ?>
                <b>Weekend:</b> &euro;<?= $v_ordr['ord_Hbhw_rt'] ?>&nbsp;<?php if ($v_ordr['bhw_p_type'] == 1) : echo "/hr";
                                                                          elseif ($v_ordr['bhw_p_type'] == 2) : echo "/day";
                                                                          else : echo "/halfday";
                                                                          endif; ?><br>
            </td>
          <?php endif; ?>
          </tr>
          <tr>
            <th style="border: 1px solid black;"><strong>Admin Charges:</strong></th>
            <td class="text-danger" style="border: 1px solid black;color:red;"><strong><?= $v_ordr['ord_admin_charges'] ?>%</strong></td>
          </tr>
        </table>
      </div>

      <p><strong>Please Click on the links to download/view the proposed doctors documents.</strong></p>

      <?php if (!empty($v_ordr['emp_cv'])) { ?>
        <p class="mb-0"><strong>CV</strong></p>
        <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $v_ordr['emp_cv']) ?>">Click To View</a>
      <?php } ?>
      <?php if (!empty($v_ordr['emp_imc_cert'])) { ?>
        <p class="mb-0"><strong>IMC Certificate</strong></p>
        <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $v_ordr['emp_imc_cert']) ?>">Click To View</a>
      <?php } ?>
      <?php if (!empty($v_ordr['emp_gv_cert'])) { ?>
        <p class="mb-0"><strong>Garda Vetting Certificate</strong></p>
        <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $v_ordr['emp_gv_cert']) ?>">Click To View</a>
      <?php } ?>
      <?php if (!empty($v_ordr['emp_rec_refer'])) { ?>
        <p class="mb-0"><strong>Recent Reference</strong></p>
        <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $v_ordr['emp_rec_refer']) ?>">Click To View</a>
      <?php } ?>
      <?php if (!empty($v_ordr['emp_passport'])) { ?>
        <p class="mb-0"><strong>Passport</strong></p>
        <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $v_ordr['emp_passport']) ?>">Click To View</a>
      <?php } ?>
      <?php if (!empty($v_ordr['emp_occup_health'])) { ?>
        <p class="mb-0"><strong>Occupational Health</strong></p>
        <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $v_ordr['emp_occup_health']) ?>">Click To View</a>
      <?php } ?>
      <?php if (!empty($v_ordr['emp_work_permit'])) { ?>
        <p class="mb-0"><strong>Work Permit</strong></p>
        <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $v_ordr['emp_work_permit']) ?>">Click To View</a>
      <?php } ?>
      <?php if (!empty($v_ordr['emp_acls'])) : ?>
        <p class="mb-0"><strong>ACLS</strong></p>
        <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $v_ordr['emp_acls']) ?>">Click To View</a>
      <?php endif; ?>
      <?php if (!empty($v_ordr['emp_bcls'])) : ?>
        <p class="mb-0"><strong>BCLS</strong></p>
        <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $v_ordr['emp_bcls']) ?>">Click To View</a>
      <?php endif; ?>
      <?php if (!empty($v_ordr['emp_bls'])) : ?>
        <p class="mb-0"><strong>BLS</strong></p>
        <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $v_ordr['emp_bls']) ?>">Click To View</a>
      <?php endif; ?>
      <?php if (!empty($v_ordr['emp_atls'])) : ?>
        <p class="mb-0"><strong>ATLS</strong></p>
        <a target="_blank" href="<?= base_url('public/uploads/employee_attach/' . $v_ordr['emp_atls']) ?>">Click To View</a>
      <?php endif; ?>

      <br>
      <hr class="primary">
      <p><strong>Order status:</strong>
      <ol>
        <li><b>Order confirmation.</b></li>
        <li><b>Order processing initiated.</b></li>
        <li><b>Proposal of locum to you.</b></li>
        <li style="opacity:0.5;">Acceptance or declining a locum.</li>
        <li style="opacity:0.5;">Locum Confirmation.</li>
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
</body>

</html>