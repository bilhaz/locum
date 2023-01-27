
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


<script type="text/javascript">
    $(function() {
      $('#forma').parsley().on('field:validated', function() {
          var ok = $('.parsley-error').length === 0;
          $('.bs-callout-info').toggleClass('hidden', !ok);
          $('.bs-callout-warning').toggleClass('hidden', ok);
        })
        .on('form:submit', function() {
          return true; // Don't submit form for this demo
        });
    });
    window.Parsley.addValidator('maxFileSize', {
      validateString: function(_value, maxSize, parsleyInstance) {
        if (!window.FormData) {
          alert('You are making all developpers in the world cringe. Upgrade your browser!');
          return true;
        }
        var files = parsleyInstance.$element[0].files;
        return files.length != 1 || files[0].size <= maxSize * 1024;
      },
      requirementType: 'integer',
      messages: {
        en: 'This file should not be larger than %s Kb',
        fr: 'Ce fichier est plus grand que %s Kb.'
      }
    });
  </script> 
  
  
  
  
</body>

</html>