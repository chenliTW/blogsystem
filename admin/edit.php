<?php
session_start();
if(isset($_SESSION["username"])==FALSE) {
	header('Location: index.php');
}else{
  	include("../config/dbconnect.php");
	$result=mysqli_query($conn,"SELECT * FROM post");
	echo "<a href=\"addpost.php\"><button>新增文章</button></a>";
	echo "<table border=\"1\">";
	echo "<tr><td>標題</td><td>作者</td><td>最後編輯時間</td><td></td><td></td></tr>";
	while($row=mysqli_fetch_array($result)){
        	echo "<tr><td>";
        	echo $row["title"];
        	echo "</td><td>";
		echo $row["author"];
		echo "</td><td>";
		echo $row["post_time"];
		echo "</td><td>";
		echo  "<form action=\"editpost.php\" method=\"POST\">
 		<input type=\"hidden\" name=\"id\" value=\"".$row["id"]."\"/>
 		<input type=\"submit\" value=\"編輯文章\"/>
 		</form>";
        	echo "</td><td>";
		echo  "<form action=\"delpost.php\" method=\"POST\">
                <input type=\"hidden\" name=\"id\" value=\"".$row["id"]."\"/>
                <input type=\"submit\" value=\"刪除文章\"/>
                </form>";
		echo "</td></tr>";
	}
	mysqli_close($conn);
}
?>
