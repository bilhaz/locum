function showNotification(title, body, url) {
    Push.create(title, {
      body: body,
      icon: IconPic,
      // timeout: 10000,
      onClick: function() {
        window.open(url);
        window.focus();
        this.close();
      }

    });
    // console.log("Title: " + title);
    // console.log("Body: " + body);
    // console.log("URL: " + url);
    // console.log("Break");
  }

  // Fetch notifications for browser notification
  function browserNotifications() {
    $.ajax({
      url: link1,
      method: 'POST',
      success: function(response) {
        // Parse the JSON response
        var data = JSON.parse(response);

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

            // console.log("Title: " + title);
            // console.log("Body: " + body);
            // console.log("URL: " + url);

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

  $(document).ready(function() {
    // Fetch notifications
    function fetchNotifications() {
      $.ajax({
        url: link2,
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

  $(document).ready(function() {
    // Fetch  count
    function fetchNotificationscount() {
      $.ajax({
        url: link3,
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

//   Notification Seesn Function
  function seenaa(id, url) {
    // var id = $(this).data('id');

    $.ajax({
      url: link4,
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