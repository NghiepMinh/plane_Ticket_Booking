<?php
    include "../connect.php";
    session_start();
    $sql_nhanvien = "SELECT * FROM nhan_vien";
    $query_nhanvien = mysqli_query($connect,$sql_nhanvien);

    $sql_kh = "SELECT * FROM guest WHERE rule = 'user'";
    $query_kh = mysqli_query($connect,$sql_kh);

    $sql_ve = "SELECT * FROM ve";
    $query_ve = mysqli_query($connect,$sql_ve);
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/font/fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,700&display=swap" rel="stylesheet">
    <title>admin</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="../index.php">
                <img src="../assets/img/logo.png" alt="">
            </a>
           <h3>Administrator</h3>
        </div>
        <div class="nav">
            <p class="nav-text">Xin Chào admin 
                <a href="logout_admin.php">
                    Đăng Xuất 
                </a>
            </p>
        </div>
    </div>

    <div class="body">
        <div class="toolbar">
            <h3> <i class="fas fa-bars"></i> DANH MỤC QUẢN LÝ</h3>
            <ul class="toolbar-list">
                <li class="toolbar-item">
                    <a id="qlnv" onclick=qlnv_click() style="cursor: pointer"> 
                        <div class="toolbar-item__text">
                            <i class="fas fa-user-tie"></i> Quản Lý Nhân Viên
                        </div>
                        <i class="fas fa-caret-down"></i>
                    </a>
                </li>
                <li class="toolbar-item">
                    <a id="qlkh" onclick=qlkh_click() style="cursor: pointer"> 
                        <div class="toolbar-item__text">
                            <i class="fas fa-user"></i>Quản Lý Khách Hàng
                        </div>
                        <i class="fas fa-caret-down"></i>
                    </a>
                </li>
                <li class="toolbar-item">
                    <a id="qlv" onclick=qlv_click() style="cursor: pointer"> 
                        <div class="toolbar-item__text">
                            <i class="fas fa-ticket-alt"></i>Quản Lý Vé Máy Bay
                        </div>
                        <i class="fas fa-caret-down"></i>
                    </a>
                </li>
 
            </ul>
        </div>
        <div class="content content_active" id="content_nv">
            <div class="content-title">
                <h3>Quản Lý Nhân Viên</h3>
            </div>

            <div class="content-table">
                <table style="border-collapse: collapse;"> 
                    <tr class="table-title">
                        <th>Mã Nhân Viên</th>
                        <th>Tên Nhân Viên</th>
                        <th>Địa Chỉ</th>
                        <th>Phone</th>
                        <th>Lương</th>
                        <th>Loại</th>
                    </tr>
                    <?php
                        while($row_kh = mysqli_fetch_array($query_nhanvien)){ ?>
                        <tr>
                            <td><?php echo  "<p>{$row_kh['Ma_NV']}</p>"; ?></td>
                            <td><?php echo  "<p>{$row_kh['Ho_Ten_NV']}</p>"; ?></td>   
                            <td><?php echo  "<p>{$row_kh['Dia_Chi']}</p>"; ?></td>    
                            <td><?php echo  "<p>{$row_kh['Phone']}</p>"; ?></td>    
                            <td><?php echo  "<p>{$row_kh['Luong']}</p>"; ?></td>    
                            <td><?php echo  "<p>{$row_kh['Loai_NV']}</p>"; ?></td>                       
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="content content_deactive" id="content_kh">
            <div class="content-title">
                <h3>Quản Lý Khách Hàng</h3>
            </div>

            <div class="content-table">
                <table style="border-collapse: collapse;"> 
                    <tr class="table-title">
                        <th>Mã Khách Hàng</th>
                        <th>Tên Khách Hàng</th>
                        <th>Địa Chỉ</th>
                        <th>Phone</th>
                        <th>CCCD</th>
                    </tr>
                    <?php
                        while($row_kh = mysqli_fetch_array($query_kh)){ ?>
                        <tr>
                            <td><?php echo  "<p>{$row_kh['Ma_KH']}</p>"; ?></td>
                            <td><?php echo  "<p>{$row_kh['Ho_Ten_KH']}</p>"; ?></td>   
                            <td><?php echo  "<p>{$row_kh['Dia_Chi']}</p>"; ?></td>    
                            <td><?php echo  "<p>{$row_kh['Phone']}</p>"; ?></td>    
                            <td><?php echo  "<p>{$row_kh['CCCD']}</p>"; ?></td>    
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="content content_deactive" id="content_v">
            <div class="content-title">
                <h3>Quản Lý Vé</h3>
            </div>
            <div class="content-table">
                <table style="border-collapse: collapse;"> 
                    <tr class="table-title">
                        <th>Mã Chuyến Bay</th>
                        <th>Nơi Đi</th>
                        <th>Nơi Đến</th>
                        <th>Giờ Đi</th>
                        <th>Giờ Đến</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Hình Ảnh</th>
                        
                    </tr>
                    <?php
                        while($row_ve = mysqli_fetch_array($query_ve)){ ?>
                        <tr>
                            <td><?php echo  "<p>{$row_ve['Ma_Chuyen_Bay']}</p>"; ?></td>
                            <td><?php echo  "<p>{$row_ve['Noi_Di']}</p>"; ?></td>   
                            <td><?php echo  "<p>{$row_ve['Noi_Den']}</p>"; ?></td>    
                            <td><?php echo  "<p>{$row_ve['Gio_Di']}</p>"; ?></td>    
                            <td><?php echo  "<p>{$row_ve['Gio_Den']}</p>"; ?></td>    
                            <td><?php echo  "<p>{$row_ve['Gia']}</p>"; ?></td>  
                            <td><?php echo  "<p>{$row_ve['So_Luong']}</p>"; ?></td>      

                            <td><img src="../assets/img/<?php echo  "{$row_ve['Thumbnail']}"; ?> " alt="" style="width:200px;  height: 100px; "></td>                  
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>


    </div>

</body>
    <script>
        var qlkh = document.getElementById("qlkh");
        var qlnv = document.getElementById("qlnv");
        var content_kh = document.getElementById("content_kh");
        var content_nv = document.getElementById("content_nv");

        // content_kh.classList.add("content_deactive");
        // content_nv.classList.add("content_active");

        var state =  true;

        function qlkh_click(){
            state = false;
            
            content_kh.classList.remove("content_deactive");
            content_kh.classList.add("content_active");


            content_nv.classList.remove("content_active");
            content_nv.classList.add("content_deactive");

            content_v.classList.remove("content_active");
            content_v.classList.add("content_deactive");

        };

        function qlnv_click(){
            state = true;
            content_kh.classList.remove("content_active");
            content_kh.classList.add("content_deactive");


            content_nv.classList.remove("content_deactive");
            content_nv.classList.add("content_active");

            content_v.classList.remove("content_active");
            content_v.classList.add("content_deactive");

        };

        function qlv_click(){
            state = true;
            
            content_kh.classList.remove("content_active");
            content_kh.classList.add("content_deactive");


            content_nv.classList.remove("content_active");
            content_nv.classList.add("content_deactive");

            content_v.classList.remove("content_deactive");
            content_v.classList.add("content_active");

       
        };

    </script>
</html>
