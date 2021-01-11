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
    <?
    echo "<h2>1</h2>";

    function f1($array)
    {
        for ($i = 0; $i < count($array); $i++) {
            $array[$i] = mt_rand(0, 1000);
        }
        return $array;
    }

    $arr1 = [0, 0, 0, 0, 0, 0, 0, 0, 0];

    echo "<pre>";
    print_r($arr1);
    echo "</pre>";

    $arr1 = f1($arr1);

    echo "<pre>";
    print_r($arr1);
    echo "</pre>";

    $str = "HTML, CSS, PHP, BITRIX";
    $symb = [",", ".", "!", "?"];

    echo "<h2>2</h2>";

    function f2($s, $delimiters)
    {
        $repl = array_pad([], count($delimiters), "");
        $s = str_replace($delimiters, $repl, $s);
        return count(explode(" ", $s));
    }

    echo "<p>" . f2($str, $symb) . "</p>";

    echo "<h2>3</h2>";

    function f3($s)
    {
        $res = "";
        for ($i = mb_strlen($s) - 1; $i >= 0; $i--) {
            $res .= mb_substr($s, $i, 1);
        }
        return $res;
    }

    echo "<p>" . f3($str) . "</p>";

    echo "<h2>4</h2>";

    function f4($s)
    {
        return count(mb_str_split($s, 1)); // php7.4+ или просто return mb_strlen($s);
    }

    echo "<p>" . f4($str) . "</p>";

    echo "<h2>5</h2>";

    function f5($s)
    {
        $res = "";
        for ($i = 0; $i < mb_strlen($s); $i++) {
            $res .= mb_substr($s, $i, 1) . "<br/>";
        }
        return $res;
    }

    echo "<p>" . f5($str) . "</p>";

    ?>
</div>
</body>
</html>
