<?php
    session_start();
    //Connect to database
    require 'connectDB.php';

    $output = '';
    $outputdata = $_SESSION['exportdata'];

    if(isset($_POST["export"])){
        $query = "SELECT * FROM logs WHERE DateLog='$outputdata' ";
        $result = mysqli_query($conn, $query);
        if($result->num_rows > 0){
            $output .= '
                        <table class="table" bordered="1">
                            <tr>
                                <th>ID.No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>CardID</th>
                                <th>SerialNumber</th>
                                <th>Gender</th>
                                <th>Books No.</th>
                                <th>Dead Line</th>
                                <th>Announcement</th>
                                <th>Date</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>User Status</th>
                            </tr>';
            while($row=$result->fetch_assoc()) {
                $output .= '
                    <tr>
                        <TD> '.$row['id'].'</TD>
                        <TD> '.$row['img'].'</TD>
                        <TD> '.$row['Name'].'</TD>
                        <TD> '.$row['CardNumber'].'</TD>
                        <TD> '.$row['SerialNumber'].'</TD>
                        <TD> '.$row['gender'].'</TD>
                        <TD> '.$row['books'].'</TD>
                        <TD> '.$row['dead_line'].'</TD>
                        <TD> '.$row['ann'].'</TD>
                        <TD> '.$row['DateLog'].'</TD>
                        <TD> '.$row['TimeIn'].'</TD>
                        <TD> '.$row['TimeOut'].'</TD>
                        <TD> '.$row['UserStat'].'</TD>
                    </tr>';
            }
            $output .= '</table>';
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=UserLog'.$outputdata.'.xls');
            echo $output;
        } else {
            header( "location: view.php" );
        }
    }
?>