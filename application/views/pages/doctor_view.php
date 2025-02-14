<html>

<head>
    <!-- Bootsrap -->
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css" />
     <!-- Favicon-->
     <link rel="icon" type="image/x-icon" href="./../assets/images/medical.ico" />
     <title>Add Doctor</title>
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS-->
        <link href="./../assets/css/updatedcss.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css" integrity="sha512-6c4nX2tn5KbzeBJo9Ywpa0Gkt+mzCzJBrE1RB6fmpcsoN+b/w/euwIMuQKNyUoU/nToKN3a8SgNOtPrbW12fug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/fontawesome.min.css" integrity="sha512-pvr7xUq+1V77GWmZVvQbM5mozl2iouCzyJG3xxxJPoGQ3HlxHUmMHxlnw4vFUNX1gj80WH4XO7a2un+XQZNkJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <h1 align="center">DOCTOR</h1>
    <!-- Form to ass Doctor -->
    <form>
        <table align="center" width="400px">
            <tr height="50px">
                <td>
                    <label>Doctor Name</label>
                </td>
                <td>
                    <input type="text" name="doctor_name" class="form-control" id="name">
                </td>
            </tr>
            <tr height="50px">
                <td>
                    <label>Doctor Age</label>
                </td>

                <td>
                    <input type="text" name="doctor_age" class="form-control" id="text">
                </td>
            </tr><br><br>
            <tr height="50px">
                <td>
                    <label>Doctor NIC</label>
                </td>

                <td>
                    <input type="text" name="doctor_NIC" class="form-control" id="text">
                </td>
            </tr><br><br>

            <tr height="50px">
                <td>
                    <label>Doctor Email</label>
                </td>

                <td>
                    <input type="email" name="doctor_email" class="form-control" id="email">
                </td>
            </tr>

            <tr height="50px">
                <td>
                    <label>Contact Number</label>
                </td>

                <td>
                    <input type="text" name="doctor_phonenumber" class="form-control" id="contact">
                </td>
            </tr>

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
    // Send a post request 'index.php/doctor/addDoctor' with the data filled in the form
    $('form').submit(function(e) {
      // Normally when we submit a form by default it will refresh the page -> prevent the default page refersh
      e.preventDefault();

      // Get the data from the form
      var formData = $('form').serialize();
      // seralize -> convert the form data to a string [formdata type]
      

      // send a post request to the url 'index.php/doctor/addDoctor' with the data from the form
      // client level -> we use ajax to communicate with the server -> php controller (Doctor.php)
      $.ajax({
          url: 'http://localhost/Awissawella/index.php/Doctor/addDoctor',
          type: 'post',
          data: formData
        })
        .done(function(response) {
          // If this request is successfull -> show the response

          console.log(response);

          // If the response.status == false, show a alert saying the doctor is already available in the system
          if (response.status == false) {
            alert('Sorry !! Doctor already available :(')
          } else {
            alert('Doctor succesfully added :)')
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