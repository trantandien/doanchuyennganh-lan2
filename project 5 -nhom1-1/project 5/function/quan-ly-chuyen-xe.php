<?php
ob_start();
include '../config.php';
include '../vender/connect.php';
$stmt=$conn->prepare("SELECT * FROM lotrinh JOIN chuyenxe ON lotrinh.id=chuyenxe.id_lotrinh JOIN xe ON chuyenxe.id_xe=xe.id");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div>
<table  style="padding: 0;background-color: #EFEFFB;border: none;margin: 0;margin-right: 150px;margin-top: 168px;width: 840px;">
<thead>
	<th>Điểm Đi</th>
	<th>Điểm Đến</th>
	<th>Lộ Trình</th>
	<th>Xe</th>
	<th>Giờ Đi</th>
	<th>Giờ Đến</th>
	<th>Giá Vé</th>
</thead>
<?php foreach ($data as $chuyenxe) {?>
<tr>
	<td><?php echo $chuyenxe['Diemdi']; ?></td>
	<td><?php echo $chuyenxe['Diemden']; ?></td>
	<td><?php echo $chuyenxe['Diemdi']."=>".$chuyenxe['Diemden']; ?></td>
	<td><?php echo $chuyenxe['Tenxe']; ?></td>
	<td><?php echo $chuyenxe['Giodi']; ?></td>
	<td><?php echo $chuyenxe['Gioden']; ?></td>
	<td align="right"><?php echo number_format($chuyenxe['Giave'],0,',','.')." VNĐ/Vé"; ?></td>

</tr>
<?php } ?>
</table>
