<?php 
$error = array();
if(isset($_POST["btnThem"])){
    if(empty($_POST["txtGiodi"])){
        $error[]= "Mời Bạn Nhập Giờ Đi!!";
    }
    if(empty($_POST["txtGioden"])){
        $error[]= "Mời Bạn Nhập Giờ Đến!!";
    }
    if(empty($_POST["txtBendi"])){
        $error[]= "Mời Bạn Nhập Bến Đi!!";
    }
    if(empty($_POST["txtBenden"])){
        $error[]= "Mời Bạn Nhập Bến Đến!!";
    }
    if(empty($_POST["txtGiave"])){
        $error[]= "Mời Bạn Nhập Giá Vé!!";
    }
    if(empty($_POST["txtChotrong"])){
        $error[]= "Mời Bạn Nhập Chổ Trống!!";
    }
    if(empty($_POST["slecLotrinh"])){
        $error[]= "Mời Bạn Chọn Lộ Trình!!";
    }
    if(empty($_POST["slecTaixe"])){
        $error[]= "Mời Bạn Chọn Tài Xế!!";
    }
    if(empty($_POST["slecXe"])){
        $error[]= "Mời Bạn Chọn Xe!!";
    }
    
    if(empty($error)){
        $data = array(
            ":Giodi" => $_POST["txtGiodi"],
            ":Gioden" => $_POST["txtGioden"],
            ":Diemdi" => $_POST["txtBendi"], 
            ":Diemden" => $_POST["txtBenden"],
            ":Giave" => $_POST["txtGiave"],
            ":Chotrong" => $_POST["txtChotrong"],
            ":id_lotrinh" => $_POST["slecLotrinh"],
            ":id_taixe" => $_POST["slecTaixe"],
            ":id_xe" => $_POST["slecXe"],         
        );

            $stmt = $conn->prepare("INSERT INTO `chuyenxe`(`Giodi`, `Gioden`, `Diemdi`, `Diemden`, `Giave`, `Chotrong`, `id_lotrinh`, `id_taixe`, `id_xe`) VALUES (:Giodi,:Gioden,:Diemdi,:Diemden,:Giave,:Chotrong,:id_lotrinh,:id_taixe,:id_xe)");
           /* $stmt ->bindValue(":Diemdi",$data["diemdi"],PDO::PARAM_STR);
            $stmt -> bindValue(":Diemden",$data["diemden"],PDO::PARAM_STR);
            $stmt -> bindValue(":Ngaydi",$data["ngaydi"],PDO::PARAM_STR);
            $stmt -> bindValue(":Ngayve",$data["ngayden"],PDO::PARAM_STR);*/
           //print_r($data);
            $stmt -> execute($data); // exit;         
            //header("location:danhsachlotrinh.php");
            ?>
            <script>
                window.location='index.php?p=danhsachchuyen';
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
                            <h4> Thêm Chuyến</h4>
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
                                                    <th width="200">Giờ Đi</th>
                                                    <td>
                                                        <input type="text" name="txtGiodi" >                                                    
                                                    </td>                                          
                                                </tr>
                                                <tr>
                                                    <th width="120">Giờ Đến</th>
                                                    <td>
                                                        <input type="text" name="txtGioden" value="">
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Bến Đi</th>
                                                    <td>
                                                        <input type="text" name="txtBendi" value="">
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Bến Đến</th>
                                                    <td>
                                                        <input type="text" name="txtBenden" value="">
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Giá vé</th>
                                                    <td>
                                                        <input type="text" name="txtGiave" value="">
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Chổ Trống</th>
                                                    <td>
                                                        <input type="text" name="txtChotrong" value="">
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Lộ Trình</th>
                                                    <td>
                                                        <select name="slecLotrinh" >
                                                            <option value="">Chọn Lộ Trình</option>
                                                            <?php 
                                                                $stmt = $conn->prepare("SELECT * FROM `lotrinh` ORDER BY id DESC");
                                                                $stmt -> execute();
                                                                $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($data as $v) {
                                                                    ?>
                                                                <option value="<?php echo $v["id"]?>"><?php echo $v["Diemdi"] . " -> " . $v["Diemden"]?></option>  
                                                                <?php 
                                                                }
                                                            ?>
                                                        </select>
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Tài Xế</th>
                                                    <td>
                                                        <select name="slecTaixe" >
                                                            <option value="">Chọn Tài Xế</option>
                                                            <?php 
                                                                $stmt = $conn->prepare("SELECT * FROM `taixe` ORDER BY id DESC");
                                                                $stmt -> execute();
                                                                $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($data as $v) {
                                                                    ?>
                                                                <option value="<?php echo $v["id"]?>"><?php echo $v["TenTX"] ?></option>  
                                                                <?php 
                                                                }
                                                            ?>
                                                        </select>
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Xe</th>
                                                    <td>
                                                        <select name="slecXe" >
                                                            <option value="">Chọn Xe</option>
                                                            <?php 
                                                                $stmt = $conn->prepare("SELECT * FROM `xe` ORDER BY id DESC");
                                                                $stmt -> execute();
                                                                $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($data as $v) {
                                                                    ?>
                                                                <option value="<?php echo $v["id"]?>"><?php echo $v["Tenxe"] ?></option>  
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