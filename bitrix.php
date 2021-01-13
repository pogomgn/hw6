<?php
    setcookie("lastpage", "bitrix");
    $bgcolor = 1;
    if (isset($_COOKIE["bgcolor"])) {
        $bgcolor = $_COOKIE["bgcolor"];
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bitrix page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bgcolor.css">
</head>
<body>
<div class="hw9 bgcolor<?=$bgcolor?>">
    <h3>Это страница bitrix.php</h3>
    <p>
        <?
            if (isset($_COOKIE["admin"])) {
                if (1 == $_COOKIE["admin"]) echo "Вы администратор!";
                else  echo "Вы не администратор!";
            }

        ?>
    </p>
    <a href="index.php">Goto index</a>
    <a href="fact.php">Goto fact</a>
    <a href="signin.php">Sign in</a>
</div>
</body>
</html>
