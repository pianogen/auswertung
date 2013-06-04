<?php 
class packages {
	private $package;
	private $resovler;
	
	public function __construct(mdl_packages $mdl, resolver $resolver){
		$this->package = $mdl;
		$this->resovler = $resovler;
	}
	
	public function view() {
		$button = "Speichern";
		$types = $this->package->getTypes();
		include "view/view_packages.php";
	}
	
	public function select() {
		$button = "Update";
		$packages = $this->package->getSpecificPackage();
		$updates = $this->package->updatesToPackages();
		$types = $this->package->getTypes();
		include_once 'view/view_packages.php';
	}
	
	public function speichern() {
		$res = $this->package->save();
		header("Location: index.php?ctrl=packages");
	}
	
	public function update() {
		$res = $this->package->update();
		header("Location: index.php?ctrl=packages");
	}
	
	public function delete() {
		$delete = $this->package->delete();
		header("Location: index.php?ctrl=search");
	}
}


?>