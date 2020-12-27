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
        // 5-ая задача и доп задача - в WhatsApp'e

        // 25.12.20

        echo "<h2> 1 </h2>";

        $str1 = "some string";
        if (strlen($str1) > 5)
            $str1 = mb_substr($str1, 5) . "...";

        echo "<p>$str1</p>";

        echo "<h2> 2 </h2>";

        $str2 = "asoubasfuabwlubcaiwlyebcaiywbcwaybbwcabwlecbawecb";
        echo "<p>$str2</p>";
        $str2 = str_replace(["a", "b", "c"], ["1", "2", "3"], $str2);
        echo "<p>$str2</p>";

        echo "<h2> 3 </h2>";

        $str3 = "abc abc abc";
        echo "<p>" . strrpos($str3, "b") . "</p>";

        echo "<h2> 4 </h2>";

        $str4 = "html css php";
        $array4 = explode(" ", $str4);

        echo "<h2> 5 </h2>";

        $str5_1 = "10-02-2015";
        $str5_2 = "30-12-2019";

        echo "<p>Дни от $str5_1 до $str5_2</p>";

        $diff = 0;

        $day1 = (int)substr($str5_1, 0, 2);
        $month1 = (int)substr($str5_1, 3, 2);
        $year1 = (int)substr($str5_1, 6, 4);
        $day2 = (int)substr($str5_2, 0, 2);
        $month2 = (int)substr($str5_2, 3, 2);
        $year2 = (int)substr($str5_2, 6, 4);

        function isLeap1($year) {
            return date('L', mktime(0, 0, 0, 1, 1, $year));
        }

        function isLeap2($year) { // без date()
            return (!($year % 4) && ($year % 100)) || (!($year % 400));
        }

        if (!isLeap2($year1) && $day1 == 29 && $month1 == 2) {
            die("Нет такой начальной даты!");
        }
        if (!isLeap1($year2) && $day2 == 29 && $month2 == 2) {
            die("Нет такой конечной даты!");
        }

        $days_in_month = [0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; // 0 в начале чтобы порядковый номер
                                                                              // месяца соответствовал номеру в массиве

        $check_leap_start = false;
        $check_leap_end = false;

        if ($month1 == 1 || $month1 == 2 && $day1 <= 28) $check_leap_start = true;
        if ($month2 > 2 || $month2 == 2 && $day2 == 29) $check_leap_end = true;

        echo "<p>Проверка начального года на високосность: " . ($check_leap_start ? "да" : "нет") . "</p>";
        echo "<p>Проверка конечного года на високосность: " . ($check_leap_end ? "да" : "нет") . "</p>";

        $start_year = $check_leap_start ? $year1 : $year1 + 1;
        $end_year = $check_leap_end ? $year2 + 1 : $year2;

        echo "<p>";
        for ($i = $start_year; $i < $end_year; $i++) { // посчитаем вошедшие високосные дни
            echo $i;
            if (isLeap1($i)) {
                $diff++;
                echo "<b>!</b>";
            }
            echo " ";
        }
        echo "</p>";

        $diff += 365 * ($year2 - $year1 + 1);
        echo "<p>Добавили дни за года (" . ($year2 - $year1 + 1) . "): $diff</p>";

        $sub1 = 0; // дней в месяцах предшествующих указанному в нач дате
        for ($i = 1; $i < $month1; $i++) {
            $sub1 += $days_in_month[$i];
        }
        $sub1 += $day1 - 1; // включаем день начальной даты
        $diff -= $sub1;

        echo "<p>Вычитаем дни которые прошли в году начальной даты ($sub1): $diff</p>";

        $sub2 = 0; // дней в месяцах после указанного в кон дате включая указанный
        for ($i = $month2; $i <= 12; $i++) {
            $sub2 += $days_in_month[$i];
        }
        $sub2 -= $day2 - 1; // указанный день конечной даты не учитывается
        $diff -= $sub2;
                                                                    // Результат  \|/
        echo "<p>Вычитаем дни которые не прошли в году конечной даты ($sub2): <b>$diff</b></p>";

        // Проверка

        $d1 = new DateTime($str5_1);
        $d2 = new DateTime($str5_2);
        $interval = $d1->diff($d2);
        $res = $interval->format("%a");
        echo "<p>Проверка: $res</p>";
    ?>
</div>
</body>
</html>
