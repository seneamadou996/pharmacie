<?php
class produit
{
	private $pdo;
    
    public $id;
    public $libelle;
    public $description;
	public $rayon;
	public $etage;
	public $prix_achat;
	public $prix_vente;
	public $familles_id;
	public $formes_id;

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

			$stm = $this->pdo->prepare("SELECT *, familles.code, formes.forme
			FROM medicaments INNER JOIN familles ON medicaments.familles_id=familles.id
			INNER JOIN formes ON medicaments.formes_id=formes.id");
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
			          ->prepare("SELECT *, familles.code, formes.forme
					  FROM medicaments INNER JOIN familles ON medicaments.familles_id=familles.id
					  INNER JOIN formes ON medicaments.formes_id=formes.id WHERE id = ?");
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
			            ->prepare("DELETE FROM medicaments WHERE id = ?");			          

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
			$sql = "UPDATE medicaments SET 
                        libelle        = ?,
						description      		= ?,
						rayon          = ?, 
						etage          = ?,
						prix_achat          = ?,
						prix_vente          = ?,
						familles_id          = ?,
						formes_id          = ?
                        
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->libelle,
				    	$data->description, 
                        $data->rayon,                        
						$data->etage,
						$data->prix_achat,
						$data->prix_vente,
						$data->familles_id,
						$data->formes_id,
                       
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Creer(produit $data)
	{
		try 
		{
		$sql = "INSERT INTO medicaments (libelle,description,rayon,etage,prix_achat,prix_vente,familles_id,formes_id) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->libelle,
				    $data->description, 
                    $data->rayon,                        
					$data->etage,
					$data->prix_achat,
					$data->prix_vente,
					$data->familles_id,
					$data->formes_id 
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}