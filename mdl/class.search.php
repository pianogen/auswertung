<?php 
/**
 * Diese Klasse wird benötigt um die Datenbankabfragen in der Search Seite zu machen
 * author: Gennaro Piano
 */
class mdl_search {
	
	private $con;
	/*
	 * Datenbankverbindung wird geöffnet
	 */
	public function __construct() {
		$serverName = "(local)";
		$conInfo = array("Database"=>"WSUSAuswertung", "UID"=>"php", "PWD"=>"ProBook6470b");
		$this->con = sqlsrv_connect($serverName, $conInfo);
		if ($this->con === false) {
			die (print_r (sqlsrv_errors(), true));
		}
	}
	/*
	 * Gibt die 100 neusten Updates zurück
	 */
	public function findAllUpdates(){
		$array= array();
		$sql = "SELECT TOP 100 id,Name,kb, CONVERT(char(10),release,104),CONVERT(char(10),decline,104),CONVERT(char(10),approve_clt,104),CONVERT(char(10),approve_srv,104) FROM dbo.updates ORDER BY release DESC";
		$res = sqlsrv_query($this->con,$sql);
		if ($res === false){
			die (print_r (sqlsrv_errors(), true));
		}
		while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_NUMERIC)){
			$array[] = $row;
		}
		return $array;
	}
	/*
	 * Gibt eine spezifische nach einem Stichwort gesuchte Produktklasse zurück
	 * Kann nach Type oder Namen gesucht werden.
	 */
	public function findSpecificPackage(){
		if (empty($_POST['type'])){
			$sql = "SELECT P.*, T.type FROM dbo.package P, dbo.type T WHERE P.name LIKE ? AND P.typeId = T.id";
			$params = array("%".$_POST['name']."%");
		}
		else {
			$sql = "SELECT P.*, T.type from dbo.package P, dbo.type T WHERE T.id = ? AND T.id = P.typeId";
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
	/*
	 * Sucht nach spezifischen Updates
	 * Kann nach Titel, KB oder Relasedate gesucht werden 
	 */
	public function findSpecificUpdates(){
		if (!empty($_POST['kb'])) {
			$sql = "SELECT id,Name,kb, CONVERT(char(10),release,104),CONVERT(char(10),decline,104),CONVERT(char(10),approve_clt,104),CONVERT(char(10),approve_srv,104) FROM dbo.updates WHERE kb LIKE ? ORDER BY release DESC";
			$params = array($_POST['kb']."%");
			$res = sqlsrv_query($this->con, $sql,$params);
			if ($res === false) {
				die (print_r (sqlsrv_errors(), true));
			}
			while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_NUMERIC)){
				$array[] = $row;
			}
		}
		if (!empty($_POST['titel'])){
			$sql = "SELECT id,Name,kb, CONVERT(char(10),release,104),CONVERT(char(10),decline,104),CONVERT(char(10),approve_clt,104),CONVERT(char(10),approve_srv,104) FROM dbo.updates WHERE Name LIKE ? ORDER BY release DESC";
			$params = array($_POST['titel']."%");
			$res = sqlsrv_query($this->con, $sql,$params);
			if ($res === false) {
				die (print_r (sqlsrv_errors(), true));
			}
			while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_NUMERIC)){
				$array[] = $row;
			}
		}
		if (!empty($_POST['release'])){
			$sql = "SELECT id,Name,kb, CONVERT(char(10),release,104),CONVERT(char(10),decline,104),CONVERT(char(10),approve_clt,104),CONVERT(char(10),approve_srv,104) FROM dbo.updates WHERE release=? ORDER BY release DESC";
			$params = array($_POST['release']);
			$res = sqlsrv_query($this->con, $sql,$params);
			if ($res === false) {
				die (print_r (sqlsrv_errors(), true));
			}
			while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_NUMERIC)){
				$array[] = $row;
			}
		}
		return $array;
	}
	/* 
	 * Gibt alle Typen der Produktklassen zurück
	 */
	public function getTypes(){
		$sql = "Select * from dbo.type";
		$res = sqlsrv_query($this->con, $sql);
		if ($res === false) {
			die (print_r(sql_srv_errors(), true));
		}
		while ($row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)){
			$array[] = $row;
		}
		return $array;
	}
	/*
	 * Verbindungsabbau der Datenbank
	 */
	public function __destruct(){
		sqlsrv_close($this->con);
	}
	
}	


?>