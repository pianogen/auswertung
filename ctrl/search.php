<?php 
class search {
	public $search;
	public $resolver;
	
	public function __construct( mdl_search $mdl, resolver $resolver){
		$this->search = $mdl;
		$this->resovler = $resolver;
	}
	
	public function view(){
		$updates = $this->search->findAllUpdates();
		include_once 'view/view_search.php';
	}
}

?>