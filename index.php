<?php
    $name = "Ivan";
    $age = 32;
    $hour = intval(date("H"));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<p>Имя: <span><?=$name?></span></p>
<p>Возраст: <span><?=$age?></span></p>
    <img src="images/<? echo ($hour >= 8 && $hour < 20?"day":"night").".jpg"; ?>" alt="картинка" />
</body>
</html>
