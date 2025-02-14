<!DOCTYPE html>
<html>
<head>
  <!-- Include the Flatpickr CSS and Bootstrap -->
  <link rel="stylesheet" href="./../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
 <!-- Favicon-->
 <link rel="icon" type="image/x-icon" href="./../assets/images/medical.ico" />
       
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./../assets/css/updatedcss.css" rel="stylesheet" />
        <title>Book Appointent</title>
</head>

<body>

<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container px-5">
                    <a class="navbar-brand" href="http://localhost/Awissawella/index.php/home"><span class="fw-bolder text-primary">ASAB System</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link" href="http://localhost/Awissawella/index.php/appointment">Book Appointment</a></li>
                            <li class="nav-item"><a class="nav-link" href="http://localhost/Awissawella/index.php/booking">Bookings</a></li>
                            <li class="nav-item"><a class="nav-link" href="http://localhost/Awissawella/index.php/login">Add Patient</a></li>
                            <li class="nav-item"><a class="nav-link" href="http://localhost/Awissawella/index.php/doctor">Add Doctor</a></li>
                            <li class="nav-item"><a class="nav-link" href="http://localhost/Awissawella/index.php/date">Disable Dates</a></li>
                        </ul>
                        </ul>
                    </div>
                </div>
            </nav>

  <h1 align="center">Book an Appointment</h1>

  
  <form>
<!-- form to book an appointment -->
  <table width="400px" align="center">
  <tr height="50px">
    <td>
    <label for="bookingDay">Booking Date</label>
    </td>

     <td>
    <input type="text" class="form-control" id="bookingDay" name="bookingDay">
     </td>
  </tr>
  <tr height="50px">
  <td>
    <label for="bookingTime">Booking Time</label>
  </td>
  <td>
  <input type="text" class="form-control" id="bookingTime" name="bookingTime">
  </td>
  </tr>

  <tr height="50px">
        <td>
          <label>Patient Name</label>
        </td>
        <td>
          <input type="text" name="patientName" class="form-control" id="name">
        </td>
      </tr>
    

   <center>
      <tr height="50px">
      <td><label>Select Scan Type</label></td>
        <td>
    <select id="scanType"  class="form-control" name="scanType" >
    <option value="none" selected disabled hidden> Select Scan Type</option>
      <option value="CT Scan">CT Scan</option>
      <option value="MRI">MRI</option>
      <option value="PET Scan">PET Scan</option>
    </select>

      </td>
      </tr>
    <br>
    <br>
    <tr height="50px">
      <td><label>Select Doctor Name</label></td>
      <td>
    <select id="doctorName" class="form-control"  name="doctorName">
    <option value="none" selected disabled hidden>Select Doctor</option>
      <option value="Peter">Peter</option>
      <option value="Kate">Kate</option>
      <option value="Lily">Lily</option>
    </select>
      </td>
    </tr>
   </center>
    <tr height="50px">

<td>
    <input type="reset" />
</td>
<td>
    <button type="submit" name="submit">Submit </button>
</tr>

   </table>
  </form>

 <!-- Footer-->
 <footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0">Copyright &copy; ASAB System 2024</div></div>
                    <div class="col-auto">
                        <a class="small" href="#!">Privacy</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" href="#!">Terms</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="./../assets/js/scripts.js"></script>

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
    var dataArray = [];

    $(document).ready(function() {
    console.log("test");
    
    // sending the ajax request to get the data (disabled dates- which the hospital will be closed)
    $.ajax({
      url: 'http://localhost/Awissawella/index.php/date/showDates',
      type: 'GET',
      success: function(data) {
        console.log(data);
        var container = $('#data-container');
        // var dataArray = [];
        // pushing the dates to the dataArray
        for (const date of data['dates']){
          dataArray.push(date['disabled'])
        }

        console.log(dataArray)
        flatpickr("#bookingDay", {
      dateFormat: "Y-m-d",
      minDate: new Date(),
      disable: dataArray //disabling the dates in the data array
    });
        
        },
      
     error: function(data){
      console.log("fail");
     }
      
    });
  });

    // Initialize Flatpickr for booking time

    flatpickr("#bookingTime", {
      enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    minuteIncrement: 30
    
    });
    
  </script>

</body>

</html>