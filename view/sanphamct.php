<?php
$idsp = $_GET['id'];
$sql = "SELECT * FROM hang_hoa where ma_hh = '$idsp'";
$hang_hoa = pdo_query_one($sql);
$sql = "SELECT * FROM loai_hang";
$loai_hang = pdo_query($sql);
$sql = "SELECT * FROM hang_hoa order by so_luot_xem desc limit 0,10 ";
$top10sp = pdo_query($sql);
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

    <div class="flex-none w-4/12 ml-5">
        <!-- form đăng nhập -->
        <div class="border mb-[50px] h-96">
            <div class=" bg-cyan-400 text-center text-white text-lg"> Đăng nhập</div>
            <form class="p-5 " action="" method="post">
                <input type="text" class="border w-full h-[40px] p-3 my-2" placeholder="Email">
                <input type="text" class="border w-full h-[40px] p-3 my-2" placeholder="Password">
                <input type="checkbox" id="quen">
                <label for="quen">Ghi nhớ tài khoản</label>
                <a href="" class="float-right text-blue-500">Quên mật khẩu</a>
                <input type="submit" name="dang_nhap" value="Đăng Nhập" class="w-full bg-red-500 hover:bg-blue-400   delay-150   p-2 text-white mt-4">
                <a href="" class="text-blue-600 float-right mb-7 mt-2"> Tạo tài khoản mới</a>
            </form>
        </div>
        <!-- danh mục -->
        <ul class="border ">
            <li class="text-xl border block p-4 bg-slate-300">Danh Mục</li>
            <?php foreach ($loai_hang as $key => $value) : ?>
                <li><a href="index.php?act=sanpham&iddm=<?= $value['ma_loai'] ?>" class="p-4 px-4 border block  hover:bg-slate-200"><?= $value['ten_loai'] ?></a></li>
            <?php endforeach ?>
        </ul>

        <!-- top 10 -->
        <ul class="border mt-10  ">
            <li class="text-xl border block p-3 bg-slate-300">top 10 sản phẩm được yêu thích</li>
            <?php foreach ($top10sp as $key => $value) : ?>
                <li class=""><a href="index.php?act=sanphamct&id=<?= $value['ma_hh'] ?>" class="p-4 px-4 h-[90px] border flex items-center gap-x-5  hover:bg-slate-200"> <img src="admin/<?= $value['hinh_anh'] ?>" alt="" class="h-full w-[70px]"> <?= $value['ten_hh'] ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>

</div>