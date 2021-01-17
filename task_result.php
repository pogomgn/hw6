<?php
    session_start();
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
<p>Result:</p>
<?
    echo "<p>Q1: " . $_SESSION["asnw1"] . " (" . ($_SESSION["asnw1"] == 4 ? "верно" : "неверно") . ")</p>";
    echo "<p>Q2: " . $_SESSION["asnw2"] . " (" . ($_SESSION["asnw2"] == 10 ? "верно" : "неверно") . ")</p>";
    echo "<p>Q2: " . $_SESSION["asnw3"] . " (" . ($_SESSION["asnw3"] == 2? "верно" : "неверно") . ")</p>";
    if ($_SESSION["asnw1"] == 4 && $_SESSION["asnw2"] == 10 && $_SESSION["asnw3"] == 2) {
        echo "<p>Все верно!!</p>";
    }
?>
</body>
</html>
