<?php
    require_once('../../db.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM binh_luan WHERE ma_bl = $id";
    pdo_execute($sql);
    header("location:" . $_SERVER["HTTP_REFERER"]);
?>