<?php
$thanh_tien = 0;
$stt=0;
?>
<div class="flex  mb-10 ">
    <!-- sản phẩm thêm vào giỏ-->
    <div class="w-full ">
        <h1 class="text-3xl text-center my-3">Giỏ Hàng</h1>
        <table class="table-auto w-full  border">
            <thead>
                <tr>
                    <th class="text-start">STT</th>
                    <th class="text-start">Ảnh sp</th>
                    <th class="text-start">Tên sản phẩm</th>
                    <th class="text-start">Giá</th>
                    <th class="text-start">Số Lượng</th>
                    <th class="text-start">Thành Tiền</th>
                    <th class="text-start">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['mycart'] as $key => $value) : extract($value); $thanh_tien += $tong_tien; $stt++; ?>
                    <tr class="h-[100px] border">
                    <td><?=$stt ?></td>
                    <td><img class="max-h-[100px] max-w-[100px]" src="admin/<?=$hinh_anh ?>" alt=""></td>
                    <td><?=$ten_hh ?></td>
                    <td><?=$don_gia ?></td>
                    <td><?=$so_luong ?></td>
                    <td><?=$tong_tien ?></td>
                    <td><a  href="view/cart/xoa.php?id=<?=$key?>" class="text-blue-500 " onclick="return confirm('Bạn có muốn Xóa sản phẩm ở giỏ hàng không?')">Xóa</a></td>
                    </tr>
                <?php endforeach ?>  
                
            </tbody>
        </table>
        <p class="text-2xl text-red-600 my-3">Tổng Giá Trị Đơn Hàng : <?=$thanh_tien ?> đ </p>
        <div class="mt-12">
        <a href="index.php?act=bill" class="max-w-[400px]  p-2 h-[35px] text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600 text-lg border rounded-md m-1 " >Đồng Ý Đặt Hàng</a>
        <a href="view/cart/xoa.php" onclick="return confirm('Bạn có muốn tất cả sản phẩm ở giỏ hàng không?')" class="p-2 bg-red-500 hover:bg-red-600 text-white border-gray-600 text-lg border rounded-md m-1">Xóa Giỏ Hàng</a>       
        </div>
          
    </div>
    <?php
    include "view/box_right.php";
    ?>
</div>