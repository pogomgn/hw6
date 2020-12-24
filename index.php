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
<div class="hw8">
    <?
        function randarr($N, $min = 0, $max = 100) {
            return array_map(
                function () use ($min, $max) {
                    return mt_rand($min, $max);
                },
                array_pad([], $N, 0)
            );
        }

        // 5ая задача

        $arr5 = array(
            "dim1_1" => array(
                "dim2_1" => array(
                    "dim3_1" => "val1",
                    "dim3_2" => "val2"
                ),
                "dim2_2" => array(
                    "dim3_3" => "val3",
                    "dim3_4" => "val4"
                )
            ),
            "dim1_2" => array(
                "dim2_1" => array(
                    "dim3_1" => "val5",
                    "dim3_2" => "val6"
                ),
                "dim2_2" => array(
                    "dim3_3" => "val7",
                    "dim3_4" => "val8"
                )
            )
        );
        $arr5_res = array();

        echo "<pre>";
        print_r($arr5);
        echo "</pre>";

        foreach ($arr5 as $k1 => $v1) {
            foreach ($v1 as $k2 => $v2) {
                foreach ($v2 as $k3 => $v3) {
                    $arr5_res[$k3][$k2][$k1] = $v3;
                }
            }
        }

        echo "<pre>";
        print_r($arr5_res);
        echo "</pre>";

        // 23.12.20

        echo "<h2> 1 </h2>";

        $n = 25;
        $arr1 = randarr($n, 0, 50);

        $odd = false;

        foreach ($arr1 as $v) {
            if (!$odd) echo "<p>$v</p>";
            else echo "<p><b>$v</b></p>";
            $odd = !$odd;
        }

        echo "<h2> 2 </h2>";

        $arr2 = [
            ["ADF", "BCD", "EDZ", "ANV"],
            ["NOC", "AMG", "BOF", "WOW", "CDG"],
            ["MOK", "APG", "ALQ"]
        ];

        foreach ($arr2 as $k1 => $v1) {
            foreach ($v1 as $k2 => $v2) {
                if ($v2[0] == 'A') echo "arr2[$k1][$k2] = $v2<br/>";
            }
        }

        echo "<h2> 3 </h2>";

        $arr3 = [[], [], [], []];
        foreach ($arr3 as &$subarr) {
            $subarr = randarr(mt_rand(4, 12), 0, 20);
        }

        $sum = 0;
        foreach ($arr3 as $k => $subarr) {
            $size = count($subarr);
            $sum += $size;
            echo "Количество элементов в подмассиве $k = " . $size."<br/>";
        }
        echo "Общее количество элементов - " . $sum."<br/>";

    ?>
</div>
</body>
</html>
