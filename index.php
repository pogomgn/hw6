<?php
if (isset($_GET["goto"])){
    $gt = addslashes($_GET["goto"]);
    header("location: phpcourse.php?l=$gt");
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
</head>
<body>
<div class="hw9">
    <h2>Задание 3</h2>
    <form method="get">
        <select name="goto">
            <option value="1">Дз № 2</option>
            <option value="2">Дз № 3</option>
        </select>
        <button type="submit">Перейти</button>
    </form>
</div>
</body>
</html>
