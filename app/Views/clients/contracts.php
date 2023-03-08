
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a><?= session()->get('cl_h_name'); ?> Orders List</h2>
                    
                    <ul class="breadcrumb mb-0">
                        

                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title"></h6>
                        <p class="mb-0">To edit your order click on the action button</p>
<p class="mb-0">To cancel your order, click on the action button
</p>
                        <ul class="header-dropdown">
                            <li>
                                <a type="button" href="<?= base_url('client/new-order') ?>" class="btn btn-sm btn-outline-primary">Add  New Order/Locum</a>
                            </li>
                        </ul>
                    </div>
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
                    <div class="card-body">
                   
                        <table id="employee_List" class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Speciality & Grade</th>
                                    <th>Employee</th>
                                    <th>Locum Confirmation</th>
                                    <th>Order date/time</th>
                                    <th>Timesheet</th>
                                    <th>Payment Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i=1;
                                foreach ($t_order as $row) : ?>
                                    <tr>
                                        <td>
                                            <?= $i++ ?>
                                        </td>
                                        

                                        <td>
                                            <h6 class="mb-0"><?= $row['spec_name'] .' - '. $row['grade_name'] ?></h6>
                                        </td>
                                        
                                        <td>
                                            <h6 class="mb-0"><?= $row['emp_fname'].' '. $row['emp_lname'] ?></h6>
                                        </td>
                                        <td>
                                        <?php if($row['ord_cancel_bcl'] <> 1): ?>
                                            <?php if($row['ord_status'] > 1 && $row['ord_status'] < 3): ?>
                                            <h6 class="mb-0"><a href="<?= base_url('client/ord-confirm/'.encryptIt($row['ord_id'])) ?>" class="btn btn-primary">Confirm</a></h6>
                                            <?php elseif($row['ord_status'] > 2 ): ?>
                                                <span class="badge bg-success">Confirmed</span>
                                                <?php endif; ?>
                                                <?php endif; ?>
                                        </td>
                                        <td><?= date("d-m-y  h:i:s a", strtotime($row['ord_created'])) ?></td>
                                        
                                        <td>
                                        <?php if(!empty($row['order_id'])): ?>
                                            <a type="button" href="<?= base_url('client/timesheet/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-info" title="TimeSheet"><i class="fa fa-eye"></i> View</a>
                                            <?php else: ?>
                                                <span class="badge bg-danger">No Submitted</span>
                                                <?php endif; ?>
                                        </td>
                                        <td>
                                        <?php if(!empty($row['ord_paymnt_rcvd_date']) && $row['ord_paymnt_rcvd_date'] > "0000-00-00" ): ?>
                                                <?= $row['ord_paymnt_rcvd_date'] ?>
                                            <?php else: ?>
                                                <span class="badge bg-warning text-dark">Due</span>
                                                <?php endif; ?>
                                        </td>
                                        <td>
                                        <?php if($row['ord_cancel_bdr'] == 1): ?>
                                                <span class="badge bg-danger">Dr. Cancelled</span>
                                                <?php else: ?>
                                            <?php if($row['ord_cancel_bcl'] == "1"): ?>
                                                <span class="badge bg-danger">You Cancelled</span>
                                                <?php else: ?>
                                            <?php if ($row['ord_status'] == "1") : ?>
                                                <span class="badge chart-color123">Pending</span>
                                            <?php elseif ($row['ord_status'] == "2") : ?>
                                                <span class="badge chart-color122">Processed</span>
                                            <?php elseif ($row['ord_status'] == "3") : ?>
                                                <span class="badge bg-success">Confirmed</span>
                                            <?php else : ?>
                                                <span class="badge chart-color120">Ended</span>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <td>
                                            <?php if($row['ord_status'] == 1): ?>
                                            <a type="button" href="<?= base_url('client/edit-order/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-success" title="Edit your order"><i class="fa fa-edit"></i></a>
                                            <?php endif; ?>
                                            <a type="button" href="<?= base_url('client/ord-status/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-info" title="View your order"><i class="fa fa-eye"></i></a>

                                            <?php if($row['ord_cancel_bcl'] <> 1): ?>
                                                <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" onClick="setOrderId(<?= $row['ord_id'] ?>);" data-bs-toggle="modal" data-bs-target="#canc_order" title="Cancel and delta"  data-type="confirm"><i class="fa fa-ban"></i></button>
                                            <!-- <a type="button" href="<?php // base_url('client/canc-ord/'.encryptIt($row['ord_id']))?>" class="btn btn-sm btn-outline-danger js-sweetalert" title="Cancel" Onclick="return confirm('Are You sure?');" data-type="confirm"><i class="fa fa-ban"></i></a> -->
                                                <?php endif; ?>
                                                
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Cancel Modal -->
<div class="modal fade" id="canc_order" tabindex="-1" aria-labelledby="canc_order" aria-hidden="true">
<div class="modal-dialog">
<form data-parsley-validate="" id="cancelOrderForms" method="post" action="">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="defaultModalLabel">Cancel Order</h5>
</div>
<div class="modal-body">

<div class="row g-2">
<div class="col-md-12">
<label for="ord_speciality" class="control-label mb-1">Reason</label>
<select  class="form-control" placeholder="Type Your Reason here" required="" name="ord_cl_cremarks">
<option value="">Select Reason</option>
<option value="Internally arranged">Internally arranged</option>
<option value="Double booking">Double booking</option>
<option value="Not required">Not required</option>
<option value="Arranged via another locum agency">Arranged via another locum agency</option>
<option value="Other">Other</option>
</select>
<input type="hidden"  id="orderId">
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Submit</button>
<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<script>
    function setOrderId(orderId) {
  document.getElementById("orderId").value = orderId;
//   var encryptedOrderId = "<?php // encryptIt("orderId") ?>";
  document.getElementById("cancelOrderForms").setAttribute("action", "<?= base_url('client/canc-ord/') ?>/" + document.getElementById("orderId").value);
}


</script>
