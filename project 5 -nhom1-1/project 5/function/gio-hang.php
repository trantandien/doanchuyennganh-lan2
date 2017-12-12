<?php if(isset($_SESSION['user'])){ ?>
<div>
<a align="center" style="font-size: 30px">GIỎ HÀNG</a>
<?php
	if(isset($_SESSION['id'])){
	$id=$_SESSION['id'];
	$stmt=$conn->prepare("SELECT * FROM chuyenxe WHERE id=$id");
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	if(!isset($_SESSION['giohang'])){
				$_SESSION['giohang']=array();
				array_unshift($_SESSION['giohang'], $data['id']);
				json_encode($_SESSION['giohang']);
			}else{
				if(!in_array($data['id'], $_SESSION['giohang'])){
				array_unshift($_SESSION['giohang'], $data['id']);
				json_encode($_SESSION['giohang']);
				}	
			}
	
?>
<center>
<form method="GET" action="thanh-toan1.php">
<table style="border: none;background: #045FB4;color: white;line-height: 50px;font-size: 13px;font-weight: bolder;">
  <tr>
    <td align="center" width="90px"><img width="20" src="image/xe.png"> HÃNG XE</td>
    <td align="center" width="90px"><img width="20" src="image/local2.png"> ĐIỂM ĐI</td>
    <td align="center" width="110px"><img width="20" src="image/local2.png"> ĐIỂM ĐẾN</td>
    <td align="center" width="100px"><img width="20" src="image/xe.png"> LOẠI XE</td>
    <td align="center" width="90px"><img width="20" src="image/xe.png"> NGÀY ĐI</td>
    <td align="center" width="120px"><img width="20" src="image/xe.png"> NGÀY VỀ</td>
    <td align="center" width="100px"><img width="20" src="image/v.png"> SỐ LƯỢNG</td>
    <td align="center" width="70px"><img width="20" src="image/money1.png"> GIÁ</td>
  </tr>
<?php foreach ($_SESSION['giohang'] as $cart) { 
	$stmt=$conn->prepare("SELECT
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
chuyenxe.id =$cart;");
	$stmt->execute();
	$chonxe = $stmt->fetch(PDO::FETCH_ASSOC);
	?>
<table style="border: none;line-height: 20px;font-size: 13px;">
	<tr>
  <?php
  $_SESSION['Ngaydi']=$chonxe['Ngaydi'];
  $_SESSION['Ngayden']=$chonxe['Ngayve'];
  $_SESSION['Giave']=$chonxe['Giave'];
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
    
    <td rowspan="2" align="center" width="140px"><?php echo $chonxe['Tenxe']; ?></td>
    <input type="text" name="idget" value="<?php echo $chonxe['id']; ?>" >
    <td align="center" width="90px"><?php echo $_SESSION['Giodi']=$chonxe['Giodi']; ?></td>
    
    <td align="center" width="110px"><?php echo $_SESSION['Gioden']=$chonxe['Gioden']; ?></td>
    <td rowspan="2" align="center" width="100px"><?php echo $chonxe['Soluongghe']." chỗ"; ?></td>
    <td align="center" width="110px"  rowspan="2"><?php echo date_format(date_create($chonxe["Ngaydi"]),"d-m-Y"); ?></td>
    <td align="center" width="110px"  rowspan="2"><?php echo date_format(date_create($chonxe["Ngayve"]),"d-m-Y"); ?></td>
    <td rowspan="3" align="center" width="100px"><select name="slve" style="width: 50px;margin-left: 10px"><?php for ($i=1; $i <=$chonxe['Soluongghe'] ; $i++) {?>
      <option><?php echo $i; ?></option>
    <?php } ?> 
    </select></td>
    <td rowspan="3" align="center" width="100px"><?php echo number_format($chonxe['Giave'],0,',','.')." VNĐ"; ?></td>
  </tr>
  <tr>
    <td ></td>
    <td></td>
  <tr>
    <td align="center" width="90px"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"></td>
    <td align="center" width="90px"><?php echo $_SESSION['Diemdi']=$chonxe['Diemdi']; ?></td>
    <td align="center" width="110px"><?php echo $_SESSION['Diemden']=$chonxe['Diemden']; ?></td>
    <td align="center" width="100px"><img width="20" src="image/nuoc.png"> <img width="20" src="image/banh.png"> <img width="20" src="image/wifi.png"></td>
  </tr>
<?php } ?>
</table>
<hr style="margin: 0 150px">
<br>
<button type="submit" name="btnThanhtoan" style="color: white;width: 100px;height: 30px;font-weight: bolder;margin-right: 5px">Thanh Toán</button><a href="xoagh.php"><button type="button" style="color: white;width: 100px;height: 30px;font-weight: bolder;margin-left: 5px">Xóa</button></a>
</form>
<br>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<a style="cursor: pointer;display: none;" onclick="topFunction()" id="myBtn" title="Go to top"><img align="center" width="60px" src="../templace/image/top.png" style="position: fixed;bottom: 20px;right: 5px;background-color: #FFBF00;border-radius: 30px"></a>
<?php }else{
	echo "<br><br><h3 align='center'>Giỏ Hàng Trống</h3>";
	} ?>	
</div>
<?php }else{ ?>
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
<?php  } ?>
</center>