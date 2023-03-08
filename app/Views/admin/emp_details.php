<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);"
                            class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                        Employee Details</h2>
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
                            <h3 class="text-center title-2">Employee Details</h3>
                            <span class="text-danger">Document should be less than 2MB</span><br>
                            <span class="text-danger">File format should be (pdf, jpg, png, docs, docx)</span>
                        </div>
                        <hr>
                        <form action="<?= base_url('backend/emp_details/' . encryptIt($emp['emp_id'])) ?>" method="post"
                            autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8"
                            data-parsley-validate="" id="forma">
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="emp_fname" class="control-label mb-1">First name</label>
                                    <input id="emp_fname" name="emp_fname" type="text" class="form-control" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="emp_lname" class="control-label mb-1">Last Name</label>
                                    <input id="emp_lname" name="emp_lname" type="text" class="form-control" required="">
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="emp_email" class="control-label mb-1">Email</label>
                                <input id="emp_email" name="emp_email" type="email" class="form-control"
                                    value="<?= $emp['emp_email'] ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                    <label for="emp_gender" class="control-label mb-1">Gender</label>
                                    <select id="emp_gender" name="emp_gender" class="form-control select2"  data-parsley-trigger="change" required="">
                                        <option value="">Select Gender</option>
                                        <option value="M" <?= set_select('cl_gender','M', ( !empty($fieldType) && $fieldType == 'M' ? TRUE : FALSE )); ?> >Male</option>
                                        <option value="F" <?= set_select('cl_gender','F', ( !empty($fieldType) && $fieldType == 'F' ? TRUE : FALSE )); ?> >Female</option>
                                        <option value="O" <?= set_select('cl_gender','O', ( !empty($fieldType) && $fieldType == 'O' ? TRUE : FALSE )); ?> >Other</option>
                                       
                                    </select>                                 
                                 </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="emp_spec1" class="control-label mb-1">Speciality 1</label>
                                    <select id="emp_spec1" name="emp_spec1" class="form-control select2" required="" data-parsley-trigger="change">
                                        <option value="">Select Speciality</option>
                                        <?php foreach($spec as $srow):?>
                                        <option value="<?= $srow['spec_id']?>" <?= set_select('emp_spec1',$srow['spec_id'], ( !empty($fieldType) && $fieldType == $srow['spec_id'] ? TRUE : FALSE )); ?>><?= $srow['spec_name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="emp_grade1" class="control-label mb-1">Grade 1</label>
                                    <select id="emp_grade1" name="emp_grade1" class="form-control select2" required="" data-parsley-trigger="change">
                                        <option value="">Select Grade</option>
                                        <?php foreach($grade as $grow):?>
                                        <option value="<?= $grow['grade_id']?>" <?= set_select('emp_grade1',$grow['grade_id'], ( !empty($fieldType) && $fieldType == $grow['grade_id'] ? TRUE : FALSE )); ?>><?= $grow['grade_name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="emp_spec2" class="control-label mb-1">Speciality 2<small>&nbsp;(Optional)</small></label>
                                    <select id="emp_spec2" name="emp_spec2" class="form-control select2"  data-parsley-trigger="change">
                                        <option value="">Select Speciality</option>
                                        <?php foreach($spec as $srow):?>
                                        <option value="<?= $srow['spec_id']?>" <?= set_select('emp_spec2',$srow['spec_id'], ( !empty($fieldType) && $fieldType == $srow['spec_id'] ? TRUE : FALSE )); ?>><?= $srow['spec_name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emp_grade2" class="control-label mb-1">Grade 2<small>&nbsp;(Optional)</small></label>
                                    <select id="emp_grade2" name="emp_grade2" class="form-control select2"  data-parsley-trigger="change">
                                        <option value="">Select Grade</option>
                                        <?php foreach($grade as $grow):?>
                                        <option value="<?= $grow['grade_id']?>" <?= set_select('emp_grade2',$grow['grade_id'], ( !empty($fieldType) && $fieldType == $grow['grade_id'] ? TRUE : FALSE )); ?>><?= $grow['grade_name']?></option>
                                        <?php endforeach; ?>
                                    </select>                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="emp_spec3" class="control-label mb-1">Speciality 3<small>&nbsp;(Optional)</small></label>
                                    <select id="emp_spec3" name="emp_spec3" class="form-control select2"  data-parsley-trigger="change">
                                        <option value="">Select Speciality</option>
                                        <?php foreach($spec as $srow):?>
                                        <option value="<?= $srow['spec_id']?>" <?= set_select('emp_spec3',$srow['spec_id'], ( !empty($fieldType) && $fieldType == $srow['spec_id'] ? TRUE : FALSE )); ?>><?= $srow['spec_name']?></option>
                                        <?php endforeach; ?>
                                    </select>                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emp_grade3" class="control-label mb-1">Grade 3<small>&nbsp;(Optional)</small></label>
                                    <select id="emp_grade3" name="emp_grade3" class="form-control select2"  data-parsley-trigger="change">
                                        <option value="">Select Grade</option>
                                        <?php foreach($grade as $grow):?>
                                        <option value="<?= $grow['grade_id']?>" <?= set_select('emp_grade3',$grow['grade_id'], ( !empty($fieldType) && $fieldType == $grow['grade_id'] ? TRUE : FALSE )); ?>><?= $grow['grade_name']?></option>
                                        <?php endforeach; ?>
                                    </select>                                 </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6 ">
                                    <label for="emp_pps_no" class="control-label mb-1">PPS No.</label>
                                    <input id="emp_pps_no" name="emp_pps_no" type="text" class="form-control"
                                        required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emp_phone" class="control-label mb-1">Phone No.</label>
                                    <input id="emp_phone" name="emp_phone" type="number" class="form-control"
                                        required="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="emp_imcr_no" class="control-label mb-1">IMC No.</label>
                                <input id="emp_imcr_no" name="emp_imcr_no" type="number" class="form-control"
                                    required="">
                            </div>

                            <div class="row mb-3">
                                <label for="formFile" class="form-label">CV</label>
                                <input class="form-control" type="file" name="emp_cv" id="formFile"
                                    data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" required="" />
                            </div>


                            <div class="row mb-3">
                                <label for="formFile" class="form-label">IMC Certificate</label>
                                <input class="form-control" type="file" name="emp_imc_cert" id="formFile"
                                    data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" required="" />
                            </div>


                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Garda Vetting Certificate</label>
                                <input class="form-control" type="file" name="emp_gv_cert" id="formFile"
                                    data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" />
                            </div>

                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Recent Reference</label>
                                <input class="form-control" type="file" name="emp_rec_refer" id="formFile"
                                    data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx"  />
                            </div>

                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Passport</label>
                                <input class="form-control" type="file" name="emp_passport" id="formFile"
                                    data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" />
                            </div>

                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Occupational Health</label>
                                <input class="form-control" type="file" name="emp_occup_health" id="formFile"
                                    data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" />
                            </div>


                            <div class="row mb-3">
                                <label for="formFile" class="form-label">Work Permit</label>
                                <input class="form-control" type="file" name="emp_work_permit" id="formFile"
                                    data-parsley-max-file-size="2000" data-parsley-fileextension="jpg,JPEG,pdf,PDF,png,PNG,doc,docx" />
                            </div>

                            <div style="float:right"> 
                               
                                <a  id="payment-button" href="<?= base_url('backend/employees') ?>"
                                    class="btn btn-lg btn-dark text-light btn-block">
                                    <span id="payment-button-amount">Cancel</span>
                                </a>
                                            &nbsp;&nbsp;
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