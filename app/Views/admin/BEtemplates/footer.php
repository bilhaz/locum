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
// Function to show browser notifications
function showNotification(title, body, url) {
  // Check if browser supports notifications
  if ('Notification' in window) {
    // Request permission from the user
    Notification.requestPermission()
      .then(function(permission) {
        if (permission === 'granted') {
          // Create the notification
          var options = {
            body: body,
            icon: '<?php echo base_url('public/images/sralogo-icon.png'); ?>' // Replace with the path to your static icon
          };
          var notification = new Notification(title, options);

          // Open the URL when notification is clicked
          notification.onclick = function() {
            window.open(url);
          };
        }
      })
      .catch(function(error) {
        console.error('Error requesting permission:', error);
      });
  } else {
    console.error('Notifications not supported in this browser.');
  }
}

// Fetch notifications for browser notification
function browserNotifications() {
  $.ajax({
    url: '<?php echo base_url('backend/show-notif'); ?>',
    method: 'POST',
    success: function(response) {
      // Parse the JSON response
      var data = JSON.parse(response);
        console.log(data);
      // Check if there are new notifications and show browser notification
      if (data && data.length > 0) {
        var lastNotificationId = localStorage.getItem('lastNotificationId');
        var latestNotificationId = data[0].id; // Assuming the latest notification is the first in the array
        
        // Check if the latest notification is new
        if (latestNotificationId > lastNotificationId) {
          var notification = data[0];
          var title = 'New Notification';
          var body = notification.notification; // Replace with the actual property name in your response
          var extractedValue = notification.link.split('/').pop(); // Extract the value after the last '/'
          var url = extractedValue + '/' + notification.ord_id; // Use the extracted value as the URL

          console.log("Title: " + title);
          console.log("Body: " + body);
          console.log("URL: " + extractedValue);

          showNotification(title, body, url);

          // Update the last notification ID
          localStorage.setItem('lastNotificationId', latestNotificationId);
        }
      }
    },
    error: function(xhr, status, error) {
      console.error('AJAX error:', error);
    }
  });
}

// Request permission on page load
$(document).ready(function() {
  if ('Notification' in window) {
    Notification.requestPermission();
  }
});

// Fetch notifications every 30 seconds
setInterval(browserNotifications, 30000);

// Call fetchNotifications() function on page load
browserNotifications();
</script>
<script>
    $(document).ready(function() {
        // Fetch notifications
        function fetchNotifications() {
            $.ajax({
                url: '<?php  echo base_url('backend/notif-get'); ?>',
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
        // Fetch  count
        function fetchNotificationscount() {
            $.ajax({
                url: '<?php echo base_url('backend/notif-count'); ?>',
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
            url: '<?php echo base_url('backend/notif-seen'); ?>',
            type: 'post',
            data: {
                id: id
            },
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
<script>

</script>






</body>

</html>