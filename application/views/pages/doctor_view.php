<html>

<head>
    <title>login
    </title>
    <link rel="stylesheet" href="./../assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css" integrity="sha512-6c4nX2tn5KbzeBJo9Ywpa0Gkt+mzCzJBrE1RB6fmpcsoN+b/w/euwIMuQKNyUoU/nToKN3a8SgNOtPrbW12fug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/fontawesome.min.css" integrity="sha512-pvr7xUq+1V77GWmZVvQbM5mozl2iouCzyJG3xxxJPoGQ3HlxHUmMHxlnw4vFUNX1gj80WH4XO7a2un+XQZNkJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1 align="center">DOCTOR</h1>
    <form action="<?php echo base_url() ?>index.php/Doctor/Signup" method="post">
        <table align="center" width="400px">
            <tr height="50px">
                <td>
                    <label>Doctor Name</label>
                </td>
                <td>
                    <input type="text" name="doctor_name" id="name">
                </td>
            </tr>
            <tr height="50px">
                <td>
                    <label>Doctor Age</label>
                </td>

                <td>
                    <input type="text" name="BHT_num" id="text">
                </td>
            </tr><br><br>
            <tr height="50px">
                <td>
                    <label>Doctor NIC</label>
                </td>

                <td>
                    <input type="text" name="ward_clinic" id="text">
                </td>
            </tr><br><br><!-- comment -->

            <tr height="50px">
                <td>
                    <label>Doctor Email</label>
                </td>

                <td>
                    <input type="email" name="doctor_email" id="email">
                </td>
            </tr>

            <tr height="50px">
                <td>
                    <label>Contact Number</label>
                </td>

                <td>
                    <input type="text" name="doctor_number" id="contact">
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