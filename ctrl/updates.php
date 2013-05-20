<?php 

class updates {
	public $update;
	public $resolver;
	
	public function __construct( mdl_updates $mdl, resolver $resolver){
		$this->update = $mdl;
		$this->resovler = $resolver;
	}
	
	public function view(){
		$button = "Speichern";
		include_once 'view/view_updates.php';
	}
	
	public function select() {
		$update = $this->update->findId();
		$button = "Update";
		include_once 'view/view_updates.php';
	}
	
	public function Speichern() {
		$save = $this->update->save();
	}
}