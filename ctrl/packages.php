<?php 
class packages {
	public $package;
	public $resovler;
	
	public function __construct(mdl_packages $mdl, resolver $resolver){
		$this->package = $mdl;
		$this->resovler = $resovler;
	}
	
	public function view() {
		$types = $this->package->getTypes();
		include "view/view_packages.php";
	}
	public function select() {
		$packages = $this->package->getSpecificPackage();
		$updates = $this->package->updatesToPackages();
		$types = $this->package->getTypes();
		include_once 'view/view_packages.php';
	}
}


?>