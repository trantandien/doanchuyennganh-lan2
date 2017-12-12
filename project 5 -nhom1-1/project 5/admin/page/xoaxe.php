<?php 
if(isset($_GET["id"])){
	$id = $_GET["id"];
	settype($id,'int');
	if($id <= 0){
		header("location:index.php?p=danhsachxe");
		exit();
	}else{
		$stmt = $conn->prepare("DELETE  FROM `xe` WHERE id = :id");
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
		?>
            <script>
                window.location='index.php?p=danhsachxe';
            </script>
            <?php
		exit();
	}
}else{
	header("location:index.php?p=danhsachxe");
	exit();
}
?>