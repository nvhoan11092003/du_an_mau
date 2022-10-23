<?php 
    $listkh= loadall_khachhang();
?>

    <h1 class="text-3xl my-3"> Danh Sách Người Dùng</h1>
    
    <table  class="text-lg border-2 border-slate-600 w-full table-fixed">
    <thead>
        <tr class="border-b-2 border-slate-600 ">
            <th></th>
            <th  class="text-start">Ảnh Đại diện</th>
            <th  class="text-start">Họ Tên</th>
            <th class="text-start">Email</th>
            <th class="text-start">Mật Khẩu</th>
            <th class="text-start">thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listkh as $key => $value): 
               extract($value);
            ?>
            <tr class=" h-[200px] border-b-2 border-slate-600 ">
                <td class=""><input type="checkbox" name="" id=""></td>
                <td> <img class="h-auto max-h-[200px] max-w-[150px]" src="../<?= ($hinh_anh!="")?  $hinh_anh : "taikhoan/images/avt_base.jpg" ?>" alt=""></td>
                <td class="overflow-hidden"><?=$ho_ten?></td>
                <td class="overflow-hidden"><?=$email?></td>
                <td>******</td>
                <td><a href=""><input type="button" value="sửa" class="w-[100px] h-[30px] text-white bg-yellow-500 hover:bg-yellow-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 "></a>
                <a href="../taikhoan/xoa.php?id=<?=$ma_kh?>"><input type="button" value="xóa" onclick="return confirm('Bạn có muốn xoá không?')"     class="w-[100px] h-[30px] text-white bg-red-500 hover:bg-red-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 "></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div class=" mb-10">
    <input type="button" value="Chọn Tất Cả"     class="max-w-[400px]  px-2 h-[35px] text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600 text-lg border rounded-md m-1 ">
    <input type="button" value="Bỏ Chọn Tất cả"     class="max-w-[400px]  px-2 h-[35px] text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600 text-lg border rounded-md m-1 ">
    <input type="button" value="Xóa Các Mục Đã Chọn"     class="max-w-[400px]  px-2 h-[35px] text-white bg-red-500 hover:bg-red-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 ">
    <a href="index.php?act=addhh"><input type="button" value="Nhập Thêm"     class="max-w-[400px]  px-2 h-[35px] text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600 text-lg border rounded-md m-1 "></a>
</div>