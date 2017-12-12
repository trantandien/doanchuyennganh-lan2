<?php
ob_start();
include '../config.php';
include '../vender/connect.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div id="main">
  <div id="header">
  <a href="../index.php">Hệ thống đặt vé xe chất lượng cao, giữ chỗ 100%</a>
  </div>
  <div id="cover">
    <a href="../index.php"><img src="../image/logo.png" width="200px" height="70px" align="center"></a>
    <div id="cover1">
      <div style="margin-left: 20px;text-align: center;"><a href="../gio-hang.php"><b style="background-color: orange;z-index: 1;position: absolute;border-radius: 20px;width: 16px;height: 16px;top: 10px;right: 210px;font-size: 13px;color: white">0</b><img align="center" width="15px" src="../image/cart.png">Giỏ Hàng</a></div>
      <?php
          if(isset($_SESSION['user'])){
            echo '<div style="margin-left: 20px"><a href="../quanly.php"  style="color: white"><img align="center" width="15px" src="../image/person.png">'.$_SESSION['user'].'</a><a href="../logout.php">(Đăng Xuất)</a></div>';
          }else{
      ?>
      <div style="margin-left: 10px"><a class="dang-ky">Đăng Ký</a></div>
      <div style="margin-left: 20px"><a class="dang-nhap"><img align="center" width="15px" src="../image/person.png">Đăng Nhập</a></div>
      <?php } ?>
      <div style="margin-left: 20px"><a href="#"><img align="center" width="15px" src="../image/v.png">Kiểm tra vé</a></div>
    </div></br>
    <div id="cover2">
      <a href="../index.php">Trang chủ</a>
      <a href="../ve-xe-khach.php">Vé xe khách</a>
      <a href="../tin-tuc.php">Tin Tức</a>
      <a href="../huong-dan.php">Hướng dẫn</a>
    </div>
  </div>
  <div id="title">
  </div>
  <div id="body">
  <table>
    <tr>
      <td><h3 style="float: left;"><img align="center" width="30" src="../image/phone.png"> (08h - 22h) Số điện thoại</h3></td><td><h3 style="float: left;border: 1px solid #DF7401;border-top: none;border-bottom: none;padding:0 25px;"><img align="center" width="30" src="../image/phone.png"> (08h - 17h) Số điện thoại</h3></td><td><h3 style="float: left;"><img align="center" width="30" src="../image/phone.png"> (08h - 22h) Số điện thoại</h3>
      </td>
    </tr>
  </table>
  </div>
  <center><br><div style="text-align: left;padding-left: 150px;background-color: #EFF5FB;color: #0080FF  ">
<form class="timnhanh" method="GET" hidden="">
  <table style="border: none;">
    <tr>
      <td align="center" width="100"><img width="20" align="center" src="image/local1.png">Nơi Đi</td>
      <td align="center" width="100"><img width="20" align="center" src="image/local1.png">Nơi Đến</td>
      <td align="center" width="100"><img width="20" align="center" src="image/calendar.png">Ngày Đi</td>
      
    </tr>
    <tr>
      <td><select style="margin-left: 5px" name="noi-di">
        </select></td>
      <td><select style="margin-left: 5px " name="noi-den">
        </select></td>
      <td><input name="setTodaysDate" type="date" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh');
        echo date('Y-m-d'); ?>">
        </td>
      <td><button name="btnSearch" style="color: white;padding:5px 20px;font-size: 20px;border-radius: 10px">Tìm Xe</button></td>
    </tr>
  </table>
</form>
<a class="tim" style="cursor: pointer;">Tìm Chuyến Xe Nhanh</a>
</div>
  <div id="noidung" style='margin-top: -150px;padding: 0'> 
<div>
<?php
$errors=array();
if(isset($_GET['btnThem'])){
  if(empty($_GET['txtTenxe'])){
    $errors[]="Vui Lòng Nhập Tên Xe";
  }
  if(empty($_GET['txtSoxe'])){
    $errors[]="Vui Lòng Nhập Số Xe";
  }
  if(empty($_GET['txtSoluongghe'])){
    $errors[]="Vui Lòng Nhập Số Lượng Ghế";
  }
  ?>
  <div style=";width: 300px;height: 200px;margin-top: 160px;margin-bottom: -300px">
<?php
foreach ($errors as $error) {
  echo $error."<br>";
}
?></div>
  <?php
  if(empty($errors)){
  $data=array(
      'Tenxe' => $_GET['txtTenxe'],
      'Soxe' => $_GET['txtSoxe'],
      'Soluongghe' => $_GET['txtSoluongghe'] 
      );
   $stmt = $conn->prepare("INSERT INTO xe(Tenxe,Soxe,Soluongghe) VALUES (:Tenxe,:Soxe,:Soluongghe)");
            $stmt->bindParam(":Tenxe",$_GET['txtTenxe'],PDO::PARAM_STR);
            $stmt->bindParam(":Soxe",$_GET['txtSoxe'],PDO::PARAM_STR);
            $stmt->bindParam(":Soluongghe",$_GET['txtSoluongghe'],PDO::PARAM_INT);
            $stmt->execute();
            header("location:../quanly.php");
            exit();
}
}
?>
<form method="GET">

<table align="center" style="padding: 0;background-color: #EFEFFB;border: none;margin: 0;margin-top: 168px;width: 840px;padding-left: 200px">
<tr>
  <td>Tên Xe</td>
  <td><input type="text" name="txtTenxe"></td>
</tr>
<tr>
  <td>Số Xe</td>
  <td><input type="text" name="txtSoxe"></td>
</tr>
<tr>
  <td>Số Lượng Ghế</td>
  <td><input type="text" name="txtSoluongghe"></td>
</tr>
<tr>
  <td colspan="2"><button style="margin-left: 110px;color: white;padding: 5px 20px" type="submit" name="btnThem">Thêm Xe</button></td>
</tr>
</table>
</form>
</div>
<script type="text/javascript">
  
</script>
  </div>
  <div id="footer" style="clear: both;">
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
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("select[name='noi-di']").show(function(){
    $.ajax({
      url:'noi-di.php',
      type: 'GET',
      dataType:'html',
    })
    .done(function(dulieu){
      $("select[name='noi-di']").html(dulieu)
    })
  });
  $("select[name='noi-den']").show(function(){
    $.ajax({
      url:'noi-den.php',
      type: 'GET',
      dataType:'html',
    })
    .done(function(dulieu){
      $("select[name='noi-den']").html(dulieu)
    })
  });
  });
</script>
</body>
</html>