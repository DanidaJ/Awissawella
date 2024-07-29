<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
    <h1>Select a Date </h1>
    <form action="<?php echo base_url() ?>index.php/Date/addDate" method="post">
    <input type="text" id="datepicker" name="disabled" placeholder="Select date">
    <button type="submit" name="submit">Submit </button>
</form>
    
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
                <th>Disabled dates</th>
               
            </tr>
        </thead>
        <tbody>
           
            <?php foreach ($dates as $date) { ?>
                <tr>
                    <td><?php echo $date->disabled ?></td>
                  
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html> 