<?php
require_once '../../model/commande.php';

class commandeController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new commande();
    }
    
    public function Index(){
        require_once '../../view/commande/commande.php';
       
    }
    
    public function Crud(){
        $commande = new commande();
        
        if(isset($_REQUEST['id'])){
            $commande = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/commande/commande-editer.php';
        
    }
    
    public function Enregistrer(){
        $commande = new commande();
        
        $commande->id = $_REQUEST['id'];
        $commande->numero_com = $_REQUEST['numero_com'];
        $commande->quantite = $_REQUEST['quantite'];
        $commande->prix_unit = $_REQUEST['prix_unit'];
        $commande->date_commande = $_REQUEST['date_commande'];
        $commande->fournisseurs_id = $_REQUEST['fournisseurs_id'];
        $commande->medicaments_id = $_REQUEST['medicaments_id'];    
        $commande->lignecommandes_id = $_REQUEST['lignecommandes_id'];

        $commande->id > 0 
            ? $this->model->Maj($commande)
            : $this->model->Creer($commande);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}