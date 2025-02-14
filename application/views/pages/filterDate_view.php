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
        <!-- Core theme CSS -->
        <link href="./../assets/css/updatedcss.css" rel="stylesheet" />
        <title>Disable Dates</title>
</head>
<body>
    <!-- Navbar -->
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
            <!-- form to enter disabled dates -->
    <h1 align="center">Disable Dates </h1>
    <br>
    <form>
        
        <table align="center" width= "400px" >
        <tr height="60px">
            <td>
    <input type="text" id="datepicker" name="disabled" placeholder="Select a date">
            </td>
            <td>
            
    <button type="submit" name="submit">Submit </button>
            </td>
</form>
</tr>
</table>
<br>
    <script>
        flatpickr("#datepicker", {
            enableTime: false,
            minuteIncrement: 1,
            minDate: new Date()
        })
    </script>
     
     
     <table border class="table table-striped">
        <thead>
            <tr>
                <th>Already Disabled dates</th>
               
            </tr>
        </thead>
        <tbody>
           
            <?php foreach ($dates as $date) { // Showing the disabled dates?>
                <tr>
                    <td><?php echo $date->disabled ?></td>
                  
                </tr>
            <?php } ?>
        </tbody>
    </table>
     <!-- Footer-->
     <footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0">Copyright &copy;ASAB System 2024</div></div>
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
    // Send a post request 'index.php/Date/addDate' with the data filled in the form
    $('form').submit(function(e) {
      // Normally when we submit a form by default it will refresh the page -> prevent the default page refersh
      e.preventDefault();

      // Get the data from the form
      var formData = $('form').serialize();
      // seralize -> convert the form data to a string [formdata type]
    

      // send a post request to the url 'index.php/Date/adddate' with the data from the form
      // client level -> we use ajaxa to communicate with the server -> php controller (Date.php)
      $.ajax({
          url: 'http://localhost/Awissawella/index.php/Date/addDate',
          type: 'post',
          data: formData
        })
        .done(function(response) {
          // If this request is successfull -> show the response

          console.log(response);

          // If the response.status == false, show a alert saying the date is already disabled
          if (response.status == false) {
            alert('Sorry !! Date already made unavailable :(')
          } else {
            alert('Date succesfully made unavailable :)')
          }
        })
        .fail(function(response) {
          // If this request is failed -> show the error

          console.error('error');
          console.error(response);

          alert('Sorry there is some problem with the booking, Please Try again later :(')
        });





    });
    </script>

</body>
</html> 