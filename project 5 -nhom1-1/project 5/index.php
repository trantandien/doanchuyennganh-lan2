<?php
ob_start();
include 'config.php';
include 'vender/connect.php';
session_start();
//include "css/nut_call.php";
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
      <a href="index.php" style="color: white">Trang chủ</a>
      <a href="ve-xe-khach.php">Vé xe khách</a>
      <a href="tin-tuc.php">Tin Tức</a>
      <a href="huong-dan.php">Hướng dẫn</a>
    </div>
  </div>
  <div id="title">
  </div>
  <div id="body">
  <div class="slideshow-container" style="width: all;height: 430px">
<div class="mySlides fade">
<img src="image/1.jpg" width="100%" height="430">
</div>
<div class="mySlides fade">
<img src="image/2.jpg" width="100%" height="430">
</div>
<div class="mySlides fade">
<img src="image/3.jpg" width="100%" height="430">
</div>
<div class="mySlides fade">
<img src="image/4.jpg" width="100%" height="430">
</div>
<div class="mySlides fade">
<img src="image/5.jpg" width="100%" height="430">
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
<div>
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span> 
</div>
</div>
  <form method="GET" action="search.php">
  <div id="form" style="position: absolute;top:10px;background-color: white;width: 360px;left: 140px;height: 320px;opacity: 3.0;">.
  </div>
    <table style="border: none;position: absolute;top:20px;font-weight: bold;opacity: 3.0;">
      <tr>
        <!-- <td style="font-size: 15px">
          <input id="trip0" type="radio" name="trip" value="0" checked=""> Vé một chiều
        </td> -->
        <td colspan="" style="font-size: 15px">
          <input id="trip1" type="radio" name="trip" value="1" checked=""> Tìm Vé Xe
        </td>
      </tr>
      <tr>
        <td><img width="20" align="center" src="image/local.png">Nơi đi </td>
        <td colspan="" ><select name="noi-di" >
        </select></td>
      </tr>
      <br>  
      <tr>
        <td><img width="20" align="center" src="image/local.png">Nơi đến </td>
        <td colspan=""><select name="noi-den">
        </select>
        </td>
      </tr>
      
      <!-- <tr>
        <td><img width="20" align="center" src="image/calendar.png">Ngày đi</td>
        <td><input style="margin-left: -60px" name="setTodaysDate" type="date" value="<?php //date_default_timezone_set('Asia/Ho_Chi_Minh');
        //echo date('Y-m-d'); ?>">
        </td>
      </tr> -->
      <!-- <tr id="ngayve"></tr> -->
      <tr>
        <td colspan="2"><button type="submit" style="border: none;background-color: #FF8000;width: 150px;height: 40px;margin-right: 15px;float: right;border-radius: 0 10px 10px 0"><b>TÌM VÉ</b></button><button id="bnt" type="submit" style="border: none;background-color: #F5D0A9;width: 50px;height: 40px;float: right;border-radius: 10px 0 0 10px;"><img align="center" width="20" src="image/search.png"></button></td>
      </tr>
    </table>
  </form>
  <table>
    <tr>
      <td><h3 style="float: left;"><img align="center" width="30" src="image/phone.png"> (08h - 22h) 01657002257</h3></td><td><h3 style="float: left;border: 1px solid #DF7401;border-top: none;border-bottom: none;padding:0 25px;"><img align="center" width="30" src="image/phone.png"> (08h - 17h) 0823666666</h3></td><td><h3 style="float: left;"><img align="center" width="30" src="image/phone.png"> (08h - 22h) 0823666667</h3>
      </td>
    </tr>
  </table>
  </div>
  <center>
  <div id="noidung" style="background-color: #E6E0F8;padding: 10px 0">
  <?php
  include 'function/index.php';
  ?>
  </div>
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
  <p>Địa Chỉ : 180 Cao lổ - phường 4 - quận 8 - Tp Hồ Chí Minh </p>
  <p>Liên Hệ : 01657002257</p>
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
<?php
include "form.php"
?>
</body>
</html>