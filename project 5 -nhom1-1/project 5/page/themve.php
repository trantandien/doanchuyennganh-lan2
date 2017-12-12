<?php 
$error = array();
if(isset($_POST["btnThem"])){
    if(empty($_POST["txtGiavelb"])){
        $error[]= "Mời Bạn Nhập Giá Vé!!";
    }
    if(empty($_POST["txtGiodi"])){
        $error[]= "Mời Bạn Nhập Giờ Đi!!";
    }
    if(empty($_POST["txtNgaydi"])){
        $error[]= "Mời Bạn Nhập Ngày Đi!!";
    }
    if(empty($_POST["txtSoghe"])){
        $error[]= "Mời Bạn Nhập Số Ghế!!";
    }
    if(empty($_POST["slecThanhvien"])){
        $error[]= "Mời Bạn Chọn Thành Viên!!";
    }
    
    if(empty($error)){
        $data = array(
            ":GiaveLB" => $_POST["txtGiavelb"],
            ":Giodi" => $_POST["txtGiodi"],
            ":Ngaydi" => $_POST["txtNgaydi"],
            ":Soghe" => $_POST["txtSoghe"],
            ":id_thanhvien" => $_POST["slecThanhvien"]         
        );

            $stmt = $conn->prepare("INSERT INTO `vexe`(`GiaveLB`, `Giodi`, `Ngaydi`, `Soghe`, `id_thanhvien`) VALUES (:GiaveLB,:Giodi,:Ngaydi,:Soghe,:id_thanhvien)");
           /* $stmt ->bindValue(":Diemdi",$data["diemdi"],PDO::PARAM_STR);
            $stmt -> bindValue(":Diemden",$data["diemden"],PDO::PARAM_STR);
            $stmt -> bindValue(":Ngaydi",$data["ngaydi"],PDO::PARAM_STR);
            $stmt -> bindValue(":Ngayve",$data["ngayden"],PDO::PARAM_STR);*/
           //print_r($data);
            $stmt -> execute($data); // exit;         
            //header("location:danhsachlotrinh.php");
            ?>
            <script>
                window.location='admin.php?p=danhsachve';
            </script>
            <?php
            exit();  
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
                            <h4> Thêm Vé</h4>
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
                                                    <th width="200">Giá vé LB</th>
                                                    <td>
                                                        <input type="text" name="txtGiavelb" >                                                    
                                                    </td>                                          
                                                </tr>
                                                <tr>
                                                    <th width="120">Giờ Đi</th>
                                                    <td>
                                                        <input type="text" name="txtGiodi" value="">
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Ngày Đi</th>
                                                    <td>
                                                        <input type="date" name="txtNgaydi" value="">
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Số Ghế</th>
                                                    <td>
                                                        <input type="text" name="txtSoghe" value="">
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Thành Viên</th>
                                                    <td>
                                                        <select name="slecThanhvien" >
                                                            <option value="">Chọn Tên Thành Viên</option>
                                                            <?php 
                                                                $stmt = $conn->prepare("SELECT * FROM `thanhvien` ORDER BY id DESC");
                                                                $stmt -> execute();
                                                                $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($data as $v) {
                                                                    ?>
                                                                <option value="<?php echo $v["id"]?>"><?php echo $v["TenTV"]?></option>  
                                                                <?php 
                                                                }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    
                                                </tr>
                                                
                                                <tr>
                                                    <td colspan="2" align="center"><button type="submit" class="themtuyen" name="btnThem">Thêm</button></td>
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