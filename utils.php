<?php

    function get_table($db_handle, $name, $width = 400, $class = "") {
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

    function get_res($res_handle, $width = 400, $class = "") {
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