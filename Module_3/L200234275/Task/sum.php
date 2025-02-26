<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Penjumlahan</title>
</head>
<body>
    <h2>Program Penjumlahan</h2>
    <form action="sum.php" method="post">
        <p>Nilai A adalah <input type="text" name="nilaiA"></p>
        <p>NIlai B adalah <input type="text" name="nilaiB"></p>
        <p><input type="submit" name="submit" value="Jumlahkan"></p>
    </form>
    <?php
    error_reporting(E_ALL ^ E_NOTICE);
    $nilaiA = $_POST["nilaiA"];
    $nilaiB = $_POST["nilaiB"];
    $submit = $_POST["submit"];

    if($submit){
        $sum = $nilaiA + $nilaiB;
        echo "Nilai A adalah $nilaiA</br>";
        echo "Nilai B adalah $nilaiB</br>";
        echo "Jadi Nilai A ditambah Nilai B adalah $sum";
    }
    ?>
</body>
</html>