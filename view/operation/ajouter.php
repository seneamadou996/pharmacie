<?php
    require_once('../security.php');
    try{
        $req = new PDO('mysql:host=localhost;dbname=monpharmacie;charset=utf8', 'root', '');
    }catch(Exception $e){
        die("Erreur PDO dans " .$e->getMessage());
    }
    if(isset($_GET['clients_id']) && !empty($_GET['clients_id'])){
       $id=$_GET['clients_id'];
       $ps=$req->prepare("SELECT *,clients.id FROM types JOIN clients ON types.id=clients.types_id WHERE clients.id='$id'");
       $ps->execute();
       $row=$ps->fetch();
       $remise=0;
       if($row['type']=='privé'){
           $ps1=$req->prepare("SELECT * FROM instituts WHERE clients_id='$id'");
           $ps1->execute();
           $count=$ps1->rowCount();
           if($count>0){
               while($row1=$ps1->fetch()){
                    $remise=$row1['fidelite'];
                    echo $remise.'%';
                    
               }
           }else{
               $remise=0;
               echo $remise.'%';
           }
       }else{
           $remise=0;
           echo $remise.'%';
       }
    }   
?>