<?php

$db_user = "admin";
$db_pass = 'admin1234';
$db_name = "pai";

$db = new PDO('mysql:host=localhost;dbname='. $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>