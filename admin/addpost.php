<?php
session_start();
if(isset($_SESSION["username"])==FALSE) {
	header('Location: index.php');
}else{
	if(isset($_POST["title"])==FALSE){
		echo " <form action=\"addpost.php\" method=\"POST\">
		<input style=\"width: 600px;\" type=\"text\" name=\"title\" required=\"TRUE\" placeholder=\"輸入標題\"/><br>
 		<textarea style=\"width: 600px;height: 400px\" name=\"content\" required=\"TRUE\" placeholder=\"輸入內文\" >".$row["content"]."</textarea><br>
 		<input type=\"submit\" value=\"張貼\"/>
 		</form>";
	}else{
		include("../config/dbconnect.php");
		$result=mysqli_query($conn,"SELECT * FROM post ORDER BY id DESC LIMIT 0, 1;");
		$newid=mysqli_fetch_array($result)["id"]+1;
		$result=mysqli_query($conn,"INSERT INTO `post`(`id`,`title`,`post_time`,`author`,`content`) VALUES ('".$newid."','".$_POST["title"]."','".date("Y-m-d H:i:s")."','".$_SESSION["name"]."(".$_SESSION["username"].")"."','".$_POST["content"]."');");
  		echo "成功張貼!
		<a href=\"edit.php\">
   		<button>回管理頁面</button>
		</a>
		";
		mysqli_close($conn);
	}
}
?>
