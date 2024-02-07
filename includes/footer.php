 <?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
 <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2 logo">حلاقة الموصل</h2>
              <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              <p><?php  echo substr($row['PageDescription'],0,200);?> <a href="about.php">المزيد.......</a></p><?php } ?>
            
            </div>
          </div>
         
          <div class="col-md" style="padding-left: 150px">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">روابط مختصرة</h2>
              <ul class="list-unstyled">
                <li><a href="index.php" class="py-2 d-block">الرئيسية</a></li>
                <li><a href="about.php" class="py-2 d-block">من نحن</a></li>
                <li><a href="services.php" class="py-2 d-block">الخدمات</a></li>
               
                <li><a href="admin/index.php" class="py-2 d-block">المسؤول</a></li>
                <li><a href="contact.php" class="py-2 d-block">اتصل بنا</a></li>
              </ul>
            </div>
          </div>

            
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
  2023 &copy; صالون حلاقة الموصل </p>
          </div>
        </div>
      </div>
    </footer>