
        
        <section class="profile">
            <div class="container">
                
                <div class="row">
<!--                    <div class="col-md-3 col-lg-3 img-div">
                        <img src="<?=site_url('assets/img/img-profile.jpg')?>" class="img-profile" alt="">
                    </div>-->
                    <div class="col-md-4 col-lg-3"> 
                        <?php $this->load->view('Dnav')?>
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <h2 class="">Profile<br>
                            <small class="text-grey"><small>Update your info </small></small>
                        </h2>
                        <br>
                        <div class="row">
                        <form  method="post" action="<?=site_url('subscribers/update_profile')?>">
                            <div class="col-md-12">
                                <div class="success alert-success   text-center" > <?= $this->session->flashdata('msg') ?></div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Name</label>
                                         <input type="text" class="form-control" name="subsName" placeholder="e.g Ali" value="<?=  set_value('subsName',$profile->subsName)?>"> <span style="color:red"><?=  form_error('name')?></span>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Contact</label>
                                         <input type="text" class="form-control" name="subsContact" placeholder="e.g 03xxxxxxxxx" value="<?=  set_value('subsContact',$profile->subsContact)?>"> <span style="color:red"><?=  form_error('mobile')?></span>
                                    </div>
                                    <input type="hidden" class="form-control" name="subrId" value="<?=$profile->subrId?>">
                                </div>
                            </div>
                           
                        
                        <div class="col-md-12 mt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="subsEmail" placeholder="e.g abc@abc.com" value="<?=  set_value('subsEmail',$profile->subsEmail)?>"> <span style="color:red"><?=  form_error('email')?></span>
                                </div>
                                
                            </div>
                        </div>
                            
                        <div class="col-md-12 mt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Address</label>
                                    <input class="form-control" name="subsAddress"  value="<?=  set_value('subsAddress',$profile->subsAddress)?>"> <span style="color:red"><?=  form_error('address')?></span>
                                </div>
                                
                            </div>
                        </div>    
                            
                        <div class="col-md-12 mt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="subsPassword"  placeholder="(Unchanged)"> 
                                </div>
                                <div class="col-md-12">
                                    <label for="">Confirm Password</label>
                                    <input type="password" class="form-control" name="subsConfPassword" placeholder="Confirm Your Password" > 
                                </div>
                                
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="alert-primary text-center danger text-danger" > 
                                                <?= validation_errors(); ?>
                                </div>
                </div>
                            <div class="row">
                             <div class="col-md-12">
                                <br><br>
                                    <div class="col-md-1">
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-link btn-block">Cancel</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-success btn-block">Update</button>
                                    </div>
                                </div>
                            </div><br><br>
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        