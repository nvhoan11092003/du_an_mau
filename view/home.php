<div class="flex  mb-10 ">
    <!-- sản phẩm -->

    <!-- slide -->
    <div class="">
        <div class="w-full mb-10 h-96  block">
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
        <!-- sản phẩm -->
        <?php
        $listhh = load9_sanpham();
        ?>
        <div class="flex justify-start items-center mb-24">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <?php foreach ($listhh as $key => $value) : ?>
                    <a class="relative" href="index.php?act=sanphamct&id=<?= $value['ma_hh'] ?>">
                        <div class="flex flex-col items-center justify-start border h-[400px] p-3 pb-[50px]">
                            <img src="admin/<?= $value['hinh_anh'] ?>" alt="không có ảnh demo" class="max-h-[300px]">
                            <div class="absolute bottom-0">
                                <h1 class="text-xl text-blue-400"><?= $value['ten_hh'] ?></h1>
                                <h1 class="text-2xl text-red-500"><?= $value['don_gia'] ?> đ</h1>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <?php
    include "view/box_right.php";
    ?>
</div>