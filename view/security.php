<?php 
    session_start();
    if(!isset($_SESSION['user']['prenom'])){
        header("location:../index.php");
    }
?>