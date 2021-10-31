<?php
    session_start();
?>
<?php
    include 'connect.php';
?>
<?php
    $sql_ve = "SELECT * FROM ve";
    $query_ve = mysqli_query($connect,$sql_ve);
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
    <title>Bán vé máy bay</title>
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
                        <a href="#popular">
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
                        <a href="#event">KHUYẾN MÃI
                            
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="#popular">VÉ MÁY BAY
                            
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
                        <?php
                            if(isset($_SESSION['Ho_Ten_KH'])){
                                    echo "<a href='history_tiket.php'> VÉ ĐÃ ĐẶT</a> ";
                                }
                        ?>
                    </li>
                </ul>
            </div>
            <div class="toolbar">
                <?php
                    if(isset($_SESSION['Ho_Ten_KH'])){
                        echo "<a href='user.php' class='nav-header__link'>{$_SESSION['Ho_Ten_KH']}</a>";
                        echo "<a href='logout.php' class='nav-header__link' style= 'margin:0 10px; ' >Đăng Xuất </a>";
                    }else{  
                           echo "<a href='login.php'> <i class='fas fa-user toolbar-icon'></i> </a>";
                    }
                ?>
            </div>
        </div>
        <div class="hr"></div>
    </div>
    <div class="banner"></div>
    <div class="center">
            <div class="center-item">
                <h3 class="center-heading" id="event">Vé máy bay khuyến mãi</h3>
                <h3 class="center-sub-heading"> Promotion Air Tickets</h3>
                <div class="sale">
                    <div class="sale__item">
                        <div class="sale-banner">
                            <div class="sale-banner__item">
                                <div class="sale-banner__item--img">
                                    <img src="./assets/img/img-sale-banner1.png" alt="">
                                </div>
                                <span>Discount</span>
                                <h2>
                                    <span>40</span>
                                    %
                                    <br>
                                    off
                                </h2>
                                <a href="view-product.php?id=4">Booking Now</a>
                            </div>
                        </div>
                        <div class="sale-banner2">
                            <div class="sale-banner2__img">
                                <h1>Đà Nẵng</h1>
                            </div>
                            <div class="sale-banner2__content">
                                <div class="sale-banner2__text">
                                    <h2>Đà Nẵng</h2>
                                    <span>Tham quan Cầu vàng - HOT Cây cầu độc đáo nằm trong vườn Thiên Thai ở Bà Nà Hill</span>
                                </div>

                                <div class="sale-banner2__btn">
                                    <a href="view-product.php?id=4">Booking Now</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="crossbar">
                    <div class="crossbar-item">
                        <a href="view-product.php?id=3">
                            <div class="crossbar-img">
                                <img class="crossbar-img__item" src="./assets/img/HaNoi_ChuaHuong.jpg" alt="">
                                <!-- <img src="./asset/img" alt=""> -->
                            </div>
                            <div class="crossbar-content">
                                <h2>Hà Nội</h2>
                            </div>
                        </a>
                    </div>
                    <div class="crossbar-item">
                        <a href="view-product.php?id=5">
                            <div class="crossbar-img">
                                <img class="crossbar-img__item" src="./assets/img/VinhHaLong.jpg" alt="">
                            </div>
                            <div class="crossbar-content">
                                <h2>Vịnh Hạ Long</h2>
                            </div>
                        </a>
                    </div>
                    <div class="crossbar-item">
                        <a href="view-product.php?id=2">
                            <div class="crossbar-img">
                                <img class="crossbar-img__item" src="./assets/img/PhuQuoc.jpg" alt="">
                            </div>
                            <div class="crossbar-content">
                                <h2>Phú Quốc</h2>
                            </div>
                        </a>
                    </div>
            </div>
            <div class="center-product">
                <h3 class="center-heading" id="popular">Các điểm du lịch phổ biến</h3>
                <h3 class="center-sub-heading">Popular</h3>
                <div class="center-prouct__list">
                    <?php
                        $i = 0;
                        while($row_ve = mysqli_fetch_array($query_ve)){ ?>
                        <a href="view-product.php?id=<?php echo "{$row_ve['Id_Ve']}"; ?>">
                            <div class="center-product__item">
                                    <img src="./assets/img/<?php echo "{$row_ve['Thumbnail']}"; ?> " alt="">
                                    <div class="center-product__item--content">
                                        <h1 class="center-product__item--name"> <?php echo "{$row_ve['Noi_Den']}"; ?> </h1>
                                        <div class="center-product__item--description">
                                            <ul>
                                                <li>Nơi Đi : <?php echo "{$row_ve['Noi_Di']}"; ?> </li>
                                                <li>Nơi Đến : <?php echo "{$row_ve['Noi_Den']}"; ?> </li>
                                                <li>Giờ Đi : <?php echo "{$row_ve['Gio_Di']}"; ?> </li>
                                                <li>Giờ Đến : <?php echo "{$row_ve['Gio_Den']}"; ?>  </li>
                                
                                            </ul>
                                        </div>
                                        <p class="center-product__item--price"><?php echo "{$row_ve['Gia']}"; ?> VND</p>
                                    </div>
                            </div>
                        </a>
                    <?php } ?>
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