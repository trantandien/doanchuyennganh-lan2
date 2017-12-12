<br><div style="text-align: left;padding-left: 150px;background-color: #EFF5FB;color: #0080FF  ">
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
<?php
print_r($_GET);
$ndi = $_GET["noi-di"];
$nde = $_GET["noi-den"];
$sql = "SELECT
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
lotrinh.Diemdi,
lotrinh.Diemden
FROM
chuyenxe
INNER JOIN lotrinh ON chuyenxe.id_lotrinh = lotrinh.id
WHERE
lotrinh.Diemdi = '$ndi' AND
lotrinh.Diemden = '$nde'
";

echo $sql;
?>

<a class="tim" style="cursor: pointer;">Tìm Chuyến Xe Nhanh</a>
</div>
<br><div><a style="font-size: 25px">CHUYẾN XE HIỆN CÓ</a></div><br>
<?php
$i=0;
$ndi = $_GET["noi-di"];
$nde = $_GET["noi-den"];
//$stmt=$conn->prepare("SELECT * FROM chuyenxe ORDER BY id DESC");
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
lotrinh.Diemdi,
lotrinh.Diemden
FROM
chuyenxe
INNER JOIN lotrinh ON chuyenxe.id_lotrinh = lotrinh.id
WHERE
lotrinh.Diemdi = '$ndi' AND
lotrinh.Diemden = '$nde'
");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?><?php
foreach ($data as $key => $value) {
	if($value['Diemden']==$_GET['noi-den'] && $value['Diemdi']==$_GET['noi-di']){ $i++;?>
	
		<div class="chuyen" style="line-height: 30px;float: left;width: all;margin-left: 400px;margin-right: 360px">
    <div style="text-align: left;float: left;width: 120px"><?php echo $value['Diemdi']; ?></div>
    <div style="text-align: left;float: left;margin-left: 50px;width: 50px"><img width="20" align="center" src="image/go.png"></div>
    <div style="text-align: left;float: left;margin-left: 30px;width: 120px"><?php echo $value['Diemden']; ?></div>
      <div style="float: right;"><button style="color: white;width: 80px;height: 30px;font-weight: bold;">Chọn</button></div>
      <div style="float: right;text-align: right;margin-right: 30px;width: 100px"><b style="color: #FE9A2E"><?php echo number_format($value['Giave'],0,',','.')." đ"; ?></b></div>
      </div>
	<?php }
}
?>
<br><br><br>
