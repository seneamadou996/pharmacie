<?php
class ligne
{
	private $pdo;
    
    public $id;
	public $numero;
	public $pharmaciens_id;

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

			$stm = $this->pdo->prepare("SELECT lignecommandes.id,lignecommandes.pharmaciens_id,lignecommandes.numero,users.prenom,users.nom
			FROM pharmaciens INNER JOIN lignecommandes ON lignecommandes.pharmaciens_id=pharmaciens.id
			INNER JOIN users ON pharmaciens.users_id=users.id");
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
			          ->prepare("SELECT lignecommandes.id,lignecommandes.numero,users.prenom,users.nom
					  FROM pharmaciens INNER JOIN lignecommandes ON lignecommandes.pharmaciens_id=pharmaciens.id
					  INNER JOIN users ON pharmaciens.users_id=users.id WHERE lignecommandes.id = ?");
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
			            ->prepare("DELETE FROM lignecommandes WHERE id = ?");			          

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
			$sql = "UPDATE lignecommandes SET 
                        numero           = ?,
						pharmaciens_id = ?
                        
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->numero,
						$data->pharmaciens_id,
                       
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Creer(ligne $data)
	{
		try 
		{
		$sql = "INSERT INTO lignecommandes (numero,pharmaciens_id) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->numero,
					$data->pharmaciens_id
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}