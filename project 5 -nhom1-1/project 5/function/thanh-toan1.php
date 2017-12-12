<div align="center" style="background-image: url('../templace/image/tech.jpg');">
<?php $url=$_SERVER['REQUEST_URI']."<br>";
$a=0;
foreach ($_SESSION['giohang'] as $gio) {
	$a++;
}
$chuoi=array();
for ($i=0; $i <=$a*2 ; $i++) { 
	stripos($url, "=")."<br>";
stripos($url, "&")."<br>";
$kc=stripos($url, "&")-stripos($url, "=");
$chuoi[]=substr($url, stripos($url, "=")+1,$kc-1);
$url = substr($url,stripos($url, "&")+1);
}
echo "<br>";
?>
<table style="border: none;background: #045FB4;color: white;line-height: 50px;font-size: 13px;font-weight: bolder;">
<tr>
    <td align="center" width="180px"><img width="20" src="image/xe.png"> HÃNG XE</td>
    <td align="center" width="100px"><img width="20" src="image/local2.png"> ĐIỂM ĐI</td>    
    <td align="center" width="100px"><img width="20" src="image/local2.png"> ĐIỂM ĐẾN</td>
    <td align="center" width="120px"><img width="20" src="image/xe.png"> LOẠI XE</td>
    <td align="center" width="90px"><img width="20" src="image/xe.png"> NGÀY ĐI</td>
    <td align="center" width="120px"><img width="20" src="image/xe.png"> NGÀY VỀ</td>
    <td align="center" width="100px"><img width="20" src="image/v.png"> SỐ LƯỢNG</td>
    <td align="center" width="70px"><img width="20" src="image/money1.png"> GIÁ</td>
  </tr>
</table>
<form method="POST">
<table style="border: none;line-height: 20px;font-size: 13px;position: absolute;right: 180px;top: 258px">
	<?php $e=array(); for ($j=1; $j <$a*2 ; $j=$j+2) { ?>
		<tr>	
			<td align="center" height="20" ><?php echo $e[]=$chuoi[$j]*1; ?></td>
		</tr><?php } ?>
	</table>
<?php $d=array();$b=1;$c=0; foreach ($_SESSION['giohang'] as $value) { 
	$id=$value;
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
chuyenxe.id=$id");
	$stmt->execute();
	$data = $stmt->fetch(PDO::FETCH_ASSOC);
	$_SESSION['Ngaydi']=$data['Ngaydi'];
	$_SESSION['Ngayden']=$data['Ngayve'];
	$_SESSION['Giave']=$data['Giave']*$_GET['slve'];
	$first_date = strtotime($data['Ngaydi']);
	$second_date = strtotime($data['Ngayve']);
	$datediff = abs($first_date - $second_date);
	$first_time = strtotime($data['Giodi']);
	$second_time = strtotime($data['Gioden']);
	$timediff = abs($first_time - $second_time);
	$date=date_create($data['Ngaydi']);
	$date1=date_create($data['Ngayve']);
	date_format($date,"d-m-Y");
	date_format($date1,"d-m-Y");?>
<table style="border: none;line-height: 20px;font-size: 13px;">
	<tr>
		<td rowspan="2" align="center" width="90px"><?php echo $data['Tenxe']; ?></td>
		<td align="center" width="70px"><?php echo $_SESSION['Giodi']=$data['Giodi']; ?></td>
    
    <td align="center" width="100px"><?php echo $_SESSION['Gioden']=$data['Gioden']; ?></td>
    <td colspan="3" align="center" width="90px"><?php echo $data['Soluongghe']." chỗ"; ?></td>
    <td align="center" width="110px"  rowspan="2"><?php echo date_format(date_create($data["Ngaydi"]),"d-m-Y"); ?></td>
    <td align="center" width="110px"  rowspan="2"><?php echo date_format(date_create($data["Ngayve"]),"d-m-Y"); ?></td>

    <td  align="center" width="120px"><?php echo number_format($data['Giave']*$chuoi[$b],0,",",".")." VNĐ";$c=$c+($data['Giave']*$chuoi[$b]);$b=$b+2; ?></td></td>
	</tr>
	<tr>
    <td align="center" width="110px"></td>
    <td align="center" width="110px"></td>
  </tr>
  <tr>
    <td align="center" width="90px"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"></td>
    <td align="center" width="90px"><?php echo $_SESSION['Diemdi']=$data['Diemdi']; ?></td>
    <td align="center" width="110px"><?php echo $_SESSION['Diemden']=$data['Diemden']; ?></td>
    <td align="center" width="100px"><img width="20" src="image/nuoc.png"> <img width="20" src="image/banh.png"> <img width="20" src="image/wifi.png"></td>
  </tr>
	</table>
<?php } ?>
</div>
</form>
<?php
$stmt=$conn->prepare("SELECT * FROM thanhvien");
$stmt->execute();
$hanhkhach = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div style="margin: 0 150px"><hr></div>
<form method="POST">
<table style="border: none;width: 950px">
<?php foreach ($hanhkhach as $hk) {
  if($hk['Username']==$_SESSION['user']){
?>
  <tr>
    <td>Tài Khoản</td>
    <td colspan="2"><?php echo $hk['Username']; ?><input type="text" name="txtUser" value="<?php echo $hk['Username']; ?>" hidden></td>
    <td rowspan="4"><button name="btnThanhtoan" style="color: white;width: 100px;height: 30px;font-weight: bolder;">Thanh Toán</button></td>
  </tr>
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
<br>
<?php
	if(isset($_POST['btnThanhtoan'])){
		echo "h";
		for ($z=0; $z < $a ; $z++) { 
			$data1=array(
      'Username' => $_POST['txtUser'],
      'TenHanhKhach' => $_POST['txtName'],
      'Phone' => $_POST['txtPhone'],
      'Email' => $_POST['txtEmail'],
      'Soluong' => $_GET['slve'],
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
            $stmt->bindParam(":Soluong",$_GET['slve'],PDO::PARAM_INT);
            $stmt->bindParam(":Diemdi",$_SESSION['Diemdi'],PDO::PARAM_STR);
            $stmt->bindParam(":Giodi",$_SESSION['Giodi'],PDO::PARAM_STR);
            $stmt->bindParam(":Ngaydi",$_SESSION['Ngaydi'],PDO::PARAM_STR);
            $stmt->bindParam(":Diemden",$_SESSION['Diemden'],PDO::PARAM_STR);
            $stmt->bindParam(":Gioden",$_SESSION['Gioden'],PDO::PARAM_STR);
            $stmt->bindParam(":Ngayden",$_SESSION['Ngayden'],PDO::PARAM_STR);
            $stmt->bindParam(":Giave",$_SESSION['Giave'],PDO::PARAM_INT);
            $stmt->execute();
            $id=$_GET['idget'];
      $stmt=$conn->prepare("SELECT Chotrong FROM chuyenxe WHERE id=$id");
      $stmt->execute();
      $data2 = $stmt->fetch(PDO::FETCH_ASSOC);
      $conlai=$data2['Chotrong']-$_GET['slve'];
      $stmt=$conn->prepare("UPDATE chuyenxe SET Chotrong=$conlai WHERE id=$id");
      $stmt->bindParam(":Chotrong",$conlai,PDO::PARAM_INT);
      $stmt->execute();	
		}
?>	
<div style="background: white;border: 2px solid #E0E6F8;padding: 10px 0px;position: absolute;top: 220px;left: 400px"><div style="border-bottom: 1px solid #E0E6F8;padding-bottom: 10px"><h2 align="center">Thông Báo</h2></div>
<form action="index.php">
  <table style="border: none;width: 200px;">
    <tr>
      <td align="center"><div style="margin-top: 50px">Thanh Toán Thành Công !!!<br><br>Chúng Tôi Sẽ Liên Hệ Lại Trong Thời Gian Sớm Nhất</div></td>
    </tr>
    <tr>
      <td align="center"><button id="Okdn" type="submit" style="margin-top: 20px;padding: 10px;color: white;border-radius: 5px;width: 200px;font-size: 20px">OK</button></td>
    </tr>
  </table>
</form>
</div>
<?php	}
?>