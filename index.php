<?php 
include('includes/dbconnection.php');
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $services=$_POST['services'];
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $phone=$_POST['phone'];
    $aptnumber = mt_rand(100000000, 999999999);
  
    $query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
    if ($query) {
$ret=mysqli_query($con,"select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
$result=mysqli_fetch_array($ret);
$_SESSION['aptno']=$result['AptNumber'];
 echo "<script>window.location.href='thank-you.php'</script>";	
  }
  else
    {
      $msg="هناك خطأ ما. حاول مرة اخرى";
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>الرئيسية</title>
        
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

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
  </head>
  <style>
	.owl-item img{
		margin-top: 50px;
	}
  </style>
  <body>
	  <?php include_once('includes/header.php');?>
    <!-- END nav -->

    <section id="home-section" class="hero" style="background-image: url(images/b6.jpg);" data-stellar-background-ratio="0.5">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third align-self-end order-md-last img-fluid" src="images/bg5.png" alt="">
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text mt-5">
			            <h1 class="mb-4">صالون حلاقة </h1>
			            <p class="mb-4">اهلا وسهلااً بك في صالون الحلاقة الخاص بنا افضل تسريحات الشعر </p>
			            
			           
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third align-self-end order-md-last img-fluid" src="images/b5.png" alt="">
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text mt-5">
			            <h1 class="mb-4">احصل على نظره جميلة</h1>
			            <p class="mb-4">احصل على نظرة جميلة بلقدوم الى صالوننا مع افضل تسريحات الشعر الرجالية.</p>
			            
			           
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>


<br>
    <section class="ftco-section ftco-no-pt ftco-booking">
    	<div class="container-fluid px-0">
    		<div class="row no-gutters d-md-flex justify-content-end">
    			<div class="one-forth d-flex align-items-end">
    				<div class="text">
    					<div class="overlay"></div>
    					<div class="appointment-wrap">
    						<span class="subheading">الحجز</span>
								<h3 class="mb-2">احجز موعدك الان </h3>
		    				<form action="#" method="post" class="appointment-form">
			            <div class="row">
			              <div class="col-sm-12">
			                <div class="form-group">
					              <input type="text" class="form-control" id="name" placeholder="الاسم" name="name" required="true">
					            </div>
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
					              <input type="email" class="form-control" id="appointment_email" placeholder="البريد الالكتروني" name="email" required="true">
					            </div>
			              </div>
				            <div class="col-sm-12">
			                <div class="form-group">
					              <div class="select-wrap">
		                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                      <select name="services" id="services" required="true" class="form-control">
		                      	<option value="">اختار الخدمة</option>
		                      	<?php $query=mysqli_query($con,"select * from tblservices");
              while($row=mysqli_fetch_array($query))
              {
              ?>
		                       <option value="<?php echo $row['ServiceName'];?>"><?php echo $row['ServiceName'];?></option>
		                       <?php } ?> 
		                      </select>
		                    </div>
					            </div>
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control appointment_date" placeholder="التاريخ" name="adate" id='adate' required="true">
			                </div>    
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control appointment_time" placeholder="الوقت" name="atime" id='atime' required="true">
			                </div>
			              </div>
			              <div class="col-sm-12">
			                <div class="form-group">
			                  <input type="text" class="form-control" id="phone" name="phone" placeholder="رقم الهاتف" required="true" maxlength="10" pattern="[0-9]+">
			                </div>
			              </div>
				          </div>
				          <div class="form-group">
			              <input type="submit" name="submit" value="احجز الان" class="btn btn-primary">
			            </div>
			          </form>
		          </div>
						</div>
    			</div>
					<div class="one-third">
						<div class="img" style="background-image: url(images/b8.jpg);">
						</div>
					</div>
    		</div>
    	</div>
    </section>

		
		<br>


   <?php include_once('includes/footer.php');?>
    
  

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