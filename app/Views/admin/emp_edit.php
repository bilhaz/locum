<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);"
                            class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        Updtae Employee</h2>
                    <ul class="breadcrumb mb-0">

                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">

                </div>
                    <div class="card">
                        <div class="card-body">
                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $validation->listErrors() ?>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->get('success')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session()->get('success') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->get('error')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->get('error') ?>
                                </div>
                            <?php endif; ?>
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Employee</h3>
                            </div>
                            <hr>
                            <form action="<?= base_url('backend/emp_edit/' . encryptIt($ed_emp['emp_id'])) ?>" method="post" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8" data-parsley-validate="" id="forma">
                            <div class="row mb-3">
                                    <div class="form-group col-md-6 ">
                                        <label for="emp_fname" class="control-label mb-1">First name</label>
                                        <input id="emp_fname" name="emp_fname" type="text" class="form-control" value="<?= $ed_emp['emp_fname'] ?>" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="emp_lname" class="control-label mb-1">Last Name</label>
                                        <input id="emp_lname" name="emp_lname" type="text" class="form-control" value="<?= $ed_emp['emp_lname'] ?>" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="emp_email" class="control-label mb-1">Email</label>
                                    <input id="emp_email" name="emp_email" type="email" class="form-control" value="<?= $ed_emp['emp_email'] ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="emp_gender" class="control-label mb-1">Gender</label>
                                    <select id="emp_gender" name="emp_gender" class="form-control select2"  data-parsley-trigger="change" required="">
                                        <option value="">Select Gender</option>
                                        <option value="M" <?php if ($ed_emp['emp_gender'] == "M") { ?> echo selected="selected" <?php } ?>>Male</option>
                                        <option value="F" <?php if ($ed_emp['emp_gender'] == "F") { ?> echo selected="selected" <?php } ?>>Female</option>
                                        <option value="O" <?php if ($ed_emp['emp_gender'] == "O") { ?> echo selected="selected" <?php } ?>>Other</option>
                                    </select>                               
                                 </div>
                            </div>
                                
                                <div class="row mb-3">
                                    <div class="form-group col-md-6 ">
                                        <label for="emp_spec1" class="control-label mb-1">Speciality 1</label>
                                        <select id="emp_spec1" name="emp_spec1" class="form-control select2" required="" data-parsley-trigger="change">
                                        <option value="">Select Speciality</option>
                                        <?php foreach($spec as $srow):?>
                                        <option value="<?= $srow['spec_id']?>" <?php if ($ed_emp ['emp_spec1'] == $srow['spec_id']) { ?> echo selected="selected" <?php } ?>><?= $srow['spec_name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-6 ">
                                        <label for="emp_grade1" class="control-label mb-1">Grade 1</label>
                                        <select id="emp_grade1" name="emp_grade1" class="form-control select2" required="" data-parsley-trigger="change">
                                        <option value="">Select Grade</option>
                                        <?php foreach($grade as $grow):?>
                                        <option value="<?= $grow['grade_id']?>" <?php if ($ed_emp ['emp_grade1'] == $grow['grade_id']) { ?> echo selected="selected" <?php } ?>><?= $grow['grade_name']?></option>
                                        <?php endforeach; ?>
                                    </select>                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-6 ">
                                        <label for="cemp_spec2" class="control-label mb-1">Speciality 2<small>&nbsp;(Optional)</small></label>
                                        <select id="emp_spec2" name="emp_spec2" class="form-control select2"  data-parsley-trigger="change">
                                        <option value="">Select Speciality</option>
                                        <?php foreach($spec as $srow):?>
                                        <option value="<?= $srow['spec_id']?>" <?php if ($ed_emp ['emp_spec2'] == $srow['spec_id']) { ?> echo selected="selected" <?php } ?>><?= $srow['spec_name']?></option>
                                        <?php endforeach; ?>
                                    </select>                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="emp_grade2" class="control-label mb-1">Grade 2<small>&nbsp;(Optional)</small></label>
                                        <select id="emp_grade2" name="emp_grade2" class="form-control select2"  data-parsley-trigger="change">
                                        <option value="">Select Grade</option>
                                        <?php foreach($grade as $grow):?>
                                        <option value="<?= $grow['grade_id']?>" <?php if ($ed_emp ['emp_grade2'] == $grow['grade_id']) { ?> echo selected="selected" <?php } ?>><?= $grow['grade_name']?></option>
                                        <?php endforeach; ?>
                                    </select>                                     </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-6 ">
                                        <label for="emp_spec3" class="control-label mb-1">Speciality 3<small>&nbsp;(Optional)</small></label>
                                        <select id="emp_spec3" name="emp_spec3" class="form-control select2"  data-parsley-trigger="change">
                                        <option value="">Select Speciality</option>
                                        <?php foreach($spec as $srow):?>
                                        <option value="<?= $srow['spec_id']?>" <?php if ($ed_emp ['emp_spec3'] == $srow['spec_id']) { ?> echo selected="selected" <?php } ?>><?= $srow['spec_name']?></option>
                                        <?php endforeach; ?>
                                    </select>                                     </div>
                                    <div class="form-group col-md-6">
                                        <label for="emp_grade3" class="control-label mb-1">Grade 3<small>&nbsp;(Optional)</small></label>
                                        <select id="emp_grade3" name="emp_grade3" class="form-control select2"  data-parsley-trigger="change">
                                        <option value="">Select Grade</option>
                                        <?php foreach($grade as $grow):?>
                                        <option value="<?= $grow['grade_id']?>" <?php if ($ed_emp ['emp_grade3'] == $grow['grade_id']) { ?> echo selected="selected" <?php } ?>><?= $grow['grade_name']?></option>
                                        <?php endforeach; ?>
                                    </select>                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="form-group col-md-6 ">
                                        <label for="emp_pps_no" class="control-label mb-1">PPS No.</label>
                                        <input id="emp_pps_no" name="emp_pps_no" type="number" class="form-control" value="<?= $ed_emp['emp_pps_no'] ?>" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="emp_phone" class="control-label mb-1">Phone No.</label>
                                        <input id="emp_phone" name="emp_phone" type="number" class="form-control" value="<?= $ed_emp['emp_phone'] ?>" required="">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="emp_imcr_no" class="control-label mb-1">IMC No.</label>
                                    <input id="emp_imcr_no" name="emp_imcr_no" type="number" class="form-control" value="<?= $ed_emp['emp_imcr_no'] ?>" required="">
                                </div>


                                <div class="row mb-3">
                                <label for="formFile" class="form-label">CV</label>
                                <input class="form-control" type="file" name="emp_cv" id="formFile"
                                    data-parsley-max-file-size="2000" />
                            </div>
                            <div class="row mb-3">
                                <?php if (!empty($ed_emp['emp_cv'])) : ?>
                                    <a href="<?= base_url('public/uploads/employee_attach/' . $ed_emp['emp_cv']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_cvv" value="<?= $ed_emp['emp_cv'] ?>">
                                <?php endif; ?>
                            </div>

                            <div class="row mb-3">
                                <label for="formFile" class="form-label">IMC Certificate</label>
                                <input class="form-control" type="file" name="emp_imc_cert" id="formFile"
                                    data-parsley-max-file-size="2000"  />
                            </div>

                            <div class="row mb-3">
                                <?php if (!empty($ed_emp['emp_imc_cert'])) : ?>
                                    <a href="<?= base_url('public/uploads/employee_attach/' . $ed_emp['emp_imc_cert']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_imc_certt" value="<?= $ed_emp['emp_imc_cert'] ?>">
                                <?php endif; ?>
                            </div>


                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Garda Vetting Certificate</label>
                                <input class="form-control" type="file" name="emp_gv_cert" id="formFile"
                                    data-parsley-max-file-size="2000"  />
                            </div>

                            <div class="row mb-3">
                                <?php if (!empty($ed_emp['emp_gv_cert'])) : ?>
                                    <a href="<?= base_url('public/uploads/employee_attach/' . $ed_emp['emp_gv_cert']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_gv_certt" value="<?= $ed_emp['emp_gv_cert'] ?>">
                                <?php endif; ?>
                            </div>

                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Recent Reference</label>
                                <input class="form-control" type="file" name="emp_rec_refer" id="formFile"
                                    data-parsley-max-file-size="2000" />
                            </div>
                            <div class="row mb-3">
                                <?php if (!empty($ed_emp['emp_rec_refer'])) : ?>
                                    <a href="<?= base_url('public/uploads/employee_attach/' . $ed_emp['emp_rec_refer']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_rec_referr" value="<?= $ed_emp['emp_rec_refer'] ?>">
                                <?php endif; ?>
                            </div>

                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Passport</label>
                                <input class="form-control" type="file" name="emp_passport" id="formFile"
                                    data-parsley-max-file-size="2000" />
                            </div>

                            <div class="row mb-3">
                                <?php if (!empty($ed_emp['emp_passport'])) : ?>
                                    <a href="<?= base_url('public/uploads/employee_attach/' . $ed_emp['emp_passport']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_passportt" value="<?= $ed_emp['emp_passport'] ?>">
                                <?php endif; ?>
                            </div>

                                
                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Occupational Health</label>
                                <input class="form-control" type="file" name="emp_occup_health" id="formFile"
                                    data-parsley-max-file-size="2000" />
                            </div>
                            <div class="row mb-3">
                                <?php if (!empty($ed_emp['emp_occup_health'])) : ?>
                                    <a href="<?= base_url('public/uploads/employee_attach/' . $ed_emp['emp_occup_health']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_occup_healthh" value="<?= $ed_emp['emp_occup_health'] ?>">
                                <?php endif; ?>
                            </div>


                                <div class="row mb-3">
                                <label for="formFile" class="form-label">Work Permit</label>
                                <input class="form-control" type="file" name="emp_work_permit" id="formFile"
                                    data-parsley-max-file-size="2000"  />
                            </div>
                            <div class="row mb-3">
                                <?php if (!empty($ed_emp['emp_work_permit'])) : ?>
                                    <a class="mb-3" href="<?= base_url('public/uploads/employee_attach/' . $ed_emp['emp_work_permit']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_work_permitt" value="<?= $ed_emp['emp_work_permit'] ?>">
                                <?php endif; ?>
                            </div>


                            <div style="float:right"> 
                                

                                <a  id="payment-button" href="<?= base_url('backend/employees') ?>"
                                    class="btn btn-lg btn-dark text-light btn-block">
                                    <span id="payment-button-amount">Cancel</span>
                                </a>
                                &nbsp; &nbsp;
                                <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                    <span id="payment-button-amount">Update Employee</span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
