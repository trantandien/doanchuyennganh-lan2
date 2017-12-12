<?php
ob_start();
include '../config.php';
include '../vender/connect.php';
$stmt=$conn->prepare("SELECT * FROM taixe");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div>
<table  style="padding: 0;background-color: #EFEFFB;border: none;margin: 0;margin-right: 150px;margin-top: 168px;width: 840px;">
<thead>
	<th width="110">Tên Tài Xế</th>
	<th width="300">Số Điện Thoại</th>
	<th width="70">Vai Trò</th>
</thead>
<?php foreach ($data as $taixe) {?>
	<tr>
    <td><?php echo $taixe['TenTX']; ?></td>
    <td><?php echo $taixe['SDT']; ?></td>
    <td><?php echo $taixe['id_PLTX']; ?></td>
  </tr>  
  
<?php } ?>
</table>
<script type="text/javascript">
	$("a[name='chi-tiet']").click(function(){
		$.ajax({
			url:'function/chi-tiet.php',
			type: 'GET',
			dataType:'html',
		})
		.done(function(dulieu){
			$("#bang").html(dulieu)
		})
	});
</script>