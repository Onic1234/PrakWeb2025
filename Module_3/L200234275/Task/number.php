<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number is odd or even</title>
</head>
<body>
    <form action="number.php" method="post">
        <h2>Number is ODD or EVEN?</h2>
        <p>Enter the Number : <input type="text" name="number"></p>
        <p><input type="submit" name="submit" value="check"></p>
    </form>

    <?php
    error_reporting(E_ALL ^ E_NOTICE);
    $number = $_POST["number"];
    $submit = $_POST["submit"];
    if ($submit) {
        if ($number == "") {
            $grade = '"Value is empty/not filled in"';
        } elseif ($number % 2 == 0) {
            $grade = 'Even';
        } elseif ($number % 2 == 1) {
            $grade = 'Odd';
        } else {
            $grade = '"The entered value is wrong!"';
        }
        echo "Number value is $number</br>";
        echo "Then the grade value is $grade";
    } 

    ?>
</body>
</html>