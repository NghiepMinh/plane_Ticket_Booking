<?php
    session_start();
    if(isset($_SESSION['Ho_Ten_KH'])){
        session_destroy();
        header('location: ../index.php');
    }else{
        header('location: ../index.php');
    }
?>