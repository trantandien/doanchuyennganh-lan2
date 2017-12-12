<?php 
$error = array();
if(isset($_POST["btnThem"])){
    if(empty($_POST["txtUser"])){
        $error[]= "Mời Bạn Nhập UserName!!";
    }
    if(empty($_POST["txtPass"])){
        $error[]= "Mời Bạn Nhập PassWord!!";
    }
    if(empty($_POST["txtLevel"])){
        $error[]= "Mời Bạn Nhập Level!!";
    }
    if(empty($_POST["txtTen"])){
        $error[]= "Mời Bạn Nhập Tên Thành Viên!!";
    }
    if(empty($_POST["txtSDT"])){
        $error[]= "Mời Bạn Nhập Số Điện Thoại!!";
    }
    if(empty($_POST["txtEmail"])){
        $error[]= "Mời Bạn Nhập Email!!";
    }
    if(empty($_POST["txtDiachi"])){
        $error[]= "Mời Bạn Nhập Địa Chỉ!!";
    }
    
    if(empty($error)){
        $data = array(
            ":Username" => $_POST["txtUser"],
            ":Password" => md5($_POST["txtPass"]),
            ":level" => $_POST["txtLevel"],
            ":TenTV" => $_POST["txtTen"],
            ":SDT" => $_POST["txtSDT"],
            ":Email" => $_POST["txtEmail"],
            ":Diachi" => $_POST["txtDiachi"],           
        );

            $stmt = $conn->prepare("INSERT INTO `thanhvien`(`Username`, `Password`, `level`, `TenTV`, `SDT`, `Email`, `Diachi`) VALUES (:Username,:Password,:level,:TenTV,:SDT,:Email,:Diachi)");
           /* $stmt ->bindValue(":Diemdi",$data["diemdi"],PDO::PARAM_STR);
            $stmt -> bindValue(":Diemden",$data["diemden"],PDO::PARAM_STR);
            $stmt -> bindValue(":Ngaydi",$data["ngaydi"],PDO::PARAM_STR);
            $stmt -> bindValue(":Ngayve",$data["ngayden"],PDO::PARAM_STR);*/
            print_r($data);
            $stmt -> execute($data); exit;//          
            //header("location:danhsachlotrinh.php");
            ?>
            <script>
                window.location='index.php?p=danhsachthanhvien';
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
                            <h4> Thêm Thành Viên</h4>
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
                                                    <th width="200">UserName</th>
                                                    <td>
                                                        <input type="text" name="txtUser" >                                                    
                                                    </td>                                          
                                                </tr>
                                                <tr>
                                                    <th width="120">Password</th>
                                                    <td>
                                                        <input type="text" name="txtPass" value="">
                                                    </td>                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Level</th>
                                                    <td>
                                                        <input type="text" name="txtLevel" value="">
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Tên Thành Viên</th>
                                                    <td>
                                                        <input type="text" name="txtTen" value="">
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Số Điện Thoại</th>
                                                    <td>
                                                        <input type="text" name="txtSDT" value="">
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Email</th>
                                                    <td>
                                                        <input type="text" name="txtEmail" value="">
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <th width="120">Địa Chỉ</th>
                                                    <td>
                                                        <input type="text" name="txtDiachi" value="">
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