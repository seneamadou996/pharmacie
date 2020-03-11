<?php include('../security.php');?>
<?php 
    try{
        $req = new PDO('mysql:host=localhost;dbname=monpharmacie;charset=utf8', 'root', '');
    }catch(Exception $e){
        die("Erreur PDO dans " .$e->getMessage());
    }
    $ps=$req->prepare("SELECT *,instituts.taux_pris_charge,instituts.fidelite FROM clients
    INNER JOIN instituts ON clients.id=instituts.clients_id");
    $ps->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail instituts</title>
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>Informations sur les instituts</h1>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Dénomination</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Taux de pris en charge</th>
                            <th>Fidélité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($i=$ps->fetch()){?>
                            <tr>
                                <td><?php echo($i['denomination']) ?></td>
                                <td><?php echo($i['adresse']) ?></td>
                                <td><?php echo($i['telephone']) ?></td>
                                <td><?php echo($i['taux_pris_charge']) ?></td>
                                <td><?php echo($i['fidelite']) ?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>