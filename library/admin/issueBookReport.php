<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT *  FROM tblissuedbookdetails";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {?>
<html>

<head>
    <title> Issue Books Report</title>
</head>

<body>
 <b><font size="6"><center><u>Issue Books Details<u></center></font></b>
 <br></br>
 <br></br>

<center><table width="600" border="1" cellpadding="1" cellspacing="1"></center>
    <tr>
        <th>Number</th>
        <th>Book ID</th>
        <th>Student ID</th>
        <th>Issue Date</th>
        <th>Return Date</th>
        <th>Return Status</th>
        <th>Fine</th>
    </tr>
	
	<?php
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
        echo "<td>" . $row["id"] ."</td>";
		echo "<td>" . $row["BookId"] ."</td>";
		echo "<td>" . $row["StudentID"] ."</td>";
		echo "<td>" . $row["IssuesDate"] ."</td>";
		echo "<td>" . $row["ReturnDate"] ."</td>";
		echo "<td>" . $row["RetrunStatus"] ."</td>";
		echo "<td>" . $row["fine"] ."</td>";
		echo "</tr>";
  }?>
  
	
	</table>



	
	
	<?php
} else {
    echo "0 results";
}

mysqli_close($conn);

?>

	




</body>
</html>
