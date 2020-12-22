<?php
    define("PI", 3.14159265359);

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
<p>Имя: <span><?= $name ?></span></p>
<p>Возраст: <span><?= $age ?></span></p>
<p>Число Пи: <span><?= PI ?></span></p>
<img src="images/<? echo ($hour >= 8 && $hour < 20 ? "day" : "night") . ".jpg"; ?>" alt="картинка"/>
<div class="hw7">
    <?
        for ($i = 5; $i < 14; $i++) {
            echo "$i<br/>";
        }

        $num = 1000;
        $iterations = 0;
        while ($num >= 50) {
            $num /= 2;
            $iterations++;
        }

        echo "<br/> num = $num <br/>";
        echo "итераций: $iterations";

        $num = 1000;
        $iterations = 0;
        for (; $num >= 50; $num /= 2, $iterations++)
            ;

        echo "<br/> num = $num <br/>";
        echo "итераций: $iterations<br/><br/>";

        for ($i = 0; $i < 11; $i++) {
            echo "i = $i: ";
            for ($j = 0; $j < 11 - $i; $j++) {
                echo $j . " ";
            }
            echo "<br/>";
        }
    ?>
</div>
</body>
</html>
