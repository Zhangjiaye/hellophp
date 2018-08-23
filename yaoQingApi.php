<?php
session_start();
header("Content-type:text/html;charset=utf-8"); 
if(!isset($_SESSION["admin"]))
	echo "请先登录";
else{
	//$user=$_SESSION["admin"];
	include("connect.php");
	$uid=$_GET["id"];
	// $sql="select * from user where username='$user'";
	// $result=mysqli_query($conn,$sql);
	// $row=mysqli_fetch_array($result);
	// $uid=$row['id'];
	// $uname=$row['username'];
	//num($uname,$uid,0);
	$sql="select * from user where fromid=".$uid." and status='是'";
	$result=mysqli_query($conn,$sql);
	$n=mysqli_num_rows($result);
	for ($i=0; $i <$n ; $i++) { 
		$row=mysqli_fetch_array($result);
		echo $row['username'].",".$row['id']."!";
	}
	

}
// function num($uname,$uid,$cen)
// 	{
// 		include("connect.php");
// 		$sql="select * from user where fromid=".$uid." and status='是'";
// 		$result=mysqli_query($conn,$sql);
// 		$n=mysqli_num_rows($result);
// 		echo $cen.":".$uname.":".$n.";";
// 		if ($n) {
// 			for ($i=0; $i < $n; $i++) { 
// 				$row=mysqli_fetch_array($result);
// 				num($row['username'],$row['id'],$cen+1);
// 			}
// 		}
// 		mysqli_close($conn);
// 	}
?>