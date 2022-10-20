<?php
$kyword = "";
$iddm = -1;
if (isset($_GET['iddm'])) {
    $iddm = $_GET['iddm'];
}
if (isset($_POST['timkiem'])) {
    $kyword = $_POST['kyword'];
}
// tương tự ở admin sản phẩm
$listhh = loadall_sanpham($kyword,$iddm);
?>
<div class="flex h-96 mb-10 ">
    <!-- sản phẩm -->
    <div class="w-full grid grid-cols-2 md:grid-cols-3 gap-5">
        <?php foreach ($listhh as $key => $value) : ?>
            <a class="" href="index.php?act=sanphamct&id=<?= $value['ma_hh'] ?>">
                <div class="relative flex flex-col items-center justify-start border h-[350px] p-3">
                    <img src="admin/<?= $value['hinh_anh'] ?>" alt="không có ảnh demo" class="max-h-[300px]">
                    <div class="absolute bottom-0">
                    <h1 class="text-xl text-blue-400"><?= $value['ten_hh'] ?></h1>
                    <h1 class="text-2xl text-red-500"><?= $value['don_gia'] ?> đ</h1>
                    </div>
                </div>
            </a>
        <?php endforeach ?>
        <?php if(!$listhh){
                echo '<h1 class="text-xl  "> Chưa có Sản phẩm</h1>';
            } ?> 
    </div>
    <?php 
    include "view/box_right.php";
    ?>
</div>