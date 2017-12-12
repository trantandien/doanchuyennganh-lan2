
<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

<div id="page-wrapper">
            <div >
            
                <div class="col-lg-8">
                    
                    <!--Area chart example -->
                    
                    <!--End area chart example -->
                    <!--Simple table example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4> Danh Sách Thành Viên</h4>
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
                                                    <th width="50">STT</th>
                                                    <th width="120">UserName</th>
                                                   
                                                   <th width="80">Level</th>
                                                   <th width="120">Tên Thành Viên</th>
                                                   <th width="120">Số Điện Thoại</th>
                                                   <th width="120">Email</th>
                                                   <th width="120">Địa Chỉ</th>
                                                   <th colspan="2">Action</th>
                                                   
                                                    
                                                                                                    
                                                </tr>
                                                
                                            </tbody>
                                                                                        
                                            <tbody>
                                            <?php 
                                                $stmt = $conn->prepare("SELECT * FROM `thanhvien` ORDER BY id DESC");
                                                $stmt -> execute();
                                                $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                                                $stt=0;
                                                foreach ($data as $item) {
                                                    $stt++;
                                             ?>
                                                <tr>
                                                    <td><?php echo $item["id"]; ?></td>
                                                    <td><?php echo $item["Username"]; ?></td>
                                                    
                                                    <td><?php echo $item["level"]; ?></td>
                                                    <td><?php echo $item["TenTV"]; ?></td>
                                                    <td><?php echo $item["Phone"]; ?></td>
                                                    <td><?php echo $item["Email"]; ?></td>
                                                    <td><?php echo $item["Diachi"]; ?></td>
                                                    <td width="80px"><a href="admin.php?p=xoathanhvien&id=<?php echo $item["id"]?>">Xóa</a></td>
                                                    
                                                </tr>
                                                <?php } ?>
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