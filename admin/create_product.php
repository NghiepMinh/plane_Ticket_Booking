<?php
    include "../connect.php";

    if(isset($_POST['submit'])){
        $Noi_Di = $_POST['Noi_Di'];
        $Noi_Den = $_POST['Noi_Den'];
        $Gio_Di = $_POST['Gio_Di'];
        $Gio_Den = $_POST['Gio_Den'];
        $Gia = $_POST['Gia'];
        $Ma_Chuyen_Bay = $_POST['Ma_Chuyen_Bay'];
        $Mo_Ta = $_POST['Mo_Ta'];
        $So_Luong = $_POST['So_Luong'];
        $img = $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name']; 

        if($Noi_Di =="" || $Noi_Den =="" || $Gio_Di =="" || $Gio_Den=="" || $So_Luong=="" || $Gia=="" || $Mo_Ta==""){
          echo '<script>  alert("Hãy điền đầy đủ thông tin") </script>';
        }else{
          $sql = "INSERT INTO `ve`(`Noi_Di`, `Noi_Den`, `Gio_Di`, `Gio_Den`, `Gia` ,`Ma_Chuyen_Bay` ,`So_Luong`, `Mo_Ta` , `Thumbnail`) VALUES ('$Noi_Di','$Noi_Den','$Gio_Di','$Gio_Den','$Gia','$Ma_Chuyen_Bay',`$So_Luong`,'$Mo_Ta', '$img')";
          $query = mysqli_query($connect,$sql);
          move_uploaded_file($img_tmp, '../assets/img/'.$img);
          if(!$query){
            echo '<script>  alert("Thêm vé thất bại") </script>';
          } else{
            echo '<script>  alert("Thêm véthành công") </script>';
            header('location:nhanvien.php');
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
    <link rel="stylesheet" href="../assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">

    <title>Thêm Vé</title>
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
                            <a href="../index.php">
                                <i class="fas fa-plane"></i>
                                Booking Now
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="form">
            <form action="" method="POST" class="form1" id="form-1" enctype="multipart/form-data">
            <h3 class="heading">Thêm Vé</h3>
        
            <div class="spacer"></div>

            <div class="form-group">
              <label for="Ma_Chuyen_Bay" class="form-label">Mã Chuyến Bay :</label>
              <input id="Ma_Chuyen_Bay" name="Ma_Chuyen_Bay" type="text" placeholder="Nhập Mã Chuyến Bay" class="form-control">
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="Noi_Di" class="form-label">Nơi đi:</label>
              <input id="Noi_Di" name="Noi_Di" type="text" placeholder="Nhập Nơi Đi" class="form-control">
              <span class="form-message"></span>
            </div>
        
            <div class="form-group">
              <label for="Noi_Den" class="form-label">Nơi đến :</label>
              <input id="Noi_Den" name="Noi_Den" type="text" placeholder="Nhập Nơi Đến" class="form-control">
              <span class="form-message"></span>
            </div>

            <div class="form-group">
              <label for="Gio_Di" class="form-label">Giờ đi :</label>
              <input id="Gio_Di" name="Gio_Di" type="text" placeholder="Nhập Giờ Đi" class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="Gio_Den" class="form-label">Giờ đến :</label>
              <input id="Gio_Den" name="Gio_Den" type="text" placeholder="Nhập Giờ Đến" class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="Gia" class="form-label">Giá :</label>
              <input id="Gia" name="Gia" type="text" placeholder="Nhập Giá" class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="image" class="form-label">Hình ảnh :</label>
              <input id="image" name="image" type="file" class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="So_Luong" class="form-label">Số Lượng :</label>
              <input id="So_Luong" name="So_Luong" type="text" placeholder="Nhập Số Lượng" class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="Mo_Ta" class="form-label">Mô tả :</label>
              <input id="Mo_Ta" name="Mo_Ta" type="text" placeholder="Nhập Mô Tả" class="form-control">
              <span class="form-message"></span>
            </div>

            <button class="form-submit" name="submit">Thêm Vé</button>
            <p class="register-text">Trở về trang Nhân Viên : <a href="nhanvien.php">Nhân Viên</a> </p>
            
        </div>
    </div>
</body>

</html>