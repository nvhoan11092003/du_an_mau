<?php
$id_user = $_SESSION['user']['ma_kh'];
$listbill = loadall_bill_user($id_user);

?>

<div class="flex h-96 mb-10 ">
    <div class="w-full ">
        <h1 class="text-3xl text-blue-400 text-center my-5">Đơn Hàng</h1>
        <table class="w-full border border-black table-auto">
            <thead>
                <tr class="border border-black h-[70px]">
                    <td>STT</td>
                    <td>Mã Đơn Hàng</td>
                    <td>Ngày Đặt Hàng</td>
                    <td>Giá Trị Đơn hàng</td>
                    <td>Tình Trạng Đơn Hàng</td>
                </tr>
            </thead>
            <tbody>
                <?php $stt=0; foreach ($listbill as $key => $value) : extract($value); $stt++;  ?>
                    <tr class="border border-black h-[50px]">
                        <td><?= $stt ?></td>
                        <td> WE-<?= $id ?></td>
                        <td> <?= $ngay_dat_hang ?></td>
                        <td> <?= $thanh_tien_bill ?> Đ</td>
                        <td> <?= bill_status($bill_status) ?> </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <?php
    include "view/box_right.php";
    ?>
</div>