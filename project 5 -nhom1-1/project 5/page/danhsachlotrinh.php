
<form action="" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

<div id="page-wrapper">
            <div >
            
                <div class="col-lg-8">
                    
                    <!--Area chart example -->
                    
                    <!--End area chart example -->
                    <!--Simple table example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4> Danh Sách Lộ Trình</h4>
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
                                                    <th width="120">Điểm Đi</th>
                                                   <th width="120">Điểm Đến</th>
                                                   
                                                    <th colspan="2">Action</th>                                                 
                                                </tr>
                                                
                                            </tbody>
                                                                                        
                                            <tbody>
                                            <?php 
                                                $stmt = $conn->prepare("SELECT * FROM `lotrinh` ORDER BY id DESC");
                                                $stmt -> execute();
                                                $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                                                $stt=0;
                                                foreach ($data as $item) {
                                                    $stt++;
                                             ?>
                                                <tr>
                                                    <td><?php echo $item["id"]; ?></td>
                                                    <td><?php echo $item["Diemdi"]; ?></td>
                                                    <td><?php echo $item["Diemden"]; ?></td>
                                                    
                                                    <td width="50px"><a href="admin.php?p=xoalotrinh&id=<?php echo $item["id"]?>">Xóa</a></td>
                                                    <td width="50px"><a href="admin.php?p=sualotrinh&id=<?php echo $item["id"]?>">Sửa</a></td>
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