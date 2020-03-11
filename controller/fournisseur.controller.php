<?php
require_once '../../model/fournisseur.php';

class fournisseurController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new fournisseur();
    }
    
    public function Index(){
        require_once '../../view/fournisseur/fournisseur.php';
       
    }
    
    public function Crud(){
        $fournisseur = new fournisseur();
        
        if(isset($_REQUEST['id'])){
            $fournisseur = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/fournisseur/fournisseur-editer.php';
        
    }
    
    public function Enregistrer(){
        $fournisseur = new fournisseur();
        
        $fournisseur->id = $_REQUEST['id'];
        $fournisseur->code = $_REQUEST['code'];
        $fournisseur->denomination = $_REQUEST['denomination'];
        $fournisseur->adresse = $_REQUEST['adresse'];
        $fournisseur->telephone = $_REQUEST['telephone'];    
      

        $fournisseur->id > 0 
            ? $this->model->Maj($fournisseur)
            : $this->model->Creer($fournisseur);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}