<?php
ob_start();
include '../config.php';
include '../vender/connect.php';
$stmt=$conn->prepare("SELECT * FROM xe");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div>
<table  style="padding: 0;background-color: #EFEFFB;border: none;margin: 0;margin-right: 150px;margin-top: 168px;width: 840px;">
<thead>
	<th>Tên Xe</th>
	<th>Số Xe</th>
	<th>Số Lượng Ghế</th>
</thead>
<?php foreach ($data as $xe) {?>
<tr>
	<td><?php echo $xe['Tenxe']; ?></td>
	<td><?php echo $xe['Soxe']; ?></td>
	<td><?php echo $xe['Soluongghe']; ?></td>
</tr>
<?php } ?>
</table>
