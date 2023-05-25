</div>
</div>

<!-- <script src="<?php // base_url('public/assets/js/pages/index.js')?>"></script> -->
<!-- <script data-cfasync="false" src="../../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
<!-- <script src="<?php // base_url('public/assets/bundles/libscripts.bundle.js')?>"></script> -->
<script src="<?= base_url('public/assets/bundles/dataTables.bundle.js')?>"></script>
<script src="<?= base_url('public/assets/js/my.js')?>"></script>

<script src="<?=  base_url('public/assets/bundles/mainscripts.bundle.js')?>"></script>
<script>
    $(document).ready(function() {
    // Fetch notifications
    function fetchNotifications() {
        $.ajax({
            url: '<?php echo base_url('employee/notif-get'); ?>',
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
            url: '<?php echo base_url('employee/notif-count'); ?>',
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
        url: '<?php echo base_url('employee/notif-seen'); ?>',
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
 
  
</body>

</html>