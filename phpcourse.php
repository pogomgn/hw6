<?php
$page = -1;
if (isset($_GET["l"])) {
    $page = $_GET["l"];
}

$signin = false; // флаг попытки залогиниться
$admin = false; // флаг совпадения логопасса с админскими

if (isset($_POST["login"]) && isset($_POST["password"])) {
    $signin = true;
    if ("admin" == $_POST["login"] && "962012d09b8170d912f0669f6d7d9d07" == $_POST["password"]) {
        $admin = true;
    }
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="hw9">

    <!-- ############## ДЗ 1 ############## -->

    <!--
    5 раз перечитал и 5 раз пересмотрел объяснение, но понять не смог.
    Что за логины, откуда берутся, откуда отправляются, куда отправляются?
    Что за комментарии, откуда, куда?
    Что за значения? Почему сохраняются вместо? Вместо чего?
    Что за тестовый документ? Где его взять? Или где он был?
    Какой электронный адрес? Откуда его брать?
    -->

    <!-- ############## ДЗ 2 ############## -->

    <? if (1 == $page) : ?>
        <h2>№ 2</h2>
        <p>
            <?
            if ($admin) {
                echo "Привет админ!!";
            } else {
                if ($signin) {
                    echo "Неверный логин или пароль";
                } else {
                    echo "для входа admin'ом - пароль &quot;qwer&quot;";
                }
            }
            ?>
        </p>
        <form id="form1" method="post">
            <input type="text" name="login" placeholder="Enter login"/>
            <input type="password" id="pwd" name="password" placeholder="Enter password"/>

            <button type="submit">Sign in</button>
        </form>
        <script src="http://www.myersdaily.org/joseph/javascript/md5.js"></script>
        <script>
            let form = document.getElementById("form1");

            function submitHandler() {
                let md5hash = md5(document.getElementById("pwd").value);
                document.getElementById("pwd").value = md5hash;
            }

            form.addEventListener("submit", submitHandler);
        </script>
    <? endif; ?>

    <!-- ############## ДЗ 3 ############## -->

    <? if (2 == $page) : ?>
        <h2>№ 3</h2>
        <?
        $results = false; // флаг просмотра результатов

        if (isset($_GET["name"])) {
            $results = true;
        }

        // читаем список вопросов

        $questions = [];
        $values = [];
        $handle = fopen("questions.txt", "r");
        if ($handle) {
            while (($q = fgets($handle)) !== false) {
                $tmp = explode("#", $q);
                $questions[] = $tmp[1];
                $values[] = $tmp[0];
            }
            fclose($handle);
        } else {
            echo "Что-то пошло не так :(";
        }
        ?>

        <? if (!$results) : ?>
            <form method="get">
                <input type="hidden" name="l" value="2"/> <!-- сохраняем страницу для отправки -->
                <input type="text" name="name" required placeholder="Введите ваше имя"/>
                <?
                for ($i = 0; $i < count($questions); $i++) {
                    echo "
                <fieldset>
                  <legend>$questions[$i]</legend>
                  <div>
                    <input type=\"radio\" id=\"q1_$i\" name=\"q[$i]\" value=\"1\">
                    <label for=\"q1_$i\">Да</label>
                  </div>
                  <div>
                    <input type=\"radio\" id=\"q2_$i\" name=\"q[$i]\" value=\"0\">
                    <label for=\"q2_$i\">Нет</label>
                  </div>
                </fieldset>
                    ";
                }
                ?>
                <button type="submit">Отправить</button>
            </form>
        <? else: ?>

            <p><?=$_GET["name"]?>, вы прошли анкету! Ваш результат:</p>
            <p>
            <?
            $ans = $_GET["q"];
            $points = 0;
            for ($i=0;$i<count($ans);$i++) {
                if ($ans[$i] != $values[$i]){
                    $points++;
                    echo "1";
                } else{
                    echo "0";
                }
            }
            echo " = $points баллов";
            ?>
            </p>
            <p>
            <?
            if ($points > 15) echo "У Вас покладистый характер";
            elseif ($points >= 8) echo "Вы не лишены недостатков, но с вами можно ладить";
            else echo "Вашим друзьям можно посочувствовать";
            ?>
            </p>
            <a href="phpcourse.php?l=2">Пройти заново</a>

        <? endif; ?>

    <? endif; ?>

</div>
</body>
</html>
