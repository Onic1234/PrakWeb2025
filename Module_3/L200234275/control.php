<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>variable</title>
</head>
<body>
    <h1>Value</h1>
    <form method="post" action="control.php">
        <p>Enter the Numerical Value (0-100) : <input type="text" name="value" size="3"></p>
        <p><input type="submit" name="submit" value="Process"></p>
    </form>
    <?php
    error_reporting(E_ALL ^ E_NOTICE);
    $value = $_POST["value"];
    $submit = $_POST["submit"];
    if ($submit) {
        if ($value == "") {
            $grade = '"Value is empty/not filled in"';
        } elseif ($value <= 20) {
            $grade = 'E';
        } elseif ($value <= 40) {
            $grade = 'D';
        } elseif ($value <= 60) {
            $grade = 'C';
        } elseif ($value <= 80) {
            $grade = 'B';
        } elseif ($value <= 100) {
            $grade = 'A';
        }else{
            $grade = '"The entered value is wrong!"';
        }
        echo "Number value is $value</br>";
        echo "Then the grade value is $grade";
    }
    ?>
</body>
</html>