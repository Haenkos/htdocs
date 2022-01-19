<?php

function getArrayVar($array, $key, $default='')
{
    return isset($array[$key]) ? $array[$key] : $default;
}
$data = array("name" => "Tiets", "email" => "Tietsmail", "phone" => "Tietsphpone");

echo "<div>";
echo "<label for='name'>Naam:";
echo "<input type='text' id='name' name='name' value='";
echo getArrayVar($data, 'name');
echo "'>";
echo "</label><br>";
echo "<label for='email'>Email:";
echo "<input type='text' id='email' name='email' value='".getArrayVar($data, "email")."'>";
echo "</label><br>";
echo "<label for='phone'>Telefoon:";
echo "<input type='text' id='phone' name='phone' value='".getArrayVar($data, "phone")."'>";
echo "</label><br>";
echo "</div>";