<!DOCTYPE html>
<html lang="en">

<head>
        <!-- Include the Flatpickr CSS and Bootstrap -->
         <link href="./../assets/css/bootstrap.min.css"  rel="stylesheet"/>
         <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
         <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
         <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="./../assets/images/medical.ico" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./../assets/css/updatedcss.css" rel="stylesheet" />
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking View</title>
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
            <br>
            <br>
            
<div>
            <h1 align="center">View Appointments</h1>
            <br>
        <!-- Select elements to filter appointments  -->
          <br>
          <br>
    <select class="form-control" aria-label="Default select example" id="scanTypeFilter" >
        <option value="all">Select Scan Type</option>
        <option value="CT Scan">CT Scan</option>
        <option value="MRI">MRI</option>
        <option value="PET Scan">PET Scan</option>
    </select>
    <br>
    
    <select class="form-control" aria-label="Default select example" id="doctorNameFilter">
        <option value="all">Select Doctor</option>
        <option value="Lily">Lily</option>
        <option value="Peter">Peter</option>
        <option value="Kate">Kate</option>
    </select>
    </div>
    <br>
    
    <input type="text" class="form-control" id="dateFilter"  placeholder="Select a Date">
    <br>
    
</div>

<!-- Table to show filtered appointments -->
    <table  id="bookings"border class="table table-striped">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Scan Type</th>
                <th>Booking Day</th>
                <th>Booking Time</th>
            </tr>
        </thead>
        <tbody>
            <!-- Using php iterate through the bookings and print all the records -->
            <?php foreach ($bookings as $booking) { ?>
                <tr>
                    <td><?php echo $booking->bookingId ?></td>
                    <td><?php echo $booking->patientName ?></td>
                    <td><?php echo $booking->doctorName ?></td>
                    <td><?php echo $booking->scanType ?></td>
                    <td><?php echo $booking->bookingDay ?></td>
                    <td><?php echo $booking->bookingTime ?></td>
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
        $(document).ready(function() {
            $('#scanTypeFilter').on('change', function() {
                var scanTypeSelected = $(this).val();

                // else send ajax request to server to get the updated bookings
                console.log(scanTypeSelected);
                // http://localhost/Awissawella/index.php/booking/filteredBookings?scanType=CT%20Scan

                $.ajax({
                    url: 'http://localhost/Awissawella/index.php/booking/filteredBookings',
                    type: 'GET',
                    data: {
                        scanType: scanTypeSelected
                        
                    },
                    dataType: 'json'
                }).done(function(response) {
                    console.log("Success");
                    console.log(response);

                    // clear the table body
                    $('tbody').empty();



                    

                    // Populate the table body with the filtered bookings
                    console.log(response.bookings);
                    for (var i = 0; i < response.bookings.length; i++) {
                        // response.bookings.foreach(function(booking){
                        var booking = response.bookings[i];
                        var row = `<tr>
                            <td>${booking.bookingId}</td>
                            <td>${booking.patientName}</td>
                            <td>${booking.doctorName}</td>
                            <td>${booking.scanType}</td>
                            <td>${booking.bookingDay}</td>
                            <td>${booking.bookingTime}</td>
                            
                            </tr>`;
                        $('tbody').append(row);
                    };
                });

            })
        });
        $(document).ready(function() {
            $('#doctorNameFilter').on('change', function() {
                var doctorNameSelected = $(this).val();

                // else send ajax request to server to get the updated bookings
                console.log(doctorNameSelected);
                // http://localhost/Awissawella/index.php/booking/filteredBookings1

                $.ajax({
                    url: 'http://localhost/Awissawella/index.php/booking/filteredBookings1',
                    type: 'GET',
                    data: {
                        doctorName: doctorNameSelected
                        
                    },
                    dataType: 'json'
                }).done(function(response) {
                    console.log("Success");
                    console.log(response);

                    // clear the table body
                    $('tbody').empty();



                    

                    // Populate the table body with the filtered bookings
                    console.log(response.bookings);
                    for (var i = 0; i < response.bookings.length; i++) {
                        // response.bookings.foreach(function(booking){
                        var booking = response.bookings[i];
                        var row = `<tr>
                            <td>${booking.bookingId}</td>
                            <td>${booking.patientName}</td>
                            <td>${booking.doctorName}</td>
                            <td>${booking.scanType}</td>
                            <td>${booking.bookingDay}</td>
                            <td>${booking.bookingTime}</td>
                            </tr>`;
                        $('tbody').append(row);
                    };
                });

            })
        });
        $(document).ready(function() {
            $('#dateFilter').on('change', function() {
                var dateSelected = $(this).val();

                // else send ajax request to server to get the updated bookings
                console.log(dateSelected);
                // http://localhost/Awissawella/index.php/booking/filteredBookings2

                $.ajax({
                    url: 'http://localhost/Awissawella/index.php/booking/filteredBookings2',
                    type: 'GET',
                    data: {
                        bookingDay: dateSelected
                        
                    },
                    dataType: 'json'
                }).done(function(response) {
                    console.log("Success");
                    console.log(response);

                    // clear the table body
                    $('tbody').empty();



                    

                    // Populate the table body with the filtered bookings
                    console.log(response.bookings);
                    for (var i = 0; i < response.bookings.length; i++) {
                        // response.bookings.foreach(function(booking){
                        var booking = response.bookings[i];
                        var row = `<tr>
                            <td>${booking.bookingId}</td>
                            <td>${booking.patientName}</td>
                            <td>${booking.doctorName}</td>
                            <td>${booking.scanType}</td>
                            <td>${booking.bookingDay}</td>
                            <td>${booking.bookingTime}</td>
                            </tr>`;
                        $('tbody').append(row);
                    };
                });

            })
        });

        //flatpickr elements
        flatpickr("#dateFilter", {
         dateFormat: "Y-m-d" });

    </script>

</body>

</html>