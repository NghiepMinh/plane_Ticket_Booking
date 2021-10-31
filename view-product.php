<?php
    session_start();
    include 'connect.php';
    
    if(isset($_SESSION['Ho_Ten_KH'])){
        $_Ho_Ten_KH = $_SESSION['Ho_Ten_KH'];
    }else{  
        $_Ho_Ten_KH = 0;
    }
?>
<?php
    $id_ve = $_GET['id'] ;
    $sql_ve = "SELECT * FROM ve WHERE `Id_Ve` = $id_ve";
    $query_ve = mysqli_query($connect,$sql_ve);
    $ve = mysqli_fetch_assoc($query_ve);
?>
<?php
    $sql_ve_full = "SELECT * FROM ve";
    $query_ve_full = mysqli_query($connect,$sql_ve_full);

    $sql_user_information = "SELECT * FROM guest WHERE `Ho_Ten_KH` = '$_Ho_Ten_KH' ";
    $query_user_information = mysqli_query($connect,$sql_user_information);
    $user_information = mysqli_fetch_assoc($query_user_information);
    $id_nguoi_dung = $user_information['Ma_KH'] ;   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <title>Product</title>
</head>
<body>
    <div style="position: relative">

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
                            <a href="index.php">VÉ MÁY BAY
                                
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
                                        echo "<a href='history_tiket.php'> VÉ ĐÃ ĐẶT </a> ";
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

            
            <div class="banner-view">
                <div class="banner-view__content">
                    <h1>Đi Hết Việt Nam</h1>
                    <ul class="banner-view__list">
                        <li class="banner-view__items">
                            <a href="index.php">Home</a>
                            <i class="fas fa-chevron-right"></i>
                        </li>
                        <li class="banner-view__items">
                            <?php echo "{$ve['Noi_Den']}" ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content-view">
                <div class="content-view__img">
                    <img src="./assets/img/<?php echo "{$ve['Thumbnail']}" ?>" alt="" style="background-size: c">
                    <div class="content-view__img--cover">
                        <img src="./assets/img/binhba_nhatrang1.jpg" alt="">
                        <img src="./assets/img/binhba_nhatrang2.jpg" alt="">
                        <img src="./assets/img/binhba_nhatrang3.jpg" alt="">
                    </div>
                </div>
                <div class="content-view__description">
                    <div class="description__name">
                        <h3><?php echo "{$ve['Noi_Den']}" ?></h3>
                    </div>
                    <div class="description__price">
                        <p class="price-sale">5.000.000 VNĐ</p>
                        <p><?php echo "{$ve['Gia']}" ?> VNĐ</p>
                    </div>
                    <div class="description-content">
                        <div class="description-content__title">
                            <span class="description-content__title--inventory">Availability:</span>
                            <span class="description-content__title--variant">Have Tickets</span>
                        </div>
                        <div class="description-content__text">
                            <p>
                                 <?php echo "{$ve['Mo_Ta']}" ?>
                            </p>
                        </div>
                    </div>
                    <ul class="description__list">
                        <li class="description__item">
                            <i class="fas fa-couch"></i>
                            Ticket Type
                        </li>
                        <li class="description__item">
                            <i class="fas fa-suitcase-rolling"></i>
                            Package
                        </li>
                        <li class="description__item">
                            <i class="far fa-envelope"></i>
                            Ask About This Ticket
                        </li>
                    </ul>
                    <div class="description__quantity">
                        <!-- <p>Quantity:</p>
                        <div class="description__quantity--calculate">
                            <span>-</span>
                            <span></span>
                            <span>+</span>
                        </div> -->
                    </div>
                    <div class="description__button">
                        <ul class="description__button--list">
                            <li class="description__button--item">
                                <a href="">
                                    <i class="far fa-heart"></i>
                                </a>
                            </li>
                            <li class="description__button--item">
                                <a onclick="buy_click()" style="cursor: pointer;">
                                    <i class="fas fa-plane-departure"></i>
                                    BUY TICKET
                                </a>
                            </li>
                            <li class="description__button--item">
                                <a href="https://www.google.com/maps/place/C%E1%BA%A3ng+H%C3%A0ng+Kh%C3%B4ng+Qu%E1%BB%91c+T%E1%BA%BF+Cam+Ranh/@12.0019885,109.2133332,15.61z/data=!4m9!1m2!2m1!1ss%C3%A2n+bay+b%C3%ACnh+ba+nha+trang!3m5!1s0x31708cee93fc2047:0xda82d1989dcb43ea!8m2!3d12.007578!4d109.2143519!15sChtzw6JuIGJheSBiw6xuaCBiYSBuaGEgdHJhbmdaHSIbc8OibiBiYXkgYsOsbmggYmEgbmhhIHRyYW5nkgEVaW50ZXJuYXRpb25hbF9haXJwb3J0mgEkQ2hkRFNVaE5NRzluUzBWSlEwRm5TVVJ6ZVdFdGRYTkJSUkFC?hl=vi-VN">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="hr"></div>
                    <div class="descripton__info">
                        <table>
                            <tr>
                                <th>QUANTITY</th>
                                <td><?php echo "{$ve['So_Luong']}"; $soluong = $ve['So_Luong']; ?></td>
                            </tr>
                            <tr>
                                <th>AIRLINE</th>
                                <td>
                                    <div class="select">
                                        <select id="airline">
                                                <option value="VNa">VietNam Airline</option>
                                                <option value="VJ">VietJet Airline</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>TYPE</th>
                                <td>
                                    <div class="select">
                                        <select id="type">
                                            <option value="nor">NORMAL</option>
                                            <option value="vip">VIP</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>SHARE ON</th>
                                <td>
                                    <a href="">
                                       <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                    <a href="">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="selection-view">
                <div class="selection-view__title">
                    <h1>Description</h1>
                </div>
                <div class="selection-text">
                    <p>
                        <?php echo "{$ve['Mo_Ta']}" ?>
                    </p>
                </div>
            </div>

        <div class="hr"></div>
        <div class="center-product">
            <h3 class="center-heading">Các điểm du lịch phổ biến</h3>
            <h3 class="center-sub-heading">Popular</h3>
            <div class="center-prouct__list">
                <?php
                    $i = 0;
                    while($row_ve = mysqli_fetch_array($query_ve_full)){ ?>
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
        <div class="footer">
            <div class="footer-logo">
                <img src="./assets/img/logo.png" alt="">
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
            
        </div>

        <div style="position: fixed; background-color: rgba(0,0,0,0.4); height: 100vh; width: 99vw; z-index: 999; top: 0; display: flex; align-items: center;"  id="popup" class="ticket_deactive">

            <div style="width: 100%; height: 50%; background-image: url('./assets/img/banner-decor-4.png'); background-size: contain; background-position: center; background-repeat: no-repeat; padding: 15px 0">

                 <div id="popup_ticket">
                    <div style="width: 100%; height: 100%; display: flex;">

                        <div style="width: 60%; height: 100%; display: flex; flex-direction: column; align-items: flex-end;">
                            <div style="width: 500px; height:  48%; background-image: url('./assets/img/mattruoc.png'); background-size: contain; background-position: center; background-repeat: no-repeat"></div>

                            <div style="height: 20px"></div>

                            <div style="width:  500px; height:  48%; background-image: url('./assets/img/matsau.png'); background-size: contain; background-position: center;  background-repeat: no-repeat; position: relative;">
                                <p style="position: absolute; left: 12%; bottom: 10%" id="seat">A23</p>
                                <!-- <p style="position: absolute; left: 12%; bottom: 10%" id="gate">A23</p> -->
                                <p style="position: absolute; left: 12%; top: 22%; font-size: 10px" id="gate"><?php echo "{$ve['Check_in']}" ?></p>

                                <p style="position: absolute; left: 37%; top: 37%;" id="flight"><?php echo "{$ve['Ma_Chuyen_Bay']}" ?></p>
                                <p style="position: absolute; left: 37%; top: 47%;" id="seat_2">A23</p>
                                <p style="position: absolute; left: 37%; top: 57%; font-size: 12px" id="date"><?php echo "{$ve['Gio_Di']}" ?></p>

                                <p style="position: absolute; left: 60%; top: 37%;" id="gate_2"><?php echo "{$ve['Check_in']}" ?></p>

                                <p style="position: absolute; left: 60%; top: 55%;" id="from"><?php echo "{$ve['Noi_Di']}" ?></p>
                                <p style="position: absolute; left: 60%; top: 65%;" id="to"><?php echo "{$ve['Noi_Den']}" ?></p>


                            </div>
                        </div>

                        <div class="btn_hover_confirm" style="height: 100%; width: 40%">
                            <form action="" method="POST" id="formSubmit">
                                <input type="hidden" name="user_id" value=<?php echo "{$id_nguoi_dung}" ?>>
                                <input type="hidden" name="id_ve" value=<?php echo "{$ve['Id_Ve']}"?>>
                                <button name="submit">BUY NOW</button>
                                <button onclick="destroy_popup()">Cancel</button>
                            </form>
                        </div>
                    </div>


                </div>
 
            </div>


        </div>

    </div>

    <?php 

        if(isset($_POST['submit'])){

            $user_id = $_POST['user_id'];
            $id_ve = $_POST['id_ve'];
            if($user_id=="" || $id_ve==""){
            echo '<script>  alert("Hãy điền đầy đủ thông tin") </script>';
            }else{
                $sql = "INSERT INTO `table_booking_history`(`Ma_KH`, `Id_Ve`) VALUES ('$user_id','$id_ve')";
                $query = mysqli_query($connect,$sql);
                if(!$query){
                    echo '<script>  alert("Mua vé thất bại") </script>';
                    
                } else{
                    echo '<script>  alert("Mua vé thành công") </script>';

                    $upd_soluong = (int)$soluong -1;
                    $sql = "UPDATE `ve` SET `So_Luong` = $upd_soluong  WHERE Id_Ve = $id_ve";
                    $query = mysqli_query($connect,$sql);
                
                }
            }
        }    
    
    ?>                   
</body>

<script type="text/javascript">
    function buy_click(){

        var id_nguoi_dung = <?php echo "{$id_nguoi_dung}" ?>;
        var so_luong  =  <?php echo "{$soluong}" ?>;
        console.log(id_nguoi_dung);
        console.log(so_luong);

 

        if(!id_nguoi_dung){
            return alert("Bạn Phải Đăng Nhập Để Thực Hiện Chức Năng Này");
        }
               
        if(so_luong == 0 ){
            return alert("Số Lượng Vé Đã Hết");
        }

        var popup = document.getElementById("popup");

        var gate = document.getElementById("gate");
        var gate_2 = document.getElementById("gate_2");
        var seat = document.getElementById("seat");
        var seat_2 = document.getElementById("seat_2");
        var from = document.getElementById("from");
        var to = document.getElementById("to");
        var date = document.getElementById("date");
        
        date.innerHTML = date.innerHTML.split(" ")[0];

        popup.classList.remove("ticket_deactive");
        popup.classList.add("ticket_active");


    }


    function destroy_popup(){

        console.log("destroy_popup");

        var popup = document.getElementById("popup");

        popup.classList.remove("ticket_active");
        popup.classList.add("ticket_deactive");
    }

</script>

</html>