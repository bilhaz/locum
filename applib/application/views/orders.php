
<section class="profile" style="min-height:70%">
    <div class="container">

        <div class="row"><br><br><br><br><br>
            <!--                    <div class="col-md-3 col-lg-3 img-div">
                                    <img src="<?= site_url('assets/img/img-profile.jpg') ?>" class="img-profile" alt="">
                                </div>-->
            <div class="col-md-4 col-lg-3"> 
                <?php $this->load->view('Dnav') ?>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="col-md-12">
                                <div class="alert-primary text-center" > <?= $this->session->flashdata('signup_msg') ?></div>
                            </div>
                <h2 class="">Orders <br>
                    <small class="text-grey"><small>Orders History</small></small>
                </h2>
                <br>
                <div class="row">
                    
                    <table class=" table-striped" style="width: 100%">
                        <tr><th align="center">S.No</th><th>Order Date</th><th>Order No</th><th>Product</th><th>Quantity</th><th>Per Price</th><th>Amount</th><th>Status</th></tr>
                        <?php $i=1;if(count($orders)){ foreach($orders as $row): ?>
                            
                        <tr><td align="center"><?=$i++?></td><td><?=date('d-m-Y',strtotime($row->date))?><td><?=$row->POrderNo?></td><td><?=$row->productTitle?></td><td><?=$row->quantity?></td><td>Rs. <?=$row->price?></td><td>Rs. <?=$row->price * $row->quantity;?></td><td><?php switch ($row->status){case 0: echo 'In Process';break;case 1: echo 'Shipped';break;case 2: echo 'Delivered';break;case 3: echo 'Not Devlivered';break;}?></td></tr>
                        
                        <?php endforeach;} else{ echo '<tr><td align="center" colspan="8">You did not order yet.</td></tr>'; } ?>
                    </table>
                    
            </div>
        </div>
    </div>
</div>
</section>
        