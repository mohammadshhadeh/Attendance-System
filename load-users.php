<TABLE id='table'>
<TR>
	<TH>Image</TH>
    <TH>Name</TH>
    <TH>SerialNumber</TH>
    <TH>Gender</TH>
    <TH>Books No.</TH>
    <TH>Dead Line</TH>
    <TH>Announcement</TH>
    <TH>Date</TH>
    <TH>Time In</TH>
    <TH>Time Out</TH>
    <TH>User Status</TH>
</TR>
<?php
session_start();
//Connect to database
require'connectDB.php';

$seldate = $_SESSION["exportdata"];

$sql = "SELECT * FROM logs WHERE DateLog='$seldate' ORDER BY id DESC";
$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
?>
        <TR>
        <TD><?php echo $row['img'];?></TD>	
        <TD><?php echo $row['Name'];?></TD>
        <TD><?php echo $row['SerialNumber'];?></TD>
        <TD><?php echo $row['gender'];?></TD>
        <TD><?php echo $row['books'];?></TD>
        <TD><?php echo $row['dead_line'];?></TD>
        <TD><?php echo $row['ann'];?></TD>
        <TD><?php echo $row['DateLog'];?></TD>
        <TD><?php echo $row['TimeIn'];?></TD>
        <TD><?php echo $row['TimeOut'];?></TD>
        <TD><?php echo $row['UserStat'];?></TD>
        </TR>
<?php
  }
}
?>
</TABLE>