<?php
ob_start();
include '../config.php';
include '../vender/connect.php';
$stmt=$conn->prepare("SELECT * FROM thanhvien JOIN vexe ON thanhvien.id=vexe.id_thanhvien JOIN chuyenxe ON chuyenxe.id_vexe=vexe.id");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $key => $value) {
  echo "Họ Tên :".$value['TenTV']."</br>";
  echo "Số stt ghế :".$value['Soghe']."</br>";
  echo "Giá Vé :".$value['GiaveLB']."</br>";
  echo "Giờ Đi :".$value['Giodi']."</br>";
  echo "Ngày Đi :".$value['Ngaydi']."</br>";
}
?>