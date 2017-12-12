<?php 
if(!isset($_SESSION["User"])){
    header("location:../admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bán Vé Xe Khách</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style2.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?p=trangchu">
                    <!-- <img src="assets/img/logo1.png"  width="200" height="50" alt="" /><br> -->
                    <div class="stu">
                        <img src="assets/img/logo1.png">
                       <!-- <img src="assets/img/stu.png" alt="" /> <br> -->
                    </div>              
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-danger">3</span><i class="fa fa-envelope fa-3x"></i>
                    </a>
                    <!-- dropdown-messages -->
                    
                    <!-- end dropdown-messages -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-success">4</span>  <i class="fa fa-tasks fa-3x"></i>
                    </a>
                    <!-- dropdown tasks -->
                    
                    <!-- end dropdown-tasks -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="top-label label label-warning">5</span>  <i class="fa fa-bell fa-3x"></i>
                    </a>
                    <!-- dropdown alerts-->
                    
                    <!-- end dropdown-alerts -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->

                        

                        <!--end user image section-->
                    </li>
                    <li >
                        <!-- search section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div>ADMIN <strong></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="index.php?p=trangchu"><i class="fa fa-dashboard fa-fw"></i> Trang Chủ</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản Lý Lộ Trình<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level" align="center">
                            <li >
                                 <a href="index.php?p=themlotrinh">Thêm Lộ Trình</a>                       
                            </li>
                            <li>
                                <a href="index.php?p=danhsachlotrinh">Danh Sách Lộ Trình</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <!--  <li>
                        <a href="timeline.html"><i class="fa fa-flask fa-fw"></i>Timeline</a>
                    </li> -->
                   
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản Lý Chuyến<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level" align="center">
                            <li>
                                <a href="index.php?p=themchuyen">Thêm Chuyến</a>
                            </li>
                            <li>
                                <a href="index.php?p=danhsachchuyen">Danh Sách Chuyến</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản Lý Xe<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level" align="center">
                            <li>
                                <a href="index.php?p=themxe">Thêm Xe</a>
                            </li>
                            <li>
                                <a href="index.php?p=danhsachxe">Danh Sách Xe</a>
                            </li>
                           
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    
                     <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản Lý Tài Xế<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level" align="center">
                            <li>
                                <a href="index.php?p=themtaixe">Thêm Tài Xế</a>
                            </li>
                            <li>
                                <a href="index.php?p=danhsachtaixe">Danh Sách Tài Xế</a>
                            </li>
                            <li>
                                <a href="index.php?p=danhsachvitritaixe">Danh Sách Vị Trí Tài Xế</a>
                            </li>
                           
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản Lý Thành Viên<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level" align="center">
                            <li>
                                <a href="index.php?p=themthanhvien">Thêm Thành Viên</a>
                            </li>
                            <li>
                                <a href="index.php?p=danhsachthanhvien">Danh Sách Thành Viên</a>
                            </li>
                           
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Quản Lý Vé<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level" align="center">
                            <li>
                                <a href="index.php?p=themve">Thêm Vé</a>
                            </li>
                            <li>
                                <a href="index.php?p=danhsachve">Danh Sách Vé</a>
                            </li>
                            
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    
                    
                    <li>
                        <a href="logout.php"><i class="fa fa-files-o fa-fw"></i> Đăng Xuất<!-- <span class="fa arrow"></span> --></a>
                       <!--  <ul class="nav nav-second-level">
                            <li>
                                <a href="blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="login.html">Login Page</a>
                            </li>
                        </ul> -->
                        <!-- second-level-items -->
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        
        <!-- end page-wrapper -->
   
    <?php 
    if(isset($_GET["p"])){
        $p = $_GET["p"];
        switch ($p) {
            case 'trangchu':
                include "page/trangchu.php";
                break; 
            case 'themlotrinh':
                include "page/themlotrinh.php";
                break;
            case 'xoalotrinh':
                include "page/xoalotrinh.php";
                break;
            case 'sualotrinh':
                include "page/sualotrinh.php";
                break; 
            case 'danhsachlotrinh':
                include "page/danhsachlotrinh.php";
                break; 
            case 'themtaixe':
                include "page/themtaixe.php";
                break;
            case 'xoataixe':
                include "page/xoataixe.php";
                break;
            case 'suataixe':
                include "page/suataixe.php";
                break; 
            case 'danhsachtaixe':
                include "page/danhsachtaixe.php";
                break;
            case 'danhsachvitritaixe':
                include "page/danhsachvitritaixe.php";
                break;
            case 'themxe':
                include "page/themxe.php";
                break;
            case 'xoaxe':
                include "page/xoaxe.php";
                break;
            case 'suaxe':
                include "page/suaxe.php";
                break; 
            case 'danhsachxe':
                include "page/danhsachxe.php";
                break; 
            case 'themthanhvien':
                include "page/themthanhvien.php";
                break;
            case 'xoathanhvien':
                include "page/xoathanhvien.php";
                break;
            case 'suathanhvien':
                include "page/suathanhvien.php";
                break; 
            case 'danhsachthanhvien':
                include "page/danhsachthanhvien.php";
                break;          
            case 'themve':
                include "page/themve.php";
                break;
            case 'xoave':
                include "page/xoave.php";
                break;
            case 'suave':
                include "page/suave.php";
                break; 
            case 'danhsachve':
                include "page/danhsachve.php";
                break;
            case 'themchuyen':
                include "page/themchuyen.php";
                break;
            case 'xoachuyen':
                include "page/xoachuyen.php";
                break;
            case 'suachuyen':
                include "page/suachuyen.php";
                break; 
            case 'danhsachchuyen':
                include "page/danhsachchuyen.php";
                break;    

            default:
                include "page/trangchu.php";
                break;
        }
    }else{
        include "page/trangchu.php";
    }
    ?>


        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
