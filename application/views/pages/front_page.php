<!DOCTYPE html>
<html>

<head>
  <!-- Include the Flatpickr CSS and JS files -->
  <link rel="stylesheet" href="./../assets/css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>

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
          <input type="text" name="patientName" id="name">
        </td>
      </tr>
    </table>

    <h2>The select Element</h2>

    <label for="scanType">Choose Scan Type:</label>
    <select id="scanType" name="scanType">
      <option value="CT Scan">CT Scan</option>
      <option value="MRI">MRI</option>
      <option value="PET Scan">PET Scan</option>
    </select>
    <br>
    <br>
    <label for="doctorName">Select Doctor</label>
    <select id="doctorName" name="doctorName">
      <option value="Peter">Peter</option>
      <option value="Kate">Kate</option>
      <option value="Lil">Lil</option>
    </select>
    <button type="submit" name="submit">Submit </button>
  </form>


  <!-- Import Ajax -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Send a post request 'index.php/front/book' with the data filled in the form
    $('form').submit(function(e) {
      // Normally when we submit a form by default it will refresh the page -> prevent the default page refersh
      e.preventDefault();

      // Get the data from the form
      var formData = $('form').serialize();
      // seralize -> convert the form data to a string [formdata tyype]
      // example -> patientName=John&scanType=CT+Scan&doctorName=Peter

      // send a post request to the url 'index.php/front/book' with the data from the form
      // client level -> we use ajaxa to communicate with the server -> php controller (front.php)
      $.ajax({
          url: 'http://localhost/Awissawella/index.php/front/book',
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
      minuteIncrement: 30
    });
  </script>

</body>

</html>