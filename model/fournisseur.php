<?php
class fournisseur
{
	private $pdo;
    
    public $id;
    public $code;
    public $denomination;
	public $adresse;
	public $telephone;

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

			$stm = $this->pdo->prepare("SELECT * FROM fournisseurs");
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
			          ->prepare("SELECT * FROM fournisseurs WHERE id = ?");
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
			            ->prepare("DELETE FROM fournisseurs WHERE id = ?");			          

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
			$sql = "UPDATE fournisseurs SET 
                        code        = ?,
						denomination      		= ?,
						adresse          = ?, 
						telephone          = ?
                        
						
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->code,
				    	$data->denomination, 
                        $data->adresse,                        
						$data->telephone,
                       
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Creer(fournisseur $data)
	{
		try 
		{
		$sql = "INSERT INTO fournisseurs (code,denomination,adresse,telephone) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->code, 
					$data->denomination, 
                    $data->adresse,
                    $data->telephone 
                   
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}