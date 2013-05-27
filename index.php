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
		 #error { visibility:hidden; color: red; font-size: 12px; float: left; position:absolute; left: 10px; top:252px; display:inline; }
		 #separate { text-align: right; font-size: 12px; }
		 h1 { font-family: arial; }
		 .input { border: 1px solid #527DE5;}
		 table.result {border-collapse:collapse; padding:10px; } 
		 td.result { padding: 10px; }
		 .button { display: block; width: 115px; height: 25px; background: #4E9CAF; padding: 10px; text-align: center; border-radius: 5px; color: white; font-weight: bold;}
		 -->
		 </style>
		 <script type="text/javascript">
		 	function kbValidate() 
		 	{
			 	if (document.getElementById('kb').value) {
			 		document.getElementById('titel').disabled = true;
			 		document.getElementById('release').disabled = true;
			 		var zahl = parseInt(document.getElementById('kb').value);
					if (zahl != document.getElementById('kb').value) {
				 		document.getElementById('error').style.visibility = 'visible';
				 		document.getElementById('suchen').disabled = true;
				 		document.getElementById('error').innerText = 'Das Suchfeld kb akzeptiert nur Zahlen';
					}
					else {
						document.getElementById('error').style.visibility = 'hidden';
						document.getElementById('suchen').disabled = false;
					}
				 }
			 	else {
				 	document.getElementById('titel').disabled = false;
				 	document.getElementById('release').disabled = false;
				 	document.getElementById('error').style.visibility = 'hidden';
				 	document.getElementById('suchen').disabled = true;
			 	}
		 	}
		 	function titelValidate() 
		 	{
			 	if (document.getElementById('titel').value) {
			 		document.getElementById('kb').disabled = true;
			 		document.getElementById('release').disabled = true;
			 		document.getElementById('error').style.visibility = 'hidden';
			 		document.getElementById('suchen').disabled = false;
				 }
			 	else {
				 	document.getElementById('kb').disabled = false;
				 	document.getElementById('release').disabled = false;
				 	document.getElementById('error').style.visibility = 'hidden';
				 	document.getElementById('suchen').disabled = true;
			 	}
		 	}
		 	function releaseValidate() 
		 	{
			 	if (document.getElementById('release').value) {
			 		document.getElementById('kb').disabled = true;
			 		document.getElementById('titel').disabled = true;
			 		document.getElementById('error').style.visibility = 'hidden';
			 		document.getElementById('suchen').disabled = false;
				 }
			 	else {
				 	document.getElementById('kb').disabled = false;
				 	document.getElementById('titel').disabled = false;
				 	document.getElementById('error').style.visibility = 'hidden';
				 	document.getElementById('suchen').disabled = true;
			 	}
		 	}
		 </script>
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