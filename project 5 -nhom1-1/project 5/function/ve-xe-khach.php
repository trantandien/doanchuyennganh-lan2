<br><div style="text-align: left;padding-left: 150px;background-color: #EFF5FB;color: #0080FF  ">
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
</div>
  <div id="content">
  <br>
  <p style="font-size: 25px;line-height: 40px"><img align="center" width="40px" src="image/tx.png"> Các Tuyến Xe Khách Phổ Biến</p><br>
  <div style="background-color: ;clear: both;margin: 10px 1px;">
  <?php
    $stmt=$conn->prepare("SELECT * FROM lotrinh");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <?php foreach ($data as $lotrinh) {?>
  <div class="chuyen" style="line-height: 30px;float: left;width: all;margin-left: 400px;margin-right: 30px">
    <div style="text-align: left;float: left;width: 120px"><?php echo $lotrinh['Diemdi']; ?></div>
    <div style="text-align: left;float: left;margin-left: 50px;width: 50px"><img width="20" align="center" src="image/go.png"></div>
    <div style="text-align: left;float: left;margin-left: 30px;width: 120px"><?php echo $lotrinh['Diemden']; ?></div>
      <div style="float: right;"><a href="chon-xe.php?id=<?php echo $lotrinh['id'] ?>"><button style="color: white;width: 80px;height: 30px;font-weight: bold;">Chọn</button></a></div>
      
      </div>
      <br>
      <br>
  <?php } ?>
  </table>
  </div>
  <div id="hxlk" style="background-color: ;clear: both;margin: 10px 0px;">
  <p style="font-size: 25px;padding: 30px 0">Các Hãng Xe Liên Kết</p>
  <table style="border: none;">
    <tr>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Sapa Express<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Cát Bà Express<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Mộc Châu Express<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">GoodMorning Cát Bà<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
    </tr>
    <tr>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Green Lion<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Đức Thịnh<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">New Enjoy<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Golden Horse<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
    </tr>
    <tr>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Eco Sapa<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Sapa Luxury Van<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Sapa Limousine<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Hà Quảng Travel<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
    </tr>
    <tr>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Cố Hương Travel<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Anh Việt<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Queen Cafe<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Inter Bus Lines<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
    </tr>
    <tr>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Camel Travel<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Hưng Thành<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Nhật Tuấn<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Vũ Lộc<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
    </tr>
    <tr>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">APT Travel<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Sao Việt<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Xuân Tráng<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
      <td style="width: 200px;padding: 7px 30px"><a style="color: ;text-decoration: none;" href="#">Daiichi Travel<br><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"><img width="15px" src="image/star.png"></a></td>
    </tr>
  </table>
  </div>
  </div>