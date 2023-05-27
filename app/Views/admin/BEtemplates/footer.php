</div>
</div>

<!-- <script src="<?php // base_url('public/assets/js/pages/index.js')
                  ?>"></script> -->
<!-- <script data-cfasync="false" src="../../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
<!-- <script src="<?php // base_url('public/assets/bundles/libscripts.bundle.js')
                  ?>"></script> -->

<script src="<?= base_url('public/assets/bundles/dataTables.bundle.js') ?>"></script>
<script src="<?= base_url('public/assets/js/my.js') ?>"></script>

<script src="<?= base_url('public/assets/bundles/mainscripts.bundle.js') ?>"></script>
<script src="<?= base_url('public/assets/js/index2.js') ?>"></script>
<script>
  const link1 = '<?php echo base_url('backend/show-notif'); ?>';
  const IconPic = '<?php echo base_url('public/images/sralogo-icon.png'); ?>';
  const link2 = '<?php echo base_url('backend/notif-get'); ?>';
  const link3 = '<?php echo base_url('backend/notif-count'); ?>';
  const link4 = '<?php echo base_url('backend/notif-seen'); ?>';
  const link5 = '<?php echo base_url('backend/fetch-ChartData'); ?>';
</script>
<script src="<?= base_url('public/assets/js/graph.js') ?>"></script>
<script>
  var inputs = document.querySelectorAll(".eircode");
  inputs.forEach(function(input) {
    input.addEventListener("input", function() {
      this.value = this.value.toUpperCase();
    });
  });
</script>
<script>

</script>






</body>

</html>