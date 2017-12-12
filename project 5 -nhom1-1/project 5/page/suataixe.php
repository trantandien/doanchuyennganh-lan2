<?php 
if(!isset($_GET["id"])){
    header("location:admin.php?p=danhsachtaixe");
    exit();
}else{ //dong mo~ cho nay
$id = $_GET["id"];
settype($id,'int');
if($id <= 0){
    header("location:admin.php?p=danhsachtaixe");
    exit();
}else{
    $stmt_data_edit = $conn ->prepare("SELECT * FROM taixe WHERE id = :id ");
    $stmt_data_edit -> bindParam(":id",$id,PDO::PARAM_INT);
    $stmt_data_edit->execute();
    $data_edit = $stmt_data_edit->fetch(PDO::FETCH_ASSOC);

    $error = array();
    if(isset($_POST["btnSua"])){
    if(empty($_POST["txtTentaixe"])){
        $error[]= "Mời Bạn Nhập Tên!!";
    }
    if(empty($_POST["txtSDT"])){
        $error[]= "Mời Bạn Nhập Số Điện Thoại!!";
    }
    if(empty($_POST["slecVitri"])){
        $error[]= "Mời Bạn Chọn Vị Trí!!";
    }
    
    if(empty($error)){
        $data = array(
            "TenTX" => $_POST["txtTentaixe"],
            "SDT" => $_POST["txtSDT"],
            "id_PLTX" => $_POST["slecVitri"]          
        );

            $stmt = $conn->prepare("UPDATE `taixe` SET TenTX = :TenTX,SDT = :SDT,id_PLTX = :id_PLTX WHERE id = :id");
            $stmt -> bindValue(":TenTX",$data["TenTX"],PDO::PARAM_STR);
            $stmt -> bindValue(":SDT",$data["SDT"],PDO::PARAM_STR);
            $stmt -> bindValue(":id_PLTX",$data["id_PLTX"],PDO::PARAM_STR);
            $stmt -> bindParam(":id",$id,PDO::PARAM_STR);
            
           //print_r($data);
            $stmt -> execute(); // exit;         
            //header("location:danhsachlotrinh.php");
            ?>
            <script>
                window.location='admin.php?p=danhsachtaixe';
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
                            <h4> Thêm Tài Xế</h4>
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
                                                    <th width="200">Tên Tài Xế</th>
                                                    <td>
                                                        <input type="text" name="txtTentaixe" <?php 
                                                                if(isset($_POST["txtTentaixe"])){
                                                                    echo  'value="' . $_POST["txtTentaixe"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["TenTX"] . '"';
                                                                }
                                                            ?>  />                                                    
                                                    </td>                                          
                                                </tr>
                                                <tr>
                                                    <th width="120">Số Điện Thoại</th>
                                                    <td>
                                                        <input type="text" name="txtSDT" <?php 
                                                                if(isset($_POST["txtSDT"])){
                                                                    echo  'value="' . $_POST["txtSDT"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["SDT"] . '"';
                                                                }
                                                            ?>/>
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Vị Trí</th>
                                                    <td>
                                                        <select name="slecVitri" >
                                                            <option value="">Chọn Vị Trí</option>
                                                            <?php 
                                                                $stmt = $conn->prepare("SELECT * FROM `chitiettaixe` ORDER BY id DESC");
                                                                $stmt -> execute();
                                                                $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                                                                foreach ($data as $v) {
                                                                    ?>
                                                                <option value="<?php echo $v["id"]?>"><?php echo $v["VitriTX"]?></option>  
                                                                <?php 
                                                                }
                                                            ?>
                                                            <?php 
                                                                if(isset($_POST["slecVitri"])){
                                                                    echo  'value="' . $_POST["slecVitri"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["id_PLTX"] . '"';
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