<?php class assert {

	public function assertTrue($name, $object) {
		if ($object) {
			echo "Der Test $name wurde erfolgreich abgeschlossen\n";
		}
		else {
			echo "Der Test $name ist fehlgeschlagen\n";
		}	
	}
	
	public function assertFalse($name, $object) {
		if (!$object){
			echo $object;
			echo "Der Test $name wurde erfolgreich abgeschlossen\n";
		}
		else {
			echo "Der Test $name ist fehlgeschlagen\n";
		}
	}
	
	public function assertNull($name, $object) {
		if ($object === NULL){
			echo "Der Test $name wurde erfolgreich abgeschlossen\n";
		}
		else {
			echo "Der Test $name ist fehlgeschlagen\n";
		}	
	}
	
	public function assertNotNull($name, $object) {
		if ($object !== NULL){
			echo "Der Test $name wurde erfolgreich abgeschlossen\n";
		}
		else {
			echo "Der Test $name ist fehlgeschlagen\n";
		}	
	}
}
	