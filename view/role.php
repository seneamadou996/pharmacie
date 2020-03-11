<?php
    try{
        $req = new PDO('mysql:host=localhost;dbname=monpharmacie;charset=utf8', 'root', '');
    }catch(Exception $e){
        die("Erreur PDO dans " .$e->getMessage());
    }
    $rol_id=$_SESSION['user']['roles_id'];
    $ps=$req->prepare("SELECT * FROM roles WHERE id=$rol_id");
    $ps->execute();
    $rol=$ps->fetch();
    if(!($rol['role']=="admin" || $rol['role']=="pharmacien")){
        header("location:$_SERVER[HTTP_REFERER]");
    }
?>