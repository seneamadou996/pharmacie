<?php
class commande
{
	private $pdo;
    
	public $id;
	public $numero_com;
	public $quantite;
	public $prix_unit;
    public $date_commande;
	public $fournisseurs_id;
	public $medicaments_id;
	public $lignecommandes_id;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Lister()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT commandes.id,commandes.numero_com,commandes.quantite,commandes.prix_unit,
			commandes.date_commande,fournisseurs.denomination,medicaments.libelle,
			lignecommandes.numero FROM commandes JOIN fournisseurs 
			ON fournisseurs.id=commandes.fournisseurs_id JOIN medicaments 
			ON medicaments.id=commandes.medicaments_id JOIN lignecommandes
			ON lignecommandes.id=commandes.lignecommandes_id");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtenir($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM commandes WHERE id = ?");
			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Supprimer($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM commandes WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Maj($data)
	{
		try 
		{
			$sql = "UPDATE commandes SET 
						numero_com        = ?,
                        quantite        = ?,
						prix_unit        = ?,
						date_commande      		= ?,
						fournisseurs_id          = ?, 
						medicaments_id          = ?,
						lignecommandes_id          = ?
                        
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->numero_com,
						$data->quantite,
						$data->prix_unit,
				    	$data->date_commande, 
                        $data->fournisseurs_id,                        
						$data->medicaments_id,
						$data->lignecommandes_id,
                       
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Creer(commande $data)
	{
		try 
		{
		$sql = "INSERT INTO commandes (numero_com,quantite,prix_unit,date_commande,fournisseurs_id,medicaments_id,lignecommandes_id) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->numero_com,
					$data->quantite,
					$data->prix_unit,
				    $data->date_commande, 
                    $data->fournisseurs_id,                        
					$data->medicaments_id,
					$data->lignecommandes_id
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}