<div style="width: all;clear: both;padding:0 150px;height: 250px"><br>
    <div style="width: 235px;float: left;margin: 0 10px;background-color: white;box-shadow: 0px 0px 1px black;height: 210px"><img width="70" src="image/bus.png" style="margin: 5px 0"><br>
    <b>CHỌN XE DỄ DÀNG</b><br><br>
    <div style="text-align: justify;padding-left: 10px;padding-right: 5px"><a>Chọn xe dễ dàng từ hơn 10,000 chuyến xe với hình ảnh thực tế và thông tin chi tiết.</a></div>
    </div>
    <div style="width: 235px;float: left;margin: 0 10px;background-color: white;box-shadow: 0px 0px 1px black;height: 210px"><img width="70" src="image/money.png" style="margin: 5px 0"><br>
    <b>GIÁ VÉ RẺ NHẤT</b><br><br>
    <div style="text-align: justify;padding-left: 10px;padding-right: 5px"><a>Giá vé luôn luôn thấp hơn hoặc bằng giá vé chính hãng của hãng xe.</a></div>
    </div>
    <div style="width: 235px;float: left;margin: 0 10px;background-color: white;box-shadow: 0px 0px 1px black;height: 210px"><img width="70" src="image/seat.png" style="margin: 5px 0"><br>
    <b>GIỮ CHỖ 100%</b><br><br>
    <div style="text-align: justify;padding-left: 10px;padding-right: 5px"><a>Mọi vé xe khách khi đặt qua website sẽ luôn luôn được giữ chỗ 100%.</a></div>
    </div>
    <div style="width: 235px;float: left;margin: 0 10px;background-color: white;box-shadow: 0px 0px 1px black;height: 210px"><img width="70" src="image/protect.png" style="margin: 5px 0"><br>
    <b>ĐẢM BẢO 100%</b><br><br>
    <div style="text-align: justify;padding-left: 10px;padding-right: 5px"><a>Cam kết hoàn lại 100% tiền vé nếu nhà xe không giữ chỗ cho khách hàng.</a></div>
    </div>
  </div>
  <div id="content" style="background-color: white;">
  <a style="font-size: 25px;line-height: 40px"><img align="center" width="40px" src="image/tx.png"> Các Tuyến Xe Khách Phổ Biến</a><br>
  <div style="background-color: white;clear: both;margin: 10px 1px;">
  <?php
    $stmt=$conn->prepare("SELECT * FROM lotrinh");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <?php foreach ($data as $lotrinh) {?>
  <div class="chuyen" style="line-height: 30px;float: left;width: all;margin-left: 400px;margin-right: 160px">
    <div style="text-align: left;float: left;width: 120px"><?php echo $lotrinh['Diemdi']; ?></div>
    <div style="text-align: left;float: left;margin-left: 50px;width: 50px"><img width="20" align="center" src="image/go.png"></div>
    <div style="text-align: left;float: left;margin-left: 30px;width: 120px"><?php echo $lotrinh['Diemden']; ?></div>
      <div style="float: right;"><a href="chon-xe.php?id=<?php echo $lotrinh['id'] ?>"><button style="color: white;width: 80px;height: 30px;font-weight: bold;">Chọn</button></a></div>
      
      </div>
      <br>
      <br>
      <br>
  <?php } ?>
  </div>
  
  </div>

  