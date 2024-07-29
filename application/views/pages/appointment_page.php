<!DOCTYPE html>
<html>

<head>
  <!-- Include the Flatpickr CSS and JS files -->
  <link rel="stylesheet" href="./../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./../assets/css/finalstyles.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>

<div class="w3-bar w3-black w3-hide-small">
            <a href="http://localhost/Awissawella/index.php/booking" class="w3-bar-item w3-button">Bookings</a>
            <a href="http://localhost/Awissawella/index.php/doctor" class="w3-bar-item w3-button">Add Doctor</a>
            <a href="http://localhost/Awissawella/index.php/login" class="w3-bar-item w3-button">Add Patient</a>
      
            <a href="#" class="w3-bar-item w3-button">Add Scan</a>
            <a href="http://localhost/Awissawella/index.php/Home#" class="w3-bar-item w3-button w3-right"><i class="fa fa-home"></i></a>
           
            <a href="#" class="w3-bar-item w3-button w3-right"><i class="fa fa-search"></i></a>
          </div>
<script>

var globalArray = [];
globalArray[0]="2024-08-08"


</script>
  <h1>Book an Appointment</h1>
  <form>
    <label for="bookingTime">Booking (date/time)</label>
    <!-- <input type="datetime-local" id="bookingTime" name="bookingTime"> -->
    <input type="text" id="bookingTime" name="bookingTime">


    <table width="400px">
      <tr height="50px">
        <td>
          <label>Patient Name</label>
        </td>
        <td>
          <input type="text" name="patientName" class="form-control" id="name">
        </td>
      </tr>
    </table>

    <h2>The select Element</h2>

    <label for="scanType">Choose Scan Type:</label>
    <select id="scanType" class="form-control" name="scanType">
      <option value="CT Scan">CT Scan</option>
      <option value="MRI">MRI</option>
      <option value="PET Scan">PET Scan</option>
    </select>
    <br>
    <br>
    <label for="doctorName">Select Doctor</label>
    <select id="doctorName" class="form-control"  name="doctorName">
      <option value="Peter">Peter</option>
      <option value="Kate">Kate</option>
      <option value="Lil">Lil</option>
    </select>
    <button type="submit" name="submit">Submit </button>
  </form>



  <div id="data-container">
    <!-- Data will be displayed here -->
  </div>



  <!-- Import Ajax -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Send a post request 'index.php/appointment/book' with the data filled in the form
    $('form').submit(function(e) {
      // Normally when we submit a form by default it will refresh the page -> prevent the default page refersh
      e.preventDefault();

      // Get the data from the form
      var formData = $('form').serialize();
      // seralize -> convert the form data to a string [formdata type]
      // example -> patientName=John&scanType=CT+Scan&doctorName=Peter

      // send a post request to the url 'index.php/appointmet/book' with the data from the form
      // client level -> we use ajaxa to communicate with the server -> php controller (appointment.php)
      $.ajax({
          url: 'http://localhost/Awissawella/index.php/appointment/book',
          type: 'post',
          data: formData
        })
        .done(function(response) {
          // If this request is successfull -> show the response

          console.log(response);

          // If the response.status == false, show a alert saying a there is a booking for the selected time slot
          if (response.status == false) {
            alert('Sorry !! There is a booking for the selected time slot :(')
          } else {
            alert('Booking is successfull !! See you on the selected time slot :)')
          }
        })
        .fail(function(response) {
          // If this request is failed -> show the error

          console.error('error');
          console.error(response);

          alert('Sorry there is some problem with the booking, Please Try again later :(')
        });





    });



    // Initialize Flatpickr with custom options
    flatpickr("#bookingTime", {
      enableTime: true,
      dateFormat: "Y-m-d H:i",
      time_24hr: true,
      minuteIncrement: 30,
      minDate: new Date(),
      disable: [
        {
            from: globalArray[0],
            to: "2024-08-15"
        },
      ]
    });
  </script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    console.log("test");
    $.ajax({
      url: 'http://localhost/Awissawella/index.php/date/showDates',
      type: 'GET',
      success: function(data) {
        console.log(data);
        var container = $('#data-container');
        var dataArray = [];
        if (Array.isArray(data)) {
            data.forEach(function(item) {
              var itemElement = $('<p></p>').text(JSON.stringify(item));
              container.append(itemElement);
            });
         
          } else {
            var itemElement = $('<p></p>').text(JSON.stringify(data));
            container.append(itemElement);
            dataArray.push(data);

         
          }
       
        if (dataArray.length > 0) {
            var firstElement = dataArray[0];
            var firstElementContent = $('<p></p>').text(JSON.stringify(firstElement));
            container.append('<h3>First Element:</h3>').append(firstElementContent);
          } else {
            container.append('<p>No data available.</p>');
          }
        },
      
     error: function(data){
      console.log("fail");
     }
      
    });
  });
</script>
 



</body>

</html>