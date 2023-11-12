<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$conn =mysqli_connect('localhost','root','','e-commerce-store');

if(!$conn){
    die(mysqli_error($conn));
}

?>