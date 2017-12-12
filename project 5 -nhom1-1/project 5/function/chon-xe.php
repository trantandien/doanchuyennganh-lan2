<br><div style="text-align: left;padding-left: 150px;background-color: #EFF5FB;color: #0080FF  ">
<?php
$idget=$_GET['id'];
$stmt=$conn->prepare("SELECT  chuyenxe.id as idchuyen, `Giodi`, `Gioden`,chuyenxe.Diemdi,chuyenxe.Diemden, `Ngaydi`,`Ngayve`, `Giave`, `Chotrong`, `id_lotrinh`, `id_taixe`, `id_xe`, Tenxe, Soluongghe FROM lotrinh JOIN chuyenxe ON lotrinh.id=chuyenxe.id_lotrinh JOIN xe ON chuyenxe.id_xe=xe.id WHERE chuyenxe.id_lotrinh=$idget");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//echo '<pre>';print_r($data);
?>
<form class="timnhanh" method="GET" action="search.php" hidden="">
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
</div><br>

<table style="border: none;background: #045FB4;color: white;line-height: 50px;font-size: 13px;font-weight: bolder;">
  <tr>
    <td align="center" width="140px"><img width="20" src="image/xe.png"> HÃNG XE</td>
    <td align="center" width="120px"><img width="20" src="image/local2.png"> ĐIỂM ĐI</td>
    
    <td align="center" width="210px"><img width="20" src="image/local2.png"> ĐIỂM ĐẾN</td>
    <td align="center" width="120px"><img width="20" src="image/xe.png"> LOẠI XE</td>
    <td align="center" width="90px"><img width="20" src="image/xe.png"> NGÀY ĐI</td>
    <td align="center" width="120px"><img width="20" src="image/xe.png"> NGÀY VỀ</td>
    <td align="center" width="70px"><img width="20" src="image/money1.png"> GIÁ</td>
    <td align="center" width="100px"><img width="20" src="image/v.png"> SỐ LƯỢNG</td>
    <td align="center" width="75px"><img width="20" src="image/ticket.png"> ĐẶT VÉ</td>
  </tr>
</table>
<table style="border: none;"  >
<?php foreach ($data as $chonxe) 
{?>
  <tr>
  <?php
  /*$first_date = strtotime($chonxe['Ngaydi']);
  $second_date = strtotime($chonxe['Ngayve']);*/
  //$datediff = abs($first_date - $second_date);
  $first_time = strtotime($chonxe['Giodi']);
  $second_time = strtotime($chonxe['Gioden']);
  $timediff = abs($first_time - $second_time);
  ?>

<form method="post" action="thanh-toan.php">
    <td align="center" width="150px"><?php echo $chonxe['Tenxe']; ?> 
    <input type="text" name="idchuyen" value="<?php echo $chonxe['idchuyen'] ?>">
    </td>
    <td align="center" width="120px"><?php echo $chonxe['Giodi']; ?></td>
    
    <td align="center" width="210px"><?php echo $chonxe['Gioden']; ?></td>
    <td align="center" width="100px" colspan="3"><?php echo $chonxe['Soluongghe']." chỗ"; ?></td>
    <td align="center" width="110px"  rowspan="2"><?php echo date_format(date_create($chonxe["Ngaydi"]),"d-m-Y"); ?></td>
    <td align="center" width="110px"  rowspan="2"><?php echo date_format(date_create($chonxe["Ngayve"]),"d-m-Y"); ?></td>
    <td align="center" width="100px" rowspan="2"><?php echo number_format($chonxe['Giave'],0,',','.')." VNĐ"; ?></td>
    
    <input type="text" name="idget" value="<?php echo $chonxe['idchuyen']; ?>" hidden> 

    <td rowspan="2"><select name="slve" style="width: 50px;top:320px;right: 1200px;margin-left: auto;">
      <?php for ($i=1; $i <=$chonxe['Chotrong'] ; $i++) 
      {?>
      <option><?php echo $i; ?></option>
        <?php 
        } ?> 
    </select></td>
      
    <?php if($chonxe['Chotrong']>0)
    { ?>
    <td align="center" width="100px" rowspan="2"  ><a href="bovao.php?idsp=<?php echo $chonxe['idchuyen']; ?>"><button type="button" name="btnCart" style="color: white;height: 30px;width: 100px;font-weight: bolder;margin-left: 20px;">THÊM</button></a><button type="submit" style="color: white;height: 30px;width: 100px;font-weight: bolder;margin-top: 5px;margin-left: 20px;">ĐẶT VÉ</button></td>
    <?php 
    }else
    {?>
    <td align="center" width="100px" rowspan="2"><button type="button" style="color: white;height: 30px;background: red;width: 100px;font-weight: bolder;margin-top: 5px;margin-left: 20px;">HẾT VÉ</button></td>
    <?php  
    } ?>
    </form>

  </tr>

  <tr>
    <td align="center" width="90px"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"><img width="15" src="image/star.png"></td>
    <td align="center" width="110px" ><?php echo $chonxe['Diemdi']; ?></td>
    <td align="center" width="120px"><?php echo $chonxe['Diemden']; ?></td>
    <td align="center" width="100px"> <img width="20" src="image/nuoc.png"><img width="20" src="image/banh.png"> <img width="20" src="image/wifi.png"></td>
  </tr>
  
<?php } ?>

</table>
<br>
