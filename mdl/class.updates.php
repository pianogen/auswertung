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
	public function packagesToUpdate(){
		$sql = "Select P.* from dbo.updates U, dbo.package P, dbo.updates_packages UP WHERE U.Id = ? AND UP.updateId = U.Id AND P.id = UP.packageId";
		$params = array($_GET['id']);
		$res = sqlsrv_query($this->con,$sql,$params);
		if ($res === false) {
			die (print_r(sql_srv_errors(), true));
		}
		while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)){
			$array[] = $row;
		}
		return $array;
		
	}
	
	public function getPackages() {
		$sql = "Select * from dbo.package";
		$res = sqlsrv_query($this->con, $sql);
		if ($res === false) {
			die (print_r(sql_srv_errors(), true));
		}
		while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)){
			$array[] = $row;
		}
		return $array;
	}
	
	public function save() {
		$sql = "INSERT into dbo.updates (Name,kb,release,decline,approve_clt,approve_srv)
				VALUES (?,?,?,?,?,?)";
		$this->emptyDates();
		$res = sqlsrv_query($this->con,$sql,array_values($_POST));
		if ($res === false){
			die (print_r (sqlsrv_errors(), true));
		}
	}
	
	public function update(){
		$sql = "Update dbo.updates SET Name=?, kb=?, release=?, decline=?, approve_clt=?, approve_srv=? WHERE Id =?";
		$this->emptyDates();
		$params = array_values($_POST);
		array_push($params, $_GET['id']);
		$res = sqlsrv_query($this->con,$sql,$params);
		return $res;
	}
	
	public function emptyDates(){
		if ($_POST['decline'] === ""){
			$_POST['decline'] = NULL;
		}
		if ($_POST['approve_clt'] === ""){
			$_POST['approve_clt'] = NULL;
		}
		if ($_POST['approve_srv'] === ""){
			$_POST['approve_srv'] = NULL;
		} 
	}
	
	public function delete() {
		$sql = "DELETE from dbo.updates WHERE Id=?";
		$params = array($_GET['id']);
		print_r($params);
		$res = sqlsrv_query($this->con,$sql,$params);
		
	}
	
	public function __destruct(){
		sqlsrv_close($this->con);	
	}
	
}

?>