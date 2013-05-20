<?php 
class mdl_updates {
	public $con;
	
	public function __construct(){
		$serverName = "(local)";
		$conInfo = array("Database"=>"WSUSAuswertung", "UID"=>"php", "PWD"=>"ProBook6470b");
		$this->con = sqlsrv_connect($serverName, $conInfo);
		if ($this->con === false) {
			die (print_r (sqlsrv_errors(), true));
		}
	}
	public function findId(){
		$id = $_GET['id'];
		$sql = "Select id,Name,kb, convert(char(10),release,104),convert(char(10),decline,104),convert(char(10),approve_clt,104),convert(char(10),approve_srv,104) from dbo.updates where Id='$id'";
		$res = sqlsrv_query($this->con,$sql);
		if ($res === false){
			die (print_r (sqlsrv_errors(), true));
		}
		return (sqlsrv_fetch_array($res, SQLSRV_FETCH_NUMERIC));
	}
	
	public function save() {
		$name = $_POST['Name'];
		$kb = $_POST['kb'];
		$release = $_POST['release'];
		$decline = $_POST['decline'];
		$approve_clt = $_POST['approve_clt'];
		$approve_srv = $_POST['approve_srv'];
		echo $release;
		$sql = "Insert into dbo.updates (Name,kb,release,decline,approve_clt,approve_srv)
				VALUES ('$name','$kb','$release','$decline','$approve_clt','$approve_srv')"; 
		$res = $sqlsrv_query($this->con,$sql);
		if ($res === false){
			die (print_r (sqlsrv_errors(), true));
		}
		return $res;
	}
	
	public function update(){
		$sql = "Update dbo.updates SET Name='$name', kb='$kb', release='$release', decline='$decline', approve='$approve' WHERE Id = '$id'";
		$res = $sqlsrv_query($this->con,$sql);
		return $res;
	}
	
	public function delete($id) {
		$sql = "DELETE from dbo.updates WHERE Id='$id'";
	}
	
}

?>