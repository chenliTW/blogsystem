<?php
header('Content-type: text/html; charset=utf-8');

include("./config/dbconnect.php");

$result=mysqli_query($conn,"SELECT * FROM post");

while($row=mysqli_fetch_array($result)){
        echo "<h2>";
	echo $row["title"];
	echo "</h2>";
	echo "<p>";
	echo $row["content"];
	echo " ---by ".$row["author"]." ".$row["post_time"];
	echo "</p><hr>";
}

mysqli_close($conn);

?>
