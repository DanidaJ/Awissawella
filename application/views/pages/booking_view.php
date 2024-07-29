<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="./../assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="./../assets/css/finalstyles.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css" integrity="sha512-6c4nX2tn5KbzeBJo9Ywpa0Gkt+mzCzJBrE1RB6fmpcsoN+b/w/euwIMuQKNyUoU/nToKN3a8SgNOtPrbW12fug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/fontawesome.min.css" integrity="sha512-pvr7xUq+1V77GWmZVvQbM5mozl2iouCzyJG3xxxJPoGQ3HlxHUmMHxlnw4vFUNX1gj80WH4XO7a2un+XQZNkJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking View</title>
</head>

<body>

<div class="w3-bar w3-black w3-hide-small">
            <a href="http://localhost/Awissawella/index.php/booking" class="w3-bar-item w3-button">Bookings</a>
            <a href="http://localhost/Awissawella/index.php/doctor" class="w3-bar-item w3-button">Add Doctor</a>
            <a href="http://localhost/Awissawella/index.php/login" class="w3-bar-item w3-button">Add Patient</a>
            <a href="#" class="w3-bar-item w3-button">Add Scan</a>
           
            <a href="http://localhost/Awissawella/index.php/home" class="w3-bar-item w3-button w3-right"><i class="fas fa-home"></i></a>
          </div>
    <select id="scanTypeFilter">
        <option value="all">Select Scan Type</option>
        <option value="CT Scan">CT Scan</option>
        <option value="MRI">MRI</option>
        <option value="PET Scan">PET Scan</option>
    </select>
    <br><br>
    <select id="doctorNameFilter">
        <option value="all">Select Doctor</option>
        <option value="Lil">Lil</option>
        <option value="Peter">Peter</option>
        <option value="Kate">Kate</option>
    </select>
    <br><br>
    <input type="time" id="timeFilter">
    <br><br>
    <input type="date" id="dateFilter">
    <br><br>

    <table border class="table table-striped">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Patient Name</th>
                <th>Doctor Name</th>
                <th>Scan Type</th>
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
                    <td><?php echo $booking->bookingTime ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    Import Ajax
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
                // http://localhost/Awissawella/index.php/booking/filteredBookings?scanType=CT%20Scan

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
                            <td>${booking.bookingTime}</td>
                            </tr>`;
                        $('tbody').append(row);
                    };
                });

            })
        });
    </script>

</body>

</html>