<?php
namespace Jofe\Blackgate;

class COptionsTest extends \PHPUnit_Framework_TestCase
{
	public function testGetDB(){

		$el = new \Jofe\BlackGate\COptions();

		$res = get_class($el->getDB());
		$exp = 'Jofe\Testing\CDatabaseBasic';

		$this->assertEquals($res, $exp, "Created element name missmatch.");
	}

	public function testSetTableName(){
		$el = new \Jofe\Blackgate\COptions();
		$el->setTableName('userz');

		$res = $el->getTableName();
		$exp = 'userz';

		$this->assertEquals($res, $exp, "Created element name missmatch.");

	}

	public function testSetIdColName(){
		$el = new \Jofe\Blackgate\COptions();
		$el->setIdColName('userID');

		$res = $el->getIdColName();
		$exp = 'userID';

		$this->assertEquals($res, $exp, "Created element name missmatch.");		
	}

	public function testSetPassColName(){
		$el = new \Jofe\Blackgate\COptions();
		$el->setPassColName('userPassword');

		$res = $el->getPassColName();
		$exp = 'userPassword';

		$this->assertEquals($res, $exp, "Created element name missmatch.");		
	}

	public function testSetActColName(){
		$el = new \Jofe\Blackgate\COptions();
		$el->setActColName('act');

		$res = $el->getActColName();
		$exp = 'act';

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}

	public function testSetSalt(){
		$el = new \Jofe\Blackgate\COPtions();
		$el->setSalt(PASSWORD_BCRYPT);

		$res = $el->getSalt();
		$exp = PASSWORD_BCRYPT;

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
		
	}

	public function TestGetTableName(){
		$el = new \Jofe\Blackgate\COPtions();
		$res = $el->getSalt();
		$exp = 'users';

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}

	public function TestGetIdColName(){
		$el = new \Jofe\Blackgate\COPtions();

		$res = $el->getSalt();
		$exp = 'acronym';

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}

	public function TestGetPassColName(){
		$el = new \Jofe\Blackgate\COPtions();

		$res = $el->getSalt();
		$exp = 'password';

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}

	public function TestGetSalt(){
		$el = new \Jofe\Blackgate\COPtions();

		$res = $el->getSalt();
		$exp = PASSWORD_DEFAULT;

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}

	public function TestGetActColName(){
		$el = new \Jofe\Blackgate\COPtions();

		$res = $el->getSalt();
		$exp = 'active';

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}

	public function TestGetDelColName(){
		$el = new \Jofe\Blackgate\COPtions();

		$res = $el->getSalt();
		$exp = 'deleted';

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}


}