<?php
ob_start();
include 'config.php';
include 'vender/connect.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<button onclick="topFunction()" id="myBtn" title="Go to top"><img align="center" width="50px" src="image/top.png"></button>
<script>
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
<div id="main">
  <div id="header">
  <a href="index.php">Hệ thống đặt vé xe chất lượng cao, giữ chỗ 100%</a>
  </div>
  <div id="cover">
    <a href="index.php"><img src="image/logo.png" width="200px" height="70px" align="center"></a>
    <div id="cover1">
      <div style="margin-left: 20px;text-align: center;"><a href="gio-hang.php"><b style="background-color: orange;z-index: 1;position: absolute;border-radius: 20px;width: 16px;height: 16px;top: 10px;right: 210px;font-size: 13px;color: white"><?php if(isset($_SESSION['so'])){
          echo $_SESSION['so'];
        }else{
          echo 0;
          } ?></b><img align="center" width="15px" src="image/cart.png">Giỏ Hàng</a></div>
      <?php
          if(isset($_SESSION['user'])){
            echo '<div style="margin-left: 20px"><a href="quanly.php"><img align="center" width="15px" src="image/person.png">'.$_SESSION['user'].'</a><a href="logout.php">(Đăng Xuất)</a></div>';
          }else{
      ?>
      <div style="margin-left: 10px"><a class="dang-ky">Đăng Ký</a></div>
      <div style="margin-left: 20px"><a class="dang-nhap"><img align="center" width="15px" src="image/person.png">Đăng Nhập</a></div>
      <?php } ?>
      <div style="margin-left: 20px"><a href="#"><img align="center" width="15px" src="image/v.png">Kiểm tra vé</a></div>
    </div></br>
    <div id="cover2">
      <a href="index.php">Trang chủ</a>
      <a href="ve-xe-khach.php">Vé xe khách</a>
      <a href="tin-tuc.php">Tin Tức</a>
      <a href="huong-dan.php" style="color: white">Hướng dẫn</a>
    </div>
  </div>
  <div id="title">
  </div>
  <div id="body">
  <table>
    <tr>
      <td><h3 style="float: left;"><img align="center" width="30" src="image/phone.png"> (08h - 22h) Số điện thoại</h3></td><td><h3 style="float: left;border: 1px solid #DF7401;border-top: none;border-bottom: none;padding:0 25px;"><img align="center" width="30" src="image/phone.png"> (08h - 17h) Số điện thoại</h3></td><td><h3 style="float: left;"><img align="center" width="30" src="image/phone.png"> (08h - 22h) Số điện thoại</h3>
      </td>
    </tr>
  </table>
  </div>
  <center>
  <div id="noidung">
  <?php
  include 'function/gio-hang.php';
  ?>
  </div>
  </center>
  <center>
  <div id="footer">
  <br>
  <table align="center" style="border: none; border-bottom: 1px solid #FF8000;padding-bottom: 50px">
    <tr>
      <td><a><b>Về chúng tôi</b></a></td>
      <td><a><b>Điều khoản sử dụng</b></a></td>
      <td><a><b>Tư vấn Hỗ trợ</b></a></td>
      <td><a><b>Tin tức - sự kiện</b></a></td>
    </tr>
    <tr>
      <td><a>Giới thiệu</a></td>
      <td><a>Chính sách trả vé</a></td>
      <td><a>Hướng dẫn đặt vé</a></td>
      <td><a>Tin tức du lịch</a></td>
    </tr>
    <tr>
      <td><a>Sản phẩm & Dịch vụ</a></td>
      <td><a>Phương thức hoàn tiền</a></td>
      <td><a>Hướng dẫn thanh toán</a></td>
      <td><a>Tin khuyến mãi</a></td>
    </tr>
    <tr>
      <td><a>Giá trị cốt lõi</a></td>
      <td><a>Bảo mật thông tin</a></td>
      <td><a>Câu hỏi thường gặp</a></td>
      <td><a>Tin tức hãng xe</a></td>
    </tr>
    <tr>
      <td colspan="2"><a>Liên hệ với chúng tôi</a></td>
      <td colspan="2"><a>Gửi phản hồi</a></td>
    </tr>
  </table><br>
  <div>
  <p><b>Bản quyền thuộc về : </b></p>
  <p>Địa Chỉ : </p>
  <p>Liên Hệ : </p>
  </div>
  </div>
   </center>
</div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 4000);
}
function plusSlides(n) {
  showSlides1(slideIndex += n);
}

function currentSlide(n) {
  showSlides1(slideIndex = n);
}

function showSlides1(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>