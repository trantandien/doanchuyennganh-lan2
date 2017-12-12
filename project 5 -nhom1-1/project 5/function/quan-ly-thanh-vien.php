<?php
ob_start();
include '../config.php';
include '../vender/connect.php';
$stmt=$conn->prepare("SELECT * FROM thanhvien");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div>
<table  style="padding: 0;background-color: #EFEFFB;border: none;margin: 0;margin-right: 150px;margin-top: 168px;width: 840px;">
<thead>
	<th width="110">Tên Tài Khoản</th>
	<th width="300">Họ Tên</th>
	<th width="70">Cấp Bậc</th>
	<th width="100">...</th>
</thead>
<?php foreach ($data as $thanhvien) {?>
	<tr>
    <td><?php echo $thanhvien['Username']; ?></td>
    <td><?php echo $thanhvien['TenTV']; ?></td>
    <td><?php 
    if($thanhvien['level']==1){
    			echo "Khách";
   	}
   	if($thanhvien['level']==0){
    			echo "<a style='color:red'>Admin</a>";
   	} 
    	?></td>
    	<td><a href="function/chi-tiet.php?id=<?php echo $thanhvien['id']; ?>">Chi Tiết</a></td>
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