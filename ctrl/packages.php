<?php 
class packages {
	public $package;
	public $resovler;
	
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
	}
	
	public function update() {
		$res = $this->package->update();
	}
	
	public function delete() {
		$delete = $this->package->delete();
	}
}


?>