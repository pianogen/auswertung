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
		$types = $this->search->getTypes();
		include_once 'view/view_search.php';
		include_once 'view/view_search_updates.php';
	}
	
	public function specificPackage() {
		$packages = $this->search->findSpecificPackage();
		$types = $this->search->getTypes();
		include_once 'view/view_search.php';
		include_once 'view/view_search_package.php';
	}
	
	public function specificUpdate() {
		$updates = $this->search->findSpecificUpdates();
		$types = $this->search->getTypes();
		include_once 'view/view_search.php';
		include_once 'view/view_search_updates.php';
	}
	
}

?>