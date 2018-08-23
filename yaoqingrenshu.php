<?php
session_start();
if(!isset($_SESSION["admin"]))
	echo "<script>alert('登录查看');window.location.href='login.php';</script>";
else{
	$user=$_SESSION["admin"];
	if (!isset($_GET["id"])) {
		include("connect.php");
		 $sql="select * from user where username='$user'";
		 $result=mysqli_query($conn,$sql);
		 $row=mysqli_fetch_array($result);
		 $id=$row['id'];
		// echo $id;
	}
	else{
			$id=$_GET["id"];
			//echo $id;
		}
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href ="bootstrap.min.css" >
	<title></title>
</head>
<body>
<table class="table table-hover" id="t">
	<h4 id="h">邀请成功的有</h4>
	
</table>
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(function(){
		 $.get("yaoQingApi.php?id="+<?php echo $id ?>,function(data,status){
		 	if (status=='success'){
		 		//alert(data);
		 		var strs = data.split("!"); 
		 		var number=strs.length-1;
		 		$("#h").append(number+"人");
		 		for($i=0;$i<number;$i++){
		 			var str=strs[$i].split(",");
		 			$("#t").append('<tr><td><a href="yaoqingrenshu.php?id='+str[1]+'" target="_blank">'+str[0]+'</a></td></tr>');
		 		}
		 	}
		 	else alert('请求失败');
		 });
	});
</script>
</html>
