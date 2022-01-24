<?php

class Util
{

    public static function getArrayVar($array, $key, $default='') 
    { 
       return isset($array[$key]) ? $array[$key] : $default; 
    } 
    
    public static function getPostVar($key, $default='') 
    { 
        return self::getArrayVar($_POST, $key, $default);
    } 
    
    public static function getUrlVar($key, $default='') 
    { 
        return self::getArrayVar($_GET, $key, $default);
    }

}
    
?>