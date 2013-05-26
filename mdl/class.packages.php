<?php 
class mdl_packages {
	public $con;
	
	public function __construct() {
		$serverName = "(local)";
		$conInfo = array("Database"=>"WSUSAuswertung", "UID"=>"php", "PWD"=>"ProBook6470b");
		$this->con = sqlsrv_connect($serverName, $conInfo);
		if ($this->con === false) {
			die (print_r (sqlsrv_errors(), true));
		}
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
	
	public function updatesToPackages() {
		$sql = "Select U.id, U.Name, U.kb, convert(char(10),U.release,104),convert(char(10),U.decline,104),convert(char(10),U.approve_clt,104),convert(char(10),U.approve_srv,104)from dbo.updates U, dbo.package P, dbo.updates_packages UP WHERE P.id = ? AND UP.packageId = P.id AND U.Id = UP.updateId order by U.release DESC";
		$params = array($_GET['id']);
		$res = sqlsrv_query($this->con,$sql,$params);
		if ($res === false) {
			die (print_r(sql_srv_errors(), true));
		}
		while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_NUMERIC)){
			$array[] = $row;
		}
		return $array;
		
	}
	
	public function getSpecificPackage() {
		$sql = "Select * from dbo.package WHERE id=?";
		$params = array($_GET['id']);
		$res = sqlsrv_query($this->con, $sql,$params);
		if ($res === false) {
			die (print_r(sql_srv_errors(), true));
		}
		return (sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC));
	}
	
	public function save(){
		$sql = "INSERT INTO dbo.package (name, typeId) VALUES (?, ?)";
		$params = array_values($_POST);
		$res = sqlsrv_query($this->con, $sql,$params);
		if (!$res) {
			die(print_r(sqlsrv_errors(), true));
		}
		return $res;		
	}
	
	public function update() {
		$sql = "UPDATE dbo.package SET name = ?, typeID = ? WHERE id= ?";
		$params = array_values($_POST);
		array_push($params, $_GET['id']);
		$res = sqlsrv_query($this->con, $sql,$params);
		return $res;
	}
	
	public function delete() {
		$params = array($_GET['id']);
		$sql1 = "DELETE FROM dbo.updates_packages WHERE packageId=?";
		if (sqlsrv_query($this->con, $sql1, $params)){
			$sql2 = "DELETE FROM dbo.package WHERE id = ?";
			if (!sqlsrv_query($this->con, $sql2, $params)){
				die (print_r(sqlsrv_errors(), true));
			}
		}
		else {
			die (print_r(sqlsrv_errors(), true));
		}
		return $res;
	}
	
	public function getTypes() {
		$sql = "SELECT * FROM dbo.type";
		$res = sqlsrv_query($this->con, $sql);
		if ($res === false) {
			die (print_r(sql_srv_errors(), true));
		}
		while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)){
			$array[] = $row;
		}
		return $array;
	}
	
	public function __destruct() {
		sqlsrv_close($this->con);
	}
}


?>