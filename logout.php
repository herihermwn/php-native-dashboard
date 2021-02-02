<?php
session_start();
unset($_SESSION['login']);
$_SESSION['login'] = null;
header('Location: login.php');