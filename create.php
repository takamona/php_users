<?php
// (C)
//print "OK";
require_once "models/User.php";
session_start();
$errors= $_SESSION["errors"];
$_SESSION["errors"] = null;
$user= $_SESSION["user"];
$_SESSION["user"] = null;
if($user === null){
    $user = new User();
    
    
}
//CSRF対策　(なりすまし対策)
$token = session_id();
include_once "views/create_view.php";