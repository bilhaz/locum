$(document).ready(function() {
  var chartSpark1;
  var colors = ['var(--chart-color7)', 'var(--chart-color6)', 'var(--chart-color1)', 'var(--chart-color4)'];

  // Fetch the chart data when the page loads
  fetchChartData();

  $('#chart_filters').submit(function(event) {
    event.preventDefault(); // Prevent form submission

    var startDate = $('input[name="start_date"]').val();
    var endDate = $('input[name="end_date"]').val();

    // Perform AJAX request to fetch filtered chart data
    $.ajax({
      url: link5, // Update with your API endpoint
      type: 'POST',
      data: {
        start_date: startDate,
        end_date: endDate
      },
      dataType: 'json',
      success: function(response) {
        // Update the chart with the new data
        updateChart(response);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });

  // Function to fetch the chart data initially
  function fetchChartData() {
    $.ajax({
      url: link5, // Update with your API endpoint
      type: 'GET',
      dataType: 'json',
      success: function(response) {
        // Initialize or update the chart with the initial data
        if (chartSpark1 === undefined) {
          initializeChart(response);
        } else {
          updateChart(response);
        }
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }

  // Function to initialize the chart
  function initializeChart(data) {
    var months = data.map(row => {
      var date = new Date(row.month);
      return date.toLocaleString('default', { month: 'long' });
    });

    var optionsSpark1 = {
      series: [
        {
          name: 'Pending',
          data: data.map(row => row.ord_status_1_count)
        },
        {
          name: 'Proposed',
          data: data.map(row => row.ord_status_2_count)
        },
        {
          name: 'Confirmed',
          data: data.map(row => row.ord_status_3_count)
        },
        {
          name: 'Cancelled',
          data: data.map(row => row.ord_canc_bcl_count)
        }
      ],
      colors: colors,
      chart: {
        type: 'area',
        height: 300,
        sparkline: {
          enabled: false
        },
        toolbar: {
          show: false
        }
      },
      stroke: {
        show: true,
        curve: 'smooth',
        colors: colors,
        width: 2,
        dashArray: 0
      },
      dataLabels: {
        enabled: false
      },
      xaxis: {
        show: true,
        categories: months
      },
      yaxis: {
        show: false
      },
      legend: {
        position: 'top',
        horizontalAlign: 'center'
      }
    };

    chartSpark1 = new ApexCharts(document.querySelector('#work_report'), optionsSpark1);
    chartSpark1.render();
  }

  // Function to update the chart with new data
  function updateChart(data) {
    var months = data.map(row => {
      var date = new Date(row.month);
      return date.toLocaleString('default', { month: 'long' });
    });

    chartSpark1.updateOptions({
      xaxis: {
        categories: months
      }
    });

    chartSpark1.updateSeries([
      {
        name: 'Pending',
        data: data.map(row => row.ord_status_1_count)
      },
      {
        name: 'Proposed',
        data: data.map(row => row.ord_status_2_count)
      },
      {
        name: 'Confirmed',
        data: data.map(row => row.ord_status_3_count)
      },
      {
        name: 'Cancelled',
        data: data.map(row => row.ord_canc_bcl_count)
      }
    ]);

    chartSpark1.updateOptions({
      colors: colors
    });
  }
});
// end WORK REPORT Graph

// Locum Analysis
    var options = {
        series: [44, 35, 13],
        colors: ['var(--chart-color1)', 'var(--chart-color6)', 'var(--chart-color5)'],
        chart: {
            width: 200,
            type: "pie",
        },
        legend: {
            show: false,
        },
        dataLabels: {
            enabled: false,
        },
        labels: ["Hospital", "Nurse", "GP"],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 100,
                },
                legend: {
                    show: false,
                    position: "bottom",
                },
            },
        }, ],
    };
    var chart = new ApexCharts(document.querySelector("#income_analysis"), options);
    chart.render();
    
// show Browser Notification

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
    console.log("Title: " + title);
    console.log("Body: " + body);
    console.log("URL: " + url);
    console.log("Break");
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

            console.log("Title: " + title);
            console.log("Body: " + body);
            console.log("URL: " + url);

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