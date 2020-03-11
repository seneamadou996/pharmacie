<?php
class client
{
	private $pdo;
    
    public $id;
    public $denomination;
	public $adresse;
	public $telephone;
	public $types_id;

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

			$stm = $this->pdo->prepare("SELECT *, types.type
			FROM clients INNER JOIN types ON clients.types_id=types.id");
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
			          ->prepare("SELECT *, types.type
					  FROM clients INNER JOIN types ON clients.types_id=types.id
					  WHERE id = ?");
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
			            ->prepare("DELETE FROM clients WHERE id = ?");			          

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
			$sql = "UPDATE clients SET 
                        denomination       = ?,
						adresse          = ?, 
						telephone          = ?,
						types_id      		= ?
                        
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->denomination, 
                        $data->adresse,                        
						$data->telephone,
						$data->types_id,
                       
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Creer(client $data)
	{
		try 
		{
		$sql = "INSERT INTO clients (denomination,adresse,telephone,types_id) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->denomination, 
                    $data->adresse,                        
					$data->telephone,
					$data->types_id 
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}