

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Readers Community</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type"content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
 <link href="http://fonts.googleapis.com/css?family=Lateef&subset=arabic,latin " rel="stylesheet">
 <link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">
 <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
 <link rel="stylesheet" href="css/animate.css">

 <link rel="stylesheet" href="css/owl.carousel.min.css">
 <link rel="stylesheet" href="css/owl.theme.default.min.css">
 <link rel="stylesheet" href="css/magnific-popup.css">

 <link rel="stylesheet" href="css/aos.css">

 <link rel="stylesheet" href="css/ionicons.min.css">

 <link rel="stylesheet" href="css/bootstrap-datepicker.css">
 <link rel="stylesheet" href="css/jquery.timepicker.css">


 <link rel="stylesheet" href="css/flaticon.css">
 <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
.navbar{margin-bottom:0 }
.ftco-navbar-light {
  top :0;
}

</style>
  </head>








  <body style="margin-top:0">

<nav class="navbar  navbar-expand-lg navbar-light ftco_navbar bg-light ftco-navbar-light">
<div class="container">
<div class="navbar-brand" ><a href="" style="color:black"></a>
 <button class="navbar-toggle" data-toggle="collapse" data-target="#navcollapse">

MENU

 </button></div>
<div class="collapse navbar-collapse" id="navcollapse">


<ul class="nav navbar-nav navbar-right" style="padding-left:2px">

    <li class="active"><a href="index.php" style="color:black;font-family:Lateef;font-weight:bolder;font-size:25px;border:solid white">الرئيسية</a></li>
    <li><a href="Login/login.php" style="color:black;font-family:Lateef;font-weight:bolder;font-size:25px;border:solid white">تسجيل الدخول</a></li>
   <li><a href="signup/signup.php" style="color:black;font-family:Lateef;font-weight:bolder;font-size:25px;border:solid white">انشاء حساب</a></li>
    <li><a href="#contact" style="color:black;font-family:Lateef;font-weight:bolder;font-size:25px;border:solid white">تواصل معنا</a></li>

</ul>
</div>
</div>
</nav>	   <!-- END nav -->






    <section class="home-slider owl-carousel">
      <div class="slider-item " style="background-image:url(images/bg_1.jpg);height:600px">

        <div class="container">
         <div class="row  slider-text align-items-center justify-content-end" >
          <div class="col-md-7 text " >
            <h1 class="mb-3" style="color:white" ></h1>
            <p><a href="Login/login.php" class="btn btn-white btn-outline-white px-4 py-3 mt-3" style="font-family:Lateef;font-weight:bolder;font-size:30px">
			&nbsp;  تسجيل الدخول &nbsp; </a></p>
          </div>
        </div>
        </div>
      </div>

    </section>


		 <?php

       $con=new mysqli("localhost","root","","readers community");
      $qury2 ="select * from books  order by id  limit 8";

    $res= mysqli_query($con,$qury2);

    echo" <section class='ftco-section'  >
			<div class='container' >
   <center><p style='font-family:SanSerif; font-size:50px'>  </p></center> <br>
   <div class='row' style='margin-left:60px;margin-right:60px' >";

    while($roww = mysqli_fetch_assoc($res)){


         echo "  <div class='col-md-3 ftco-animate'>
            <div class='blog-entry'>
              <img src='images/".$roww['image']." ' width=200px height=300px>

              <div class='text d-flex py-4'>

                <div class='meta mb-3 col-md-8'>
                  <div><a href='".$roww['pdf_book']."' class='glyphicon glyphicon-download-alt' target='_blank'><b> تحميل</b> </a></div>
                </div>
                 </div>

                <div class='desc pl-3' >
	                <p class='heading' style='color:black; font-size:18px;font-family:Lateef ;font-weight:bold'>  ".$roww['description']."  </p>
	              </div>



            </div>
          </div> ";
    }

       echo" </div>
			</div>
		</section>
";

    ?>






 <center><a href="Login/login.php"><button type="button" class="btn btn-dark">
 <h4 style="font-family:Lateef;font-weight:bolder"><<تسجيل الدخول لرؤية المزيد </h4></button> </a></center>
  <br> <br>
  </body>

    <footer class="ftco-footer ftco-bg-dark ftco-section" id="contact">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Readers Community</h2> <br>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href=""><span class="glyphicon glyphicon-book"></span></a></li>
                <li class="ftco-animate"><a href=""><span class="glyphicon glyphicon-headphones"></span></a></li>
                <li class="ftco-animate"><a href=""><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2" style="font-family:Lateef;font-weight:bolder;font-size:30px">الروابط</h2>
              <ul class="list-unstyled">

                <li><a href="Login/login.php" style="font-family:Lateef;font-weight:bolder;font-size:20px">PDF كتب </a></li>
                <li><a href="Login/login.php" style="font-family:Lateef;font-weight:bolder;font-size:20px">كتب صوتية</a></li>
                <li><a href="Login/login.php" style="font-family:Lateef;font-weight:bolder;font-size:20px">الاعلانـات</a></li>
                <li><a href="Login/login.php" style="font-family:Lateef;font-weight:bolder;font-size:20px">اضـافة اعلان</a></li>

              </ul>
            </div>
          </div>

          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2" style="font-family:Lateef;font-weight:bolder;font-size:30px">هل لديك استفسار؟</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-phone"></span><span class="text">+962 790 829 627</span></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">ReadersCommunity@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div> <br> <br>
        <div class="row">
          <div class="col-md-12 text-center">

 <h5>Copyright &copy;<script>document.write(new Date().getFullYear());</script> جميع الحقوق محفوظة</h5>

          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
