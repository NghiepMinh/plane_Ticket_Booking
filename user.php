<?php
    include 'connect.php';
    session_start();
?>
                <?php
                    if(isset($_SESSION['Ho_Ten_KH'])){
                        $_Ho_Ten_KH = $_SESSION['Ho_Ten_KH'];
                    }else{  
                        header('location:index.php');
                    }
                ?>

<?php
        $sql_user_information = "SELECT * FROM guest WHERE `Ho_Ten_KH` = '$_Ho_Ten_KH' ";
        $query_user_information = mysqli_query($connect,$sql_user_information);
        $user_information = mysqli_fetch_assoc($query_user_information);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,700&display=swap" rel="stylesheet">
    <title>User</title>
</head>
<body>
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
                        <a href="">
                            <i class="fas fa-plane"></i>
                            Booking Now
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="application">
            <div class="appli-logo">
                <a href="index.php">
                  <img src="assets/img/logo.png" alt="">
                </a>
            </div>
            <div class="nav">
                <ul class="menu">
                    <li class="menu-item">
                        <a href="index.php">HOME
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="">KHUYẾN MÃI
                            
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="">VÉ MÁY BAY
                            
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="">TAXI SÂN BAY
                            
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="">COMBO
                            
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="">TOUR
                            
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="history_tiket.php">VÉ ĐÃ ĐẶT
                            
                        </a>
                    </li>
                </ul>
            </div>
            <div class="toolbar">
            
            </div>
        </div>
        <div class="hr"></div>
    </div>
    <div class="content-user">
        <div class="content-user__funtion">
            <div class="content-user__funtion--name">
                <p><?php echo "{$user_information['Ho_Ten_KH']}" ?></p>


                 <a href="logout.php">Đăng Xuất</a>
  


                  <a href="update_user.php?id=<?php echo "{$user_information['Ma_KH']}" ?>">Sửa Thông Tin</a>


            </div>
        </div>
        <div class="content-user__infomation">
            <div class="content-user__infomation--item">
                <p> <i class="far fa-user"></i> Tên Đăng Nhập : <?php echo "{$user_information['Ho_Ten_KH']}" ?></p>
            </div>
            <div class="content-user__infomation--item">
                <p><i class="fas fa-mobile-alt"></i> Số Điện Thoại : <?php echo "{$user_information['Phone']}" ?></p>
            </div>
            <div class="content-user__infomation--item">
                <p><i class="fas fa-home"></i>Địa Chỉ : <?php echo "{$user_information['Dia_Chi']}" ?></p>
            </div>
            <div class="content-user__infomation--item">
                <p><i class="fas fa-address-card"></i> CCCD : <?php echo "{$user_information['CCCD']}" ?></p>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-logo">
            <a href="index.php">
                <img src="./assets/img/logo.png" alt="">
            </a>
        </div>
        <div class="nav">
            <ul class="menu">
                <li class="menu-item">
                    <a href="">ABOUT US
                    </a>
                </li>
                <li class="menu-item">
                    <a href="">STORE LOCATION
                    </a>
                </li>
                <li class="menu-item">
                    <a href="">CONTACT
                    </a>
                </li>
                <li class="menu-item">
                    <a href="">SUPPORT
                    </a>
                </li>
                <li class="menu-item">
                    <a href="">POLICY
                    </a>
                </li>
                <li class="menu-item">
                    <a href="">FAQS
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-input">
            <input type="text" placeholder="Your email address">
            <button>subscribe</button>
        </div>

        <div class="footer-icon">
            <a href="">
                 <i class="fab fa-twitter"></i>
            </a>
            <a href="">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="">
                <i class="fab fa-instagram-square"></i>
            </a>
            <a href="">
               <i class="fab fa-youtube"></i>
            </a>
        </div>
        <div class="footer-license">
            <p>© 2021 learts. All Rights Reserved | (+00) 123 456789 | contact@demo.com</p>
        </div>
    </div>
</body>
</html>