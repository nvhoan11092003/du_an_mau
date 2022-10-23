<?php
$idsp = $_GET['id'];
$hang_hoa = loadone_sanpham($idsp);
$idcungloai =  $hang_hoa['ma_loai'];
$categories = loadall_sanpham_categories($hang_hoa['ma_hh'],$idcungloai);
?>
<div class="flex h-96 mb-10 ">
    <!-- sản phẩm -->
    <div class="w-full grid grid-cols-2 gap-x-5">
        <div class="w-full max-h-[400px]">
            <img class="w-full max-h-[400px]" src="admin/<?= $hang_hoa['hinh_anh'] ?>" alt="không có ảnh demo" class="">
        </div>
        <div class=" w-full text-xl ">
            <h1 class=" text-black font-bold"><?= $hang_hoa['ten_hh'] ?></h1>
            <h1>Số lượt xem : <?= $hang_hoa['so_luot_xem'] ?> </h1>
            <h1 class=" text-red-500">Giá : <?= $hang_hoa['don_gia'] ?> đ</h1>
            <h1> Ngày nhập : <?= $hang_hoa['ngay_nhap'] ?> </h1>
            <p class="text-ellipsis overflow-hidden  h-[100px]"><?= $hang_hoa['mo_ta'] ?></p>
            <form class="mt-2" action="index.php?act=addtocart" method="post">
                <h1>Số lượng</h1>
                <input type="hidden" name="id" value="<?= $hang_hoa['ma_hh'] ?>" >
                <input type="hidden" name="hinh_anh" value="<?= $hang_hoa['hinh_anh'] ?>" >
                <input type="hidden" name="ten_hh" value="<?= $hang_hoa['ten_hh'] ?>" >
                <input type="hidden" name="don_gia" value="<?= $hang_hoa['don_gia'] ?>" >
                <input class="p-2 my-2 border border-black flex-none" type="number" name="so_luong" min="1" value="1">
                <input class="text-xl text-white p-4 rounded-md flex-none hover:bg-red-600 bg-red-500" type="submit" value="Thêm Vào Giỏ Hàng" name="submit">
            </form>
        </div>
        <!-- bình luận -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                    $("#binhluan").load("view/binhluan/formbinhluan.php", {
                        idpro : <?= $hang_hoa['ma_hh'] ?>
                });
            });
        </script>
        <div class="col-span-2 mt-[100px]" id="binhluan">
            
        </div>

        <!-- sản phẩm cùng loại -->
        <h1 class="m-10 text-2xl ">Sản Phẩm Cùng Loại</h1>
        <div class="col-span-2 flex gap-x-10">
            <?php foreach ($categories  as $key => $value) : ?>
                <a class=" block w-3/12      " href="index.php?act=sanphamct&id=<?= $value['ma_hh'] ?>">
                    <img class="w-auto h-[150px]" src="admin/<?= $value['hinh_anh'] ?>" alt="">
                    <?= $value['ten_hh'] ?>
                </a>
            <?php endforeach ?>
            <?php if (!$categories) {
                echo '<h1 class="text-xl  ">không có sản phẩm cùng loại</h1>';
            } ?>

        </div>
    </div>
    <?php
    include "view/box_right.php";
    ?>


</div>