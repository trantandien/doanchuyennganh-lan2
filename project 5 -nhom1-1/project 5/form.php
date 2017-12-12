<?php
$stmt=$conn->prepare("SELECT * FROM thanhvien");
$stmt->execute();
$dangky = $stmt->fetchAll(PDO::FETCH_ASSOC);
$errors=array();
if(isset($_POST['btnDangky'])){
  if(empty($_POST['txtTaikhoan'])){
    $errors[]="Vui Lòng Nhập Tài Khoản";
  }
  if(empty($_POST['txtName'])){
    $errors[]="Vui Lòng Nhập Họ Tên";
  }
  if(empty($_POST['txtEmail'])){
    $errors[]="Vui Lòng Nhập Email";
  }
  foreach ($dangky as $dk) {
          if($dk['Email']==$_POST['txtEmail']){
            $errors[]="Địa Chỉ Email Đã Tồn Tại";
          }
        }    
  if(empty($_POST['txtAddress'])){
    $errors[]="Vui Lòng Nhập Địa Chỉ";
  }
  if(empty($_POST['txtPhone'])){
    $errors[]="Vui Lòng Nhập Số Điện Thoại";
  }
  if(empty($_POST['txtPass'])){
    $errors[]="Vui Lòng Nhập Mật Khẩu";
  }else{
    if($_POST['txtPass']!=$_POST['txtRepass']){
      $errors[]="Mật Khẩu Không Giống Nhau";
    }
  }
  if(empty($errors)){ 
    $thanhvien=array(
      'Username' => $_POST['txtTaikhoan'],
      'Password' => md5($_POST['txtPass']),
      'TenTV' => $_POST['txtName'],
      'Phone' => $_POST['txtPhone'],
      'Email' => $_POST['txtEmail'],
      'Diachi' => $_POST['txtAddress'],
    );
    $stmt = $conn->prepare("INSERT INTO thanhvien(Username,Password,TenTV,Phone,Email,Diachi) VALUES (:Username,:Password,:TenTV,:Phone,:Email,:Diachi)");
            $stmt->bindParam(":Username",$_POST['txtTaikhoan'],PDO::PARAM_STR);
            $stmt->bindParam(":Password",$_POST['txtPass'],PDO::PARAM_STR);
            $stmt->bindParam(":TenTV",$_POST['txtName'],PDO::PARAM_STR);
            $stmt->bindParam(":Phone",$_POST['txtPhone'],PDO::PARAM_INT);
            $stmt->bindParam(":Email",$_POST['txtEmail'],PDO::PARAM_STR);
            $stmt->bindParam(":Diachi",$_POST['txtAddress'],PDO::PARAM_STR);
            $stmt->execute();
?>
<div id="dk" style="background-color: white;width: 500px;height: 270px;position: absolute;top: 150px;margin: 0px 420px;border-radius: 10px;box-shadow: 0 0 1px black" >
<div style="border-bottom: 1px solid #E0E6F8;padding: 10px 0"><h2 align="center">Thông Báo</h2></div>
  <table style="border: none;margin-left: 60px;padding: 0px;width: 400px">
    <tr>
      <td align="center"><div style="margin-top: 50px">Chúc Mừng Bạn Đã Đăng Ký Thành Công !!!<br><br>Nhấn OK Để Tiếp Tục</div></td>
    </tr>
    <tr>
      <td align="center"><button id="Okdk" style="margin-top: 20px;padding: 10px;color: white;border-radius: 5px;width: 200px;font-size: 20px">OK</button></td>
    </tr>
  </table>
</div>
  <script type="text/javascript">
    $("#Okdk").click(function(){
      $("#dk").hide();
    });
  </script>  
  <?php }
  else{ ?>
<div id="alertdk" hidden="" style="background-color: white;width: 500px;height: 270px;position: absolute;top: 150px;margin: 0px 420px;border-radius: 10px;box-shadow: 0 0 1px black" >
<div style="border-bottom: 1px solid #E0E6F8;padding: 10px 0"><h2 align="center">Thông Báo</h2></div><img class="closedk" style="float: right;margin-top: -40px;margin-right: 10px" width="30px" align="center" src="image/x.png">
  <table style="border: none;margin-left: 60px;padding: 0px;width: 400px">
    <?php foreach ($errors as $error) {?><tr>
      <td align="left"><div style="margin:5px 60px"><?php echo '<a style="color: red">* </a>'.$error; ?></div></td>
    </tr><?php } ?>
    <tr>
      <td align="center"><button class="closedk" style="margin-top: 5px;padding: 10px;color: white;border-radius: 5px;width: 200px;font-size: 20px">Đóng</button></td>
    </tr>
  </table>
</div>
  <script type="text/javascript">
    $("#alertdk").show();
  </script>
  <?php }
?>


<?php } ?>


<?php $errors=array();
  if(isset($_POST['btnDangnhap'])){
    if(empty($_POST['txtUser'])){
      $errors[]="Vui lòng nhập User";
    }
    if(empty($_POST['txtPass'])){
      $errors[]="Vui lòng nhập Pass";
    }
    if (empty($errors)) {
      $data=array(
      'Username' => $_POST['txtUser'],
      'Password' => $_POST['txtPass']  
      );
      $stmt = $conn->prepare("SELECT * FROM thanhvien WHERE Username=:Username AND Password=:Password");
      $stmt->bindParam(":Username",$data['Username'],PDO::PARAM_STR);
      $stmt->bindParam(":Password",$data['Password'],PDO::PARAM_STR);
      $stmt->execute();
      $row = $stmt->rowCount();
      if($row>0){
        $data_login = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user']=$data_login['Username'];
        $_SESSION['level']=$data_login['Password']; ?>
        <div id="dn" style="background-color: white;width: 500px;height: 270px;position: absolute;top: 150px;margin: 0px 420px;border-radius: 10px;box-shadow: 0 0 1px black" >
<div style="border-bottom: 1px solid #E0E6F8;padding: 10px 0px"><h2 align="center">Thông Báo</h2></div>
<form action="index.php">
  <table style="border: none;margin-left: 50px;width: 400px">
    <tr>
      <td align="center"><div style="margin-top: 50px">Chúc Mừng Bạn Đã Đăng Nhập Thành Công !!!<br><br>Nhấn OK Để Tiếp Tục</div></td>
    </tr>
    <tr>
      <td align="center"><button id="Okdn" type="submit" style="margin-top: 20px;padding: 10px;color: white;border-radius: 5px;width: 200px;font-size: 20px">OK</button></td>
    </tr>
  </table>
</form>
</div>
      <?php 
      }else{ ?>
<div class="alertdn" hidden="" style="background-color: white;width: 500px;height: 270px;position: absolute;top: 150px;margin: 0px 420px;border-radius: 10px;box-shadow: 0 0 1px black" >
<div style="border-bottom: 1px solid #E0E6F8;padding: 10px 0"><h2 align="center">Thông Báo</h2></div><img class="closedn" style="float: right;margin-top: -40px;margin-right: 10px" width="30px" align="center" src="image/x.png">
  <table style="border: none;margin-left: 60px;padding: 0px;width: 400px">
    <tr>
      <td align="left"><div style="margin:50px 20px"><a style="color: red">* </a> Tài Khoản Hoặc Mật Khẩu Không Đúng</div></td>
    </tr>
    <tr>
      <td align="center"><button class="closedn" style="margin-top: 5px;padding: 10px;color: white;border-radius: 5px;width: 200px;font-size: 20px">Đóng</button></td>
    </tr>
  </table>
</div>
  <script type="text/javascript">
    $(".alertdn").show();
  </script>
      <?php }
    }else{ ?>
      <div class="alertdn"  style="background-color: white;width: 500px;height: 270px;position: absolute;top: 150px;margin: 0px 420px;border-radius: 10px;box-shadow: 0 0 1px black" >
<div style="border-bottom: 1px solid #E0E6F8;padding: 10px 0"><h2 align="center">Thông Báo</h2></div><img class="closedn" style="float: right;margin-top: -40px;margin-right: 10px" width="30px" align="center" src="image/x.png">
  <table style="border: none;margin-left: 50px;width: 400px;padding-top: 30px">
    <?php foreach ($errors as $error) {?><tr>
      <td align="left"><div style="margin:10px 95px"><?php echo '<a style="color: red">* </a>'.$error; ?></div></td>
    </tr><?php } ?>
    <tr>
      <td align="center"><button class="closedn" style="margin-top: 20px;padding: 10px;color: white;border-radius: 5px;width: 200px;font-size: 20px">Đóng</button></td>
    </tr>
  </table>
</div>
  <script type="text/javascript">
    $(".alertdn").show();
  </script>
    <?php }
  }
?>
<div id="form1" hidden="" style="background-color: white;width: 500px;height: 320px;position: absolute;top: 150px;margin: 0px 420px;border-radius: 10px;box-shadow: 0 0 1px black" >
<form method="POST"><div style="border-bottom: 1px solid #E0E6F8;padding: 10px 0"><h2 align="center">Đăng Nhập</h2></div><img id="x" style="float: right;margin-top: -40px;margin-right: 10px" width="30px" align="center" src="image/x.png">
  <table style="border: none;margin-left: 60px;padding: 0px">
    <tr>
      <td style="height: 30px;width: 220px;padding:30px 0"><div style="width: 80px;font-weight: bold;">Tài Khoản</div></td>
      <td><input style="height: 30px;width: 230px;border-radius: 5px;border: 1px solid #D8D8D8;padding-left: 20px" type="text" name="txtUser" placeholder="abc@gmail.com"></td>
    </tr>
    <tr>
      <td style="height: 30px;padding:0px 0;width: 220px"><b style="width: 300px">Mật Khẩu</b></td>
      <td><input style="height: 30px;width: 230px;border-radius: 5px;border: 1px solid #D8D8D8;padding-left: 20px" type="password" name="txtPass"></td>
    </tr>
    <tr>
      <td colspan="2" style="height: 50px;padding: 0"><div style="padding-left: 10px"><a style="cursor: pointer;text-decoration: none;color: #08298A;font-size: 15px" class="dang-ky" >Đăng Ký </a><a style="color: #08298A">|</a><a class="quen-mat-khau" style="text-decoration: none;color: #08298A;font-size: 15px;cursor: pointer;"> Quên Mật Khẩu</a></div></td>
      <td></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><button type="submit" name="btnDangnhap" style="margin-top: 5px;padding: 10px;color: white;border-radius: 5px;width: 200px;font-size: 20px">Đăng Nhập</button></td>
    </tr>
  </table>
</form>
</div>
<div id="form2" hidden="" style="background-color: white;width: 600px;height: 480px;position: absolute;top: 100px;margin: 0px 370px;border-radius: 10px;box-shadow: 0 0 1px black" >
<form method="POST"><div style="border-bottom: 1px solid #E0E6F8;padding: 10px 0"><h2 align="center">Đăng Ký</h2></div><img id="x1" style="float: right;margin-top: -40px;margin-right: 10px" width="30px" align="center" src="image/x.png">
  <table style="border: none;margin-left: 60px;padding: 0px">
    <tr>
      <td style="height: 30px;width: 220px;padding:20px 0;"><div style="width: 200px;font-weight: bold;"><a style="color: red">*</a> Tài Khoản</div></td>
      <td><input style="height: 30px;width: 230px;border-radius: 5px;border: 1px solid #D8D8D8;padding-left: 20px" type="text" name="txtTaikhoan" placeholder="Nhập Tài Khoản" value="<?php if(isset($_POST['btnDangky'])){
          echo $_POST['txtTaikhoan'];
        } ?>"></td>
    </tr>
    <tr>
      <td style="height: 30px;width: 220px;padding:20px 0;"><div style="width: 200px;font-weight: bold;"><a style="color: red">*</a> Họ Tên</div></td>
      <td><input style="height: 30px;width: 230px;border-radius: 5px;border: 1px solid #D8D8D8;padding-left: 20px" type="text" name="txtName" placeholder="Trần Văn A" value="<?php if(isset($_POST['btnDangky'])){
          echo $_POST['txtName'];
        } ?>"></td>
    </tr>
    <tr>
      <td style="height: 30px;padding:0px 0;width: 220px"><b style="width: 300px"><a style="color: red">*</a> Email</b></td>
      <td><input style="height: 30px;width: 230px;border-radius: 5px;border: 1px solid #D8D8D8;padding-left: 20px" type="email" name="txtEmail" placeholder="abc@gmail.com" value="<?php if(isset($_POST['btnDangky'])){
          echo $_POST['txtEmail'];
        } ?>"></td>
    </tr>
    <tr>
      <td style="height: 30px;padding:20px 0;width: 220px"><b style="width: 300px"><a style="color: red">*</a> Địa Chỉ</b></td>
      <td><input style="height: 30px;width: 230px;border-radius: 5px;border: 1px solid #D8D8D8;padding-left: 20px" type="text" name="txtAddress" placeholder="Số Nhà, Tên Đường, Phường, Quận, Thành Phố"  value="<?php if(isset($_POST['btnDangky'])){
          echo $_POST['txtAddress'];
        } ?>"></td>
    </tr>
    <tr>
      <td style="height: 30px;padding:0px 0;width: 220px"><b style="width: 300px"><a style="color: red">*</a> Điện Thoại</b></td>
      <td><input style="height: 30px;width: 230px;border-radius: 5px;border: 1px solid #D8D8D8;padding-left: 20px" type="text" name="txtPhone" placeholder="090..."  value="<?php if(isset($_POST['btnDangky'])){
          echo $_POST['txtPhone'];
        } ?>"></td>
    </tr>
    <tr>
      <td style="height: 30px;padding:20px 0;width: 220px"><b style="width: 300px"><a style="color: red">*</a> Mật Khẩu</b></td>
      <td><input style="height: 30px;width: 230px;border-radius: 5px;border: 1px solid #D8D8D8;padding-left: 20px" type="password" name="txtPass" placeholder="Mật Khẩu"></td>
    </tr>
    <tr>
      <td style="height: 30px;padding:0px 0;width: 220px"><b style="width: 300px"><a style="color: red">*</a> Nhập Lại Mật Khẩu</b></td>
      <td><input style="height: 30px;width: 230px;border-radius: 5px;border: 1px solid #D8D8D8;padding-left: 20px" type="password" name="txtRepass" placeholder="Nhập Lại Mật Khẩu"></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><button type="submit" name="btnDangky" style="margin-top: 30px;padding: 10px;color: white;border-radius: 5px;width: 200px;font-size: 20px">Đăng Ký</button></td>
    </tr>
  </table>
</form>
</div>
<div id="form3" hidden="" style="background-color: white;width: 500px;height: 270px;position: absolute;top: 150px;margin: 0px 420px;border-radius: 10px;box-shadow: 0 0 1px black" >
<form><div style="border-bottom: 1px solid #E0E6F8;padding: 10px 0"><h2 align="center">Quên Mật Khẩu</h2></div><img id="x2" style="float: right;margin-top: -40px;margin-right: 10px" width="30px" align="center" src="image/x.png">
  <table style="border: none;margin-left: 60px;padding: 0px">
    <tr>
      <td colspan="2"><div style="margin-top: 10px"><a style="color: red">*</a> Vui lòng nhập email mà bạn đã đăng ký với chúng tôi để yêu cầu mã kích hoạt.</div></td>
    </tr>
    <tr>
      <td style="height: 30px;width: 220px;padding:30px 0"><div style="width: 80px;font-weight: bold;"><a style="color: red;font-weight: normal;">*</a> Email</div></td>
      <td><input style="height: 30px;width: 230px;border-radius: 5px;border: 1px solid #D8D8D8;padding-left: 20px" type="text" name="txtEmail" placeholder="abc@gmail.com"></td>
    </tr>
    <tr>
      <td align="center" colspan="2"><button style="margin-top: 5px;padding: 10px;color: white;border-radius: 5px;width: 200px;font-size: 20px">Gửi Mật Khẩu Mới</button></td>
    </tr>
  </table>
</form>
</div>
<script type="text/javascript">
  $(".closedk").click(function(){
    $("#alertdk").hide();
    $("#form2").show();
  });
  $(".closedn").click(function(){
    $(".alertdn").hide();
    $("#form1").show();
  });
</script>