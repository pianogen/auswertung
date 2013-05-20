<?php 
include_once 'class.resolver.php';
$resolver = new resolver();
?>
<html>
	<head>
		<title>WSUS Auswertung</title>
		<style type="text/css">
		<!-- 
		 #nav { float: left; width: 200px; height: 800px; position:absolute; top:0px; left:0px; background:#527DE5; background-size:100%; font-family:helvetica;}
		 #content { float: left; width:1000px; position:absolute; top:0px; left:200px; font-family:helvetica; }
		 #body { font-family: arial; }
		 .input { border: 1px solid #527DE5;}
		 table.result {border-collapse:collapse; padding:10px; } 
		 td.result { padding: 10px; }
		 .button { display: block; width: 115px; height: 25px; background: #4E9CAF; padding: 10px; text-align: center; border-radius: 5px; color: white; font-weight: bold;}
		 -->
		 </style>
	<head>
	<body>
		<div id="nav">
			<div style="padding: 20px 0px 0px 10px;">
				<a href="index.php?ctrl=search" style="color:white; text-decoration:none; padding: 20px 0px 0px 10px;">Suchen</a>
			</div>
			<div style="padding: 20px 0px 0px 10px;">
				<a href="index.php?ctrl=updates" style="color:white; text-decoration:none; padding: 20px 0px 0px 10px;">Update Management</a>
			</div>
			<div style="padding: 20px 0px 0px 10px;">
				<a href="index.php?ctrl=packages" style="color:white; text-decoration:none; padding: 20px 0px 0px 10px;">Package Management</a>
			</div>
		</div>
		<div id="content" style="padding: 20px 0px 0px 10px;">
			<?php 
				if(!isset($_GET['ctrl']))
            		include_once 'view/start.php';
            	else 
            		$resolver->handleRequest();
			?>
		</div>
	</body>
</html>