</div>
</div>

<!-- <script src="<?php // base_url('public/assets/js/pages/index.js')?>"></script> -->
<!-- <script data-cfasync="false" src="../../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
<!-- <script src="<?php // base_url('public/assets/bundles/libscripts.bundle.js')?>"></script> -->
<script src="<?= base_url('public/assets/bundles/dataTables.bundle.js')?>"></script>
<script src="<?= base_url('public/assets/js/my.js')?>"></script>
<?php if (session()->get('EmpLoggedIn')) : ?>
<script src="<?=  base_url('public/assets/bundles/mainscripts.bundle.js')?>"></script>
<script>
  const link1 = '<?php echo base_url('employee/show-notif'); ?>';
  const IconPic = '<?php echo base_url('public/images/sralogo-icon.png'); ?>';
  const link2 = '<?php echo base_url('employee/notif-get'); ?>';
  const link3 = '<?php echo base_url('employee/notif-count'); ?>';
  const link4 = '<?php echo base_url('employee/notif-seen'); ?>'; 
  const link6 = '<?php echo base_url('employee/getServer-DateTime'); ?>';

</script>
<script src="<?= base_url('public/assets/js/EmpStats.js') ?>"></script>
 <?php endif;?>
  
</body>

</html>