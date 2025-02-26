<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>variable</title>
</head>
<body>
    <h1>Guest Book</h1>
    <form method="post" action="variable.php">
        <p>Name : <input type="text" name="name" size="20"></p>
        <p>Email : <input type="text" name="email" size="30"></p>
        <p>Comment : <textarea name="comment" cols="30" rows="3"></textarea></p>
        <p><input type="submit" name="submit" value="Send"></p>
    </form>
    <?php
        error_reporting(E_ALL ^ E_NOTICE);
        $name = $_POST["name"];
        $email = $_POST["email"];
        $comment = $_POST["comment"];
        $submit = $_POST["submit"];
        if($submit){
            echo "</br>Name : $name";
            echo "</br>Email : $email";
            echo "</br>Comment : $comment";
        }
    ?>
</body>
</html>