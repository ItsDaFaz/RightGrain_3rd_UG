<?php

$user = 'root';
$pass = '';
$db = 'donate';
$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');

echo "connected"."<br>";

?>