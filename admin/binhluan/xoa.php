<?php
    require_once('../../db.php');
    include('../../model/binhluan.php');
    $id = $_GET['id'];
    delete_binhluan($id);
    header("location:" . $_SERVER["HTTP_REFERER"]);
?>