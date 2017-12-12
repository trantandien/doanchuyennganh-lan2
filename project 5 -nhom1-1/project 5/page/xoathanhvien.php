<?php 
if(isset($_GET["id"])){
	$id = $_GET["id"];
	settype($id,'int');
	if($id <= 0){
		header("location:admin.php?p=danhsachthanhvien");
		exit();
	}else{
		$stmt = $conn->prepare("DELETE  FROM `thanhvien` WHERE id = :id");
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
		?>
            <script>
                window.location='admin.php?p=danhsachthanhvien';
            </script>
            <?php
		exit();
	}
}else{
	header("location:admin.php?p=danhsachthanhvien");
	exit();
}
?>