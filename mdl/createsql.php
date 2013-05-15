<?php
	$serverName = "(local)";
	$conInfo = array("UID"=>"php", "PWD"=>"ProBook6470b");
	$con = sqlsrv_connect($serverName, $conInfo);
	if ($con === false) {
		die (print_r (sqlsrv_errors(), true));
	}
	else {
		echo "Connection to Database created<br>";
	}
	#create Database
	$sql = "CREATE DATABASE WsusAuswertung";
	if (!sqlsrv_query($con, $sql)) {
		die (print_r(sqlsrv_errors(), true));
	}
	else {
		echo "Database WsusAuswertung created<br>";
	}
	sqlsrv_close($con);
	$conInfo = array("Database"=>"WSUSAuswertung", "UID"=>"php", "PWD"=>"ProBook6470b");
	$con = sqlsrv_connect($serverName, $conInfo);
	#creating Update
	$sql = "CREATE TABLE updates
			(Id int NOT NULL IDENTITY (1,1) PRIMARY KEY, Name varchar(400) NOT NULL,
			 kb varchar(10) NOT NULL,
			 release date NOT NULL,
			 decline date,
			 approve date)";
	$res = sqlsrv_query($con, $sql);
	if (!$res) {
		die (print_r(sqlsrv_errors(), true));
	} else {
		echo "Table updates created<br>";
	}
	$sql = "CREATE TABLE packages
			(id int NOT NULL Identity (1,1) PRIMARY KEY,
			 name varchar(15) NOT NULL,
			 typeId int NOT NULL)";
	$res = sqlsrv_query($con, $sql);
	if (!$res) {
		die (print_r(sqlsrv_errors(), true));
	} else {
		echo "Table packages created<br>";
	}
	
	$sql = "CREATE TABLE type
			(id int NOT NULL Identity (1,1) PRIMARY KEY,
			 type varchar(10) NOT NULL)";
	$res = sqlsrv_query($con, $sql);
	if (!$res) {
		die (print_r(sqlsrv_errors(), true));
	} else {
		echo "Table type created<br>";
	}
	$sql = "CREATE TABLE updates_packages
			(packageId int NOT NULL,
			 updateId int NOT NULL,
			 approve date,
			 PRIMARY KEY(packageId, updateId))";
	$res = sqlsrv_query($con, $sql);
	if (!$res) {
		die (print_r(sqlsrv_errors(), true));
	} else {
		echo "Table updates_packages created<br>";
	}
	sqlsrv_close($con);
	
?>