<?php
//echo "<pre>";print_r($_SESSION);//exit;
//echo "<pre>";print_r($_POST);
if(isset($_SESSION['user'])){?>
<br><div style="text-align: left;padding-left: 150px;background-color: #EFF5FB;color: #0080FF  ">
<form class="timnhanh" method="GET" action="search.php" hidden="">
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
</div><br>
<div style="font-size: 30px;margin: 20px 0;"><a>THANH TOÁN</a></div>
<?php
print_r($_POST);
$idget=$_POST['idget'];
/*$sql ="SELECT * FROM lotrinh JOIN chuyenxe ON lotrinh.id=chuyenxe.id_lotrinh JOIN xe ON chuyenxe.id_xe=xe.id WHERE chuyenxe.id_lotrinh=$idget";*/
$sql ="SELECT
chuyenxe.id,
chuyenxe.Giodi,
chuyenxe.Gioden,
chuyenxe.Diemdi,
chuyenxe.Diemden,
chuyenxe.Ngaydi,
chuyenxe.Ngayve,
chuyenxe.Giave,
chuyenxe.Chotrong,
chuyenxe.id_lotrinh,
chuyenxe.id_taixe,
chuyenxe.id_xe,
chuyenxe.id_vexe,
`xe`.Tenxe,
`xe`.Soluongghe
FROM
chuyenxe
INNER JOIN lotrinh ON chuyenxe.id_lotrinh = lotrinh.id
INNER JOIN `xe` ON chuyenxe.id_xe = `xe`.id
WHERE
chuyenxe.id = $idget;
";
$stmt=$conn->prepare($sql);
//echo $sql;
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//echo "<pre>";print_r($data);exit;
?>
<table style="border: none;background: #045FB4;color: white;line-height: 50px;font-size: 13px;font-weight: bolder;">
  <tr>
    <td align="center" width="160px"><img width="20" src="image/xe.png"> HÃNG XE</td>
    <td align="center" width="120px"><img width="20" src="image/local2.png"> ĐIỂM ĐI</td>    
    <td align="center" width="210px"><img width="20" src="image/local2.png"> ĐIỂM ĐẾN</td>
    <td align="center" width="120px"><img width="20" src="image/xe.png"> LOẠI XE</td>
    <td align="center" width="90px"><img width="20" src="image/xe.png"> NGÀY ĐI</td>
    <td align="center" width="120px"><img width="20" src="image/xe.png"> NGÀY VỀ</td>
    <td align="center" width="100px"><img width="20" src="image/v.png"> SỐ LƯỢNG</td>
    <td align="center" width="70px"><img width="20" src="image/money1.png"> GIÁ</td>
    
     
  </tr>
</table>
<br>
<form method="POST">
<table style="border: none;line-height: 10px;font-size: 15px;margin-right: 90px">
<?php foreach ($data as $chonxe) {?>
  <tr>
  <?php
  $_SESSION['Ngaydi']=$chonxe['Ngaydi'];
  $_SESSION['Ngayden']=$chonxe['Ngayve'];
  $_SESSION['Giave']=$chonxe['Giave']*$_POST['slve'];
  $_SESSION['Giodi']=$chonxe['Giodi'];
  $_SESSION['Gioden']=$chonxe['Gioden'];
  $first_date = strtotime($chonxe['Ngaydi']);
  $second_date = strtotime($chonxe['Ngayve']);
  $datediff = abs($first_date - $second_date);
  $first_time = strtotime($chonxe['Giodi']);
  $second_time = strtotime($chonxe['Gioden']);
  $timediff = abs($first_time - $second_time);
  $date=date_create($chonxe['Ngaydi']);
  $date1=date_create($chonxe['Ngayve']);
  date_format($date,"d-m-Y");
  date_format($date1,"d-m-Y");
  ?>
    <td align="center" width="150px"><?php echo $chonxe['Tenxe']; ?> 
    <!-- <input type="text" name="idchuyen" value="<?php //echo $chonxe['idchuyen'] ?>"> -->
    </td>
    <td align="center" width="130px"><?php echo $chonxe['Giodi']; ?></td>
    
    <td align="center" width="210px"><?php echo $chonxe['Gioden']; ?></td>
    <td align="center" width="100px" colspan="3"><?php echo $chonxe['Soluongghe']." chỗ"; ?></td>
    <td align="center" width="110px"  rowspan="2"><?php echo date_format(date_create($chonxe["Ngaydi"]),"d-m-Y"); ?></td>
    <td align="center" width="110px"  rowspan="2"><?php echo date_format(date_create($chonxe["Ngayve"]),"d-m-Y"); ?></td>
    <td  align="center" width="100px"><?php echo $_POST['slve']; ?>
    <input type="hidden" name="slve" value="<?php echo $_POST['slve']; ?>">
    </td>
    <td  align="center" width="120px"><?php echo number_format($chonxe['Giave']*$_POST['slve'],0,',','.')." VNĐ"; ?></td>
    
    <!-- <input type="text" name="idget" value="<?php //echo $chonxe['idchuyen']; ?>" hidden> -->
  <tr>
    <td align="center" width="90px"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"></td>
    <td align="center" width="90px"><?php echo $_SESSION['Diemdi']=$chonxe['Diemdi']; ?></td>
    <td align="center" width="110px"><?php echo $_SESSION['Diemden']=$chonxe['Diemden']; ?></td>
    <td align="center" width="100px"><img width="20" src="image/nuoc.png"> <img width="20" src="image/banh.png"> <img width="20" src="image/wifi.png"></td>
  </tr>
<?php } ?>
</table>
<br>
<?php
$stmt=$conn->prepare("SELECT * FROM thanhvien");
$stmt->execute();
$hanhkhach = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div style="margin: 0 150px"><hr></div>
<table style="border: none;width: 950px">

<?php foreach ($hanhkhach as $hk) {
  if($hk['Username']==$_SESSION['user']){
?>
  <tr>
    <td>Tài Khoản</td>
    <td colspan="2"><?php echo $hk['Username']; ?><input type="text" name="txtUser" value="<?php echo $hk['Username']; ?>" hidden></td>
    <td rowspan="4"><button name="btnThanhtoan" style="color: white;width: 100px;height: 30px;font-weight: bolder;">Thanh Toán</button></td>
  </tr>
  <input type="hidden"  name="idget" value="<?php echo $_POST['idget'];?>">
  <tr>
    <td>Họ Tên Hành Khách</td>
    <td colspan="2"><?php echo $hk['TenTV']; ?><input type="text" name="txtName" value="<?php echo $hk['TenTV']; ?>" hidden></td>
   
  </tr>
  <tr>
    <td>Số Điện Thoại</td>
    <td colspan="6"><?php echo "0".$hk['Phone']; ?><input type="text" name="txtPhone" value="<?php echo $hk['Phone']; ?>" hidden></td>
  </tr>
  <tr>
    <td>Email</td>
    <td colspan="6"><?php echo $hk['Email']; ?><input type="text" name="txtEmail" value="<?php echo $hk['Email']; ?>" hidden></td>
  </tr>  
<?php } } ?>
</table>
</form>
<?php 
if(isset($_POST['btnThanhtoan'])){
  //echo "hhhhh";
  $data1=array(
      'Username' => $_POST['txtUser'],
      'TenHanhKhach' => $_POST['txtName'],
      'Phone' => $_POST['txtPhone'],
      'Email' => $_POST['txtEmail'],
      'Soluong' => $_POST['slve'],
      'Diemdi' => $_SESSION['Diemdi'],
      'Giodi' => $_SESSION['Giodi'],
      'Ngaydi' => $_SESSION['Ngaydi'],
      'Diemden' => $_SESSION['Diemden'],
      'Gioden' => $_SESSION['Gioden'],
      'Ngayden' => $_SESSION['Ngayden'],
      'Giave' => $_SESSION['Giave']
      );
  $stmt = $conn->prepare("INSERT INTO donhang(Username,TenHanhKhach,Phone,Email,Soluong,Diemdi,Giodi,Ngaydi,Diemden,Gioden,Ngayden,Giave) VALUES (:Username,:TenHanhKhach,:Phone,:Email,:Soluong,:Diemdi,:Giodi,:Ngaydi,:Diemden,:Gioden,:Ngayden,:Giave)");
            $stmt->bindParam(":Username",$_POST['txtUser'],PDO::PARAM_STR);
            $stmt->bindParam(":TenHanhKhach",$_POST['txtName'],PDO::PARAM_STR);
            $stmt->bindParam(":Phone",$_POST['txtPhone'],PDO::PARAM_INT);
            $stmt->bindParam(":Email",$_POST['txtEmail'],PDO::PARAM_STR);
            $stmt->bindParam(":Soluong",$_POST['slve'],PDO::PARAM_INT);
            $stmt->bindParam(":Diemdi",$_SESSION['Diemdi'],PDO::PARAM_STR);
            $stmt->bindParam(":Giodi",$_SESSION['Giodi'],PDO::PARAM_STR);
            $stmt->bindParam(":Ngaydi",$_SESSION['Ngaydi'],PDO::PARAM_STR);
            $stmt->bindParam(":Diemden",$_SESSION['Diemden'],PDO::PARAM_STR);
            $stmt->bindParam(":Gioden",$_SESSION['Gioden'],PDO::PARAM_STR);
            $stmt->bindParam(":Ngayden",$_SESSION['Ngayden'],PDO::PARAM_STR);
            $stmt->bindParam(":Giave",$_SESSION['Giave'],PDO::PARAM_INT);
            //print_r($data1); exit();
            $stmt->execute();
            $id=$_POST['idget'];           
      $stmt=$conn->prepare("SELECT Chotrong FROM chuyenxe WHERE id=$id");
      $stmt->execute();
      $data2 = $stmt->fetch(PDO::FETCH_ASSOC);
      $conlai=$data2['Chotrong']-$_POST['slve'];
      $_SESSION['Chotrong']=$conlai;
      $stmt=$conn->prepare("UPDATE chuyenxe SET Chotrong=$conlai WHERE id=$id");
      $stmt->bindParam(":Chotrong",$conlai,PDO::PARAM_INT);
      $stmt->execute();
      ?>

<div style="background: white;border: 2px solid #E0E6F8;padding: 10px 0px;position: absolute;top: 220px;left: 400px"><div style="border-bottom: 1px solid #E0E6F8;padding-bottom: 10px"><h2 align="center">Thông Báo</h2></div>
<form action="index.php" >
  <table style="border: none;width: 500px;">
    <tr>
      <td align="center"><div style="margin-top: 50px">Thanh Toán Thành Công !!!<br><br>Chúng Tôi Sẽ Liên Hệ Lại Trong Thời Gian Sớm Nhất</div></td>
    </tr>
    <tr>
      <td align="center"><button id="Okdn" type="submit" style="margin-top: 20px;padding: 10px;color: white;border-radius: 5px;width: 200px;font-size: 20px">OK</button></td>
    </tr>
  </table>
</form>
</div>

<?php
    exit();
}
?>

<div style="margin: 0 150px"><hr></div>
<br><br>
<?php }else{?>
<div style="border-bottom: 1px solid #E0E6F8;padding: 10px 0px"><h2 align="center">Thông Báo</h2></div>
<form action="index.php">
  <table style="border: none;margin-left: 150px;width: 400px">
    <tr>
      <td align="center"><div style="margin-top: 50px">Vui Lòng Đăng Nhập Để Thực Hiện Thao Tác</div></td>
    </tr>
    <tr>
      <td align="center"><button id="Okdn" type="submit" style="margin-top: 20px;padding: 10px;color: white;border-radius: 5px;width: 200px;font-size: 20px">OK</button></td>
    </tr>
  </table>
</form>

</div>
<?php } ?>
