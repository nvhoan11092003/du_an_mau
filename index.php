<?php
session_start();
// var_dump($_SESSION['user']);
require_once "db.php";
// kết nối model 
include "model/sanpham.php";
include "model/khachhang.php";
include "model/danhmuc.php";
include "model/cart.php";


if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}

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
        case 'addtocart':
            include "view/cart/add.php";
            break;

        case 'viewcart':
            include "view/cart/viewcart.php";
            break;
        case '':
            include "";
            break;
        case 'bill':
            include "view/cart/bill.php";
            break;
        case 'billconfirm':
            include "view/cart/billconfirm.php";
            break;
        case 'mybill':
            include "view/cart/mybill.php";
            break;

            
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
