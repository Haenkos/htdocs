<?php

function getRequestedPage() 
{     
   $requested_type = $_SERVER['REQUEST_METHOD']; 
   if ($requested_type == 'POST') 
   { 
       $requested_page = getPostVar('page','home'); 
   } 
   else 
   { 
       $requested_page = getUrlVar('page','home'); 
   } 
   return $requested_page; 
} 

function getArrayVar($array, $key, $default='') 
{ 
   return isset($array[$key]) ? $array[$key] : $default; 
} 
//============================================== 
function getPostVar($key, $default='') 
{ 
    return getArrayVar($_POST, $key, $default);

    /* Or use the modern variant below, a better way than accessing super global "$_POST"
  
       see https://www.php.net/manual/en/function.filter-input.php
       for extra options 

       $value = filter_input(INPUT_POST, $key); 
        
       return isset($value) ? $value : $default; 
    */
} 
//============================================== 
function getUrlVar($key, $default='') 
{ 
   return getArrayVar($_GET, $key, $default);
} 
?>