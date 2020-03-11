<?php 
    require_once('../security.php');
    $time=date('Y-m-d');
    try{
        $req = new PDO('mysql:host=localhost;dbname=monpharmacie;charset=utf8', 'root', '');
    }catch(Exception $e){
        die("Erreur PDO dans " .$e->getMessage());
    }
    $ps =$req->prepare("SELECT employes.id,users.prenom,users.nom FROM employes INNER JOIN users ON users.id=employes.users_id");
    $ps->execute();
    $ps1=$req->prepare("SELECT * FROM clients");
    $ps1->execute();
    $ps2=$req->prepare("SELECT * FROM medicaments");
    $ps2->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestion pharmacie</title>

    <!-- Custom fonts for this template-->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div>
        <div class="card">
            <div class="card-header bg-dark">
                <div class="row">
                    <div class="col-2">
                        <img src="../../assets/img/images.jpg" alt="...." width="80" height="90">
                    </div>
                    <div class="col-8 titre">
                        <div class="heur font-weight-bolder text-center" id="horloge"></div>
                        <p class="text-white text-center"><?php echo('Session '.$_SESSION['user']['prenom'].' '.$_SESSION['user']['nom']) ?></p>
                        <div class="marquee-rtl"><marquee id="defile" behavior="slide" direction="left" loop="1000" scrollamount="5" scrolldelay="1">PHARMACIE EN LIGNE</marquee></div>
                    </div>
                    <div class="col-2">
                        <img src="../../assets/img/images.jpg" alt="...." width="80" height="90" class="float-right">
                    </div>
                </div>
            </div>
            <div class="card-body bg-dark col-md-12 col-xs-12">
                <div class="row cont collapsed">
                    <div class="col-3 mb-4">
                          <!-- Sidebar -->
                        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

                            <!-- Sidebar - Brand -->
                            <!-- Divider -->
                            <hr class="sidebar-divider my-0">
    
                            <!-- Nav Item - Dashboard -->
                            <li class="nav-item active row">
                                <a class="nav-link col" href="../index.php">
                                    <i class="fas fa-fw fa-tachometer-alt"></i>
                                    <span>Accueil</span>
                                </a>
                                <a class="nav-link col btn btn-circle text-dark mt-2 pb-4 mr-3 btn-sm col-md-4 text-center bg-white" href="../logOut.php">
                                    <span class="align-middle">LogOut</span>
                                </a>
                            </li>
    
                            <!-- Divider -->
                            <hr class="sidebar-divider">
    
                            <!-- Nav Item - Pages Collapse Menu -->
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <i class="fas fa-user-friends"></i>
                                    <span>Fournisseurs</span>
                                </a>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <h6 class="collapse-header">clické une option:</h6>
                                        <a class="collapse-item" href="../fournisseur/index.php">Liste de fournisseurs</a>
                                        <a class="collapse-item" href="../ligne/index.php">Ligne de commande</a>
                                        <a class="collapse-item" href="../commande/index.php">Commande fournisseur</a>
                                    </div>
                                </div>
                            </li>

                            <!-- Nav Item - Utilities Collapse Menu -->
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                                    <i class="fas fa-prescription-bottle-alt"></i>
                                    <span>Produits</span>
                                </a>
                                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <h6 class="collapse-header">clické une option:</h6>
                                        <a class="collapse-item" href="../famille/index.php">Famille produit</a>
                                        <a class="collapse-item" href="../produit/index.php">Produit</a>
                                        <a class="collapse-item" href="../produit-dispo/index.php">Produits disposnibles</a>
                                        <a class="collapse-item" href="../produit-peremp/index.php">Produit périmé</a>
                                        <a class="collapse-item" href="../stockage/index.php">Stockage médicament</a>
                                        <a class="collapse-item" href="../stock/index.php">Stock</a>
                                    </div>
                                </div>
                            </li>
                            <!-- Nav Item - Pages Collapse Menu -->
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                                    <i class="fas fa-cash-register"></i>
                                    <span>Vente</span>
                                </a>
                                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <h6 class="collapse-header">Clické sur une option:</h6>
                                        <a class="collapse-item" href="../client/index.php">Client</a>
                                        <a class="collapse-item" href="../institution/index.php">Institution</a>
                                        <a class="collapse-item" href="index.php">Opération de vente</a>
                                        <a class="collapse-item" href="../produit-vendus/index.php">Produits vendus</a>
                                    </div>
                                </div>
                            </li>
                            <!-- Nav Item - Pages Collapse Menu -->
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                                    <i class="fas fa-restroom"></i>
                                    <span>Personnels</span>
                                </a>
                                <div id="collapse" class="collapse" aria-labelledby="heading" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <h6 class="collapse-header">clické une option:</h6>
                                        <a class="collapse-item" href="../personnel/index.php">Peronnel</a>
                                        <a class="collapse-item" href="#">Fiche de salaire</a>
                                        <a class="collapse-item" href="#">Paiement</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseT" aria-expanded="true" aria-controls="collapseT">
                                    <i class="fas fa-calculator"></i>
                                    <span>Comptabilité</span>
                                </a>
                                <div id="collapseT" class="collapse" aria-labelledby="headingT" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <h6 class="collapse-header">clické une option:</h6>
                                        <a class="collapse-item" href="../reglement-four/index.php">Réglement fournisseur</a>
                                        <a class="collapse-item" href="../reglement-client/index.php">Réglement client</a>
                                        <a class="collapse-item" href="../approvisionnement/index.php">Approvisionnement</a>
                                        <a class="collapse-item" href="../situation/index.php">Situation caisse</a>
                                        <a class="collapse-item" href="../depense/index.php">Dépenses</a>
                                        <a class="collapse-item" href="#">Statistiques</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTw" aria-expanded="true" aria-controls="collapseTw">
                                    <i class="fas fa-tools"></i>
                                    <span>Administration</span>
                                </a>
                                <div id="collapseTw" class="collapse" aria-labelledby="headingTw" data-parent="#accordionSidebar">
                                    <div class="bg-white py-2 collapse-inner rounded">
                                        <h6 class="collapse-header">clické une option:</h6>
                                        <a class="collapse-item" href="../utilisateur/index.php">Utilisateur</a>
                                        <a class="collapse-item" href="../pharmacien/index.php">pharmacien</a>
                                        <a class="collapse-item" href="../privilege/index.php">Privilèges</a>
                                    </div>
                                </div>
                            </li>
    
    
                            <!-- Divider -->
                            <hr class="sidebar-divider d-none d-md-block">
    
                            <!-- Sidebar Toggler (Sidebar) -->
                            <div class="text-center d-none d-md-inline">
                                <button class="rounded-circle border-0" id="sidebarToggle"></button>
                            </div>

                        </ul>
                        <!-- End of Sidebar -->
                    </div>
                    <div class="col-9">
                        <h2 class="page-header text-white mt-5">Opération de vente</h2>
                        <hr class="bg-white">
                        <div class="container mt-5">
                        <form id="frm-alumno formulaire" name="formulaire" action="index.php" method="post" enctype="multipart/form-data" >
                            <div class="row mb-3">
                                <div class="col">
                                    <select name="medicaments_id" id="medicaments_id" class="medicaments_id" class="form-group ml-2",>
                                        <option class="form-control" value="0" selected disabled>Selectionnez un employé</option>
                                        <?php while($i=$ps2->fetch()) { ?>
                                            <option class="form-control" value="<?php echo($i['id'])?>"><?php echo($i['libelle'])?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="employes_id" id="employes_id" class="form-group ml-2">
                                        <option class="form-control" value="0" selected disabled>Selectionnez un employé</option>
                                        <?php while($i=$ps->fetch()) { ?>
                                            <option class="form-control" value="<?php echo($i['id'])?>"><?php echo($i['prenom'].' '.$i['nom'])?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="clients_id" id="clients_id" class="form-group ml-2">
                                        <option class="form-control" value="0" selected disabled>Selectionnez un client</option>
                                        <?php while($i=$ps1->fetch()) { ?>
                                            <option class="form-control" value="<?php echo($i['id'])?>"><?php echo($i['denomination'])?></option>
                                        <?php } ?>
                                    </select>        
                                </div> 
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="number" id="quantite" class="form-control" name="quantite" placeholder="Quantite" required>
                                </div>
                                <div class="col">
                                    <input type="text" id="prix_unit" class="form-control" name="prix_unit" value="..." placeholder="Prix unitaire" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" id="remise" class="form-control" value="..." name="remise" placeholder="remise">      
                                </div>
                                <div class="col">
                                    <input type="date" id="date" class="form-control" value="<?php echo $time; ?>"  name="date" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col float-right mt-2">
                                    <button class="btn-primary " id="ajouter">Ajouter</button>
                                </div>
                            </div>
                            <div class="container-fluid mt-2">
                                <table class="table table-striped bg-white">
                                    <thead class="text-dark">
                                        <tr>
                                            <th>Id médicament</th>
                                            <th>Quantité</th>
                                            <th>Prix unitaire</th>
                                            <th>Prix total</th>
                                            <th>Remise</th>
                                            <th>Prix Net</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bodi">

                                    </tbody>
                                </table>
                                <button class="btn-success pull-right" id="terminer" name="ok">Terminer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted bg-dark text-center foot">
                <footer class="sticky-footer bg-dark">
                    <div class="container my-auto" >
                        <div class="copyright text-center my-auto">
                            <span class="copie">Copyright &copy; Your Website 2020</span> 
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../assets/js/demo/chart-area-demo.js"></script>
    <script src="../../assets/js/demo/chart-pie-demo.js"></script>
    <script>
       $(document).ready(function () {
            $('#medicaments_id').off('change').on('change',function(){
                var medicamentId = $(this).val();
                if(medicamentId){
                    $.get(
                        "ajouter_vente.php",
                        {medicaments_id: medicamentId},
                        function(data){
                            console.log(data);
                            $("#prix_unit").val(data);
                        }
                    )
                }else{
                    $("#prix_unit").html('<option>selectionner un médicament</option>');
                }
            });
            $('#clients_id').off('change').on('change',function(){
                var clientId = $(this).val();
                if(clientId){
                    $.get(
                        "ajouter.php",
                        {clients_id: clientId},
                        function(data){
                            console.log(data);
                            $("#remise").val(data);
                        }
                    )
                }else{
                    $("#remise").html('<option>selectionner un client</option>');
                }
            });
            $('#ajouter').click(function(e) {
                e.preventDefault();
                var medicament_id = $('#medicaments_id').val();
                var quantite = $('#quantite').val();
                var prix_unit = $('#prix_unit').val();
                var fidelite =$('#remise').val();
                var remise =parseInt((parseInt(prix_unit) * parseInt(fidelite))/100 * parseInt(quantite));
                var prix_total =parseInt(parseInt(quantite) * parseInt(prix_unit)).toFixed(2);
                var prix_net =(prix_total - remise).toFixed(2);
                $('#bodi').append('<tr>');
                $('#bodi').append('<td>' + medicament_id + '</td>');
                medicament_id = "";
                $('#bodi').append('<td>' + quantite + '</td>');
                quantite = "";
                $('#bodi').append('<td>' + prix_unit + '</td>');
                prix_unit = "";
                $('#bodi').append('<td>' + prix_total + '</td>');
                prix_total = "";
                $('#bodi').append('<td>' + remise + '</td>');
                remise = "";
                $('#bodi').append('<td>' + prix_net + '</td>');
                prix_net = "";
                $('#bodi').append('<td><a href="#"><i class="fas fa-pencil-alt text-primary mr-3"></i></a><a href="#"><i class="fas fa-times text-danger" style="font-size:24px"></td>');
                $('#bodi').append('</tr>');

            });
       });
    </script>
</body>
<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    });
</script>
<script type="text/javascript">
    var date=new Date();
    var heure=date.getHours();
    var minute=date.getMinutes();
    var seconde=date.getSeconds();
    var f = function(){
        if(seconde<59)
        seconde++;
        else{
            minute++;
            seconde=00;
        }
        if(minute>59){
            heure++;
            minute=00;
        }
        document.getElementById("horloge").textContent=heure+":"+minute+":"+seconde;
        setTimeout(f,1000);
    }
    setTimeout(f,1000);
    </script>


</html>