<?php

class Util
{
    public static function getPostVar($key, $default = '')
    {
        return self::getArrayVar($_POST, $key, $default);
    }


    public static function getUrlVar($key, $default = '')
    {
        return self::getArrayVar($_GET, $key, $default);
    }


    public static function getArrayVar($array, $key, $default = '')
    {
        return isset($array[$key]) ? $array[$key] : $default;
        // deze functie zorgt ervoor dat er altijd een default waard is als ik een bepaalde waarde uit 
        //een array probeer te halen, zodat ik geen error krijg. 
    }
}
