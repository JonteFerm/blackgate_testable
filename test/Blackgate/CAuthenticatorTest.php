<?php
namespace Jofe\Blackgate;

class CAuthenticatorTest extends \PHPUnit_Framework_TestCase
{
	public function testApply(){

		$options = new \Jofe\Blackgate\COptions();
		$el = new \Jofe\Blackgate\CAuthenticator($options);

		$res = $el->apply('doe', 'doe');
		$exp = true;

		$this->assertEquals($res, $exp, "Created element name missmatch.");

		$res2 = $el->apply('', 'doe');
		$exp2 = false;

		$this->assertEquals($res2, $exp2, "Created element name missmatch.");

		$res3 = $el->apply('doe', 'doee');
		$exp3 = false;

		$this->assertEquals($res3, $exp3, "Created element name missmatch.");
	}

	public function testGetOutput(){
		$options = new \Jofe\Blackgate\COptions();
		$el = new \Jofe\Blackgate\CAuthenticator($options);

		$el->apply('doe', 'doe');
		$res = $el->getOutPut();
		$exp = "Access granted.";

		$this->assertEquals($res, $exp, "Created element name missmatch.");
	}



}