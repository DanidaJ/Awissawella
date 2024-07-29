<html>

<head>
    <title>login
    </title>
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./../assets/css/finalstyles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css" integrity="sha512-6c4nX2tn5KbzeBJo9Ywpa0Gkt+mzCzJBrE1RB6fmpcsoN+b/w/euwIMuQKNyUoU/nToKN3a8SgNOtPrbW12fug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/fontawesome.min.css" integrity="sha512-pvr7xUq+1V77GWmZVvQbM5mozl2iouCzyJG3xxxJPoGQ3HlxHUmMHxlnw4vFUNX1gj80WH4XO7a2un+XQZNkJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div class="w3-bar w3-black w3-hide-small">
            <a href="http://localhost/Awissawella/index.php/booking" class="w3-bar-item w3-button">Bookings</a>
            <a href="http://localhost/Awissawella/index.php/doctor" class="w3-bar-item w3-button">Add Doctor</a>
            <a href="http://localhost/Awissawella/index.php/login" class="w3-bar-item w3-button">Add Patient</a>
            <a href="#" class="w3-bar-item w3-button">Add Scan</a>
           
            <a href="#" class="w3-bar-item w3-button w3-right"><i class="fas fa-home"></i></a>
          </div>
    <h1 align="center">LOGIN</h1>
    <form action="<?php echo base_url() ?>index.php/Login/signup" method="post">
        <table align="center" width="400px">
            <tr height="50px">
                <td>
                    <label>Patient Name</label>
                </td>
                <td>
                    <input type="text" name="patient_name" class="form-control" id="name">
                </td>
            </tr>
            <tr height="50px">
                <td>
                    <label>BHT Number</label>
                </td>

                <td>
                    <input type="text" name="BHT_num" class="form-control" id="text">
                </td>
            </tr><br><br>
            <tr height="50px">
                <td>
                    <label>Ward/Clinic</label>
                </td>

                <td>
                    <input type="text" name="ward_clinic" class="form-control" id="text">
                </td>
            </tr><br><br><!-- comment -->
            <tr height="50px">
                <td>
                    <label>Clinic/BHT</label>
                </td>

                <td>
                    <input type="text" name="clinic_BHT" class="form-control" id="text">
                </td>
            </tr><br><br><!-- comment -->

            <tr height="50px">
                <td>
                    <label>Patient Email</label>
                </td>

                <td>
                    <input type="email" name="patient_email" class="form-control" id="email">
                </td>
            </tr>

            <tr height="50px">
                <td>
                    <label>Contact Number</label>
                </td>

                <td>
                    <input type="text" name="patient_number" class="form-control" id="contact">
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
    <script>
        function validation() {
            var id = document.f1.user.value;
            var ps = document.f1.pass.value;
            if (id.length == "" && ps.length == "") {
                alert("User Name and Password fields are empty");
                return false;
            } else {
                if (id.length == "") {
                    alert("User Name is empty");
                    return false;
                }
                if (ps.length == "") {
                    alert("Password field is empty");
                    return false;
                }
            }
        }
    </script>
</body>

</html>