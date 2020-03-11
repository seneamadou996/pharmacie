<div class="col-3">
                          <!-- Sidebar -->
                        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

                            <!-- Sidebar - Brand -->
                            <!-- Divider -->
                            <hr class="sidebar-divider my-0">

                            <!-- Nav Item - Dashboard -->
                            <li class="nav-item active row">
                                <a class="nav-link col" href="index.php">
                                    <i class="fas fa-fw fa-tachometer-alt"></i>
                                    <span>Accueil</span>
                                </a>
                                <a class="nav-link col btn btn-circle text-dark mt-2 pb-4 mr-3 btn-sm col-md-4 text-center bg-white" href="logOut.php">
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
                                        <a class="collapse-item" href="fournisseur/index.php">Liste de fournisseurs</a>
                                        <a class="collapse-item" href="ligne/index.php">Ligne de commande</a>
                                        <a class="collapse-item" href="commande/index.php">Commande fournisseur</a>

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
                                        <a class="collapse-item" href="famille/index.php">Famille produit</a>
                                        <a class="collapse-item" href="produit/index.php">Produit</a>
                                        <a class="collapse-item" href="produit-dispo/index.php">Produits disposnibles</a>
                                        <a class="collapse-item" href="produit-peremp/index.php">Produit périmé</a>
                                        <a class="collapse-item" href="stockage/index.php">Stockage médicament</a>
                                        <a class="collapse-item" href="stock/index.php">Stock</a>
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
                                        <a class="collapse-item" href="client/index.php">Client</a>
                                        <a class="collapse-item" href="institution/index.php">Institution</a>
                                        <a class="collapse-item" href="operation/index.php">Opération de vente</a>
                                        <a class="collapse-item" href="produit-vendus/index.php">Produits vendus</a>
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
                                        <a class="collapse-item" href="personnel/index.php">Peronnel</a>
                                        <a class="collapse-item" href="#">Fiche de salaire</a>
                                        <a class="collapse-item" href="#">Liste paiement</a>
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
                                        <a class="collapse-item" href="reglement-four/index.php">Réglement fournisseur</a>
                                        <a class="collapse-item" href="reglement-client/index.php">Réglement client</a>
                                        <a class="collapse-item" href="approvisionnement/index.php">Approvisionnement</a>
                                        <a class="collapse-item" href="situation/index.php">Situation caisse</a>
                                        <a class="collapse-item" href="depense/index.php">Dépenses</a>
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
                                        <a class="collapse-item" href="utilisateur/index.php">Utilisateur</a>
                                        <a class="collapse-item" href="pharmacien/index.php">pharmacien</a>
                                        <a class="collapse-item" href="privilege">Privilèges</a>
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