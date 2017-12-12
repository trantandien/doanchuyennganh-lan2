<?php 
if(!isset($_GET["id"])){
    header("location:admin.php?p=danhsachvexe");
    exit();
}else{ //dong mo~ cho nay
$id = $_GET["id"];
settype($id,'int');
if($id <= 0){
    header("location:admin.php?p=danhsachvexe");
    exit();
}else{
    $stmt_data_edit = $conn ->prepare("SELECT * FROM vexe WHERE id = :id ");
    $stmt_data_edit -> bindParam(":id",$id,PDO::PARAM_INT);
    $stmt_data_edit->execute();
    $data_edit = $stmt_data_edit->fetch(PDO::FETCH_ASSOC); 

    $error = array();
    if(isset($_POST["btnSua"])){
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
            "GiaveLB" => $_POST["txtGiavelb"],
            "Giodi" => $_POST["txtGiodi"],
            "Ngaydi" => $_POST["txtNgaydi"],
            "Soghe" => $_POST["txtSoghe"],
            "id_thanhvien" => $_POST["slecThanhvien"]         
        );

            $stmt = $conn->prepare("UPDATE `vexe` SET GiaveLB = :GiaveLB,Giodi = :Giodi,Ngaydi = :Ngaydi,Soghe = :Soghe,id_thanhvien = :id_thanhvien WHERE id = :id");
            $stmt ->bindValue(":GiaveLB",$data["GiaveLB"],PDO::PARAM_STR);
            $stmt -> bindValue(":Giodi",$data["Giodi"],PDO::PARAM_STR);
            $stmt -> bindValue(":Ngaydi",$data["Ngaydi"],PDO::PARAM_STR);
            $stmt -> bindValue(":Soghe",$data["Soghe"],PDO::PARAM_STR);
            $stmt -> bindValue(":id_thanhvien",$data["id_thanhvien"],PDO::PARAM_STR);
            $stmt -> bindParam(":id",$id,PDO::PARAM_STR);
           //print_r($data);
            $stmt -> execute(); // exit;         
            //header("location:danhsachlotrinh.php");
            ?>
            <script>
                window.location='admin.php?p=danhsachve';
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
                            <h4> Sửa Vé</h4>
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
                                                        <input type="text" name="txtGiavelb" <?php 
                                                                if(isset($_POST["txtGiavelb"])){
                                                                    echo  'value="' . $_POST["txtGiavelb"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["GiaveLB"] . '"';
                                                                }
                                                            ?> />                                                    
                                                    </td>                                          
                                                </tr>
                                                <tr>
                                                    <th width="120">Giờ Đi</th>
                                                    <td>
                                                        <input type="text" name="txtGiodi" <?php 
                                                                if(isset($_POST["txtGiodi"])){
                                                                    echo  'value="' . $_POST["txtGiodi"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Giodi"] . '"';
                                                                }
                                                            ?> />
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Ngày Đi</th>
                                                    <td>
                                                        <input type="date" name="txtNgaydi" <?php 
                                                                if(isset($_POST["txtNgaydi"])){
                                                                    echo  'value="' . $_POST["txtNgaydi"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Ngaydi"] . '"';
                                                                }
                                                            ?> />
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Số Ghế</th>
                                                    <td>
                                                        <input type="text" name="txtSoghe" <?php 
                                                                if(isset($_POST["txtSoghe"])){
                                                                    echo  'value="' . $_POST["txtSoghe"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Soghe"] . '"';
                                                                }
                                                            ?> />
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
                                                            <?php 
                                                                if(isset($_POST["slecThanhvien"])){
                                                                    echo  'value="' . $_POST["slecThanhvien"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["id_thanhvien"] . '"';
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