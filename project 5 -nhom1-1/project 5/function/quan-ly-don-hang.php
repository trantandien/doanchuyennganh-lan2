<?php
ob_start();
include '../config.php';
include '../vender/connect.php';
$stmt=$conn->prepare("SELECT * FROM donhang");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div>
<table  style="padding: 0;background-color: #EFEFFB;border: none;margin: 0;margin-right: 150px;margin-top: 168px;width: 840px;font-size: 14px">
<thead>
	<th>Tên Hành Khách</th>
	<th>SĐT</th>
	<th>Số Lượng</th>
	<th>Điểm Đi</th>
	<th>Thời Gian Đi</th>
	<th>Giá Vé</th>
</thead>
<?php foreach ($data as $donhang) {
	$date=date_create($donhang['Ngaydi']);
  $date1=date_create($donhang['Ngayden']);
  date_format($date,"d-m-Y");
  date_format($date1,"d-m-Y");
?>
	<tr>
		<td rowspan="2"><?php echo $donhang['TenHanhKhach']; ?></td>
		<td rowspan="2"><?php echo "0".$donhang['Phone']; ?></td>
		<td rowspan="2"><?php echo $donhang['Soluong']; ?></td>
		<td rowspan="2"><?php echo $donhang['Diemdi']; ?></td>
		<td><?php echo $donhang['Giodi']; ?></td>
		<td rowspan="2"><?php echo number_format($donhang['Giave'],0,',','.'). " VNĐ"; ?></td>	
 	</tr>
 	<tr>
 		<td><?php echo date_format($date,"d-m-Y"); ?></td>
 	</tr>
<?php } ?>
</table>
