<?php 

class updates {
	private $update;
	private $resolver;
	
	public function __construct( mdl_updates $mdl, resolver $resolver){
		$this->update = $mdl;
		$this->resovler = $resolver;
	}
	
	public function view(){
		$button = "Speichern";
		$noPack = $this->update->getPackages();
		include_once 'view/view_updates.php';
	}
	
	public function select() {
		$updates = $this->update->findId();
		$packages = $this->update->packagesToUpdate();
		$noPack = $this->update->otherPackages();
		$button = "Update";
		include_once 'view/view_updates.php';
	}
	
	public function Speichern() {
		$res = $this->update->save();
		include_once 'view/resultat.php';
	}
	
	public function update() {
		$res = $this->update->update();
		include_once 'view/resultat.php';
	}
	
	public function delete() {
		$res = $this->update->delete();
		include_once 'view/resultat.php';
	}
}