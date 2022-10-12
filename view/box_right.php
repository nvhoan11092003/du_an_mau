<?php 
$sql = "SELECT * FROM loai_hang";
$loai_hang = pdo_query($sql);
$sql = "SELECT * FROM hang_hoa order by so_luot_xem desc limit 0,10 ";
$top10sp = pdo_query($sql);
?>
<div class="flex-none w-4/12 ml-5">
        <!-- form đăng nhập -->
        <div class="border mb-[50px] h-96">
            <div class=" bg-cyan-400 text-center text-white text-lg"> Đăng nhập</div>
            <form class="p-5 " action="index.php?act=dangnhap" method="post">
                <input type="text" class="border w-full h-[40px] p-3 my-2" placeholder="Email">
                <input type="text" class="border w-full h-[40px] p-3 my-2" placeholder="Password">
                <input type="checkbox" id="quen">
                <label for="quen">Ghi nhớ tài khoản</label>
                <a href="" class="float-right text-blue-500">Quên mật khẩu</a>
                <input type="submit" name="dang_nhap" value="Đăng Nhập" class="w-full bg-red-500 hover:bg-blue-400   delay-150   p-2 text-white mt-4">
                <a href="index.php?act=dangkytk" class="text-blue-600 float-right mb-7 mt-2"> Tạo tài khoản mới</a>
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