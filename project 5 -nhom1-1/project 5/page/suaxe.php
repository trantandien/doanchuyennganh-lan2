<?php
if(!isset($_GET["id"])){
    header("location:admin.php?p=danhsachxe");
    exit();
}else{ //dong mo~ cho nay
$id = $_GET["id"];
settype($id,'int');
if($id <= 0){
    header("location:admin.php?p=danhsachxe");
    exit();
}else{
    $stmt_data_edit = $conn ->prepare("SELECT * FROM xe WHERE id = :id ");
    $stmt_data_edit -> bindParam(":id",$id,PDO::PARAM_INT);
    $stmt_data_edit->execute();
    $data_edit = $stmt_data_edit->fetch(PDO::FETCH_ASSOC); 

    $error = array();
    if(isset($_POST["btnSua"])){
    if(empty($_POST["txtTenxe"])){
        $error[]= "Mời Bạn Nhập Tên Xe!!";
    }
    if(empty($_POST["txtSoxe"])){
        $error[]= "Mời Bạn Nhập Số Xe!!";
    }
    if(empty($_POST["txtSoluongghe"])){
        $error[]= "Mời Bạn Nhập Số Lượng Ghế!!";
    }
    
    if(empty($error)){
        $data = array(
            "Tenxe" => $_POST["txtTenxe"],
            "Soxe" => $_POST["txtSoxe"],
            "Soluongghe" => $_POST["txtSoluongghe"]          
        );

            $stmt = $conn->prepare("UPDATE `xe` SET Tenxe = :Tenxe, Soxe = :Soxe, Soluongghe = :Soluongghe WHERE id = :id");
            $stmt ->bindValue(":Tenxe",$data["Tenxe"],PDO::PARAM_STR);
            $stmt -> bindValue(":Soxe",$data["Soxe"],PDO::PARAM_STR);
            $stmt -> bindValue(":Soluongghe",$data["Soluongghe"],PDO::PARAM_STR);
            $stmt->bindParam(":id",$id,PDO::PARAM_STR);
            
           //print_r($data);
            $stmt -> execute(); // exit;         
            //header("location:danhsachlotrinh.php");
            ?>
            <script>
                window.location='admin.php?p=danhsachxe';
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
                            <h4> Sửa Xe</h4>
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
                                                    <th width="200">Tên Xe</th>
                                                    <td>
                                                        <input type="text" name="txtTenxe" <?php 
                                                                if(isset($_POST["txtTenxe"])){
                                                                    echo  'value="' . $_POST["txtTenxe"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Tenxe"] . '"';
                                                                }
                                                            ?>  />                                                    
                                                    </td>                                          
                                                </tr>
                                                <tr>
                                                    <th width="120">Số Xe</th>
                                                    <td>
                                                        <input type="text" name="txtSoxe" <?php 
                                                                if(isset($_POST["txtSoxe"])){
                                                                    echo  'value="' . $_POST["txtSoxe"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Soxe"] . '"';
                                                                }
                                                            ?>  />
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Số Lượng Ghế</th>
                                                    <td>
                                                        <input type="text" name="txtSoluongghe" <?php 
                                                                if(isset($_POST["txtSoluongghe"])){
                                                                    echo  'value="' . $_POST["txtSoluongghe"] . '"' ;
                                                                }else{
                                                                    echo 'value="' . $data_edit["Soluongghe"] . '"';
                                                                }
                                                            ?>  />
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