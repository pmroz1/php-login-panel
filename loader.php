<?php
session_start();

$loginAttempts = 0;
$captcha = false;

header("Location: ./index.php");

