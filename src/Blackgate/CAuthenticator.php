<?php
namespace Jofe\Blackgate;

class CAuthenticator implements \Anax\DI\IInjectionAware
{
	use \Anax\DI\TInjectable;

	private $options;
	private $output = null;

	public function __construct($options)
	{
		$this->$options = $options;
	}

	public function apply($id = null, $password = null)
	{
		strip_tags($id);
		strip_tags($password);

		$valid = validate($id, $password);

		if(!$valid){
			$this->output = "You have to enter the user id and password.";
		}else{

		}
	}

	private function compare()
	{

	}


	private function validate($id, $password)
	{
		if(empty($id) || empty($password)){
			return false;
		}

		return true;
	}
}