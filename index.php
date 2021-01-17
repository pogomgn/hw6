<?php
    session_start();
    setcookie("lastpage", "index");
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
    <title>PHP - document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bgcolor.css">
</head>
<body>
<div id="main" class="hw9 bgcolor<?=$bgcolor?>">
    <h2>15.01.21</h2>
        <a href="task1.php" >Перейти</a>
    <h2>1</h2>
    <?


        $_SESSION["test"] = 1;
        echo "<p>session['test'] - " . $_SESSION["test"] . "</p>";

        session_unset();
        echo "<p>session_unset()</p>";

        echo "<p>session['test'] - " . $_SESSION["test"] . "</p>"; // ничего не вернет
        echo "<p>cookie['phpsessid'] - " . $_COOKIE["PHPSESSID"] . "</p>"; // останется
    ?>
    <h2>2</h2>
    <h3>Это индексная страница index.php</h3>
    <p>
        <?
            if (isset($_COOKIE["admin"])) {
                if (1 == $_COOKIE["admin"]) {
                    echo "Вы администратор!";
                }
            }
        ?>
    </p>
    <a href="fact.php">Goto fact</a>
    <a href="bitrix.php">Goto bitrix</a>
    <a href="signin.php">Sign in</a>

    <h2>3</h2>
    <select id="color_selector">
        <option <?=(1==$bgcolor)?"selected":""?> value="1">Серый фон</option>
        <option <?=(2==$bgcolor)?"selected":""?> value="2">Синий фон</option>
        <option <?=(3==$bgcolor)?"selected":""?> value="3">Красный фон</option>
    </select>
    <script>
        bgSelectElement = document.querySelector('#color_selector');
        bgSelectElement.addEventListener('change', (event) => {
            document.cookie = "bgcolor="+event.target.value;
            let m = document.getElementById("main");
            m.classList.remove('bgcolor1');
            m.classList.remove('bgcolor2');
            m.classList.remove('bgcolor3');
            m.classList.add('bgcolor'+event.target.value);
        });

    </script>
</div>
</body>
</html>
