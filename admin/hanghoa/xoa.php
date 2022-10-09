<?php 
    require_once "../../db.php";
    if (isset($_GET["id"])) {
        $id = $_GET['id'];
        if ($id > 0) {
            $sql = "DELETE FROM hang_hoa WHERE ma_hh = '$id'";
            pdo_execute($sql);
            header ("location:../index.php?act=listhh");
        }
    }
?>