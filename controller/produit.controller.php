<?php
require_once '../../model/produit.php';

class produitController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new produit();
    }
    
    public function Index(){
        require_once '../../view/produit/produit.php';
       
    }
    
    public function Crud(){
        $produit = new produit();
        
        if(isset($_REQUEST['id'])){
            $produit = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/produit/produit-editer.php';
        
    }
    
    public function Enregistrer(){
        $produit = new produit();
        
        $produit->id = $_REQUEST['id'];
        $produit->libelle = $_REQUEST['libelle'];
        $produit->description = $_REQUEST['description'];
        $produit->rayon = $_REQUEST['rayon'];
        $produit->etage = $_REQUEST['etage'];  
        $produit->prix_achat = $_REQUEST['prix_achat'];
        $produit->prix_vente = $_REQUEST['prix_vente'];
        $produit->familles_id = $_REQUEST['familles_id'];
        $produit->formes_id = $_REQUEST['formes_id'];  
      

        $produit->id > 0 
            ? $this->model->Maj($produit)
            : $this->model->Creer($produit);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}