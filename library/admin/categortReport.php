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

$sql = "SELECT *  FROM tblcategory";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {?>
<html>

<head>
    <title> Category Report</title>
</head>

<body>
<b><font size="6"><center><u>Books Category Details<u></center></font></b>
<br></br>
<br></br>

<center><table width="600" border="1" cellpadding="1" cellspacing="1"></center>
    <tr>
        <th>Number</th>
        <th>Category Name</th>
        <th>Status</th>
        <th>Creation Date</th>
        <th>Updation Date</th>

    </tr>

	<?php
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
        echo "<td>" . $row["id"] ."</td>";
		echo "<td>" . $row["CategoryName"] ."</td>";
		echo "<td>" . $row["Status"] ."</td>";
		echo "<td>" . $row["CreationDate"] ."</td>";
		echo "<td>" . $row["UpdationDate"] ."</td>";
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
