<?php 
include_once "..\mdl\class.search.php";
include_once "assert.php";

class mdl_searchTest {
	private $assert;
	private $mdl;
	function __construct() {
		$this->assert = new assert();
		$this->mdl = new mdl_packages();
	}
	public function findAllUpdatesTest(){
		$this->assert->assertNotNull("findAllUpdates", $this->mdl->findAllUpdates());
	}
	
	public function findSpecificPackageTest(){
		$_POST['type'] = "Client";
		$this->assert-assertNotNull("findSpecificPackage", $this->mdl->findSpecificPackage());
	}
	public function findSpecificUpdatesTest(){
		$_POST['kb'] = 3;
		$this->assert-assertNotNull("findSpecificUpdates", $this->mdl->findSpecificUpdates());
	}
	public function getTypesTest() {
		$this->assert->assertNotNull("getTypes", $this->mdl->getTypes());
	}
}
?>