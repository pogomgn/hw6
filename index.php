<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$host = "158.101.162.59";
$db = "";
$user = "fact_user";
$pass = "5kfziSQOnsPCkUA8";

$db = new mysqli($host, $user, $pass) or die ("db error");
$res = $db->query("set names utf8");

function get_table($db_handle, $name, $width = 400, $class = "")
{
    $res = "<table style='width: {$width}px;' " . ($class == "" ? "" : " class='$class'") . ">";

    $db_res = $db_handle->query("select * from `$name`;");
    $fields = $db_res->fetch_fields();

    $res .= "<tr>";
    for ($i = 0; $i < count($fields); $i++) {
        $res .= "<td><b>{$fields[$i]->name}</b></td>";
    }
    $res .= "</tr>";

    while ($row = $db_res->fetch_assoc()) {
        $res .= "<tr>";
        for ($i = 0; $i < count($fields); $i++) {
            $res .= "<td>{$row[$fields[$i]->name]}</td>";
        }
        $res .= "</tr>";
    }

    $res .= "</table>";
    return $res;
}

function get_res($res_handle, $width = 400, $class = "")
{
    $res = "<table style='width: {$width}px;' " . ($class == "" ? "" : " class='$class'") . ">";

    $fields = $res_handle->fetch_fields();

    $res .= "<tr>";
    for ($i = 0; $i < count($fields); $i++) {
        $res .= "<td><b>{$fields[$i]->name}</b></td>";
    }
    $res .= "</tr>";

    while ($row = $res_handle->fetch_assoc()) {
        $res .= "<tr>";
        for ($i = 0; $i < count($fields); $i++) {
            $res .= "<td>{$row[$fields[$i]->name]}</td>";
        }
        $res .= "</tr>";
    }

    $res .= "</table>";
    return $res;
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
<style>
    .tbl {
        border-collapse: collapse;

    }

    .tbl td {
        border: 1px solid #000000;
    }
</style>
<body>
<div id="main" class="hw9">
    <h2>20.01.21</h2>
    <h2>1</h2>
    <?php

        $db->query("CREATE SCHEMA `fact_scheme` DEFAULT CHARACTER SET utf8;");
        $db->select_db("fact_scheme");

        $db->query("CREATE  TABLE `people` (
                          `id` INT NOT NULL AUTO_INCREMENT ,
                          `name` VARCHAR(32) NULL ,
                          `surname` VARCHAR(64) NULL ,
                          `age` INT NULL ,
                          PRIMARY KEY (`id`) )
                        DEFAULT CHARACTER SET = utf8;
                    ");
        $db->query("CREATE  TABLE `hobbies` (
                          `id` INT NOT NULL AUTO_INCREMENT ,
                          `name` VARCHAR(64) NULL ,
                          `description` VARCHAR(256) NULL ,
                          PRIMARY KEY (`id`) )
                        DEFAULT CHARACTER SET = utf8;
                    ");
        $db->query("CREATE  TABLE `people_hobbies` (
                          `id` INT NOT NULL AUTO_INCREMENT ,
                          `people_id` INT NULL ,
                          `hobby_id` INT NULL ,
                          PRIMARY KEY (`id`) )
                        DEFAULT CHARACTER SET = utf8;
                    ");
        $db->query("ALTER TABLE `people_hobbies` 
                          ADD CONSTRAINT `fk_people`
                          FOREIGN KEY (`people_id` )
                          REFERENCES `people` (`id` )
                          ON DELETE CASCADE
                          ON UPDATE RESTRICT, 
                          ADD CONSTRAINT `fk_hobbies`
                          FOREIGN KEY (`hobby_id` )
                          REFERENCES `hobbies` (`id` )
                          ON DELETE CASCADE
                          ON UPDATE RESTRICT
                        , ADD INDEX `fk_people_idx` (`people_id` ASC) 
                        , ADD INDEX `fk_hobbies_idx` (`hobby_id` ASC) ;
                    ");
        $db->query("INSERT INTO `hobbies`(`id`,`name`,`description`)
                            VALUES (1,\"Футбол\",\"Играть с мячом, смотреть матчи, болеть за команду\"),
                            (2,\"Хоккей\",\"Играть с шайбой, смотреть матчи, болеть за команду\"),
                            (3,\"Чтение\",\"Читать книги, получать знания\");");
        $db->query("INSERT INTO `people` (`id`,`name`,`surname`, `age`) 
                            VALUES (1,\"Иван\",\"Иванов\",15),
                            (2,\"Петр\",\"Петров\",14);");
        $db->query("INSERT INTO `people_hobbies`
                            (`people_id`,`hobby_id`)
                            VALUES
                            (1,2),(1,3),(2,3),(2,1);");


        $res = $db->query("SELECT p.name as 'Имя', p.surname  as 'Фамилия', h.name as 'Хобби'
                            FROM `people` p
                            INNER JOIN `people_hobbies` ph ON p.id = ph.people_id
                            INNER JOIN `hobbies` h ON h.id = ph.hobby_id");
        echo get_table($db, "hobbies", 400, "tbl")."<br/>";
        echo get_table($db, "people", 400, "tbl")."<br/>";
        echo get_table($db, "people_hobbies", 400, "tbl")."<br/>";

        echo get_res($res,500,"tbl");

        echo "<br/>DELETE FROM `people` WHERE `id` = 1;<br/><br/>";

        $db->query("DELETE FROM `people` WHERE `id` = 1;");   // тк внешний ключ каскадом удаляет связанные записи,
                                                                    // то удалятся записи и из таблицы people_hobbies
        echo get_table($db, "people", 400, "tbl")."<br/>";
        echo get_table($db, "hobbies", 400, "tbl")."<br/>";

        $res = $db->query("SELECT p.name as 'Имя', p.surname  as 'Фамилия', h.name as 'Хобби'
                                FROM `people` p
                                INNER JOIN `people_hobbies` ph ON p.id = ph.people_id
                                INNER JOIN `hobbies` h ON h.id = ph.hobby_id");

        echo get_res($res,500,"tbl");
    ?>
</div>
</body>
</html>
