<?php
   include '../connect.php';
   $id = $_GET['id'];
   $sql = "DELETE FROM `ve` WHERE Id_Ve = $id ";
   $query = mysqli_query($connect,$sql);
   header('location:nhanvien.php');
?>