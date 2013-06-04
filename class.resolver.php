<?php
/*
 * lib resolver
 */
class resolver {
	
	private $get;
	
	private $post;
	
	public function __construct( $ctrl = false, $action = false ) {
		//set the request parameters
		$this->get = &$_GET;
		$this->post = &$_POST;
		//for redirecting from a controller
		if( $ctrl && $action ){
			header("Location: index.php?ctrl=$ctrl&action=$action");
			exit(0);
		}
	}
	
	public function handleRequest() {
		//Startpage if controler or action is not set
		if(!isset($this->get['ctrl'])) {
			header("Location: index.php");
			exit(0);
		}
		if (!isset($this->get['action'])) {
			$this->get['action'] = "view";
		}
		//include the model, create an instance and push it to the controller
		//more error handling is needed
		include_once 'mdl/class.' . $this->get['ctrl'] . '.php';
		$mdl_name = 'mdl_' . $this->get['ctrl'];
		$mdl = new $mdl_name( $this );
		//include the controller, create an instance and execute the action
		//more error handling is needed
		include_once 'ctrl/' . $this->get['ctrl'] . '.php';
		$ctrl = new $this->get['ctrl']( $mdl, $this );
		$action = $this->get['action'];
		//now the action can be executed
		$ctrl->$action();
	}
}
?>

