<?php
session_start();
if(isset($_SESSION["username"])==FALSE) {
	header('Location: index.php');
}else{
	if(isset($_POST["chk"])==FALSE){
		echo  "<form action=\"delpost.php\" method=\"POST\">
                <input type=\"hidden\" name=\"id\" value=\"".$_POST["id"]."\"/>
		<input type=\"hidden\" name=\"chk\" value=\""."1"."\"/>
                <input type=\"submit\" value=\"確定刪除文章\"/>
                </form>";
	}else{
		include("../config/dbconnect.php");
		mysqli_query($conn,"DELETE FROM post WHERE id=".$_POST["id"].";");
		echo "成功刪除!
                <a href=\"edit.php\">
                <button>回管理頁面</button>
                </a>
                ";
		mysqli_close($conn);
	}
}
?>
