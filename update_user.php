<?php
    include "connect.php";

    session_start();

    
    if(isset($_SESSION['Ho_Ten_KH'])){
        $_Ho_Ten_KH = $_SESSION['Ho_Ten_KH'];
    }else{  
        header('location:index.php');
    }

    $id = $_GET['id'];
    $sql_upd = "SELECT * FROM guest where Ma_KH = $id";
    $query_upd = mysqli_query($connect, $sql_upd);
    $row_upd = mysqli_fetch_assoc($query_upd);


    if(isset($_POST['submit'])){
        $username = $_POST['Ho_Ten_KH'];
        $CCCD = $_POST['CCCD'];
        $DiaChi = $_POST['Dia_Chi'];
        $SoDienThoai = $_POST['Phone'];
        if($username==""  || $CCCD =="" || $DiaChi=="" || $SoDienThoai==""){
          echo '<script>  alert("Hãy điền đầy đủ thông tin") </script>';
        }else{
          $sql = "UPDATE `guest`SET `Ho_Ten_KH` = '$username' , `CCCD` = '$CCCD', `Dia_Chi` = '$DiaChi', `Phone` = '$SoDienThoai' WHERE Ma_KH = $id";
          $query = mysqli_query($connect,$sql);
          if(!$query){
            echo '<script>  alert("Sửa thất bại") </script>';
          } else{
            echo '<script>  alert("Sửa thành công") </script>';
            header('location:user.php');
          }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">

    <title>Sửa Thông Tin</title>
</head>
<body>
<div class="login">
        <div class="header">
            <div class="location">
                <div class="location-item">
                    <p>Du lịch theo phong cách riêng !</p>
                    <ul class="location__list">
                        <li class="location__item  location__item--seperate">
                            <a href="">
                                <i class="fas fa-map-marker-alt"></i>
                                Store Location
                            </a>
                        </li>
                        <li class="location__item">
                            <a href="index.php">
                                <i class="fas fa-plane"></i>
                                Booking Now
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="form">
            <form action="" method="POST" class="form1" id="form-1">
            <h3 class="heading">Sửa Thông Tin</h3>
        
            <div class="spacer"></div>

            <div class="form-group">
              <label for="Ho_Ten_KH" class="form-label">Tên đầy đủ :</label>
              <input id="Ho_Ten_KH" name="Ho_Ten_KH" type="text" value="<?php echo "{$row_upd['Ho_Ten_KH']}" ?>" class="form-control">
              <span class="form-message"></span>
            </div>
    
            <div class="form-group">
              <label for="Dia_Chi" class="form-label">Địa Chỉ :</label>
              <input id="Dia_Chi" name="Dia_Chi" type="text" value="<?php echo "{$row_upd['Dia_Chi']}" ?>"  class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="CCCD" class="form-label">CCCD :</label>
              <input id="CCCD" name="CCCD" type="text" value="<?php echo "{$row_upd['CCCD']}" ?>"  class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="Phone" class="form-label">Số Phone :</label>
              <input id="Phone" name="Phone" type="text" value="<?php echo "{$row_upd['Phone']}" ?>"  class="form-control">
              <span class="form-message"></span>
            </div>

            <button class="form-submit" name="submit">Sửa Thông Tin</button>
            <p class="register-text">Trở về trang cá nhân : <a href="user.php">User</a> </p>
            
        </div>
    </div>
</body>

</html>