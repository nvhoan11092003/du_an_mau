<?php
session_start();
// var_dump($_SESSION['user']);
require_once "db.php";
// kết nối model 
include "model/sanpham.php";
include "model/khachhang.php";
include "model/danhmuc.php";

include "view/header.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'gt':
            include "view/gioithieu.php";
            break;
        case 'lh':
            include "view/lienhe.php";
            break;
        case 'gy':
            include "view/gopy.php";
            break;
        case 'hd':
            include "view/hoidap.php";
            break;
        case 'sanphamct':
            include "view/sanphamct.php";
            break;
        case 'sanpham':
            include "view/sanpham.php";
            break;
        case 'dangkytk':
            include "taikhoan/add.php";
            break;
        case 'dangnhap':
            include "taikhoan/dangnhap.php";
            break;
        case 'suatk':
            include "taikhoan/sua.php";
            break;
        case 'quenmk':
            include "taikhoan/quenmk.php";
            break;
        case '':

            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
