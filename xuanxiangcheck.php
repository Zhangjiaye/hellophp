<!DOCTYPE html >
<html lang="en" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href ="bootstrap.min.css" >
<title>新增投票</title>
</head>
 
<body>
	<h1>增加选项</h1>
	<!--onsubmit属性是为了下面脚本能够顺利弹出确认框，用户确认之后才提交这个表单-->
	<form action="xuanxianghandle.php" method="post" onsubmit="return check()" enctype="multipart/form-data">
	<!--这里定义div的id是为了下面的javascript的操作，而且div不像p那样会参加很大的行距-->
	<div id="createform">
		<div>
	       你的选项：<input type="text" name="opt" style = "width:20%"/>
	       <input type="file" name="myfile" />       
	    </div>
	</div>

	<input type="submit" value="提交" />
	</form>
	<a href="xuanxiangsheji.php">返回</a>
</body>
</html>
 
<script>
//表单确认框的脚本，表单onsubmit为true才能够提交，confirm点确定则返回true反之为false
function check(){
 	return confirm("确定提交？");
}
</script>