<?php
    include "connect.php";

    if(isset($_POST['submit'])){
        $username = $_POST['Ho_Ten_KH'];
        $MatKhauKH = $_POST['Matkhau_KH'];
        $MatKhauKH = md5($MatKhauKH);
        $CCCD = $_POST['CCCD'];
        $DiaChi = $_POST['Dia_Chi'];
        $SoDienThoai = $_POST['Phone'];
        if($username=="" || $MatKhauKH=="" || $CCCD =="" || $DiaChi=="" || $SoDienThoai==""){
          echo '<script>  alert("Hãy điền đầy đủ thông tin") </script>';
        }else{
          $sql = "INSERT INTO `guest`(`Ho_Ten_KH`, `Matkhau_KH`, `CCCD`, `Dia_Chi`, `Phone` ,`Rule`) VALUES ('$username','$MatKhauKH','$CCCD','$DiaChi','$SoDienThoai','user')";
          $query = mysqli_query($connect,$sql);
          if(!$query){
             echo '<script>  alert("Đăng ký thất bại") </script>';
             return;
          } else{
            echo '<script>  alert("Đăng ký thành công") </script>';
            echo '<script>  alert("Đăng ký thành công") </script>';
            header('location:login.php');
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

    <title>Đăng Ký</title>
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
            <h3 class="heading">Đăng Ký</h3>
        
            <div class="spacer"></div>

            <div class="form-group">
              <label for="Ho_Ten_KH" class="form-label">Tên đầy đủ :</label>
              <input id="Ho_Ten_KH" name="Ho_Ten_KH" type="text" placeholder="Nhập tài khoản" class="form-control">
              <span class="form-message"></span>
            </div>
        
            <div class="form-group">
              <label for="Matkhau_KH" class="form-label">Mật khẩu :</label>
              <input id="Matkhau_KH" name="Matkhau_KH" type="password" placeholder="Nhập mật khẩu" class="form-control">
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="Dia_Chi" class="form-label">Địa Chỉ :</label>
              <input id="Dia_Chi" name="Dia_Chi" type="text" placeholder="Nhập địa chỉ" class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="CCCD" class="form-label">CCCD :</label>
              <input id="CCCD" name="CCCD" type="text" placeholder="Nhập căng cước công dân" class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="Phone" class="form-label">Số Phone :</label>
              <input id="Phone" name="Phone" type="text" placeholder="Nhập số phone" class="form-control">
              <span class="form-message"></span>
            </div>

            <button class="form-submit" name="submit">Đăng Ký</button>
            <p class="register-text">Thành viên đăng nhập tại đây : <a href="login.php">Đăng Nhập</a> </p>
            
        </div>
    </div>
</body>

</html>