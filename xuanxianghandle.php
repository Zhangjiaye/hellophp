<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>处理投票</title>
</head>
<body>
<?php
	//文件上传处理
	//将选项放入数据库等待管理员审核
	//后台写一个投票选项审核
?>
<?php
ini_set('date.timezone','Asia/Shanghai'); //设置时区
if(!isset($_SESSION["admin"]))
	echo "<script>alert('您还未登录');window.location.href='login.php';</script>";
else{
	if (isset($_POST["opt"])) {
	$suser=$_SESSION["admin"];
	$schoose=htmlentities($_POST["opt"],ENT_NOQUOTES,"utf-8");
	$stime=time();
	$simg;
	require_once("upload2.php");
	$arr=array();
	$arr=Upload::start('myfile');
	if ($arr['status']==0) {
		$simg=$arr['path'];
	}
	else{
		echo"<script>alert('".$arr['msg']."');window.location.href='xuanxiangcheck.php';</script>";
		exit();
	}	
	include("connect.php");
	$sql="insert into xuanxiang(suser,schoose,simg,stime,shenhe) values ('".$suser."','".$schoose."','".$simg."','".$stime."','否');";
	$result=mysqli_query($conn,$sql);
	
	if($result)  
		 echo "<script>alert('发布成功，等待管理员审核');window.location.href='xuanxiangsheji.php';</script>";
	else
		echo "<script>alert('发布失败');window.location.href='xuanxiangcheck.php';</script>";
	mysqli_close($conn); 	
}
 else
 	echo "<script>alert('请重新发布');window.location.href='xuanxiangcheck.php';</script>";
}
?>
</body>
</html>
