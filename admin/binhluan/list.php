<?php 
    $listbl= loadall_binhluan();
?>
    <h1 class="text-3xl my-3"> Danh Sách Bình Luận</h1>
    <table  class="text-lg border-2 border-slate-600 w-full ">
    <thead>
        <tr class="border-b-2 border-slate-600 ">
            <th></th>
            <th>tên Khách Hàng</th>
            <th>Nội Dung</th>
            <th>Hàng Hóa Bình Luận</th>
            <th>Ngày Bình Luận</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listbl as $key => $value): 
               extract($value);
            ?>
            <tr class=" h-[200px] border-b-2 border-slate-600 ">
                <td class=""><input type="checkbox" name="" id=""></td>
                <td><?=$ho_ten?></td>
                <td class="max-w-[300px] overflow-hidden flex h-[200px] justify-center items-center"><?=$noi_dung?></td>
                <td><?=$ten_hh?></td>
                <td><?=$ngay_bl?></td>
                 <td>
                <!--<a href=""><input type="button" value="sửa" class="w-[100px] h-[30px] text-white bg-yellow-500 hover:bg-yellow-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 "></a> -->
                <a href="binhluan/xoa.php?id=<?=$ma_bl?>"><input type="button" value="xóa" onclick="return confirm('Bạn có muốn xoá không?')"     class="w-[100px] h-[30px] text-white bg-red-500 hover:bg-red-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 "></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div class=" mb-10">
    <input type="button" value="Chọn Tất Cả"     class="max-w-[400px]  px-2 h-[35px] text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600 text-lg border rounded-md m-1 ">
    <input type="button" value="Bỏ Chọn Tất cả"     class="max-w-[400px]  px-2 h-[35px] text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600 text-lg border rounded-md m-1 ">
    <input type="button" value="Xóa Các Mục Đã Chọn"     class="max-w-[400px]  px-2 h-[35px] text-white bg-red-500 hover:bg-red-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 ">
</div>