<?php
session_start();
if(isset($_SESSION["username"])==FALSE) {
	header('Location: index.php');
}else{
	if(isset($_POST["content"])==FALSE){
		include("../config/dbconnect.php");
		$result=mysqli_query($conn,"SELECT * FROM post WHERE id='".$_POST["id"]."'");
		$row=mysqli_fetch_array($result);
		echo " <form action=\"editpost.php\" method=\"POST\">
		<input type=\"hidden\" name=\"id\" value=\"".$_POST["id"]."\"/>
                <input style=\"width: 600px;\" type=\"text\" name=\"title\" required=\"TRUE\" value=\"".$row["title"]."\" placeholder=\"輸入標題\"/><br>
                <textarea style=\"width: 600px;height: 400px\" name=\"content\" required=\"TRUE\" placeholder=\"輸入內文\">".$row["content"]."</textarea><br>
		<input type=\"submit\" value=\"張貼\"/>
                </form>";
		mysqli_close($conn);
	}else{
	  	include("../config/dbconnect.php");
		mysqli_query($conn,"UPDATE post SET title='".$_POST["title"]."',post_time='".date("Y-m-d H:i:s")."',author='".$_SESSION["name"]."(".$_SESSION["username"].")"."',content='".$_POST["content"]."' WHERE id='".$_POST["id"]."';");
                echo "已更新文章
		<a href=\"edit.php\">
                <button>回管理頁面</button>
                </a>
                ";
  		mysqli_close($conn);
	}
}
?>
