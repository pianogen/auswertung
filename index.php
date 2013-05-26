<?php 
include_once 'class.resolver.php';
$resolver = new resolver();
if ($_GET['ctrl'] === "search"){
	$title = " - Suche";
}
if ($_GET['ctrl'] === "updates"){
	$title = " - Update Mutation";
}
if ($_GET['ctrl'] === "packages"){
	$title = " - Package Mutation";
}
?>
<html>
	<head>
		<title>WSUS Auswertung</title>
		<style type="text/css">
		<!-- 
		 #nav { float: left; width: 200px; height: 800px; position:absolute; top:0px; left:0px; background:#527DE5; background-size:100%; font-family:helvetica;}
		 #content { float: left; width:1000px; position:absolute; top:0px; left:200px; font-family:helvetica; padding: 120px 0px 0px 10px; }
		 #header { float: left; background: #527DE5; color:white; top:0px; left:200px; position:absolute; width:1200px;  height:100px; vertical-align: middle;}
		 #body { font-family: arial; }
		 h1 { font-family: arial; }
		 .input { border: 1px solid #527DE5;}
		 table.result {border-collapse:collapse; padding:10px; } 
		 td.result { padding: 10px; }
		 .button { display: block; width: 115px; height: 25px; background: #4E9CAF; padding: 10px; text-align: center; border-radius: 5px; color: white; font-weight: bold;}
		 -->
		 </style>
	<head>
	<body>
	<div>
		<div id="nav">
			<div style="padding: 100px 0px 0px 10px;">
				<a href="index.php?ctrl=search" style="color:white; text-decoration:none; padding: 20px 0px 0px 10px;">Suchen</a>
			</div>
			<div style="padding: 20px 0px 0px 10px;">
				<a href="index.php?ctrl=updates" style="color:white; text-decoration:none; padding: 20px 0px 0px 10px;">Update hinzufügen</a>
			</div>
			<div style="padding: 20px 0px 0px 10px;">
				<a href="index.php?ctrl=packages" style="color:white; text-decoration:none; padding: 20px 0px 0px 10px;">Package hinzufügen</a>
			</div>
		</div>
		<div id="header">
			<h1>WSUS Auswertung<?php echo $title; ?></h1>
		</div>
		<div id="content">
			<?php 
				if(!isset($_GET['ctrl'])) 
            		include_once 'view/start.php';
            	else 
            		$resolver->handleRequest();  ?>
		</div>
	</div>
	</body>
</html>