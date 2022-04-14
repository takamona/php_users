<?php

 //Filter(F)
session_start();
$token = session_id();
$value = $_POST['_token'];
if ($token !== $value) {
    header('Location: create.php');
    exit;
}
