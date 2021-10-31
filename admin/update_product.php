<?php
    include '../connect.php';
    $id = $_GET['id'];
    $sql_upd = "SELECT * FROM ve where Id_Ve = $id";
    $query_upd = mysqli_query($connect, $sql_upd);
    $row_upd = mysqli_fetch_assoc($query_upd);

    if(isset($_POST['submit'])){
        $Gio_Di = $_POST['Gio_Di'];
        $Gio_Den = $_POST['Gio_Den'];

        if($Gio_Di==""|| $Gio_Den==""){
            echo '<script>  alert("Hãy điền đầy đủ thông tin") </script>';
        }else{
            $sql = "UPDATE `ve` SET `Gio_Di`='$Gio_Di',`Gio_Den`= '$Gio_Den' WHERE Id_Ve = $id";
            $query = mysqli_query($connect,$sql);
            if(!$query){
                echo '<script>  alert("Sửa sản phẩm thất bại") </script>';
                return;
            }else{
                echo '<script>  alert("Sửa sản phẩm thành công") </script>';
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

    <title>Sửa Vé</title>
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
            <h3 class="heading">Sửa Vé</h3>
        
            <div class="spacer"></div>

            <div class="form-group">
              <label for="Gio_Di" class="form-label">Giờ đi :</label>
              <input id="Gio_Di" name="Gio_Di" type="text"  value="<?php echo "{$row_upd['Gio_Di']}"; ?> " class="form-control">
              <span class="form-message"></span>
            </div>
            <div class="form-group">
              <label for="Gio_Den" class="form-label">Giờ đến :</label>
              <input id="Gio_Den" name="Gio_Den" type="text" value="<?php echo "{$row_upd['Gio_Di']}"; ?>"" class="form-control">
              <span class="form-message"></span>
            </div>

            <button class="form-submit" name="submit">Sửa Vé </button>
            <p class="register-text"><a href="nhanvien.php">Trở về trang chủ</a> </p>
            
        </div>
    </div>
</body>

</html>