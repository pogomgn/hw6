<?php

class User{ // все статическое, потому что не вижу варианта когда нам на одной странице которую генерирует сервер может потребоваться логинится с 2х пользователей одновременно
    private static $login = "";
    private static $logged_in = false;

    public static $user_id = 0;

    public static function getLogin() {
        return self::$login;
    }
    public static function setLogin($login) {
        self::$login = $login;
    }

    public static function Signin($password, $db){
        if (self::$login == "" || self::$logged_in) return false;

        $res = $db->query("SELECT * FROM `users` WHERE `name`='".self::$login."';");
        $f = $res->fetch_assoc();
        if((self::$login==$f['name']) && (md5($password)==$f['password'])) {
            self::$logged_in = true;
            self::$user_id = $f['id'];
            return true;
        }
        self::$logged_in = false;
        return false;
    }

    // функции ниже можно переписать, инициализировав сперва класс по id пользователя и записав его поля, а потом просто возвращать сохраненные поля

    public static function getRights($uid, $db){
        $res = $db->query("SELECT * FROM `users` WHERE `id`='".$uid."';");
        $f = $res->fetch_assoc();
        return $f["rig"];
    }
    public static function getType($uid, $db){
        $res = $db->query("SELECT * FROM `users` WHERE `id`='".$uid."';");
        $f = $res->fetch_assoc();
        return $f["type"];
    }
    public static function getFullname($uid, $db){
        $res = $db->query("SELECT * FROM `users` WHERE `id`='".$uid."';");
        $f = $res->fetch_assoc();
        return $f["desc"];
    }
}