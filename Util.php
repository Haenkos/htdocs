<?php

class Util
{
    const GENDERS = array("dhr" => "Dhr.", "mvr" => "Mvr.", "geen" => "Anders/geen");
    const COMPREFS = array("email" => "email", "phone" => "phone");

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