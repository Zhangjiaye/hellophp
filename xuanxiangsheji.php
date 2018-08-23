<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<!-- Site title
   ================================================== -->
	<title>选项设计</title>

	<!-- Bootstrap CSS
   ================================================== -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Animate CSS
   ================================================== -->
	<link rel="stylesheet" href="css/animate.min.css">

	<!-- Font Icons CSS
   ================================================== -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">

	<!-- Main CSS
   ================================================== -->
	<link rel="stylesheet" href="css/style.css?v=5">

	<!-- Google web font 
   ================================================== -->	
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>

</head>
<body>


<!-- Preloader section
================================================== -->
<div class="preloader">

	<div class="sk-spinner sk-spinner-pulse"></div>

</div>


<!-- Navigation section
================================================== -->
<div class="nav-container">
   <nav class="nav-inner transparent">

      <div class="navbar">
         <div class="container">
            <div class="row">

              <div class="brand">
                <a href="index.html">Welcome</a>
              </div>

              <div class="navicon">
                <div class="menu-container">

                  <div class="circle dark inline">
                    <i class="icon ion-navicon"></i>
                  </div>

                  <div class="list-menu">
                    <i class="icon ion-close-round close-iframe"></i>
                    <div class="intro-inner">
                     	<ul id="nav-menu">
                         <li><a href="index.html">Home</a></li>
                       	 <li><a href="about.html">About</a></li>
                       	 <li><a href="blog.html">Blog</a></li>
                       	 <li><a href="contact.html">Contact</a></li>
                      </ul>
                    </div>
                  </div>

                </div>
              </div>

            </div>
         </div>
      </div>

   </nav>
</div>


<!-- Header section
================================================== -->
<section id="header" class="header-two">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
           		 <div class="header-thumb">
              		 <h1 class="wow fadeIn" >根据主题发布投票选项</h1>
              		 <h3 class="wow fadeInUp" >经过管理员审核方能投票</h3>
           		 </div>
			</div>

		</div>
	</div>		
</section>


<!-- Single Project section
================================================== -->
<section id="single-project">
   <div class="container">
      <div class="row">

         <div class="wow fadeInUp  col-md-3 col-sm-3" >
		<!-- 	<div class="project-info">
				<h4>Client</h4>
				<p>Ananda Co.</hp>
			</div>
			<div class="project-info">
				<h4>Date</h4>
				<hp>12 June 2016</p>
			</div>
			<div class="project-info">
				<h4>Category</h4>
				<p>Branding</p>
			</div> -->
		</div>

		<div class="wow fadeInUp col-md-6 col-sm-6" >
		 <form action="tpcheck.php" method="post" target="_blank" id="myForm" >
                    <!-- onsubmit="return checkForm() --><!-- onsubmit可以阻止action的提交 -->
                   <!--  <div class="container"> -->
                    <h1>你认为最好用的手机是？</h1>
                   
                       <!--  <label class="radio-inline">
                            <input type="radio" name="RadioGroup" value="选项1" /><h4>选项1</h4>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="RadioGroup" value="选项2" /><h4>选项2</h4>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="RadioGroup" value="选项3" /><h4>选项3</h4>
                        </label> -->
                    <div>
                        <?php
                            include("connect.php");
                            $sql="select * from xuanxiang where shenhe='是' ";
                            $result=mysqli_query($conn,$sql);
                            $num=mysqli_num_rows($result);
                            for($i=1;$i<$num+1;$i++){
                                $row=mysqli_fetch_array($result);
                                echo "<div class='panel panel-default'><div class='panel-body'>
  								<div class='pull-left' style='margin-right:15px;margin-top:5px;'><input type='radio' name='RadioGroup'value='".$row['schoose']."' ></div>
  								<div class='pull-left'><img src='http://ftp6241794.host714.zhujiwu.me/".$row['simg']."' style='width:30px;height:30px;'/></div>
  								<div class='col-sm-4 col-xs-4' style='line-height:30px;'>".$row['schoose']."</div>
  								</div></div>";
                            }
                        ?>
                    </div>
                    
                    <!-- <div> -->
                        <input class="btn btn-default" type="button" value="投票" id="submit1" onclick="mySubmit()" /> 
                      &nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-primary" href="xuanxiangcheck.php">创建你的选项</a>
                    <!-- </div> -->
           
                  <!--type="submit"   -->
            </form>
		</div>

      </div>
   </div>
</section>


<!-- Footer section
================================================== -->
<footer>
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<p class="wow fadeInUp" >Have a good time!</p>
				<ul class="social-icon wow fadeInUp" >
					<li><a href="#" class="fa fa-facebook"></a></li>
					<li><a href="#" class="fa fa-twitter"></a></li>
					<li><a href="#" class="fa fa-dribbble"></a></li>
					<li><a href="#" class="fa fa-behance"></a></li>
					<li><a href="#" class="fa fa-google-plus"></a></li>
				</ul>
			</div>
			
		</div>
	</div>
</footer>



<!-- Javascript 
================================================== -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>
  <script type="text/javascript">
    function mySubmit(){
        if (!check_radio()) {
            alert("您还未选择,请选择");
        }else{
             document.getElementById("myForm").submit();
        }
    }
    function check_radio(){ 
        var ck = false;
        var cks = document.getElementsByName("RadioGroup"); //返回带有指定名称的对象的集合。
        for(var i=0;i<cks.length;i++){ 
            if(cks[i].checked){ 
                ck = true;
                break;
            } 
        } 
        return ck;
    }



   
	// $(document).ready(function(){
	//   $(".panel").on("click",function(){
	//     alert("段落被点击了。");
	//   });
	// });
    

    </script>


</body>
</html>