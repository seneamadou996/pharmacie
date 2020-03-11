<?php
require_once '../../model/vente.php';

class venteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new vente();
    }
    
    public function Index(){
        require_once '../../view/operation/vente.php';
       
    }
    
    public function Crud(){
        $vente = new vente();
        
        if(isset($_REQUEST['id'])){
            $vente = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/operation/vente-editer.php';
        
    }
    
    public function Enregistrer(){
        $vente = new vente();
        
        $vente->id = $_REQUEST['id'];
        $vente->quantite = $_REQUEST['quantite'];
        $vente->prix_unit = $_REQUEST['prix_unit'];
        $vente->remise = $_REQUEST['remise'];
        $vente->prix_total = $_REQUEST['prix_total'];
        $vente->date = $_REQUEST['date'];
        $vente->employes_id = $_REQUEST['employes_id'];
        $vente->clients_id = $_REQUEST['clients_id'];    
      

        $vente->id > 0 
            ? $this->model->Maj($vente)
            : $this->model->Creer($vente);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}