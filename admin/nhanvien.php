<?php
    include "../connect.php";
    session_start();
    $search = isset($_GET['name']) ? $_GET['name'] : "";
    if($search){
        $sql_ve = "SELECT * FROM ve WHERE Ma_Chuyen_Bay LIKE '%$search%' ";
        $query_ve = mysqli_query($connect,$sql_ve);
    }else{
        $sql_ve = "SELECT * FROM ve";
        $query_ve = mysqli_query($connect,$sql_ve);
    }
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
           <h3>Nhân Viên</h3>
        </div>
        <div class="nav">
            <p class="nav-text">Xin Chào <?php echo $_SESSION['Ho_Ten_KH'] ?> <a href="logout_admin.php">Đăng Xuất</a></p>
        </div>
    </div>

    <div class="body">
        <div class="toolbar">
            <h3> <i class="fas fa-bars"></i> DANH MỤC QUẢN LÝ</h3>
            <ul class="toolbar-list">
                <li class="toolbar-item">
                    <a href="">
                        <div class="toolbar-item__text">
                            <i class="fas fa-ticket-alt"></i>Quản Lý Vé Máy Bay
                        </div>
                        <i class="fas fa-caret-down"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content" id="content_v">
            <div class="content-title">
                <h3>Quản Lý Vé</h3>
            </div>
            <div class="content-searchbar">
                <div class="content-searchbar-input">
                    <form action="">
                        <input type="text" name='name' placeholder="Nhập mã chuyến bay" value="<?= isset($_GET['name']) ? $_GET['name'] : ""?>" >
                        <button type="submit" name="submit">Tìm Kiếm</button>
                    </form>
                </div>
                <div class="content-searchbar__create">
                   <a href="create_product.php">Thêm mới</a>
                </div>
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
                        <th>Chức Năng</th>
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
                            <td class="table-tool">
                                <a href="update_product.php?id=<?php echo $row_ve['Id_Ve']?>">
                                    <i class="fas fa-tools content-table__update"></i>
                                </a>
                                <a href="delete_product.php?id=<?php echo $row_ve['Id_Ve']?>" onclick="return DEL('<?php echo $row_ve['Ma_Chuyen_Bay']?>')">
                                    <i class="fas fa-trash-alt content-table_delete"></i>
                                </a>
                            </td>                    
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

</body>

<script>
    function DEL(name){
        return confirm("Bạn có chắc chắn muốn xóa vé " + name + " ?");
    }
</script>
</html>