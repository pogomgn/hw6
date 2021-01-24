<?php
    $host = "158.101.162.59";
    $name = "fact_scheme";
    $user = "fact_user";
    $pass = "5kfziSQOnsPCkUA8";
    
    $db = new mysqli($host, $user, $pass) or die ("db error");
    $db->select_db("fact_scheme");
    $db->query("set names utf8");
	
	if (isset($_POST["remember"])){
		if ($_POST["remember"] == true){
			session_set_cookie_params(360000);
		} else {
			session_set_cookie_params(10800);
		}
	} else {
		session_set_cookie_params(10800);
	}
	session_start();
	
	if(isset($_POST['go'])) {
		$res = $db->query("SELECT * FROM `users` WHERE `name`='".$_REQUEST['login']."';");
		$f = $res->fetch_assoc();
		if(($_REQUEST['login']==$f['name']) && (md5($_REQUEST['password'])==$f['password'])) {
			$_SESSION['enter'] = "1";
			$_SESSION['us_id'] = $f['id'];
			$_SESSION['right'] = $f['rig'];
            echo '<script language="javascript" type="text/javascript">
                location="index.php" 
            </script>';
		} else {
			echo "<div class='clean-gray'>Не верное сочетание логина и пароля <a href=login.php>Попробовать ещё раз.</a></div>";
		}
	} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login page</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" name="form1" method="post" action="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Login" name="login"  autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <input type="submit" name="go" class="btn btn-lg btn-success btn-block" value="Login" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php
	}
?>