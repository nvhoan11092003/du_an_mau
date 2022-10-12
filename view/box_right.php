<?php
$sql = "SELECT * FROM loai_hang";
$loai_hang = pdo_query($sql);
$sql = "SELECT * FROM hang_hoa order by so_luot_xem desc limit 0,10 ";
$top10sp = pdo_query($sql);
?>
<div class="flex-none w-4/12 ml-5">
    <?php if (isset($_SESSION['user'])) {
        extract($_SESSION['user']);
    ?>
        <!-- sau khi đăng nhập thành công -->
        <div class="h-96 border mb-[50px] p-4">
            <h1 class="text-center text-2xl mb-2">Thông tin tài khoản</h1>
            <div class=" gap-4 mb-5 flex justify-start items-start">
                <!-- ảnh đại diện -->
                <img class="h-[150px] max-w-[200px]" src=" <?= ($hinh_anh!="")?  $hinh_anh : "taikhoan/images/avt_base.jpg" ?>" alt="">
                <!-- thông tin -->
                <div class="">
                    <h1 class="">Tên :<?= $ho_ten ?></h1>
                    <h1 class=""><?= $email ?></h1>
                </div>
            </div>
            <ul class="text-blue-500">
            <li><a class="hover:text-red-500" href="index.php?act=suatk">Thay Đổi Thông Tin</a></li>
            <li><a class="hover:text-red-500" href="taikhoan/dangxuat.php"> Đăng Xuất</a></li>
            </ul>
        </div>
    <?php } else { ?>
        <!-- form đăng nhập -->
        <div class="border mb-[50px] h-96">
            <div class=" bg-cyan-400 text-center text-white text-lg"> Đăng nhập</div>
            <form class="p-5 " action="index.php?act=dangnhap" method="post">
                <h1 class="text-red-500 text-xl"><?php if (isset($_GET['error'])) {
                                                        echo $_GET['error'];
                                                    } ?></h1>
                <input name="tk" type="text" class="border w-full h-[40px] p-3 my-2" placeholder="Email">
                <input name="mk" type="text" class="border w-full h-[40px] p-3 my-2" placeholder="Password">
                <input type="checkbox" id="quen">
                <label for="quen">Ghi nhớ tài khoản</label>
                <a href="" class="float-right text-blue-500">Quên mật khẩu</a>
                <input type="submit" name="dang_nhap" value="Đăng Nhập" class="w-full bg-red-500 hover:bg-blue-400   delay-150   p-2 text-white mt-4">
                <a href="index.php?act=dangkytk" class="text-blue-600 float-right mb-7 mt-2"> Tạo tài khoản mới</a>
            </form>
        </div>
    <?php  } ?>
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