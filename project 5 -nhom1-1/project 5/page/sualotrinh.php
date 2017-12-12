<?php
if(!isset($_GET["id"])){
    header("location:admin.php?p=danhsachlotrinh");
    exit();
}else{ //dong mo~ cho nay
$id = $_GET["id"];
settype($id,'int');
if($id <= 0){
    header("location:admin.php?p=danhsachlotrinh");
    exit();
}else{
        $stmt_data_edit = $conn ->prepare("SELECT * FROM lotrinh WHERE id = :id ");
        $stmt_data_edit -> bindParam(":id",$id,PDO::PARAM_INT);
        $stmt_data_edit->execute();
        $data_edit = $stmt_data_edit->fetch(PDO::FETCH_ASSOC);

        $error = array();
        if(isset($_POST["btnSua"])){
            if(empty($_POST["slecDiemdi"])){
                $error[]= "Mời Bạn Chọn Điểm Đi!!";
            }
            if(empty($_POST["slecDiemden"])){
                $error[]= "Mời Bạn Chọn Điểm Đến!!";
            }
            
            if(empty($error)){
                $data = array(
                    "Diemdi" => $_POST["slecDiemdi"],
                    "Diemden" => $_POST["slecDiemden"],
                );
           $stmt = $conn->prepare("UPDATE `lotrinh` SET Diemdi = :Diemdi,Diemden = :Diemden WHERE id = :id");
           $stmt->bindParam(":Diemdi",$data["Diemdi"],PDO::PARAM_STR);
           $stmt->bindParam(":Diemden",$data["Diemden"],PDO::PARAM_STR);          
           $stmt->bindParam(":id",$id,PDO::PARAM_STR);
           $stmt->execute();

           ?>
            <script>
                window.location='admin.php?p=danhsachlotrinh';
            </script>
            <?php
            exit();  
        }
    }
}
?>
<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

<div id="page-wrapper">
            <div >
            
        <div class="col-lg-8">
        <?php if(!empty($error)){?>
            <div id="loi">
                <ul>
                    <?php foreach ($error as $item) { ?>
                    <li><?php echo"$item" ?></li>
                    <?php } ?>
                </ul>       
            </div>
        <?php } ?>
                    <!--Area chart example -->
                    
                    <!--End area chart example -->
                    <!--Simple table example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4> Sửa Lộ Trình</h4>
                            <div class="pull-right">
                                <div class="btn-group">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            
                                            <tbody>
                                             <tr>
                                                    <th width="200">Điểm Đi</th>
                                                    <td>
                                                        
                                                        <select name="slecDiemdi">
                                                            <option value="">Chọn Điểm Đi</option>
                                                            <option value="An Giang">An Giang</option>
                                                            <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                                            <option value="Bắc Giang">Bắc Giang</option>
                                                            <option value="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="Bến Tre">Bến Tre</option>
                                                            <option value="Bình Định">Bình Định</option>
                                                            <option value="Bình Dương">Bình Dương</option>
                                                            <option value="Bình Phước">Bình Phước</option>
                                                            <option value="Bình Thuận">Bình Thuận</option>
                                                            <option value="Cà Mau">Cà Mau</option>
                                                            <option value="Cao Bằng">Cao Bằng</option>
                                                            <option value="Cần Thơ">Cần Thơ</option>
                                                            <option value="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="Đắk Nông">Đắk Nông</option>
                                                            <option value="Điện Biên">Điện Biên</option>
                                                            <option value="Đồng Nai">Đồng Nai</option>
                                                            <option value="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="Gia Lai">Gia Lai</option>
                                                            <option value="Hà Giang">Hà Giang</option>
                                                            <option value="Hà Nam">Hà Nam</option>
                                                            <option value="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="Hải Dương">Hải Dương</option>
                                                            <option value="Hậu Giang">Hậu Giang</option>
                                                            <option value="Hòa Bình">Hòa Bình</option>
                                                            <option value="Hưng Yên">Hưng Yên</option>
                                                            <option value="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="Kiên Giang">Kiên Giang</option>
                                                            <option value="Kon Tum">Kon Tum</option>
                                                            <option value="Lai Châu">Lai Châu</option>
                                                            <option value="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="Lào Cai">Lào Cai</option>
                                                            <option value="Long An">Long An</option>
                                                            <option value="Nam Định">Nam Định</option>
                                                            <option value="Nghệ An">Nghệ An</option>
                                                            <option value="Ninh Bình">Ninh Bình</option>
                                                            <option value="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="Phú Thọ">Phú Thọ</option>
                                                            <option value="Quảng Bình">Quảng Bình</option>
                                                            <option value="Quảng Nam">Quảng Nam</option>
                                                            <option value="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="Quảng Trị">Quảng Trị</option>
                                                            <option value="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="Sơn La">Sơn La</option>
                                                            <option value="Tây Ninh">Tây Ninh</option>
                                                            <option value="Thái Bình">Thái Bình</option>
                                                            <option value="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="Thanh Hóa">Thanh Hóa</option>
                                                            <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="Tiền Giang">Tiền Giang</option>
                                                            <option value="Trà Vinh">Trà Vinh</option>
                                                            <option value="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="Yên Bái">Yên Bái</option>
                                                            <option value="Phú Yên">Phú Yên</option>
                                                            <option value="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="Hải Phòng">Hải Phòng</option>
                                                            <option value="Hà Nội">Hà Nội</option>
                                                            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                                            <?php 
                                                                if(isset($_POST["slecDiemdi"])){
                                                                    echo  'value="' . $_POST["slecDiemdi"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Diemdi"] . '"';
                                                                }
                                                            ?>      
                                                        </select>
                                                    </td>                                          
                                                </tr>
                                                <tr>
                                                    <th width="120">Điểm Đến</th>
                                                    <td>
                                                        
                                                        <select name="slecDiemden">
                                                            <option value="">Chọn Điểm Đến</option>
                                                            <option value="An Giang">An Giang</option>
                                                            <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                                            <option value="Bắc Giang">Bắc Giang</option>
                                                            <option value="Bắc Kạn">Bắc Kạn</option>
                                                            <option value="Bạc Liêu">Bạc Liêu</option>
                                                            <option value="Bắc Ninh">Bắc Ninh</option>
                                                            <option value="Bến Tre">Bến Tre</option>
                                                            <option value="Bình Định">Bình Định</option>
                                                            <option value="Bình Dương">Bình Dương</option>
                                                            <option value="Bình Phước">Bình Phước</option>
                                                            <option value="Bình Thuận">Bình Thuận</option>
                                                            <option value="Cà Mau">Cà Mau</option>
                                                            <option value="Cao Bằng">Cao Bằng</option>
                                                            <option value="Cần Thơ">Cần Thơ</option>
                                                            <option value="Đắk Lắk">Đắk Lắk</option>
                                                            <option value="Đắk Nông">Đắk Nông</option>
                                                            <option value="Điện Biên">Điện Biên</option>
                                                            <option value="Đồng Nai">Đồng Nai</option>
                                                            <option value="Đồng Tháp">Đồng Tháp</option>
                                                            <option value="Gia Lai">Gia Lai</option>
                                                            <option value="Hà Giang">Hà Giang</option>
                                                            <option value="Hà Nam">Hà Nam</option>
                                                            <option value="Hà Tĩnh">Hà Tĩnh</option>
                                                            <option value="Hải Dương">Hải Dương</option>
                                                            <option value="Hậu Giang">Hậu Giang</option>
                                                            <option value="Hòa Bình">Hòa Bình</option>
                                                            <option value="Hưng Yên">Hưng Yên</option>
                                                            <option value="Khánh Hòa">Khánh Hòa</option>
                                                            <option value="Kiên Giang">Kiên Giang</option>
                                                            <option value="Kon Tum">Kon Tum</option>
                                                            <option value="Lai Châu">Lai Châu</option>
                                                            <option value="Lâm Đồng">Lâm Đồng</option>
                                                            <option value="Lạng Sơn">Lạng Sơn</option>
                                                            <option value="Lào Cai">Lào Cai</option>
                                                            <option value="Long An">Long An</option>
                                                            <option value="Nam Định">Nam Định</option>
                                                            <option value="Nghệ An">Nghệ An</option>
                                                            <option value="Ninh Bình">Ninh Bình</option>
                                                            <option value="Ninh Thuận">Ninh Thuận</option>
                                                            <option value="Phú Thọ">Phú Thọ</option>
                                                            <option value="Quảng Bình">Quảng Bình</option>
                                                            <option value="Quảng Nam">Quảng Nam</option>
                                                            <option value="Quảng Ngãi">Quảng Ngãi</option>
                                                            <option value="Quảng Ninh">Quảng Ninh</option>
                                                            <option value="Quảng Trị">Quảng Trị</option>
                                                            <option value="Sóc Trăng">Sóc Trăng</option>
                                                            <option value="Sơn La">Sơn La</option>
                                                            <option value="Tây Ninh">Tây Ninh</option>
                                                            <option value="Thái Bình">Thái Bình</option>
                                                            <option value="Thái Nguyên">Thái Nguyên</option>
                                                            <option value="Thanh Hóa">Thanh Hóa</option>
                                                            <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                                            <option value="Tiền Giang">Tiền Giang</option>
                                                            <option value="Trà Vinh">Trà Vinh</option>
                                                            <option value="Tuyên Quang">Tuyên Quang</option>
                                                            <option value="Vĩnh Long">Vĩnh Long</option>
                                                            <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                                            <option value="Yên Bái">Yên Bái</option>
                                                            <option value="Phú Yên">Phú Yên</option>
                                                            <option value="Đà Nẵng">Đà Nẵng</option>
                                                            <option value="Hải Phòng">Hải Phòng</option>
                                                            <option value="Hà Nội">Hà Nội</option>
                                                            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                                            <?php 
                                                                if(isset($_POST["slecDiemden"])){
                                                                    echo  'value=' . $_POST["slecDiemden"] . '"' ;
                                                                }else{
                                                                    echo 'value=' . $data_edit["Diemden"] . '"';
                                                                }
                                                            ?>   
                                                        </select>
                                                    </td>                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td colspan="2" align="center"><button type="submit" class="themtuyen" name="btnSua">Sửa</button></td>
                                                </tr>
                                                
                                            </tbody>

                                        </table>
                                    </div>

                                </div>

                            </div>
                            <!-- /.row -->  <!-- // bang -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!--End simple table example -->

                </div>

                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body yellow">
                            <i class="fa fa-bar-chart-o fa-3x"></i>
                            <h3>60% </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title"><h4>Doanh Thu Tháng</h4>
                            </span>
                        </div>
                    </div>
                   
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body green">
                            <i class="fa fa fa-floppy-o fa-3x"></i>
                            <h3>20 GB</h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title"><h4>New Data Uploaded</h4>
                            </span>
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body red">
                            <i class="fa fa-thumbs-up fa-3x"></i>
                            <h3>8,1 N </h3>
                        </div>
                        <div class="panel-footer">
                            <span class="panel-eyecandy-title"><h4>Lượt Yêu Thích</h4>
                            </span>
                        </div>
                    </div>

                </div>

            </div>
            
        </div>
        </form>
        <?php } ?>