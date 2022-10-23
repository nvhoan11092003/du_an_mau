<?php
if (isset($_POST['submit'])) {
    echo ' <pre>';
    $id_pro = $_POST['id'];
    $hinh_anh = $_POST['hinh_anh'];
    $ten_hh = $_POST['ten_hh'];
    $don_gia = $_POST['don_gia'];
    $so_luong = $_POST['so_luong'];
    $tong_tien = $don_gia * $so_luong;

    $spadd = ["id_pro" => $id_pro , 
    "hinh_anh" => $hinh_anh ,
    "ten_hh" => $ten_hh ,
    "don_gia" => $don_gia ,
    "so_luong" => $so_luong ,
    "tong_tien" => $tong_tien ];
    // thêm vào session mycart
    array_push($_SESSION['mycart'] , $spadd);

    header ( "location:index.php?act=viewcart");
}
  
?>