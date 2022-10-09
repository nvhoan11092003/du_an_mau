<?php 
    if (isset($_POST['tim'])) {
        $key_word = $_POST['keyword'];
        $id_danhmuc = $_POST['iddm'];
        $sql = "SELECT * FROM hang_hoa inner join loai_hang WHERE loai_hang.ma_loai = hang_hoa.ma_loai";
        if ($key_word!="") {
            $sql .= " and ten_hh like '%$key_word%' ";
        }
        if($id_danhmuc>0){
            $sql .=  " and hang_hoa.ma_loai = $id_danhmuc ";
        }
    }else{
        $sql = "SELECT * FROM hang_hoa inner join loai_hang WHERE loai_hang.ma_loai = hang_hoa.ma_loai";

    }
    $listhh = pdo_query($sql);   
    $sql = "SELECT * FROM loai_hang";
    $listdm = pdo_query($sql);
?>

    <h1 class="text-3xl my-3"> Danh Sách Hàng Hóa </h1>
    <form action="../admin/index.php?act=listhh" method="post" class="flex justify-start items-center mb-3">
    <input type="text" name="keyword" class="w-[250px] h-[30px] border-2 focus:border-blue-700 border-black pl-2 rounded-md m-1" placeholder="Tên Hàng Hóa">
    <select name="iddm" id="" class="border rounded-md border-black h-8 block w-[150px]">
            <option value="">Tất cả</option>
            <?php foreach ($listdm as $key => $value) :?>
                <option value="<?= $value['ma_loai'] ?>"><?=$value['ten_loai'] ?></option>
            <?php endforeach?>
        </select>
    
    <input type="submit" value="Tìm Kiếm" name="tim" class="max-w-[400px]  px-2 h-[35px] text-white  bg-blue-500 hover:bg-blue-700 active:bg-red-500 border-gray-600 text-lg border rounded-md m-1 ">
    </form>
    <table  class="text-lg table-fixed border-2 border-separate border-slate-600 w-full">
    <thead>
        <tr>
            <th></th>
            <th>TÊN SẢN PHẨM</th>
            <th>ĐƠN GIÁ</th>
            <th>GIẢM GIÁ</th>
            <th>ẢNH SẢN PHẨM</th>
            <th>MÔ TẢ</th>
            <th>LƯỢT XEM</th>
            <th>TÊN LOẠI</th>
            <th>NGÀY NHẬP</th>
            <th>ĐẶC BIỆT</th>
            <th>thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listhh as $key => $value): ?>
            <tr>
                <td><input type="checkbox" name="" id=""></td>
                <td><?=$value['ten_hh']?></td>
                <td><?=$value['don_gia']?></td>
                <td><?=$value['giam_gia']?></td>
                <td><img src="<?=$value['hinh_anh']?>" alt="chưa có ảnh sp" class="max-w-[100px] max-h-[150px]"></td>
                <td><?=$value['mo_ta']?></td>
                <td><?=$value['so_luot_xem']?></td>
                <td><?=$value['ten_loai']?></td>
                <td><?=$value['ngay_nhap']?></td>
                <td><?=$value['dac_biet']?></td>
                <td><a href="index.php?act=suahh&id=<?= $value['ma_hh'] ?>"><input type="button" value="sửa" class="w-[100px] h-[30px] text-white bg-yellow-500 hover:bg-yellow-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 "></a>
                <a href="hanghoa/xoa.php?id=<?= $value['ma_hh'] ?>"><input type="button" value="xóa" onclick="return confirm('Bạn có muốn xoá không?')"     class="w-[100px] h-[30px] text-white bg-red-500 hover:bg-red-700 active:bg-blue-500 border-gray-600 text-lg border rounded-md m-1 "></a></td>
              
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