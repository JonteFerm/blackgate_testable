<?php
namespace Jofe\Blackgate;

class COptionsTest extends \PHPUnit_Framework_TestCase
{
	public function testGetDB(){

		$el = new \Jofe\Blackgate\COptions();

		$res = get_class($el->getDB());
		$exp = 'Testing\CDatabaseBasic';

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

	public function testSetDelColName(){
		$el = new \Jofe\Blackgate\COPtions();
		$el->setDelColName('removed');

		$res = $el->getDelColName();
		$exp = 'removed';

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

	public function testGetTableName(){
		$el = new \Jofe\Blackgate\COPtions();
		$res = $el->getTableName();
		$exp = 'users';

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}

	public function testGetIdColName(){
		$el = new \Jofe\Blackgate\COPtions();

		$res = $el->getIdColName();
		$exp = 'acronym';

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}

	public function testGetPassColName(){
		$el = new \Jofe\Blackgate\COPtions();

		$res = $el->getPassColName();
		$exp = 'password';

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}

	public function testGetSalt(){
		$el = new \Jofe\Blackgate\COPtions();

		$res = $el->getSalt();
		$exp = PASSWORD_DEFAULT;

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}

	public function testGetActColName(){
		$el = new \Jofe\Blackgate\COPtions();

		$res = $el->getActColName();
		$exp = 'active';

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}

	public function testGetDelColName(){
		$el = new \Jofe\Blackgate\COPtions();

		$res = $el->getDelColName();
		$exp = 'deleted';

		$this->assertEquals($res, $exp, "Created element name missmatch.");	
	}


}