<?php
class vente
{
	private $pdo;
    
    public $id;
	public $quantite;
	public $prix_unit;
	public $remise;
	public $prix_total;
	public $date;
    public $employes_id;
	public $clients_id;

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

			$stm = $this->pdo->prepare("SELECT * FROM ventes");
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
			          ->prepare("SELECT * FROM ventes WHERE  ventes.id = ?");
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
			            ->prepare("DELETE FROM ventes WHERE ventes.id = ?");			          

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
			$sql = "UPDATE ventes SET 
						quantite        = ?,
						prix_unit        = ?,
						remise        = ?,
						prix_total        = ?,
                        date        = ?,
						employes_id      		= ?,
						clients_id          = ?
                        
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->quantite,
						$data->prix_unit,
						$data->remise,
						$data->prix_total,
						$data->date,
				    	$data->employes_id, 
                        $data->clients_id,                        
                       
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Creer(vente $data)
	{
		try 
		{
		$sql = "INSERT INTO ventes (quantite,prix_unit,remise,prix_total,date,employes_id,clients_id) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->quantite,
					$data->prix_unit,
					$data->remise,
					$data->prix_total,
					$data->date,
					$data->employes_id, 
					$data->clients_id 
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}