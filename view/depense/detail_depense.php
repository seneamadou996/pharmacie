<?php include('../security.php');?>
<?php 
    if(isset($_POST['detail'])){
        $date1=$_POST['date1'];
        $date2=$_POST['date2'];
        try{
            $req = new PDO('mysql:host=localhost;dbname=monpharmacie;charset=utf8', 'root', '');
        }catch(Exception $e){
            die("Erreur PDO dans " .$e->getMessage());
        }
        $ps=$req->prepare("SELECT * FROM depenses WHERE date BETWEEN '$date1' AND '$date2' ");
        $ps->execute();
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail dépense</title>
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container col-md-8 col-md-offset-2">
        <div class="card">
            <div class="card-header text-center">
                <h3>Détail des dépenses du <?php 
                    if($date1==$date2)
                        echo $date1;
                    else
                        echo $date1 .' au '.$date2;
                 ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Intitulé</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $somme=0; while($i=$ps->fetch()){?>
                            <tr>
                                <td><?php echo($i['id']) ?></td>
                                <td><?php echo($i['intitule']) ?></td>
                                <td><?php echo($i['montant']) ?></td>
                            </tr>
                            <?php $somme+=$i['montant']; ?>
                        <?php }?>
                        <tr>
                            <td colspan="2">Montant total</td>
                            <td><?php echo $somme;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>