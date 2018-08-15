<?php
	header("Content-type:text/html;charset=utf-8");    //设置编码
	ini_set('date.timezone','Asia/Shanghai'); //设置时区
	include("connect.php");
	session_start();
	
	if(!isset($_SESSION["admin"]))
		echo "<script>alert('您还未登录');window.location.href='login.php';</script>";
	else{
		$admin=$_SESSION["admin"];
		// $time=date("Y-m-d");
		// $sql="select zamount from zongtoupiao where zname ='$admin' and ztime='$time' ";
		// //时间每天都在变，$time变了数据库没有与时间相匹配的用户名，就没有影响的行数，就可以重新投票了，即每天可以投2票
		// $result=mysqli_query($conn,$sql);
		// $num=mysqli_num_rows($result);//统计执行结果影响行数
		// if(!$num){//该用户没有投过票
		// 	$sql="insert into zongtoupiao(zname,zamount,ztime) values('".$admin."',1,'".$time."')";
		// 	mysqli_query($conn,$sql);
		// 	updatemtp();
		// 	echo "<script>alert('投票成功');</script>";
		// }else{//该用户已经至少投过1票了
		// 		$row1=mysqli_fetch_array($result);		
		// 		if($row1['zamount']<2){
		// 			$sql="update zongtoupiao set zamount=zamount+1 where zname='$admin' and ztime='$time'";	
		// 			mysqli_query($conn,$sql);
		// 			updatemtp();
		// 			echo "<script>alert('投票成功');</script>";
		// 		}else{
		// 			echo "<script>alert('您已经投了2次了');</script>";
		// 		}
		// 	}
		$today=date("Y-m-d");
		$yesterday=date("Y-m-d",strtotime("$today -1 day")); 
		$sql1="select zamount from zongtoupiao where zname ='$admin' and ztime='$today' ";
		$sql2="select zamount from zongtoupiao where zname ='$admin' and ztime='$yesterday' ";
		$array1=chaxun($sql1);
		$array2=chaxun($sql2);
		$ok=false;
		if($array1==null&&$array2==null){//今天没投票用insert，昨天没投票//今天昨天是两条记录
			$sql="insert into zongtoupiao(zname,zamount,ztime) values('".$admin."',1,'".$today."')";
			mysqli_query($conn,$sql);
			$ok=true;
		}	
		else if($array1==null&&$array2=!null&&$array2['zamount']<20){
			$sql="insert into zongtoupiao(zname,zamount,ztime) values('".$admin."',1,'".$today."')";
			mysqli_query($conn,$sql);
			$ok=true;
		}
		else if($array1!=null&&$array2==null&&$array1['zamount']<20){//今天投票了，用update
			$sql="update zongtoupiao set zamount=zamount+1 where zname='$admin' and ztime='$today'";
			mysqli_query($conn,$sql);
			$ok=true;
		}
		else if($array1!=null&&$array2!=null&&$array1['zamount']+$array2['zamount']<20){//这条用于修改需求,投更多的票
			$sql="update zongtoupiao set zamount=zamount+1 where zname='$admin' and ztime='$today'";
			mysqli_query($conn,$sql);
			$ok=true;
		}
		if($ok){
			updatemtp();
			echo "<script>alert('投票成功');</script>";
		}
		else{
			echo "<script>alert('2天内您已经投了2次了');</script>";
		}
	}

function chaxun($sql){
	include("connect.php");
	$result=mysqli_query($conn,$sql);
	$num=mysqli_num_rows($result);//统计执行结果影响行数

	if($num){
		$row=mysqli_fetch_array($result);
		return $row;
    }
 	else return null;
	mysqli_close($conn);
}	
	
function updatemtp(){
	//往各个选项中存储票数
	include("connect.php");
	$admin=$_SESSION["admin"];
	$today=date("Y-m-d");
	if (isset($_POST['RadioGroup'])) {//如果单选框被选中
		$circle = $_POST['RadioGroup'];//那么输出的是<input>标签value的值	
		
			// $sql="update mytoupiao set amount=amount+1 where choose ='$circle' ";
			// mysqli_query($conn,$sql);
			$sql="select id from xuanxiang where schoose='$circle' ";
			$result=mysqli_query($conn,$sql);
			$num=mysqli_num_rows($result);
			$row=mysqli_fetch_array($result);
			$chooseid=$row['id'];


			$sql="insert into tp(username,choose,ttime) values ('$admin','$chooseid','$today')";
			mysqli_query($conn,$sql);
	}
	mysqli_close($conn);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title></title>
	<link rel="stylesheet" href ="bootstrap.min.css" >
</head>
<body>
	<div class="container">
	<div class="row">
		<h1 class="col-md-4 col-md-offset-4">投票结果显示</h1>
	</div>
		<table class="table">
			<?php
				include("connect.php");
			
				$sql="select count(tp.id) tps,xuanxiang.schoose sc from tp,xuanxiang where xuanxiang.id=tp.choose group by tp.choose ";
				$result=mysqli_query($conn,$sql);
				 $num=mysqli_num_rows($result);
				for($i=0;$i<$num;$i++){
					$row=mysqli_fetch_array($result);
					echo $row['sc']."投票数".$row['tps']."<br>";
				}
				
				 

				mysqli_close($conn);
			?>


			
		</table>
	</div>
</body>
</html>