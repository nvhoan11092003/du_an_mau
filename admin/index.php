<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['user']['vai_tro'] == 1) {
} else {
    header("location:../index.php");
}
// kết nối model
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/binhluan.php";
include "../model/khachhang.php";


// kết nối với file connect
require_once "../db.php";
include "header.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            include "danhmuc/add.php";
            break;
        case 'listdm':
            include "danhmuc/list.php";
            break;
        case 'suadm':
            include "danhmuc/sua.php";
            break;
        case 'addhh':
            include "hanghoa/add.php";
            break;
        case 'listhh':
            include "hanghoa/list.php";
            break;
        case 'suahh':
            include "hanghoa/sua.php";
            break;
        case 'listkh':
            include "../taikhoan/listkh.php";
            break;
        case 'dsbl':
            include "binhluan/list.php";
            break;

        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}


include "footer.php";
