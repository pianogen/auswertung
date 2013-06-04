<?php 
class mdl_updates {
	private $con;
	
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
		$sql = "SELECT id,Name,kb, CONVERT(char(10),release,104),CONVERT(char(10),decline,104),CONVERT(char(10),approve_clt,104),CONVERT(char(10),approve_srv,104) FROM dbo.updates WHERE Id='$id'";
		$res = sqlsrv_query($this->con,$sql);
		if ($res === false){
			die (print_r (sqlsrv_errors(), true));
		}
		return (sqlsrv_fetch_array($res, SQLSRV_FETCH_NUMERIC));
	}
	public function packagesToUpdate(){
		$sql = "SELECT P.* FROM dbo.updates U, dbo.package P, dbo.updates_packages UP WHERE U.Id = ? AND UP.updateId = U.Id AND P.id = UP.packageId";
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
		$sql = "SELECT * FROM dbo.package";
		$res = sqlsrv_query($this->con,$sql,$params);
		if ($res === false) {
			die (print_r(sql_srv_errors(), true));
		}
		while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)){
			$array[] = $row;
		}
		return $array;
	}
	public function otherPackages(){
		$sql = "SELECT * FROM dbo.package WHERE id NOT IN (SELECT P.id FROM dbo.updates U, dbo.package P, dbo.updates_packages UP WHERE U.Id = ? AND UP.updateId = U.Id AND P.id = UP.packageId)";
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
	
	
	public function save() {
		$sql = "INSERT INTO dbo.updates (Name,kb,release,decline,approve_clt,approve_srv)
				VALUES (?,?,?,?,?,?); SELECT SCOPE_IDENTITY()";
		$this->emptyDates();
		$array = array($_POST['name'],$_POST['kb'],$_POST['release'],$_POST['decline'],$_POST['approve_clt'],$_POST['approve_srv']);
		$res = sqlsrv_query($this->con,$sql,array_values($array));
		sqlsrv_next_result($res);
		$id = sqlsrv_fetch_array( $res, SQLSRV_FETCH_NUMERIC);
		$insert = "INSERT INTO dbo.updates_packages (packageId, updateId) VALUES (?,?)";
		foreach ($_POST['unappr'] as $unappr){
			$params = array($unappr, $id[0]);
			sqlsrv_query($this->con,$insert,$params);
		}
		if ($res === false){
			die (print_r (sqlsrv_errors(), true));
		}
	}
	
	public function update(){
			$sql = "UPDATE dbo.updates SET Name=?, kb=?, release=?, decline=?, approve_clt=?, approve_srv=? WHERE Id =?";
			$delete = "DELETE FROM dbo.updates_packages WHERE packageId = ? AND updateId = ?";
			$insert = "INSERT INTO dbo.updates_packages (packageId, updateId) VALUES (?,?)";
			$this->emptyDates();
			$params = array($_POST['name'],$_POST['kb'],$_POST['release'],$_POST['decline'],$_POST['approve_clt'],$_POST['approve_srv']);
			array_push($params, $_GET['id']);
			$res = sqlsrv_query($this->con,$sql,$params);
			foreach ($_POST['unappr'] as $unappr){
				$params = array($unappr, $_GET['id']);
				sqlsrv_query($this->con,$insert,$params);
			}
			foreach ($_POST['appr'] as $appr) {
				$params = array($appr, $_GET['id']);
				sqlsrv_query($this->con,$delete,$params);
			}
			return $res;
	}
	
	private function emptyDates(){
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
		$sql1 = "DELETE FROM dbo.updates_packages WHERE updateId = ?";
		$params = array($_GET['id']);
		if (sqlsrv_query($this->con, $sql1, $params)){
			$sql2 = "DELETE FROM dbo.updates WHERE Id = ?";
			if (!sqlsrv_query($this->con, $sql2, $params)){
				die (print_r(sql_srv_errors(), true));
			}
		}
		else {
			die (print_r(sqlsrv_errors(), true));
		}
		return "Update wurde erfolgreicht gelöscht";	
	}
		
	public function __destruct(){
		sqlsrv_close($this->con);	
	}
	
}

?>