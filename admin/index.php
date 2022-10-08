<?php
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
        case 'addhh':
            include "hanghoa/add.php";
            break;
        case 'xoadm':
            include "danhmuc/xoa.php";
            break;
        case 'suadm':
            include "danhmuc/sua.php";
            break;
        case '':
            include "";
            break;
        case '':
            include "";
            break;

        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}


include "footer.php";
