<?php
	session_start();
	//Connect to database
	require'connectDB.php';
	//Get current date and time
	date_default_timezone_set('Asia/Amman');
	$d = date("Y-m-d");
	// set time in
	$Tarrive = mktime(01,15,00);
	$TimeArrive = date("H:i:sa", $Tarrive);
	// set time out
	$Tleft = mktime(02,30,00);
	$Timeleft = date("H:i:sa", $Tleft);

	$seldate = !empty($_POST['seldate']) ? $_POST['date'] : $d ;

	$_SESSION["exportdata"] = $seldate;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Users Logs</title>
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="./css/style.css">
	<script src="js/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			setInterval(function(){
				$.ajax({
					url: "load-users.php"
				}).done(function(data) {
						$('#cards').html(data);
					});
			},3000);
		});
	</script>
</head>
<body>
	<header>
		<div class="head">
			<img src="image/rfid2.jpg" width="80" height="80" />
			<h1><p style="color: black;">Database System</p></h1>
		</div>
		<div class="opt">
			<img src="image/99.png" width="170" height="170" />
		</div>
	</header>
	<h2 style="margin-left: 15px;"></h2>
	<br/>
	<form method="post" action="export.php">
		<input type="submit" name="export" class="export" value="Export to Excel" />
	</form>
	<div id="cards" class="cards"></div>
</body>
</html>

