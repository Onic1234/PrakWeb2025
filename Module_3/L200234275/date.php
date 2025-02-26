<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date and Time Funnctions</title>
</head>
<body>
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $hour = date("H:i:s A");
    $time = date("d-m-Y");
    $day = date("l");
    $date = date("d");
    $month = date("F");
    $year = date("Y");
    echo "Current time $hour</br>";
    echo "Current date $time</br>";
    echo "More details day $day Date $date Month $month Year $year";
    ?>
</body>
</html>