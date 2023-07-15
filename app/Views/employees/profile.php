<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        Profile</h2>
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
                    <div class="card-header"></div>
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
                            <h3 class="text-center title-2">My Details</h3>
                            <span class="text-danger">Document should be less than 2MB</span><br>
                            <span class="text-danger">File format should be (pdf, jpg, png, docs, docx)</span>
                        </div>
                        <hr>
                        <form action="<?= base_url('employee/profile') ?>" method="post" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8" data-parsley-validate="" id="forma">
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="emp_fname" class="control-label mb-1">First name</label>
                                    <?php if (empty($emp['emp_fname'])) : ?>
                                        <input id="emp_fname" name="emp_fname" type="text" class="form-control" required="">
                                    <?php else : ?>
                                        <input id="emp_fname" name="emp_fname" type="text" class="form-control" required="" value="<?= $emp['emp_fname'] ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="emp_lname" class="control-label mb-1">Last Name</label>
                                    <?php if (empty($emp['emp_lname'])) : ?>
                                        <input id="emp_lname" name="emp_lname" type="text" class="form-control" required="">
                                    <?php else : ?>
                                        <input id="emp_lname" name="emp_lname" type="text" class="form-control" required="" value="<?= $emp['emp_lname'] ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="emp_email" class="control-label mb-1">Email</label>
                                    <input id="emp_email" name="emp_email" type="email" class="form-control" value="<?= $emp['emp_email'] ?>" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="emp_gender" class="control-label mb-1">Gender</label>
                                    <select id="emp_gender" name="emp_gender" class="form-control select2" data-parsley-trigger="change" required="">
                                        <option value="">Select Gender</option>
                                        <?php if (empty($emp['emp_gender'])) : ?>
                                            <option value="M" <?= set_select('emp_gender', 'M', (!empty($fieldType) && $fieldType == 'M' ? TRUE : FALSE)); ?>>Male</option>
                                            <option value="F" <?= set_select('emp_gender', 'F', (!empty($fieldType) && $fieldType == 'F' ? TRUE : FALSE)); ?>>Female</option>
                                            <option value="O" <?= set_select('emp_gender', 'O', (!empty($fieldType) && $fieldType == 'F' ? TRUE : FALSE)); ?>>Other</option>
                                        <?php else : ?>
                                            <option value="M" <?php if ($emp['emp_gender'] == "M") { ?> echo selected="selected" <?php } ?>>Male</option>
                                            <option value="F" <?php if ($emp['emp_gender'] == "F") { ?> echo selected="selected" <?php } ?>>Female</option>
                                            <option value="O" <?php if ($emp['emp_gender'] == "O") { ?> echo selected="selected" <?php } ?>>Other</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="emp_spec1" class="control-label mb-1">Speciality 1</label>
                                    <select id="emp_spec1" name="emp_spec1" class="form-control select2" required="" data-parsley-trigger="change">
                                        <option value="">Select Speciality</option>
                                        <?php foreach ($spec as $srow) : ?>
                                            <?php if (empty($emp['emp_spec1'])) : ?>
                                                <option value="<?= $srow['spec_id'] ?>" <?= set_select('emp_spec1', $srow['spec_id'], (!empty($fieldType) && $fieldType == $srow['spec_id'] ? TRUE : FALSE)); ?>><?= $srow['spec_name'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $srow['spec_id'] ?>" <?php if ($emp['emp_spec1'] == $srow['spec_id']) { ?> echo selected="selected" <?php } ?>><?= $srow['spec_name'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="emp_grade1" class="control-label mb-1">Grade 1</label>
                                    <select id="emp_grade1" name="emp_grade1" class="form-control select2" required="" data-parsley-trigger="change">
                                        <option value="">Select Grade</option>
                                        <?php foreach ($grade as $grow) : ?>
                                            <?php if (empty($emp['emp_grade1'])) : ?>
                                                <option value="<?= $grow['grade_id'] ?>" <?= set_select('emp_grade1', $grow['grade_id'], (!empty($fieldType) && $fieldType == $grow['grade_id'] ? TRUE : FALSE)); ?>><?= $grow['grade_name'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $grow['grade_id'] ?>" <?php if ($emp['emp_grade1'] == $grow['grade_id']) { ?> echo selected="selected" <?php } ?>><?= $grow['grade_name'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="emp_spec2" class="control-label mb-1">Speciality 2</label>
                                    <select id="emp_spec2" name="emp_spec2" class="form-control select2" data-parsley-trigger="change">
                                        <option value="">Select Speciality</option>
                                        <?php foreach ($spec as $srow) : ?>
                                            <?php if (empty($emp['emp_spec2'])) : ?>
                                                <option value="<?= $srow['spec_id'] ?>" <?= set_select('emp_spec2', $srow['spec_id'], (!empty($fieldType) && $fieldType == $srow['spec_id'] ? TRUE : FALSE)); ?>><?= $srow['spec_name'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $srow['spec_id'] ?>" <?php if ($emp['emp_spec2'] == $srow['spec_id']) { ?> echo selected="selected" <?php } ?>><?= $srow['spec_name'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emp_grade2" class="control-label mb-1">Grade 2</label>
                                    <select id="emp_grade2" name="emp_grade2" class="form-control select2" data-parsley-trigger="change">
                                        <option value="">Select Grade</option>
                                        <?php foreach ($grade as $grow) : ?>
                                            <?php if (empty($emp['emp_grade2'])) : ?>
                                                <option value="<?= $grow['grade_id'] ?>" <?= set_select('emp_grade2', $grow['grade_id'], (!empty($fieldType) && $fieldType == $grow['grade_id'] ? TRUE : FALSE)); ?>><?= $grow['grade_name'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $grow['grade_id'] ?>" <?php if ($emp['emp_grade2'] == $grow['grade_id']) { ?> echo selected="selected" <?php } ?>><?= $grow['grade_name'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="emp_spec3" class="control-label mb-1">Speciality 3</label>
                                    <select id="emp_spec3" name="emp_spec3" class="form-control select2" data-parsley-trigger="change">
                                        <option value="">Select Speciality</option>
                                        <?php foreach ($spec as $srow) : ?>
                                            <?php if (empty($emp['emp_spec3'])) : ?>
                                                <option value="<?= $srow['spec_id'] ?>" <?= set_select('emp_spec3', $srow['spec_id'], (!empty($fieldType) && $fieldType == $srow['spec_id'] ? TRUE : FALSE)); ?>><?= $srow['spec_name'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $srow['spec_id'] ?>" <?php if ($emp['emp_spec3'] == $srow['spec_id']) { ?> echo selected="selected" <?php } ?>><?= $srow['spec_name'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emp_grade3" class="control-label mb-1">Grade 3</label>
                                    <select id="emp_grade3" name="emp_grade3" class="form-control select2" data-parsley-trigger="change">
                                        <option value="">Select Grade</option>
                                        <?php foreach ($grade as $grow) : ?>
                                            <?php if (empty($emp['emp_grade3'])) : ?>
                                                <option value="<?= $grow['grade_id'] ?>" <?= set_select('emp_grade3', $grow['grade_id'], (!empty($fieldType) && $fieldType == $grow['grade_id'] ? TRUE : FALSE)); ?>><?= $grow['grade_name'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $grow['grade_id'] ?>" <?php if ($emp['emp_grade3'] == $grow['grade_id']) { ?> echo selected="selected" <?php } ?>><?= $grow['grade_name'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="emp_pps_no" class="control-label mb-1">PPS No.</label>
                                    <?php if (empty($emp['emp_pps_no'])) : ?>
                                        <input id="emp_pps_no" name="emp_pps_no" type="text" class="form-control" required="">
                                    <?php else : ?>
                                        <input id="emp_pps_no" name="emp_pps_no" type="text" class="form-control" value="<?= $emp['emp_pps_no'] ?>" required="">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emp_phone" class="control-label mb-1">Phone No.</label>
                                    <?php if (empty($emp['emp_phone'])) : ?>
                                        <input id="emp_phone" name="emp_phone" type="number" class="form-control" required="">
                                    <?php else : ?>
                                        <input id="emp_phone" name="emp_phone" type="number" class="form-control" value="<?= $emp['emp_phone'] ?>" required="">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="emp_imcr_no" class="control-label mb-1">IMC No.</label>
                                <?php if (empty($emp['emp_imcr_no'])) : ?>
                                    <input id="emp_imcr_no" name="emp_imcr_no" type="text" class="form-control" required="">
                                <?php else : ?>
                                    <input id="emp_imcr_no" name="emp_imcr_no" type="text" class="form-control" value="<?= $emp['emp_imcr_no'] ?>" required="">
                                <?php endif; ?>
                            </div>

                            <div class="row mb-3">
                                <label for="formFile" class="form-label">CV</label>
                                <input class="form-control" type="file" name="emp_cv" id="formFile" data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" />
                            </div>
                            <div class="row mb-3">
                                <?php if (!empty($emp['emp_cv'])) : ?>
                                    <a href="<?= base_url('public/uploads/employee_attach/' . $emp['emp_cv']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_cvv" value="<?= $emp['emp_cv'] ?>">
                                <?php endif; ?>
                            </div>

                            <div class="row mb-3">
                                <label for="formFile" class="form-label">IMC Certificate</label>
                                <input class="form-control" type="file" name="emp_imc_cert" id="formFile" data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" />
                            </div>
                            <div class="row mb-3">
                                <?php if (!empty($emp['emp_imc_cert'])) : ?>
                                    <a href="<?= base_url('public/uploads/employee_attach/' . $emp['emp_imc_cert']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_imc_certt" value="<?= $emp['emp_imc_cert'] ?>">
                                <?php endif; ?>
                            </div>
                            <div class="row mb-3" id="gpIndemnity" style="<?php if (empty($emp['emp_gpIndemnity'])) {
                                                                                echo "display: none;";
                                                                            } else {
                                                                            } ?>">
                                <label for="formFile" class="form-label">GP Indemnity</label>
                                <input type="file" name="emp_gpIndemnity" class="form-control" id="file_gpint" data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx"><br>
                            </div>
                            <div class="row mb-3">
                                <?php if (!empty($emp['emp_gpIndemnity'])) : ?>
                                    <a href="<?= base_url('public/uploads/employee_attach/' . $emp['emp_gpIndemnity']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_gpIndemnityy" value="<?= $emp['emp_gpIndemnity'] ?>">
                                <?php endif; ?>
                            </div>

                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Recent Reference</label>
                                <input class="form-control" type="file" name="emp_rec_refer" id="formFile" data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" />
                            </div>
                            <div class="row mb-3">
                                <?php if (!empty($emp['emp_rec_refer'])) : ?>
                                    <a href="<?= base_url('public/uploads/employee_attach/' . $emp['emp_rec_refer']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_rec_referr" value="<?= $emp['emp_rec_refer'] ?>">
                                <?php endif; ?>
                            </div>

                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Passport</label>
                                <input class="form-control" type="file" name="emp_passport" id="formFile" data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" />
                            </div>

                            <div class="row mb-3">
                                <?php if (!empty($emp['emp_passport'])) : ?>
                                    <a href="<?= base_url('public/uploads/employee_attach/' . $emp['emp_passport']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_passportt" value="<?= $emp['emp_passport'] ?>">
                                <?php endif; ?>
                            </div>


                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Occupational Health</label>
                                <input class="form-control" type="file" name="emp_occup_health" id="formFile" data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" />
                            </div>
                            <div class="row mb-3">
                                <?php if (!empty($emp['emp_occup_health'])) : ?>
                                    <a href="<?= base_url('public/uploads/employee_attach/' . $emp['emp_occup_health']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_occup_healthh" value="<?= $emp['emp_occup_health'] ?>">
                                <?php endif; ?>
                            </div>


                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Work Permit</label>
                                <input class="form-control" type="file" name="emp_work_permit" id="formFile" data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" />
                            </div>
                            <div class="row mb-3">
                                <?php if (!empty($emp['emp_work_permit'])) : ?>
                                    <a class="mb-3" href="<?= base_url('public/uploads/employee_attach/' . $emp['emp_work_permit']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_work_permitt" value="<?= $emp['emp_work_permit'] ?>">
                                <?php endif; ?>
                            </div>
                            <div class="row mb-3">
                                <p><span class="text-danger h6">Note: </span>"If you want to change any file just uncheck the file and check again to update your file"</p>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-3">
                                    <label class="form-label">

                                        <input type="checkbox" class="form-check-input" <?php if (!empty($emp['emp_acls'])) {
                                                                                            echo "checked";
                                                                                        } ?> name="acls" value="ACLS"> ACLS
                                    </label><br>

                                    <div id="acls-upload" style="display: none;">
                                        <input type="file" id="file_acls" name="emp_acls" data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx"><br>
                                    </div>
                                    <?php if (!empty($emp['emp_acls'])) : ?>
                                        <a class="mb-3" href="<?= base_url('public/uploads/employee_attach/' . $emp['emp_acls']) ?>" target="_blank">View Document</a>
                                        <input type="hidden" name="emp_aclss" value="<?= $emp['emp_acls'] ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-3">

                                    <label class="form-label">
                                        <input type="checkbox" class="form-check-input" <?php if (!empty($emp['emp_bcls'])) {
                                                                                            echo "checked";
                                                                                        } ?> name="bcls" value="BCLS"> BCLS
                                    </label><br>

                                    <div id="bcls-upload" style="display: none;">
                                        <input type="file" name="emp_bcls" id="file_bcls" data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx"><br>
                                    </div>
                                    <?php if (!empty($emp['emp_bcls'])) : ?>
                                        <a class="mb-3" href="<?= base_url('public/uploads/employee_attach/' . $emp['emp_bcls']) ?>" target="_blank">View Document</a>
                                        <input type="hidden" name="emp_bclss" value="<?= $emp['emp_bcls'] ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label">
                                        <input type="checkbox" class="form-check-input" <?php if (!empty($emp['emp_bls'])) {
                                                                                            echo "checked";
                                                                                        } ?> name="bls" value="BLS"> BLS
                                    </label><br>

                                    <div id="bls-upload" style="display: none;">
                                        <input type="file" name="emp_bls" id="file_bls" data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx"><br>
                                    </div>
                                    <?php if (!empty($emp['emp_bls'])) : ?>
                                        <a class="mb-3" href="<?= base_url('public/uploads/employee_attach/' . $emp['emp_bls']) ?>" target="_blank">View Document</a>
                                        <input type="hidden" name="emp_blss" value="<?= $emp['emp_bls'] ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-label">
                                        <input type="checkbox" class="form-check-input" <?php if (!empty($emp['emp_atls'])) {
                                                                                            echo "checked";
                                                                                        } ?> name="atls" value="ATLS"> ATLS
                                    </label><br>

                                    <div id="atls-upload" style="display: none;">
                                        <input type="file" name="emp_atls" id="file_atls" data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx"><br>
                                    </div>
                                    <?php if (!empty($emp['emp_atls'])) : ?>
                                        <a class="mb-3" href="<?= base_url('public/uploads/employee_attach/' . $emp['emp_atls']) ?>" target="_blank">View Document</a>
                                        <input type="hidden" name="emp_atlss" value="<?= $emp['emp_atls'] ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Other Document</label>
                                <input class="form-control" type="file" name="emp_otherDocs" id="formFile" data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" />
                            </div>
                            <div class="row mb-3">
                                <?php if (!empty($emp['emp_otherDocs'])) : ?>
                                    <a class="mb-3" href="<?= base_url('public/uploads/employee_attach/' . $emp['emp_otherDocs']) ?>" target="_blank">View Document</a>
                                    <input type="hidden" name="emp_otherDocss" value="<?= $emp['emp_otherDocs'] ?>">
                                <?php endif; ?>
                            </div>

                            <div style="float: right;">
                                <a id="payment-button" href="<?= base_url('employee/dashboard') ?>" class="btn btn-lg btn-dark btn-block">

                                    <span id="payment-button-amount">Cancel</span>
                                </a>
                                &nbsp; &nbsp;
                                <button id="payment-button" type="submit" class="btn btn-lg btn-primary btn-block">
                                    <span id="payment-button-amount">Save Record</span>
                                </button>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
