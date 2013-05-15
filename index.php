<?php 
include_once 'class.resolver.php';
$resolver = new resolver();
?>
<html>
	<head>
		<title>WSUS Auswertung</title>
		<style type="text/css">
		<!-- 
		  #nav { float: left; width: 200px; height: 800px; position:absolute; top:0px; left:0px; background:#527DE5; background-size:100% }
		 #content { float: left; width:1000px; position:absolute; top:0px; left:200px; }
		 #body { background-image:url(body.jpg); background-size: 800px 1200px; }
		 -->
		 </style>
	</head>
	<body>
		<div id="nav">
			<div style="padding: 20px 0px 0px 10px;">
				<a href="index.php?ctrl=search" style="color:white; text-decoration:none; padding: 20px 0px 0px 10px;">Suchen</a>
			</div>
			<div style="padding: 20px 0px 0px 10px;">
				<a href="index.php?ctrl=updates&action=list" style="color:white; text-decoration:none; padding: 20px 0px 0px 10px;">Update Management</a>
			</div>
			<div style="padding: 20px 0px 0px 10px;">
				<a href="index.php?ctrl=packages&action=list" style="color:white; text-decoration:none; padding: 20px 0px 0px 10px;">Package Management</a>
			</div>
		</div>
		<div id="content">
			<?php 
				if(!isset($_GET['ctrl']))
            		include_once 'view/start.php';
            	else 
            		$resolver->handleRequest();
			?>
		</div>
	</body>
</html>