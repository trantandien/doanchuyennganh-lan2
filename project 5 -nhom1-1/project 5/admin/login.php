<?php 
session_start();
if(isset($_SESSION["tn_user"])){
    header("location:index.php");
    exit();
 }
include "../config.php";
include "../vender/connect.php";
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
      <link href="admin/assets/css/main-style2.css" rel="stylesheet" />
      <style type="text/css" media="screen">
          div#error{
            width: 600px;
            background: yellow;
            border: 1px solid red;
            padding: 10px;
            font-size: 20px;
        }
        div#error li{
            text-align: left;

        }
      </style>
</head>

<body class="body-Login-back" >
<?php 
$errors = array();
if(isset($_POST["btnGui"])){
    if(empty($_POST["txtUser"])){
        $errors[] = "Vui Lòng Nhập Username !!";
    }
    if(empty($_POST["txtPass"])){
        $errors[] = "Vui Lòng Nhập Password !!";
    }
    if(empty($errors)){
        $data = array(
            "user" => $_POST["txtUser"],
            "pass" => md5($_POST["txtPass"])
            );
        $stmt = $conn->prepare("SELECT * FROM thanhvien WHERE Username = :Username AND Password = :Password AND level=0");
        $stmt->bindParam(":Username",$data["user"],PDO::PARAM_STR);
        $stmt->bindParam(":Password",$data["pass"],PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->rowCount();
        if($row <= 0){
            $errors[] = "Tài Khoản Này Không Tồn Tại !!";
        }else{
            $data_login = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION["tn_user"] = $data_login["Username"];
            $_SESSION["tn_level"] = $data_login["level"];
            header("location:index.php");
            exit();
        }

    }
}

?>
<center>
<?php if(!empty($errors)) { ?>
    <div id="error" >
        <ul>
        <?php foreach ($errors as $error) {?>
            <li><?php echo $error; ?></li>
            <?php } ?>
        </ul>  
    </div>
   <?php } ?>
</center>
    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                <img src="assets/img/logo1.png" alt="" width="200" height="100" />
              <!-- <img src="assets/img/logo.png" alt=""/> <br> -->
             <div>
             <!-- <br>
                <img src="assets/img/logo.png" alt=""/> <br>
                <img src="assets/img/stu.png" alt="" width="90" height="40" />  -->  
             </div>
                  
               
                </div>

            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="POST" enctype="">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="txtUser" type="username" >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="txtPass" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="btnGui" value="Login" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
