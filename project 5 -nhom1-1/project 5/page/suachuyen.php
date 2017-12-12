<?php 
if(!isset($_GET["id"])){
    header("location:admin.php?p=danhsachchuyen");
    exit();
}else{ //dong mo~ cho nay
$id = $_GET["id"];
settype($id,'int');
if($id <= 0){
    header("location:admin.php?p=danhsachchuyen");
    exit();
}else{
    $stmt_data_edit = $conn ->prepare("SELECT * FROM chuyenxe WHERE id = :id ");
    $stmt_data_edit -> bindParam(":id",$id,PDO::PARAM_INT);
    $stmt_data_edit->execute();
    $data_edit = $stmt_data_edit->fetch(PDO::FETCH_ASSOC);

    $error = array();
    if(isset($_POST["btnSua"])){
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
    if(empty($_POST["txtNgaydi"])){
        $error[]= "Mời Bạn Nhập Ngày Đi!!";
    }
    if(empty($_POST["txtNgayve"])){
        $error[]= "Mời Bạn Nhập Ngày Về!!";
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
    if(empty($_POST["slecVe"])){
        $error[]= "Mời Bạn Chọn Vé!!";
    }
    
    if(empty($error)){
        $data = array(
            "Giodi" => $_POST["txtGiodi"],
            "Gioden" => $_POST["txtGioden"],
            "Diemdi" => $_POST["txtBendi"], 
            "Diemden" => $_POST["txtBenden"],
            "Ngaydi" => $_POST["txtNgaydi"],
            "Ngayve" => $_POST["txtNgayve"],
            "Giave" => $_POST["txtGiave"],
            "Chotrong" => $_POST["txtChotrong"],
            "id_lotrinh" => $_POST["slecLotrinh"],
            "id_taixe" => $_POST["slecTaixe"],
            "id_xe" => $_POST["slecXe"],
            "id_vexe" => $_POST["slecVe"]        
        );

            $stmt = $conn->prepare("UPDATE `chuyenxe` SET Giodi = :Giodi,Gioden = :Gioden,Diemdi = :Diemdi,Diemden = :Diemden,Ngaydi = :Ngaydi,Ngayve = :Ngayve,Giave = :Giave,Chotrong = :Chotrong,id_lotrinh = :id_lotrinh,id_taixe = :id_taixe,id_xe = :id_xe,id_vexe = :id_vexe WHERE id = :id");
            $stmt -> bindParam(":Giodi",$data["Giodi"],PDO::PARAM_STR);
            $stmt -> bindParam(":Gioden",$data["Gioden"],PDO::PARAM_STR);
            $stmt -> bindParam(":Diemdi",$data["Diemdi"],PDO::PARAM_STR);
            $stmt -> bindParam(":Diemden",$data["Diemden"],PDO::PARAM_STR);
            $stmt-> bindParam(":Ngaydi",$data["Ngaydi"],PDO::PARAM_STR);
            $stmt-> bindParam(":Ngayve",$data["Ngayve"],PDO::PARAM_STR);
            $stmt -> bindParam(":Giave",$data["Giave"],PDO::PARAM_STR);
            $stmt -> bindParam(":Chotrong",$data["Chotrong"],PDO::PARAM_STR);
            $stmt -> bindParam(":id_lotrinh",$data["id_lotrinh"],PDO::PARAM_STR);
            $stmt -> bindParam(":id_taixe",$data["id_taixe"],PDO::PARAM_STR);
            $stmt -> bindParam(":id_xe",$data["id_xe"],PDO::PARAM_STR);
            $stmt -> bindParam(":id_vexe",$data["id_vexe"],PDO::PARAM_STR);
            $stmt->  bindParam(":id",$id,PDO::PARAM_STR);

           //print_r($data);
            $stmt -> execute(); // exit;         
            //header("location:danhsachlotrinh.php");
            ?>
            <script>
                window.location='admin.php?p=danhsachchuyen';
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
                            <h4> Sửa Chuyến</h4>
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
                                                        <input type="text" name="txtGiodi" <?php 
                                                                if(isset($_POST["txtGiodi"])){
                                                                    echo  'value="' . $_POST["txtGiodi"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Giodi"] . '"';
                                                                }
                                                            ?> / >                                                    
                                                    </td>                                          
                                                </tr>
                                                <tr>
                                                    <th width="120">Giờ Đến</th>
                                                    <td>
                                                        <input type="text" name="txtGioden" <?php 
                                                                if(isset($_POST["txtGioden"])){
                                                                    echo  'value="' . $_POST["txtGioden"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Gioden"] . '"';
                                                                }
                                                            ?>  />
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Bến Đi</th>
                                                    <td>
                                                        <input type="text" name="txtBendi" <?php 
                                                                if(isset($_POST["txtBendi"])){
                                                                    echo  'value="' . $_POST["txtBendi"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Diemdi"] . '"';
                                                                }
                                                            ?>/>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Bến Đến</th>
                                                    <td>
                                                        <input type="text" name="txtBenden" <?php 
                                                                if(isset($_POST["txtBenden"])){
                                                                    echo  'value="' . $_POST["txtBenden"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Diemden"] . '"';
                                                                }
                                                            ?>/>
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Ngày Đi</th>
                                                    <td><input type="date" name="txtNgaydi"  <?php 
                                                        if(isset($_POST["txtNgaydi"])){
                                                            echo 'value="'. $_POST["txtNgaydi"] .'"';
                                                        }else{
                                                            echo 'value="' . $data_edit["Ngaydi"] . '"' ;
                                                        }
                                                    ?>/>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Ngày Về</th>
                                                    <td><input type="date" name="txtNgayve"  <?php 
                                                        if(isset($_POST["txtNgayve"])){
                                                            echo 'value="'. $_POST["txtNgayve"] .'"';
                                                        }else{
                                                            echo 'value="' . $data_edit["Ngayve"] . '"' ;
                                                        }
                                                    ?>/>
                                                    </td>
                                                
                                                </tr>
                                                <tr>
                                                    <th width="120">Giá vé</th>
                                                    <td>
                                                        <input type="text" name="txtGiave" <?php 
                                                                if(isset($_POST["txtGiave"])){
                                                                    echo  'value="' . $_POST["txtGiave"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Giave"] . '"';
                                                                }
                                                            ?>/>
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Chổ Trống</th>
                                                    <td>
                                                        <input type="text" name="txtChotrong" <?php 
                                                                if(isset($_POST["txtChotrong"])){
                                                                    echo  'value="' . $_POST["txtChotrong"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Chotrong"] . '"';
                                                                }
                                                            ?>/>
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
                                                            <?php 
                                                                if(isset($_POST["slecLotrinh"])){
                                                                    echo  'value="' . $_POST["slecLotrinh"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["id_lotrinh"] . '"';
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
                                                            <?php 
                                                                if(isset($_POST["slecTaixe"])){
                                                                    echo  'value="' . $_POST["slecTaixe"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["id_taixe"] . '"';
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
                                                            <?php 
                                                                if(isset($_POST["slecXe"])){
                                                                    echo  'value="' . $_POST["slecXe"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["id_xe"] . '"';
                                                                }
                                                            ?>
                                                        </select>
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Vé Xe</th>
                                                    <td>
                                                        <select name="slecVe" >
                                                            <option value="">Chọn Vé</option>
                                                            <?php 
                                                                $stmt = $conn->prepare("SELECT * FROM `vexe` ORDER BY id DESC");
                                                                $stmt -> execute();
                                                                $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($data as $v) {
                                                                    ?>
                                                                <option value="<?php echo $v["id"]?>"><?php echo $v["id"] ?></option>  
                                                                <?php 
                                                                }
                                                            ?>
                                                            <?php 
                                                                if(isset($_POST["slecVe"])){
                                                                    echo  'value="' . $_POST["slecVe"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["id_vexe"] . '"';
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