<?php
    require_once('../db.php');
    $id=$_GET['id'];
    $sql="DELETE FROM khach_hang WHERE ma_kh=$id";
    pdo_execute($sql);
    header('location:../admin/index.php?act=listkh');
?>