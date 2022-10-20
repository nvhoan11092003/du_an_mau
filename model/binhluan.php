<?php
function loadall_binhluan(){
    $sql = "SELECT * FROM binh_luan INNER JOIN hang_hoa ON binh_luan.ma_hh = hang_hoa.ma_hh INNER JOIN khach_hang ON binh_luan.ma_kh=khach_hang.ma_kh order by ma_bl desc";
    $ds_binh_luan= pdo_query($sql);
    return $ds_binh_luan;
};

function insert_binhluan($noidung,$idpro,$iduser,$ngaybl){
    $sql = "INSERT INTO binh_luan(ma_bl, noi_dung, ma_hh, ma_kh, ngay_bl) VALUES ('','$noidung','$idpro','$iduser','$ngaybl')";
    pdo_execute($sql);
}

function load10_binhluan($idpro){
    $sql = "SELECT * FROM binh_luan inner join khach_hang on binh_luan.ma_kh=khach_hang.ma_kh WHERE ma_hh ='$idpro' order by binh_luan.ngay_bl  ASC limit 0,10";
    $ds_binh_luan= pdo_query($sql);
    return $ds_binh_luan;
};
// function loadone_binhluan($id){
//     $sql = "SELECT * FROM loai_hang WHERE ma_loai = '$id' ";
//     $loai_hang = pdo_query_one($sql);
//     return $loai_hang;
// }

// function update_binhluan($ten_loai,$id){
//     $sql = "UPDATE loai_hang SET ten_loai='$ten_loai' WHERE ma_loai = '$id'";
//     pdo_execute($sql);
// }

function delete_binhluan($id)
{
    $sql = "DELETE FROM binh_luan WHERE ma_bl = $id";
    pdo_execute($sql);
}
?>