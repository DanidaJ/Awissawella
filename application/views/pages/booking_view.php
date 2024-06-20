<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="./../assets/css/style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <select id="scanTypeFilter">
        <option value="all">Select Scan Type</option>
        <option value="CT Scan">CT Scan</option>
        <option value="MRI">MRI</option>
        <option value="PET Scan">PET Scan</option>
    </select>
    <br><br>
    <input type="time" id="timeFilter">
    <br><br>
    <input type="date" id="dateFilter">
    <br><br>

    <table border>
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