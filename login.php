<?php
    session_start();
?>
<?php
               include 'connect.php';
               if(isset($_POST['submit'])){
                   $username = $_POST['Ho_Ten_KH'];
                   $pasword = $_POST['Matkhau_KH'];
                   if($username == "" || $pasword == ""){
                       echo '<script>  alert("Hãy điền đầy đủ thông tin") </script>';
                   }else{
                       $pasword = md5($pasword);
                       $sql = "SELECT * FROM `guest` WHERE Ho_Ten_KH ='$username' and Matkhau_KH ='$pasword'";
                       $query = mysqli_query($connect,$sql);
                       $num_rows = mysqli_num_rows($query);
                       $check_rule = mysqli_fetch_assoc($query);
                       $rule = $check_rule['rule'] ;
                       if($num_rows!=0 && $rule == 'user'){
                           $_SESSION['Ho_Ten_KH'] = $username;
                           $_SESSION['Matkhau_KH'] = $pasword;
                           header('location:index.php');
                       }
                       if($num_rows!=0 && $rule == 'admin'){
                        $_SESSION['Ho_Ten_KH'] = $username;
                        $_SESSION['Matkhau_KH'] = $pasword;
                        header('location:admin/admin.php');
                        }
                        if($num_rows!=0 && $rule == 'nv'){
                            $_SESSION['Ho_Ten_KH'] = $username;
                            $_SESSION['Matkhau_KH'] = $pasword;
                            header('location:admin/nhanvien.php');
                            }
                        else{
                           echo '<script>  alert("Đăng nhập thất bại") </script>';
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
    <title>Đăng Nhập</title>
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
            <h3 class="heading">Đăng Nhập</h3>
        
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

            <button class="form-submit" name="submit">Đăng Nhập</button>
            <p class="register-text">Thành viên mới đăng ký tại đây : <a href="register.php">Đăng ký</a> </p>
            
        </div>
    </div>
</body>
</html>