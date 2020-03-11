<?php
require_once '../../model/institution.php';

class institutionController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new institution();
    }
    
    public function Index(){
        require_once '../../view/institution/institution.php';
       
    }
    
    public function Crud(){
        $institution = new institution();
        
        if(isset($_REQUEST['id'])){
            $institution = $this->model->Obtenir($_REQUEST['id']);
        }
        require_once '../../view/institution/institution-editer.php';
        
    }
    
    public function Enregistrer(){
        $institution = new institution();
        
        $institution->id = $_REQUEST['id'];
        $institution->taux_pris_charge = $_REQUEST['taux_pris_charge'];
        $institution->fidelite = $_REQUEST['fidelite'];
        $institution->clients_id = $_REQUEST['clients_id'];  
      

        $institution->id > 0 
            ? $this->model->Maj($institution)
            : $this->model->Creer($institution);
        
        header('Location: index.php');
    }
    
    public function Supprimer(){
        $this->model->Supprimer($_REQUEST['id']);
        header('Location: index.php');
    }
}