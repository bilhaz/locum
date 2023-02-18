<?php if(!empty($e_doc['emp_fname'] && $e_doc['emp_lname'] )) { ?>

<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Orders List</h2>
                    <ul class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a target="_blank" href="https://www.sralocum.com">SRA Locum</a></li>

                    </ul>
                </div>

            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title">All Orders</h6>
                        
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
                                    <th>ID</th>
                                    <th>Hospital Name</th>
                                    <th>Payemnt</th>
                                    <th>Work till</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 1;
                                foreach ($order as $row) : ?>
                                    <tr>
                                        <td>
                                            <?= $i++ ?>
                                        </td>


                                        <td>
                                            <h6 class="mb-0"><?= $row['cl_h_name'] ?></h6>
                                        </td>
                                        <td>
                                        <?php if ($row['ord_payment_status'] == "Pending") : ?>
                                                <span class="badge chart-color123">Pending</span>
                                                <?php else : ?>
                                                <span class="badge bg-success">Paid</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $row['ord_process_date'] ?></td>
                                        <td>
                                            <?php if($row['ord_cancel_bdr'] == 1): ?>
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
                                            <td>
                                            <a type="button" href="<?= base_url('employee/ord-view/' . encryptIt($row['ord_id'])) ?>" class="btn btn-sm btn-outline-info js-sweetalert" title="View" data-type="confirm"><i class="fa fa-eye"></i></a>
                                            <?php if($row['ord_cancel_bdr'] <> 1): ?>
                                            <!-- <a type="button" href="<?php // base_url('employee/canc-ord/'.encryptIt($row['ord_id']))?>" class="btn btn-sm btn-outline-danger js-sweetalert" title="Cancel" Onclick="return confirm('Are You sure?');" data-type="confirm"><i class="fa fa-ban"></i></a> -->
                                            <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" onClick="setOrderId(<?= $row['ord_id'] ?>);" data-bs-toggle="modal" data-bs-target="#canc_order" title="Cancel"  data-type="confirm"><i class="fa fa-ban"></i></button>
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
<input type="text"  class="form-control" placeholder="Type Your Reason here" required="" name="ord_dr_cremarks">
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
  document.getElementById("cancelOrderForms").setAttribute("action", "<?= base_url('employee/canc-ord/') ?>/" + document.getElementById("orderId").value);
}


</script>








<?php } else {
    header("Location: profile");
    $session = session();
    $session->setFlashdata('error', 'First Complete your Profile');
    exit();
  exit();
 } ?>