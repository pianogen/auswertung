<?php 
include_once "..\mdl\class.updates.php";
include_once "assert.php";

class mdl_updatesTest {
	private $assert;
	private $mdl;
	function __construct() {
		$this->assert = new assert();
		$this->mdl = new mdl_updates();
	}
	
	public function findIdTest() {
		$_GET['id'] = 5;
		$this->assert->assertNotNull("findId", $this->mdl->findId());
	}
	public function packagesToUpdatesTest() {
		$_GET['id'] = 7;
		$this->assert->assertNotNull("packagesToUpdates", $this->mdl->packagesToUpdate());
	}
	
	public function getPackagesTest(){
		$this->assert->assertNotNull("getPackages", $this->mdl->getPackages());
	}
	public function otherPackagesTest(){
		$_GET['id'] = 7;
		$this->assert->assertNotNull("otherPackages", $this->mdl->otherPackagesTest());
	}
	public function saveTest(){
		$_POST = array("name"=>"Test", "kb"=>"12345", "release"=>"14.02.1989");
		$this->assert->assertTrue("Save Update", $this->mdl->save());
	}
	
	public function updateTest(){
		$_POST = array("name"=>"Test", "kb"=>"12345", "release"=>"14.02.1989");
		$_GET['id'] = 123;
		$this->assert->assertTrue("Update Update", $this->mdl->update());
	}
	public function deleteTest() {
		$_GET['id'] = 123;
		$this->assert->assertTrue("Delete Update", $this->mdl->delete());
	}
}