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
<a class="tim" style="cursor: pointer;">Tìm Chuyến Xe Nhanh</a>
</div>

<br>
<?php
$stmt=$conn->prepare("SELECT * FROM thanhvien");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $key => $value) {
  if($value['Username']==$_SESSION['user']){ 
    if($value['level']==1){
      ?>
      <div><h2>Thông Tin Tài Khoản</h2></div>
  <div><br>
    <table align="left" style="background-color: #EFEFFB;border: none;">
      <tr>
        <td>Username </td>
        <td><?php echo $value['Username']; ?></td>
      </tr>
      <tr>
        <td>Họ Tên </td>
        <td><?php echo $value['TenTV']; ?></td>
      </tr>
      <tr>
        <td>Số Điện Thoại </td>
        <td><?php echo "0".$value['Phone']; ?></td>
      </tr>
      <tr>
        <td>Địa Chỉ </td>
        <td><?php echo $value['Diachi']; ?></td>
      </tr>
      <tr>
        <td colspan="2"><a style="color: #0080FF">Thay Đổi Mật Khẩu</a></td>
      </tr>
      <tr>
        <td colspan="2"><b>Chuyến Xe Đã Đặt : </b></td>
      </tr>

    <?php
    /*$stmt=$conn->prepare("SELECT * FROM donhang JOIN thanhvien ON donhang.Username=thanhvien.Username");
    $stmt->execute();
    $data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data1 as $donhang) {?>
      <?php  
      if($donhang['Username']==$value['Username']){ 
        $ii=$donhang['id'];
        $stmt=$conn->prepare("SELECT * FROM vexe JOIN chuyenxe ON vexe.id=chuyenxe.id_vexe WHERE id_thanhvien=$ii");
       $stmt->execute();
       $data2 = $stmt->fetch(PDO::FETCH_ASSOC);
      ?>
    <?php  } }*/
    $stmt=$conn->prepare("SELECT * FROM donhang JOIN thanhvien WHERE donhang.Username=thanhvien.Username and thanhvien.Username= '".$_SESSION['user'] ."'");
    $stmt->execute();
    $data0 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data0 as $key => $value0) {
    ?>
    <tr>
      <td colspan="2"><hr></td>
    </tr>

    <tr><?php 
    $date=date_create($value0['Ngaydi']);date_format($date,"d-m-Y");
    $date1=date_create($value0['Ngayden']);date_format($date1,"d-m-Y"); 
    ?>
      <td colspan=""><b>Số Lượng Vé : </b><?php  echo $value0['Soluong']; ?></td><td><a href="huyve.php?id=<?php echo $value0['id']; ?>&soluong=<?php  echo $value0['Soluong']; ?>" style="color: red;font-weight: bolder;"><img width="20" align="center" src="image/huy.png"> Hủy Vé</a></td>
    </tr>
    <tr>
      <td colspan=""><b>Điểm Đi : </b><?php echo $value0['Diemdi']; ?></td>
    </tr>
    <tr>
      <td colspan=""><b>Giờ Đi : </b><?php echo $value0['Giodi']; ?></td>
    </tr>
    <tr>
      <td colspan=""><b>Ngày Đi : </b><?php echo date_format($date,"d-m-Y"); ?></td>
    </tr>
    <tr>
      <td colspan=""><b>Điểm Đến : </b><?php echo $value0['Diemden']; ?></td>
    </tr>
    <tr>
      <td colspan=""><b>Giờ Đến : </b><?php echo $value0['Gioden']; ?></td>
    </tr>
    <tr>
      <td colspan=""><b>Ngày Đến : </b><?php echo date_format($date1,"d-m-Y"); ?></td>
    </tr>
    <tr>
      <td colspan=""><b>Giá vé : </b><?php echo number_format($value0['Giave'],0,",",".") . "VNĐ"; ?></td>
    </tr>
    <?php }
    ?>
    </table></div>
  <?php }else{ 
      header("location:admin.php");
   }
  }
}
?>
