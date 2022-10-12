<?php
$idsp = $_GET['id'];
$sql = "SELECT * FROM hang_hoa where ma_hh = '$idsp'";
$hang_hoa = pdo_query_one($sql);
$idcungloai=  $hang_hoa['ma_loai'];
$sql = "SELECT * FROM hang_hoa where ma_loai = '$idcungloai' and   '". $hang_hoa['ma_hh'] ."'  <> ma_hh ";
$category = pdo_query($sql);

?>
<div class="flex h-96 mb-10 ">
    <!-- sản phẩm -->
    <div class="w-full grid grid-cols-2">
        <div class="w-full">
            <img class="float-left w-full" src="admin/<?= $hang_hoa['hinh_anh'] ?>" alt="không có ảnh demo" class="">
        </div>
        <div class="ml-5 w-6/12 flex-none ">
            <h1 class="text-3xl text-slate-500"><?= $hang_hoa['ten_hh'] ?></h1>
            <h1>Số lượt xem : <?= $hang_hoa['so_luot_xem'] ?> </h1>
            <h1 class="text-2xl text-red-500">Giá : <?= $hang_hoa['don_gia'] ?> đ</h1>
            <h1> Ngày nhập : <?= $hang_hoa['ngay_nhap'] ?> </h1>
            <p class="text-ellipsis"><?= $hang_hoa['mo_ta'] ?></p>
        </div>
        <!-- bình luận -->
        <div class="col-span-2"></div>

        <!-- sản phẩm cùng loại -->
        <h1 class="m-10 text-2xl ">Sản Phẩm Cùng Loại</h1>
        <div class="col-span-2 flex gap-x-10">
            <?php foreach ($category as $key => $value) : ?>
                <a class=" block w-3/12      " href="index.php?act=sanphamct&id=<?= $value['ma_hh'] ?>" >
                <img class="w-auto h-[150px]" src="admin/<?= $value['hinh_anh'] ?>" alt="">
                <?= $value['ten_hh'] ?>
                </a>
            <?php endforeach ?>
            <?php if(!$category){
                echo '<h1 class="text-xl  ">không có sản phẩm cùng loại</h1>';
            } ?> 
            
        </div>
    </div>
 <?php 
    include "view/box_right.php";
 ?>
            

</div>