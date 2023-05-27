</div>
</div>

<!-- <script src="<?php // base_url('public/assets/js/pages/index.js')?>"></script> -->
<!-- <script data-cfasync="false" src="../../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
<!-- <script src="<?php // base_url('public/assets/bundles/libscripts.bundle.js')?>"></script> -->
<script src="<?= base_url('public/assets/bundles/dataTables.bundle.js')?>"></script>
<script src="<?= base_url('public/assets/js/my.js')?>"></script>
<script src="<?=  base_url('public/assets/bundles/mainscripts.bundle.js')?>"></script>
<script>
  const link1 = '<?php echo base_url('client/show-notif'); ?>';
  const IconPic = '<?php echo base_url('public/images/sralogo-icon.png'); ?>';
  const link2 = '<?php echo base_url('client/notif-get'); ?>';
  const link3 = '<?php echo base_url('client/notif-count'); ?>';
  const link4 = '<?php echo base_url('client/notif-seen'); ?>';
</script>
<script src="<?= base_url('public/assets/js/clientStats.js') ?>"></script>
<script>
  $(document).ready(function() {
    // Fetch notifications
    function fetchNotifications() {
        $.ajax({
            url: '<?php echo base_url('client/notif-get'); ?>',
            method: 'POST',
            success: function(response) {
              
                $('#notif').html(response);
            }
        });
    }
    

    // Fetch notifications every 30 seconds
    setInterval(fetchNotifications, 30000);
    // Call fetchNotifications() function on page load
    fetchNotifications();
});

</script>
<script>
$(document).ready(function() {
    // Fetch notifications
    function fetchNotificationscount() {
        $.ajax({
            url: '<?php echo base_url('client/notif-count'); ?>',
            method: 'POST',
            success: function(response) {
      $('#notif-count').html(response);
                
            }
        });
    }
    

    // Fetch notifications every 30 seconds
    setInterval(fetchNotificationscount, 30000);
    // Fetch notification count on page load
    fetchNotificationscount();
});

</script>

<script>
 function seenaa(id, url) {
    // var id = $(this).data('id');
    
    $.ajax({
        url: '<?php echo base_url('client/notif-seen'); ?>',
        type: 'post',
        data: {id: id},
        success: function(response) {
            window.location = url;
            console.log(response); // you can log the response for debugging
            // update the UI if needed
        },
        error: function() {
            console.log('error'); // handle error if any
        }
    });
 }
  </script>



<script>
  var inputs = document.querySelectorAll(".eircode");
  inputs.forEach(function(input) {
    input.addEventListener("input", function() {
      this.value = this.value.toUpperCase();
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