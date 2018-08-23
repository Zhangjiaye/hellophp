<?php
session_start();
header("Content-type:text/html;charset=utf-8"); 
if(!isset($_SESSION["admin"]))
	echo "请先登录";
else{
	$user=$_SESSION["admin"];
	include("connect.php");
	$sql="select id from user where username='$user'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	echo "http://localhost:8081/hellophp/register.php?from=".$row['id']."";
	//echo "http://ftp6241794.host714.zhujiwu.me/register.php?from=".$row['id']."";
}
?>

