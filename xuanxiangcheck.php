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
	<title>增加选项</title>

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
	<link rel="stylesheet" href="css/style.css">

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
<section id="header" class="header-five">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
          <div class="header-thumb">
              <h1 class="wow fadeIn" >增加选项</h1>
              <h3 class="wow fadeInUp" >Vestibulum at aliquam lorem</h3>
          </div>
			</div>

		</div>
	</div>		
</section>


<!-- Single Post section
================================================== -->
<section id="single-post">
   <div class="container">
      <div class="row">

         <div class="wow fadeInUp col-md-offset-3 col-md-7 col-sm-offset-3 col-sm-7" >
         	  <div class="blog-thumb">
         		   <!-- 
         		   <h1>增加选项</h1>
               <blockquote>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat.</blockquote> -->
               
              <!--  <img src="images/blog-img1.jpg" class="img-responsive post-image" alt="Blog"> -->
               

                    <!-- <form action="#" method="post">
                      <input type="text" class="form-control" placeholder="Name" name="name" required>
                      <input type="email" class="form-control" placeholder="Email" name="email" required>
                      <textarea class="form-control" placeholder="Comment" rows="5" name"Your Comments" required id="comment"></textarea>
                      <div class="contact-submit">
                      	<input name="submit" type="submit" class="form-control" id="submit" value="Submit a comment">
                      </div>
                   </form> -->
                   <form action="xuanxianghandle.php" method="post" onsubmit="return check()" enctype="multipart/form-data">
                    <div>
                      <p>你的选项：</p><input type="text" name="opt" class="form-control" />
                      <input type="file" name="myfile" /> 
                    </div>      
                      <input type="submit" value="提交" class="form-control" />
                    </form>
                   <a href="xuanxiangsheji.php">返回</a>
               
         	  </div>
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
<script>
//表单确认框的脚本，表单onsubmit为true才能够提交，confirm点确定则返回true反之为false
function check(){
  return confirm("确定提交？");
}
</script>
</body>
</html>