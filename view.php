<?php
session_start();
    //Connect to database
    require'connectDB.php';
//**********************************************************************************************
    
    //Get current date and time
    date_default_timezone_set('Asia/Amman');
    $d = date("Y-m-d");

    $Tarrive = mktime(01,15,00);
    $TimeArrive = date("H:i:sa", $Tarrive);
//**********************************************************************************************   
    $Tleft = mktime(02,30,00);
    $Timeleft = date("H:i:sa", $Tleft);

    if (!empty($_POST['seldate'])) {
        $seldate = $_POST['date'];
    }
    else{
        $seldate = $d;
      }

    $_SESSION["exportdata"] = $seldate;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users Logs</title>
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
<style>
body {background-image:url("image/22.png");background-repeat:no-repeat;background-attachment:fixed;
	  background-position: top right;
	  background-size: cover;}

header .head h1 {font-family:aguafina-script;text-align: center;color:#ddd;}
header .head img {float: left;}
header .opt {float: right;margin: -110px 20px 0px 0px} /* Bau logo */
.export {margin: 0px 10px 0px 0px; background-color:#c7c1c3 ;font-family:cursive;border-radius: 7px;width: 165px;height: 30px;color: #080806;border-color: #581845;font-size:18px} /*export */
.export:hover {cursor: pointer;background-color:#c7c1c3}
#table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;  /* database display table */
}
/* table border-spacing: */
#table td, #table th {
    border: 1px solid #807676;
    padding: 10px;  
     opacity: 2;
}
/*data format */
#table tr:nth-child(even){background-color: #f7f2f2;}
#table tr:nth-child(odd){background-color: #f7f2f2;opacity: 1;}

#table tr:hover {background-color: #ccc8c8; opacity: 1;}

#table th {
	 opacity: 0.9;
    padding-top: 10px;          /* table width titles top  */
    padding-bottom: 10px;      /* table width titles bottom  */
    text-align: left;          /* title direction */
    background-color: #000100;
    color: white;
}



</style>
</head>
<body>
<header >
 
	<div class="head">
		<img src="image/rfid2.jpg" width="80" height="80">
		<h1><p style="color:black;">Database System</h1>
	</div>	        

  <div class="opt">
    <img src="image/99.png" width="170" height="170">
  </div>          


	</div>
</header>
<h2 style="margin-left: 15px;">
</h2>
<br>
<form method="post" action="export.php">
  <input type="submit" name="export" class="export" value="Export to Excel" />
</form>
<div id="cards" class="cards">
</div>
</body>
</html>

