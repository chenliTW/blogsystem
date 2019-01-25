<?php
header('Content-type: text/html; charset=utf-8');

include("../config/dbconnect.php");

$result=mysqli_query($conn,"SELECT * FROM member");

while($row=mysqli_fetch_array($result)){
	if($row["username"]==$_POST["user"] && $row["password"]===md5($_POST["pass"])){
		session_start();
		$_SESSION["username"]=$row["username"];
		$_SESSION["name"]=$row["name"];
		header('Location: edit.php');
		die();
	}
}

mysqli_close($conn);

header('Location: error.php');

?>
