<?php
    require_once('../security.php');
    require_once('../role_admin.php');
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
                                        <a class="collapse-item" href="../operation/index.php">Opération de vente</a>
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
                                        <a class="collapse-item" href="index.php">Privilèges</a>
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
                        <h2 class="page-header text-white mt-5">id
                            <?php echo $privilege->id != null ? $privilege->id : ' Nouvel Enregistrement'; ?>
                        </h2>
                        <hr class="bg-white">
                        <div class="container mt-5">
                        <form id="frm-alumno" action="?c=privilege&a=Enregistrer" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                <input type="hidden" class="form-control" value="<?php echo $privilege->id; ?>" name="id">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                <input type="text" class="form-control" value="<?php echo $privilege->role; ?>" name="role" placeholder="privilège" required>
                                </div>
                                <div class="col">
                                    <button class="btn-danger mr-2" type="reset">Annuler</button>
                                    <button class="btn-success" type="submit" name="ok">Valider</button>
                                </div>
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

</body>
<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
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