</div>
</div>

<!-- <script src="<?php // base_url('public/assets/js/pages/index.js')?>"></script> -->
<!-- <script data-cfasync="false" src="../../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
<!-- <script src="<?php // base_url('public/assets/bundles/libscripts.bundle.js')?>"></script> -->
<script src="<?= base_url('public/assets/bundles/dataTables.bundle.js')?>"></script>
<script src="<?= base_url('public/assets/js/my.js')?>"></script>

<script src="<?=  base_url('public/assets/bundles/mainscripts.bundle.js')?>"></script>


<script>
    $(document).ready(function () {
        $('#employee_List')
        .dataTable({
            responsive: true,
            columnDefs: [
                {
                    orderable: true,
                    targets: [0]
                }
            ]
        });
    });
</script>



  
  
</body>

</html>