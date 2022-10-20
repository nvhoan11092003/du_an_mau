<?php 
    require_once "../../db.php";
    include "../../model/sanpham.php";
    if (isset($_GET["id"])) {
        $id = $_GET['id'];
        if ($id > 0) {
            delete_sanpham($id);
            header ("location:../index.php?act=listhh");
        }
    }
?>