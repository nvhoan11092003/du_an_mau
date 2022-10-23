<?php
$thanh_tien = 0;
$stt=0;
if (isset($_SESSION['user'])) {
    extract($_SESSION['user']);
}else
{
    $ho_ten = "";
    $dia_chi = "";
    $email = "";
    $sdt = "";
}
?>
<div class="flex  mb-10 ">
    <!-- sản phẩm thêm vào giỏ-->
    
    <form action="index.php?act=billconfirm" class="w-full"  method="POST">
        <!-- thông tin khách hàng -->
        <h1 class="text-3xl text-center my-3 ">Thông Tin Khách Hàng</h1>
        <table class="border w-full table-auto border-black ">
            <tr>
                <td class="text-center">Người Đặt Hàng : </td>
                <td><input type="text" value="<?=$ho_ten?>" name="ho_ten" class="border w-full border-stone-500 p-2" ></td>
            </tr>
            <tr>
                <td class="text-center">Địa Chỉ :</td>
                <td><input type="text" value="<?=$dia_chi?>" name="dia_chi" class="border w-full border-stone-500 p-2"></td>
            </tr>
            <tr>
                <td class="text-center">Email :</td>
                <td><input type="text" value="<?=$email?>" name="email" class="border w-full border-stone-500 p-2"></td>
            </tr>
            <tr>
                <td class="text-center">Số Điện Thoại :</td>
                <td><input type="text" value="<?=$sdt?>" name="sdt" class="border w-full border-stone-500 p-2"></td>
            </tr>
        </table>
        <!-- Phương Thức Thanh Toán -->
        <h1 class="text-3xl text-center my-3">Phương Thức Thanh Toán</h1>
        <div class="flex justify-center items-center">
        <div class="flex items-center justify-center gap-x-12 border border-black w-full h-[100px]">
            <label class="flex items-center gap-x-1" for="1"><input id="1" type="radio" value="1" name="pttt" checked>Trả Tiền Khi nhận Hàng</label>
            <label class="flex items-center gap-x-1" for="2"><input id="2" type="radio" value="2" name="pttt">Chuyên Khoản ngân hàng</label>
            <label class="flex items-center gap-x-1" for="3"><input id="3" type="radio" value="3" name="pttt">Thanh Toán Bằng Ví momo</label>
        </div>
        </div>
        <h1 class="text-3xl text-center my-3">Giỏ Hàng</h1>
        <table class="table-auto w-full  border border-black">
            <thead>
                <tr>
                    <th class="text-start">STT</th>
                    <th class="text-start">Ảnh sp</th>
                    <th class="text-start">Tên sản phẩm</th>
                    <th class="text-start">Giá</th>
                    <th class="text-start">Số Lượng</th>
                    <th class="text-start">Thành Tiền</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['mycart'] as $key => $value) : extract($value); $thanh_tien += $tong_tien; $stt++; ?>
                    <tr class="h-[100px] border border-black">
                    <td><?=$stt ?></td>
                    <td><img class="max-h-[100px] max-w-[100px]" src="admin/<?=$hinh_anh ?>" alt=""></td>
                    <td><?=$ten_hh ?></td>
                    <td><?=$don_gia ?></td>
                    <td><?=$so_luong ?></td>
                    <td><?=$tong_tien ?></td>
                    </tr>
                <?php endforeach ?>  
                
            </tbody>
        </table>
        <p class="text-2xl text-red-600 my-3">Tổng Giá Trị Đơn Hàng : <?=$thanh_tien ?> đ </p>
        <input type="hidden" name="thanh_tien" value="<?=$thanh_tien ?>">
        <div class="mt-12">
        <input type="submit" name="submit" value="Thanh Toán" class="max-w-[400px] p-3 text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600 text-lg border rounded-md m-1 ">
        </div>
          
    </form>
    <?php
    include "view/box_right.php";
    ?>
</div>