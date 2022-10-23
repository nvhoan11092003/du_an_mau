<?php
    $kyw = "";
    if (isset($_POST['submit'])&&$_POST['submit']) {
        $kyw = $_POST['kyw'];
    }

    $listbill = loadall_bill($kyw);
 ?>
<h1 class="text-center text-3xl text-red-500"> Đanh Sách Đơn Hàng</h1>
<form action="index.php?act=listdh" method="POST">
    <input class="p-2 border w-[400px] border-black" type="text" placeholder="Nhập Mã Đơn Hàng" name="kyw">
    <input class="max-w-[400px]  p-2 text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600  border rounded-md m-1 " value="Tìm Kiếm" type="submit" name="submit">
</form>


<table class="w-full border border-black table-auto">
            <thead>
                <tr class="border border-black h-[70px]">
                    <td>STT</td>
                    <td>Mã Đơn Hàng</td>
                    <td>Người Đặt</td>
                    <td>Ngày Đặt Hàng</td>
                    <td>Giá Trị Đơn hàng</td>
                    <td>Tình Trạng Đơn Hàng</td>
                    <td>Thao Tác</td>
                </tr>
            </thead>
            <tbody>
                <?php $stt=0; foreach ($listbill as $key => $value) : extract($value); $stt++;  ?>
                    <tr class="border border-black h-[50px]">
                        <td><?= $stt ?></td>
                        <td> WE-<?= $id ?></td>
                        <td> <?= $bill_name ?></td>
                        <td> <?= $ngay_dat_hang ?></td>
                        <td> <?= $thanh_tien_bill ?> Đ</td>
                        <td> <?= bill_status($bill_status) ?> </td>
                        <td>
                            <a href="index.php?act=suabill&id=<?= $id ?>"  class="max-w-[400px] py-2 px-3 m-2  text-white bg-yellow-500 hover:bg-yellow-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md ">Sửa</a>
                            <a href="bill/xoa.php?id=<?= $id ?>"   onclick="return confirm('Bạn có muốn xoá không?')"  class="max-w-[400px] py-2 px-3 m-2 text-white bg-red-500 hover:bg-red-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md "> Xóa</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>