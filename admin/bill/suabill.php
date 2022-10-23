<?php
$id = $_GET['id'];
$bill = loadone_bill($id);

if (isset($_POST['submit'])) {
    $stt = $_POST['stt'];
    $id = $_POST['id'];
    update_bill_status($stt,$id);
    header('location:index.php?act=listdh');
}

?>

<h1 class="text-center text-3xl text-red-500"> Cập nhập trạng thái đơn hàng</h1>
<form class="flex flex-col justify-center text-xl gap-4" action="index.php?act=suabill" method="POST">
    <label for="1"><input type="radio" name="stt" value="0" id="1" <?php if ($bill['bill_status'] == 0) {
                                                                        echo "checked";
                                                                    } ?>>Đơn Hàng Mới</label>
    <label for="2"><input type="radio" name="stt" value="1" id="2" <?php if ($bill['bill_status'] == 1) {
                                                                        echo "checked";
                                                                    } ?>>Đang xử lý</label>
    <label for="3"><input type="radio" name="stt" value="2" id="3" <?php if ($bill['bill_status'] == 2) {
                                                                        echo "checked";
                                                                    } ?>>Đang Giao Hàng</label>
    <label for="4"><input type="radio" name="stt" value="3" id="4" <?php if ($bill['bill_status'] == 3) {
                                                                        echo "checked";
                                                                    } ?>>Hoàn Tất</label>
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" name="submit" value="Cập Nhập trạng Thái" class="max-w-[400px]  p-2 text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600  border rounded-md m-1 ">
</form>