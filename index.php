<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    session_set_cookie_params(30800);
    session_start();

    $host = "158.101.162.59";
    $name = "fact_scheme";
    $user = "fact_user";
    $pass = "5kfziSQOnsPCkUA8";

    if (!$_SESSION["enter"]) {
        header("Location: login.php");
    }
    if ($_REQUEST["action"] == "exit") {
        header("Location: login.php");
        session_destroy();
    }

    $db = new mysqli($host, $user, $pass) or die ("db error");
    $db->select_db("fact_scheme");
    $db->query("set names utf8");

    $uid = $_SESSION["us_id"];
    $query1 = "";
    $res = $db->query("select * from `users` where `id` = $uid;");
    $f = $res->fetch_assoc();
    $uname = $f["desc"];
    $utype = $f["type"];
    $urig = $f["rig"];
    ob_end_flush();

    /*
     * admin - qwe
     * user1 - asd
     * user2 - zxc
     */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Page</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div id="main" class="hw9">
    <div class='container'>
        <div class="row page-header">
            <div class="col-lg-6">
                <h1 class="">22.01.21</h1>
            </div>
            <div class="col-lg-6">
                <div class='btn-group' style="float: right; margin-top: 30px;">
                    <button class='btn btn-default' id="aname"><?php echo $uname; ?></button>
                    <a class='btn btn-danger' href="index.php?action=exit">Выход</a>
                </div>
            </div>
        </div>
    </div>

    <div class='container'>
        <div class='row'>
            <div class='col-md-6'>
                <?php if ($urig > 80): ?>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        <input type="text" class="form-control" id="add_user_name" placeholder="User name"
                               style="float: left; width: 200px;margin-right: 20px;">
                        <input type="password" class="form-control" id="add_user_pass" placeholder="password"
                               style="float: left; width: 200px;margin-right: 20px;">
                        <button type="button" class="btn btn-success" id="add_player_button">Add</button>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class='col-md-6' id='mainc'>
                <?php
                    if (1 == $utype){
                        echo "You are admin";
                    } else {
                        echo "You are user";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
