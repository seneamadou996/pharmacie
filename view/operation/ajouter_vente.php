<?php
    require_once('../security.php');
    try{
        $req = new PDO('mysql:host=localhost;dbname=monpharmacie;charset=utf8', 'root', '');
    }catch(Exception $e){
        die("Erreur PDO dans " .$e->getMessage());
    }
    if(isset($_GET['medicaments_id']) && !empty($_GET['medicaments_id'])){
        $id=$_GET['medicaments_id'];
        $ps=$req->prepare("SELECT * FROM medicaments WHERE id='$id'");
        $ps->execute();
        $count=$ps->rowCount();
        if($count>0){
            while($row=$ps->fetch()){
                echo $row['prix_vente'];
            }
        }else{
            echo 'revoyer votre selection';
        }
    }else{
        echo '<h1>Error</h1>';
    }
?> 