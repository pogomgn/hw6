<?php
    $signin = false; // флаг попытки залогиниться
    $admin = false; // флаг совпадения логопасса с админскими

    if (isset($_POST["login"]) && isset($_POST["password"])) {
        $signin = true;
        if ("admin" == $_POST["login"] && "962012d09b8170d912f0669f6d7d9d07" == $_POST["password"]) {
            $admin = true;
            setcookie("admin", 1);
            header("location: ". $_COOKIE["lastpage"] . ".php");
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
    <title>SIGN IN page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="hw9">
    <h2>SIGN IN page</h2>
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
</div>
</body>
</html>