<?php 
    require_once "../../db.php";
    include "../../model/danhmuc.php";
    if (isset($_GET["id"])) {
        $id = $_GET['id'];
        if ($id > 0) {
            delete_loaihang($id);
            header ("location:../index.php?act=listdm");
        }
    }
?>
