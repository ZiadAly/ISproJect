<?php
session_start();


//tokensetup
include './vendor/firebase/php-jwt/src/JWT.php';

$key = "ihateguc";
$token = array(
    "iss" => "SaeedTechnologies",
    "iat" => 1356999524,
    "nbf" => 1357000000,
    "uid" => 0,
    "role" => ""
);



//db conn
$connection = mysqli_connect("localhost","root","","ISproj");

include 'header.php';


echo content();


//footer here
?>