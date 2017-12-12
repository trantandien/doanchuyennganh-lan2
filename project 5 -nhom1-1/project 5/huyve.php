<?php
ob_start();
include 'config.php';
include 'vender/connect.php';
session_start();
$stmt=$conn->prepare("SELECT * FROM donhang JOIN thanhvien ON donhang.Email=thanhvien.Username JOIN vexe ON thanhvien.id=vexe.id_thanhvien JOIN chuyenxe ON vexe.id=chuyenxe.id_vexe");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $key => $value) {
	$id1=$value['id'];
	$chotrong=$_SESSION['Chotrong']+$_GET['soluong'];
	$stmt=$conn->prepare("UPDATE chuyenxe SET Chotrong=$chotrong WHERE id=$id1");
	$stmt->bindParam(":Chotrong",$chotrong,PDO::PARAM_INT);
	$stmt->execute();
	$id=$_GET['id'];
$stmt=$conn->prepare("DELETE FROM donhang WHERE id=$id");
$stmt->execute();
header("location:quanly.php");
}
?>