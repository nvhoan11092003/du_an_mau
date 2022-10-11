<div class="flex h-96 mb-10 ">
    <!-- slide -->
    <div class="w-8/12 h-[200px] block">
        <!-- slide -->
        <!-- CONTENT 1.2 -->
        <div class="  relative block  ">
            <div class="  ">
                <img src="view/slide/slide1.jpg" class="w-full h-96 slider absolute ">
            </div>
            <div class="  ">
                <img src="view/slide/slide2.jpg" class="w-full h-96 slider absolute ">
            </div>
            <div class="  ">
                <img src="view/slide/slide3.jpg" class="w-full h-96 slider absolute ">
            </div>
            <div class="  ">
                <img src="view/slide/slide4.jpg" class="w-full h-96 slider absolute ">
            </div>
            <div class="  ">
                <img src="view/slide/slide5.jpg" class="w-full h-96 slider absolute ">
            </div>
        </div>
        <script>
            const images = document.querySelectorAll(".slider");
            console.log(images);
            let current = 0;

            function changeImage() {
                setInterval(function() {
                    for (let i = 0; i < images.length; i++) {
                        images[i].style.opacity = 0;
                    }
                    if (current > images.length - 2) {
                        current = 0;
                    } else {
                        current = current + 1;
                    }
                    images[current].style.opacity = 1;
                }, 3000);
            }

            changeImage();
        </script>

    </div>
    <!-- form đăng nhập -->
    <div class="flex-none w-4/12 border m-2 ">
        <div class=" bg-cyan-400 text-center text-white text-lg"> Đăng nhập</div>
        <form class="p-5" action="" method="post">
            <input type="text" class="border w-full h-[40px] p-3 my-2" placeholder="Email">
            <input type="text" class="border w-full h-[40px] p-3 my-2" placeholder="Password">
            <input type="checkbox" id="quen">
            <label for="quen">Ghi nhớ tài khoản</label>
            <a href="" class="float-right text-blue-500">Quên mật khẩu</a>
            <input type="submit" name="dang_nhap" value="Đăng Nhập" class="w-full bg-red-500 hover:bg-blue-400   delay-150   p-2 text-white mt-4">
            <a href="" class="text-blue-600 float-right mb-7 mt-2"> Tạo tài khoản mới</a>
        </form>
    </div>
</div>
<!-- sản phẩm -->
<?php
$sql = "SELECT * FROM hang_hoa order by ma_hh desc limit 0,9";
$listhh = pdo_query($sql);
?>
<div class="flex justify-start items-center mb-24">
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <?php foreach ($listhh as $key => $value) : ?>
            <a href="index.php?act=sanphamct&id=<?= $value['ma_hh'] ?>">
                <div class="flex flex-col items-center justify-start border h-[350px] p-3">
                    <img src="admin/<?= $value['hinh_anh'] ?>" alt="không có ảnh demo" class="max-h-[300px]">
                    <h1 class="text-xl text-blue-400"><?= $value['ten_hh'] ?></h1>
                    <h1 class="text-2xl text-red-500"><?= $value['don_gia'] ?> đ</h1>
                </div>
            </a>
        <?php endforeach ?>
    </div>
    <!-- danh mục -->
    <?php
    $sql = "SELECT * FROM loai_hang";
    $loai_hang = pdo_query($sql);
    $sql = "SELECT * FROM hang_hoa order by so_luot_xem desc limit 0,10 ";
    $top10sp = pdo_query($sql);
    ?>
    <div class="flex-none w-4/12 ml-5">
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
            <li class=""><a href="index.php?act=sanphamct&iddm=<?= $value['ma_loai'] ?>" class="p-4 px-4 h-[90px] border flex items-center gap-x-5  hover:bg-slate-200"> <img src="admin/<?= $value['hinh_anh'] ?>" alt="" class="h-full w-[70px]">     <?= $value['ten_hh'] ?></a></li>
        <?php endforeach ?>
        </ul>
    </div>
</div>