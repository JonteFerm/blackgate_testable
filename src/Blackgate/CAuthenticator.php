<?php
namespace Jofe\Blackgate;

class CAuthenticator
{
	private $options;
	private $output = null;
	private $db;

	public function __construct(COptions $options)
	{
		$this->options = $options;
		$this->db = $options->getDB();
	}

	public function apply($id = null, $password = null)
	{
		strip_tags($id);
		strip_tags($password);

		$valid = $this->validate($id, $password);
 
		if(!$valid){
			$this->output = "You have to enter the user id and password.";

			
		}
		$this->compare($id, $password);
		return $this->output;
	}

	private function compare($id, $password)
	{
		$idCol = $this->options->getIdColName();
		$sql = "SELECT * FROM user WHERE $idCol = ?;";
		$res = $this->db->executeFetchAll($sql, array($id));
		echo  print_r($res);
	}


	private function validate($id, $password)
	{
		if(empty($id) || empty($password)){
			return false;
		}

		return true;
	}
}