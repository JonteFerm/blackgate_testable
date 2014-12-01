<?php
namespace Jofe\Blackgate;

class COptions implements \Anax\DI\IInjectionAware
{
	use \Anax\DI\TInjectable;

	private $dBase; //The CDatabaseBasic object.
	private $tableName = 'users'; //Name of the table storing the user information.
	private $idColName = 'acronym'; //Name of the identification column.
	private $passColName = 'password'; //Name of the password column.
	private $actColName = 'active';//Name of the activate columnn.
	private $delColName = 'deleted'; //Name of the deleted column.
	private $salt = PASSWORD_DEFAULT; //The salt which the password is hashed with.

	public function initialize()
	{
	    $this->dBase = $this->db;
	}

	public function setTableName($tableName){
		$this->tableName = $tableName;
	}

	public function setIdColName($idColName){
		$this->idColName = $idColName;
	}

	public function setPassColName($passColName){
		$this->passColName = $passColName;
	}

	public function setActColName($actColName){
		$this->actColName = $actColName;
	}

	public function setDelColName($delColName){
		$this->delColName = $delColName;
	}

	public function setSalt($salt){
		$this->salt = $salt;
	}

	public function getDB(){
		return $this->db;
	}

	public function getTableName(){
		return $this->tableName;
	}

	public function getIdColName(){
		return $this->idColName;
	}

	public function getPassColName(){
		return $this->passColName;
	}

	public function getSalt(){
		return $this->salt;
	}

	public function getActColName(){
		return $this->actColName;
	}

	public function getDelColName(){
		return $this->delColName;
	}

}