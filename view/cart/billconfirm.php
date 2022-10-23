<?php

if (isset($_POST['submit']) && $_POST['submit'] != "") {
    if (isset($_SESSION['user'])) {
        $id_user = $_SESSION['user']['ma_kh'];
    } else {
        $id_user = 1;
    }
    // insert bill
    extract($_POST);
    $ngay_dat_hang = date('s:i:h d/m/y');
    $thanh_tien_bill = 0;
    foreach ($_SESSION['mycart'] as $key => $value) {
        extract($value);
        $thanh_tien_bill += $tong_tien;
        echo $tong_tien;
    }
    $id_bill = insert_bill($ho_ten,$dia_chi,$sdt,$email,$pttt,$ngay_dat_hang,$thanh_tien_bill,$id_user);
    // insert cart
    

    foreach ($_SESSION['mycart'] as $key => $value) {
        extract($value);
        insert_cart($id_user,$id_pro,$hinh_anh,$ten_hh,$so_luong,$don_gia,$tong_tien,$id_bill);

    }

    unset($_SESSION['mycart']);

    $bill = loadone_bill($id_bill);
    extract($bill);
    $pttt =   bill_pttt($bill_pttt);

    $listcart = loadone_cart($id_bill);
}

?>

<div class="flex h-96 mb-10 ">
    <!-- bill -->
    <div class="w-full ">
        <h1 class="text-center text-3xl text-green-500 my-5"> Cảm Ơn Quý khách Đã Đặt Hàng</h1> 
        <h1 class="text-center text-2xl mb-2">Chi tiết Đơn Hàng</h1>
        <div class="flex justify-center border border-black text-xl">
            <ul>
                <li>Mã Đơn Hàng : We<?= $id ?></li>
                <li>Ngày Đặt Hàng : <?= $ngay_dat_hang ?></li>
                <li>Phương Thức Thanh Toán : <?= $pttt ?></li>
                <li>giá Trị Đơn Hàng : <?= $thanh_tien_bill ?> đ</li>
            </ul>
        </div>
        <h1 class="text-center text-2xl my-2">Thông Tin Người Nhận</h1>
        <div class="flex justify-center border border-black text-xl">
            <ul>
                <li>Người Đặt Hàng : <?= $bill_name ?></li>
                <li>Địa Chỉ: <?= $bill_diachi ?></li>
                <li>Email : <?= $bill_email ?></li>
                <li>Điện Thoại : <?= $bill_sdt ?> </li>
            </ul>
        </div>
        <h1 class="text-center text-2xl my-2">Chi Tiết Giỏ Hàng</h1>
        <div class="  text-xl">
            <table class="w-full">
                <thead>
                    <tr class="border border-black">
                        <th class="text-start">stt</th>
                        <th class="text-start">Hình ảnh</th>
                        <th class="text-start">Tên Sản Phẩm</th>
                        <th class="text-start">Giá</th>
                        <th class="text-start">Số Lượng</th>
                        <th class="text-start">Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                <?php $stt=0; foreach ($listcart as $key => $value) : extract($value); $stt++; ?>
                    <tr class="h-[100px] border border-black">
                    <td><?=$stt ?></td>
                    <td><img class="max-h-[100px] max-w-[100px]" src="admin/<?=$hinh_anh ?>" alt=""></td>
                    <td><?=$ten_hh ?></td>
                    <td><?=$don_gia ?></td>
                    <td><?=$so_luong ?></td>
                    <td><?=$thanh_tien?></td>
                    </tr>
                <?php endforeach ?>  
                </tbody>
            </table>
        </div>
    </div>
    <?php
    include "view/box_right.php";
    ?>
</div>