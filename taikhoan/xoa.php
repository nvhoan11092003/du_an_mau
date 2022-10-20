<?php
    require_once('../db.php');
    include"../model/khachhang.php";
    $id=$_GET['id'];
    delete_khachhang($id);
    header('location:../admin/index.php?act=listkh');
?>