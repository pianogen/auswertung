<?php 
include_once "..\mdl\class.packages.php";
include_once "assert.php";

class mdl_packagesTest {

	private $assert;
	private $mdl;
		function __construct() {
			$this->assert = new assert();
			$this->mdl = new mdl_packages();
		}
		
		function updatesToPackagesTest() {
			$_GET['id'] = 7;
			$this->assert->assertNotNull("UpdatesToPackages", $this->mdl->updatesToPackages());
		}
		
		function getSpecificPackageTest() {
			$_GET['id'] = 7;
			$this->assert->assertNotNull("getSpecificPackage", $this->mdl->getSpecificPackage());
		}
		
		function saveTest() {
			$_POST = array("xxx", 2);
			$this->assert->assertTrue("save", $this->mdl->save());
		}
		
		function deleteTest() {
			$_GET['id'] = 47;
			$this->assert->assertTrue("delete", $this->mdl->delete());
		}
		
		function deleteFalseIdTest() {
			$_GET['id'] = 1000;
			$this->assert->assertFalse("deleteFalseId", $this->mdl->delete());
		}
		
		function getTypesTest() {
			$this->assert->assertNotNull("getTypes", $this->mdl->getTypes());
		}
}

?>