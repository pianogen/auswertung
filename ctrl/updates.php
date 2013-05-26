<?php 

class updates {
	public $update;
	public $resolver;
	
	public function __construct( mdl_updates $mdl, resolver $resolver){
		$this->update = $mdl;
		$this->resovler = $resolver;
		$title = "Update Manamgenent";
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
	}
	
	public function update() {
		$res = $this->update->update();
	}
	
	public function delete() {
		$res = $this->update->delete();
		header("Location: index.php?ctrl=search");
		exit(0);
	}
}