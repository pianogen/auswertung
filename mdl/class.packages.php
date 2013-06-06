<?php 
/* -----------------------------------------------------------------
 * Diese PHP Klasse wird benutzt, um die Packages aus der Datenbank auszulesen, mutieren und lï¿½schen
 */
class mdl_packages {
	private $con;
	/* --------------------------------------------------------------------------------------------------
	 * public function __construct()
	 * Dies ist der Konstruktor dieser Seite, er ï¿½ffnet die Verbindung zur Datenbank, sobald ein Objekt der Klasse mdl_packages instanziert wurde
	 */
        /**
         * @assert () == true;
         * @assert () == false;
         */
	public function __construct() {
		$serverName = "(local)";
		$conInfo = array("Database"=>"WSUSAuswertung", "UID"=>"php", "PWD"=>"ProBook6470b");
		$this->con = sqlsrv_connect($serverName, $conInfo);
		if ($this->con === false) {
			die (print_r (sqlsrv_errors(), true));
		}
	}
	/* --------------------------------------------------------------------------------------------------
	 * public function updatesToPackages()
	 * Diese Funktion gibt die Updates zurï¿½ck, die mit diese Update verknï¿½pft worden sind.
	 */
        /** 
         * 
         * @assert () != NULL
         */
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
	/* ---------------------------------------------------------------------------------------------------
	 * public function getSpecificPackage()
	 * Diese Funktion liest einen einzelnen Datensatz anhand der id aus.
	 * Diese Funktion wird ausgelï¿½st, wenn der Benutzer auf in der Suche von Packages auf mehr Info klickt.
	 */
	public function getSpecificPackage() {
		$sql = "Select * from dbo.package WHERE id=?";
		$params = array($_GET['id']);
		$res = sqlsrv_query($this->con, $sql,$params);
		if ($res === false) {
			die (print_r(sql_srv_errors(), true));
		}
		return (sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC));
	}
	/* -----------------------------------------------------------------------------------------------------
	 * public function save()
	 * Diese Funktion wird benï¿½tigt um ein neues Packages zu erstellen.
	 * Diese Funktion wird ausgelï¿½st, wenn der Benutzer unter dem Package Management auf Speichern klickt.
	 */
	public function save(){
		$sql = "INSERT INTO dbo.package (name, typeId) VALUES (?, ?)";
		$params = array_values($_POST);
		$res = sqlsrv_query($this->con, $sql,$params);
		if (!$res) {
			die(print_r(sqlsrv_errors(), true));
		}
		return $res;		
	}
	/* ----------------------------------------------------------------------------------------------------
	 * public function update()
	 * Diese Funktion wird benï¿½tigt um ein Package zu ï¿½ndern
	 * Diese Funktion wird ausgelï¿½st, wenn der Benutzer unter dem Package Management auf Update klickt.
	 */
	public function update() {
		$sql = "UPDATE dbo.package SET name = ?, typeID = ? WHERE id= ?";
		$params = array_values($_POST);
		array_push($params, $_GET['id']);
		$res = sqlsrv_query($this->con, $sql,$params);
		return $res;
	}
	/* ---------------------------------------------------------------------------------------------------
	 * public function delete()
	 * Diese Funktion wird benï¿½tigt um ein Package zu lï¿½schen
	 * Diese Funktion wird ausgelï¿½st, wenn der Benutzer unter dem Package Management auf Lï¿½schen klickt.
	 */
	public function delete() {
		$params = array($_GET['id']);
		$res = false;
		$sql1 = "DELETE FROM dbo.updates_packages WHERE packageId=?";
		if (sqlsrv_query($this->con, $sql1, $params)){
			$sql2 = "DELETE FROM dbo.package WHERE id = ?";
			if (!sqlsrv_query($this->con, $sql2, $params)){
				die (print_r(sqlsrv_errors(), true));
			}
			else {
				$res = true;
			}
		}
		else {
			die (print_r(sqlsrv_errors(), true));
		}
		echo $res;
		return $res;
	}
	/* -------------------------------------------------------------------------------
	 * public function getTypes()
	 * Diese Funktion wird benötigt um die mï¿½glichen Typs der Packages auszulesen
	 * Diese Funktion wird ausgelöst, wenn der Benutzer die Suchseite lï¿½dt.
	 */
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
	/*
	 * public function __destruct()
	 * Dies ist der Destruktor dieser Klasse, er schliesst die SQL Verbindung
	 * Diese Funktion wird ausgelï¿½st, sobald die Seite fertig geladen ist.
	 */
	public function __destruct() {
		sqlsrv_close($this->con);
	}
}
?>