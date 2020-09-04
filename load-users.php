<table id='table'>
	<tr>
		<th>Image</th>
		<th>Name</th>
		<th>SerialNumber</th>
		<th>Gender</th>
		<th>Books No.</th>
		<th>Dead Line</th>
		<th>Announcement</th>
		<th>Date</th>
		<th>Time In</th>
		<th>Time Out</th>
		<th>User Status</th>
	</tr>
	<?php
		session_start();
		//Connect to database
		require'connectDB.php';

		$seldate = $_SESSION["exportdata"];

		$sql = "SELECT * FROM logs WHERE DateLog='$seldate' ORDER BY id DESC";
		$result = mysqli_query($conn,$sql);

		if ($result) :
			while ($row = mysqli_fetch_assoc($result)) : ?>
				<tr>
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
				</tr>
			<?php endwhile;
		endif;
	?>
</table>
