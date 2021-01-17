<?php
    session_start();
    if (isset($_GET["submit"])) {
        $_SESSION["asnw3"] = $_GET["answer"];
        header("location: task_result.php");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>10 / 5 = ?</p>
<form>
    <input type="text" name="answer" placeholder="asnwer" />
    <button type="submit" name="submit">Send</button>
</form>
</body>
</html>
