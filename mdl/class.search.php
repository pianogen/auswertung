<?php 
class mdl_search {
	
	private $con;
	
	public function __construct() {
		$serverName = "(local)";
		$conInfo = array("Database"=>"WSUSAuswertung", "UID"=>"php", "PWD"=>"ProBook6470b");
		$this->con = sqlsrv_connect($serverName, $conInfo);
		if ($this->con === false) {
			die (print_r (sqlsrv_errors(), true));
		}
	}
	public function findAllUpdates(){
		$array= array();
		$sql = "Select TOP 100 id,Name,kb, convert(char(10),release,104),convert(char(10),decline,104),convert(char(10),approve_clt,104),convert(char(10),approve_srv,104) from dbo.updates order by release DESC";
		$res = sqlsrv_query($this->con,$sql);
		if ($res === false){
			die (print_r (sqlsrv_errors(), true));
		}
		while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_NUMERIC)){
			$array[] = $row;
		}
		return $array;
	}
	public function findSpecificPackage(){
		if (empty($_POST['type'])){
			$sql = "SELECT P.*, T.type FROM dbo.package P, dbo.type T WHERE P.name LIKE ? AND P.typeId = T.id";
			$params = array($_POST['name']."%");
		}
		else {
			$sql = "SELECT P.*, T.type from dbo.package P, dbo.type T WHERE T.type = ? AND T.id = P.typeId";
			$params = array($_POST['type']);
		}
		$res = sqlsrv_query($this->con,$sql,$params);
		if ($res === false){
			die (print_r (sqlsrv_errors(), true));
		}
		while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_NUMERIC)){
			$array[] = $row;
		}
		return $array;
		
	}
	public function findUpdateByKeyword($kb){
		$sql = "Select * from dbo.updates where kb = $kb";
		$res = sqlsrv_query($this->con, $sql);
		if ($res === false) {
			die (print_r (sql_srv_errors(), true));
		}
		return (sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC));
	}
	
	public function findByName($name){
		$array = array();
		$sql = "Select * from dbo.updates where Name like '%$name%'";
		$res = sqlsrv_query($this->con, $sql);
		if ($res === false) {
			die (print_r(sql_srv_errors(), true));
		}
		while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)){
			$array[] = $row;
		}
		return $array;
	}
	
	public function findByDate($date){
		$array = array();
		$sql = "Select * from dbo.updates where release=$date'";
		$res = sqlsrv_query($this->con, $sql);
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
	
	public function __destruct(){
		sqlsrv_close($this->con);
	}
	
}	


?>